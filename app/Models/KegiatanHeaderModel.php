<?php
namespace App\Models;
use CodeIgniter\Model;

class KegiatanHeaderModel extends Model {
    protected $table = 'kegiatan_header';
    protected $primaryKey = 'id_kegiatan';
    protected $allowedFields = ['id_jadwal', 'tanggal', 'pertemuan', 'materi'];
}