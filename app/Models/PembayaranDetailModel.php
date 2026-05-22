<?php
namespace App\Models;
use CodeIgniter\Model;

class PembayaranDetailModel extends Model {
    protected $table = 'pembayaran_detail';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_pembayaran', 'tanggal_bayar', 'cicilan'];
}