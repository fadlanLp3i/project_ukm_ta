<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table            = 'dokumen';
    protected $primaryKey       = 'id_dokumen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_ukm', 'jenis_dokumen', 'upload', 'pengesahan'];

    // 1. Ambil data dokumen spesifik per UKM (Untuk Ketua & Sekretaris)
    public function getDokumenByUkm($id_ukm, $id_dokumen = null)
    {
        $builder = $this->select('dokumen.*, ukm.nama_ukm')
                        ->join('ukm', 'ukm.id_ukm = dokumen.id_ukm')
                        ->where('dokumen.id_ukm', $id_ukm);

        if ($id_dokumen === null) {
            return $builder->findAll();
        }

        return $builder->where('dokumen.id_dokumen', $id_dokumen)->first();
    }

    // 2. Ambil SEMUA data dokumen tanpa filter UKM (Khusus untuk Pembina)
    public function getAllDokumen()
    {
        return $this->select('dokumen.*, ukm.nama_ukm')
                    ->join('ukm', 'ukm.id_ukm = dokumen.id_ukm')
                    ->findAll();
    }
}