<?php
namespace App\Models;
use CodeIgniter\Model;

class KegiatanDetailModel extends Model {
    protected $table = 'kegiatan_detail';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_kegiatan', 'id_peserta', 'status_kehadiran'];
}