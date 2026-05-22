<?php
namespace App\Models;
use CodeIgniter\Model;

class PembayaranHeaderModel extends Model {
    protected $table = 'pembayaran_header';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = ['id_jadwal', 'id_regist', 'bulan', 'biaya', 'cicilan', 'status'];
}