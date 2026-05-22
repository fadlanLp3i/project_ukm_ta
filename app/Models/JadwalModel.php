<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id_pelatihan', 
        'id_pengajar', 
        'tanggal_mulai', 
        'tanggal_selesai', 
        'total_pertemuan', 
        'status'
    ];

    // Mengambil data jadwal khusus untuk id_ukm tertentu
    public function getJadwalByUkm($id_ukm, $id_jadwal = null)
    {
        $builder = $this->select('jadwal.*, pelatihan.nama_pelatihan, pelatihan.id_ukm, pengajar.nama_pengajar')
                        ->join('pelatihan', 'pelatihan.id_pelatihan = jadwal.id_pelatihan')
                        ->join('pengajar', 'pengajar.id_pengajar = jadwal.id_pengajar')
                        ->where('pelatihan.id_ukm', $id_ukm); // Filter berdasarkan UKM

        if ($id_jadwal === null) {
            return $builder->findAll();
        }

        return $builder->where('jadwal.id_jadwal', $id_jadwal)->first();
    }
}