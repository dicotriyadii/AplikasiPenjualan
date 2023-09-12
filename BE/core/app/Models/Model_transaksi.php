<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Model_transaksi extends Model
{
    protected $table                = 'tbl_transaksi';
    protected $primaryKey           = 'kodeTransaksi';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nomorDokumen','pengguna','totalHarga','tanggalTransaksi','status'];
}