<?php

namespace App\Controllers;
use Dompdf\Dompdf;
class Pages extends BaseController
{
    public function login()
    {
        return view('login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function product()
    {
        $session = session();
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'localhost/project/AplikasiPenjualan/BE/api/produk',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$session->get('token'),
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $hasilResponse  = json_decode($response,true);
        $data         = $hasilResponse['data'];
        return view('product',compact('data'));
    }
    public function detailProduct($kodeProduct=null)
    {
        $session = session();
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'localhost/project/AplikasiPenjualan/BE/api/produkDetail/'.$kodeProduct,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$session->get('token'),
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $hasilResponse  = json_decode($response,true);
        $data         = $hasilResponse['data'];
        return view('detailProduct',compact('data'));
    }
    public function checkout($kodeProduk=null)
    {
        $session = session();
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'localhost/project/AplikasiPenjualan/BE/api/checkout',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "kodeProduk" : "'.$kodeProduk.'",
            "pengguna" : "'.$session->get('username').'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$session->get('token'),
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $hasilResponse  = json_decode($response,true);
        $data           = $hasilResponse['data'];
        return view('checkout',compact('data'));
    }
    public function laporan()
    {
        $session = session();
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'localhost/project/AplikasiPenjualan/BE/api/laporanAll/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$session->get('token'),
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $hasilResponse  = json_decode($response,true);
        $data         = $hasilResponse['data'];
        return view('laporan',compact('data'));
    }
    public function generate()
    {
        $session = session();
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'localhost/project/AplikasiPenjualan/BE/api/laporanAll/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$session->get('token'),
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $hasilResponse  = json_decode($response,true);
        $data         = $hasilResponse['data'];
        $filename = date('y-m-d-H-i-s'). ' Laporan';
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        // load HTML content
        $dompdf->loadHtml(view('pdf_view',compact('data')));
        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename);
    }
}
