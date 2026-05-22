<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class LaporanDokumenController extends BaseController
{
    protected $dokumenModel;

    public function __construct()
    {
        $this->dokumenModel = new DokumenModel();
    }

    public function index()
    {
        $role   = session()->get('role'); 
        $id_ukm = session()->get('id_ukm');

        if ($role === 'pembina') {
            // Pembina melihat semua dokumen dari seluruh UKM
            $data = [
                'title'   => 'Laporan Semua Dokumen UKM',
                'dokumen' => $this->dokumenModel->getAllDokumen()
            ];
            
            return view('pembina/laporan/dokumen', $data);

        } else {
            // Ketua hanya melihat dokumen berdasarkan id_ukm miliknya sendiri
            $data = [
                'title'   => 'Laporan Dokumen Internal UKM',
                'dokumen' => $this->dokumenModel->getDokumenByUkm($id_ukm)
            ];

            return view('ketua/laporan/dokumen', $data);
        }
    }
}