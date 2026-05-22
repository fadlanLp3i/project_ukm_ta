<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiModel extends Model
{
    protected $table            = 'registrasi';
    protected $primaryKey       = 'id_registrasi';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_peserta', 'id_ukm', 'biaya'];

    // Menampilkan data yang hanya dimiliki oleh UKM pengurus tersebut
    public function getRegistrasiByUkm($id_ukm)
    {
        return $this->db->table($this->table)
            ->select('registrasi.*, peserta.nama_peserta, peserta.nim, ukm.nama_ukm')
            ->join('peserta', 'peserta.id_peserta = registrasi.id_peserta')
            ->join('ukm', 'ukm.id_ukm = registrasi.id_ukm')
            ->where('registrasi.id_ukm', $id_ukm) 
            ->get()->getResultArray();
    }
}