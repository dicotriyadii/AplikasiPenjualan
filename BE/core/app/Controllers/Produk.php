<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_produk;
use App\Models\Model_transaksi;
use App\Models\Model_transaksi_detail;
use App\Models\Model_data;
use \Firebase\JWT\JWT;
 
class Produk extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $session    = session();
        $modelData  = new Model_data();
        $dataProduk = $modelData->dataProduk();
        $response= [
            'status'    => 200,
            'messages'  => "Data Produk Berhasil",
            'data'      => $dataProduk
        ];
        return $this->respond($response,200);   
    }
    public function show($kodeProduk=null)
    {
        $session    = session();
        $modelData  = new Model_data();
        $dataProduk = $modelData->dataProdukDetail($kodeProduk);
        $response= [
            'status'    => 200,
            'messages'  => "Data Produk Berhasil",
            'data'      => $dataProduk
        ];
        return $this->respond($response,200);   
    }

    public function checkout()
    {
        $session                = session();
        $modelTransaksi         = new Model_transaksi();
        $modelTransaksiDetail   = new Model_transaksi_detail();
        $modelData              = new Model_data();
        $kodeProduk             = $this->request->getVar('kodeProduk');
        $pengguna               = $this->request->getVar('pengguna');
        $nilaiAcak              = rand(1, 1000000);
        $cekProduk              = $modelData->dataProdukDetail($kodeProduk);
        $dataTransaksi = [
            'nomorDokumen' => $nilaiAcak,
            'pengguna' => $pengguna,
            'totalHarga' => "0",
            'tanggalTransaksi' => date('Y-m-d'),
            'status' => 0,
        ];
        $modelTransaksi->insert($dataTransaksi);
        $cekData = $modelData->cekTransaksi(0);
        $idTransaksi = $cekData[0]['kodeTransaksi'];
        $dataDetailTransaksi = [
            'transaksi' => $idTransaksi,
            'produk'    => $kodeProduk,
        ];
        $modelTransaksiDetail->insert($dataDetailTransaksi);
        $dataUpdateTransaksi = [
            'totalHarga' => $cekProduk[0]['harga'],
        ];
        $modelTransaksi->update($idTransaksi,$dataUpdateTransaksi);
        $cekDataTerbaru = $modelData->cekTransaksi(0);
        $response= [
            'status'    => 200,
            'messages'  => "Checkout Berhasil",
            'data'      => $cekDataTerbaru
        ];  
        return $this->respond($response,200);   
    }
    public function pembayaran($kodeTransaksi)
    {
        $modelData              = new Model_data();
        $modelTransaksi         = new Model_transaksi();
        $dataUpdateTransaksi = [
            'status' => 1,
        ];
        $modelTransaksi->update($kodeTransaksi,$dataUpdateTransaksi);
        $cekDataTerbaru = $modelData->cekTransaksi(1);
        $response= [
            'status'    => 200,
            'messages'  => "Pembayaran Berhasil",
            'data'      => $cekDataTerbaru
        ];  
        return $this->respond($response,200);   
    }
    public function laporan($status)
    {
        $session        = session();
        $modelData      = new Model_data();
        $dataLaporan    = $modelData->cekTransaksi($status);
        $response= [
            'status'    => 200,
            'messages'  => "Data Laporan",
            'data'      => $dataLaporan
        ];
        return $this->respond($response,200);    
    }
    public function laporanAll()
    {
        $session        = session();
        $modelData      = new Model_data();
        $dataLaporan    = $modelData->transaksi();
        $response= [
            'status'    => 200,
            'messages'  => "Data Laporan",
            'data'      => $dataLaporan
        ];
        return $this->respond($response,200);    
    }
}