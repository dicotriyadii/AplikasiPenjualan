<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Model_transaksi_detail extends Model
{
    protected $table                = 'tbl_transaksi_detail';
    protected $primaryKey           = 'kodeTransaksiDetail';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['transaksi','produk'];
}