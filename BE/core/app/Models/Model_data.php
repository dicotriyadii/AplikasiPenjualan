<?php namespace App\Models;
 
use CodeIgniter\Model;
class Model_data extends Model
{   
    // Tampil Keselurahan
    public function cekUsername($username=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pengguna');
        $builder->select('*');
        $builder->where('username',$username);
        return $builder->get()->getResultArray();
    }
    public function dataProduk()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_product');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function dataProdukDetail($kodeProduk)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_product');
        $builder->select('*');
        $builder->where('kodeProduk',$kodeProduk);
        return $builder->get()->getResultArray();
    }
    public function cekTransaksi($status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_transaksi');
        $builder->select('*');
        $builder->where('status',$status);
        return $builder->get()->getResultArray();
    }
    public function transaksi()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_transaksi');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function cekTotalTransaksi($status)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_transaksi');
        $builder->select('*');
        $builder->where('status',$status);
        return $builder->CountAllResults();
    }
}