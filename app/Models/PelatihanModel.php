<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table            = 'pelatihan';
    protected $primaryKey       = 'id_pelatihan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $useTimestamps    = false;

    // Kolom yang boleh dimanipulasi
    protected $allowedFields    = ['id_pelatihan', 'nama_pelatihan', 'id_ukm', 'biaya', 'id_periode'];

    // Validation Rules
    protected $validationRules = [
        'nama_pelatihan' => 'required|min_length[3]|max_length[255]',
        'id_ukm'         => 'required|numeric',
        'id_periode'     => 'required|numeric',
        'biaya'          => 'required|numeric|greater_than_equal_to[0]',
    ];

    protected $validationMessages = [
        'nama_pelatihan' => [
            'required'      => 'Nama pelatihan wajib diisi.',
            'min_length'    => 'Nama pelatihan minimal 3 karakter.',
            'max_length'    => 'Nama pelatihan maksimal 255 karakter.',
        ],
        'id_ukm' => [
            'required'  => 'Pilih UKM terlebih dahulu.',
            'numeric'   => 'Format UKM tidak valid.',
        ],
        'id_periode' => [
            'required'  => 'Pilih periode terlebih dahulu.',
            'numeric'   => 'Format periode tidak valid.',
        ],
        'biaya' => [
            'required'                  => 'Biaya wajib diisi.',
            'numeric'                   => 'Biaya harus berupa angka.',
            'greater_than_equal_to'    => 'Biaya tidak boleh negatif.',
        ],
    ];

    /**
     * Ambil data pelatihan berdasarkan UKM dengan JOIN
     */
    public function getPelatihanByUkm($id_ukm)
    {
        return $this->select([
                'pelatihan.id_pelatihan',
                'pelatihan.nama_pelatihan',
                'pelatihan.biaya',
                'pelatihan.id_periode',
                'pelatihan.id_ukm',
                'ukm.nama_ukm',
                'periode.periode'
            ])
            ->join('ukm', 'ukm.id_ukm = pelatihan.id_ukm', 'left')
            ->join('periode', 'periode.id_periode = pelatihan.id_periode', 'left')
            ->where('pelatihan.id_ukm', $id_ukm)
            ->orderBy('pelatihan.id_pelatihan', 'DESC')
            ->findAll();
    }

    /**
     * Ambil semua data pelatihan dengan JOIN
     */
    public function getPelatihanWithFullJoin()
    {
        return $this->select([
                'pelatihan.id_pelatihan',
                'pelatihan.nama_pelatihan',
                'pelatihan.biaya',
                'pelatihan.id_periode',
                'pelatihan.id_ukm',
                'ukm.nama_ukm',
                'periode.periode'
            ])
            ->join('ukm', 'ukm.id_ukm = pelatihan.id_ukm', 'left')
            ->join('periode', 'periode.id_periode = pelatihan.id_periode', 'left')
            ->orderBy('pelatihan.id_pelatihan', 'DESC')
            ->findAll();
    }

    /**
     * Ambil detail pelatihan dengan JOIN
     */
    public function getPelatihanDetail($id)
    {
        return $this->select([
                'pelatihan.id_pelatihan',
                'pelatihan.nama_pelatihan',
                'pelatihan.biaya',
                'pelatihan.id_periode',
                'pelatihan.id_ukm',
                'ukm.nama_ukm',
                'periode.periode'
            ])
            ->join('ukm', 'ukm.id_ukm = pelatihan.id_ukm', 'left')
            ->join('periode', 'periode.id_periode = pelatihan.id_periode', 'left')
            ->where('pelatihan.id_pelatihan', $id)
            ->first();
    }
}