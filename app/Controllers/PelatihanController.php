<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelatihanModel;
use App\Models\PeriodeModel;
use App\Models\UkmModel;

class PelatihanController extends BaseController
{
    protected $PelatihanModel;
    protected $PeriodeModel;
    protected $UkmModel;

    public function __construct()
    {
        $this->PelatihanModel = new PelatihanModel();
        $this->PeriodeModel   = new PeriodeModel();
        $this->UkmModel       = new UkmModel();
    }

    public function index()
    {
        // Cek apakah user sudah login dan memiliki role ketua atau pengurus dengan jabatan ketua
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu!');
        }

        $role = session()->get('role');
        $id_ukm = session()->get('id_ukm');

        // Hanya ketua dan pengurus (jabatan ketua) yang bisa akses
        if (!$id_ukm) {
            return redirect()->to(base_url('login'))->with('error', 'Data UKM tidak ditemukan. Hubungi admin!');
        }

        $data = [
            'title'     => 'Manajemen Pelatihan',
            'pelatihan' => $this->PelatihanModel->getPelatihanByUkm($id_ukm),
            'periode'   => $this->PeriodeModel->findAll(),
        ];

        return view('ketua/pelatihan/index', $data);
    }

    public function store()
    {
        $data = [
            'nama_pelatihan' => $this->request->getPost('nama_pelatihan'),
            'biaya'          => $this->request->getPost('biaya'),
            'id_periode'     => $this->request->getPost('id_periode'),
            'id_ukm'         => session()->get('id_ukm'),
        ];

        if ($this->PelatihanModel->save($data)) {
            return redirect()->to(base_url('ketua/pelatihan'))->with('success', 'Data pelatihan berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . implode(', ', $this->PelatihanModel->errors()));
        }
    }

    public function update($id = null)
    {
        if (!$id) {
            return redirect()->to(base_url('ketua/pelatihan'))->with('error', 'ID pelatihan tidak ditemukan.');
        }

        // Cek apakah data milik UKM yang login
        $pelatihan = $this->PelatihanModel->where(['id_pelatihan' => $id, 'id_ukm' => session()->get('id_ukm')])->first();
        
        if (!$pelatihan) {
            return redirect()->to(base_url('ketua/pelatihan'))->with('error', 'Akses ditolak!');
        }

        $updateData = [
            'id_pelatihan'   => $id,
            'nama_pelatihan' => $this->request->getPost('nama_pelatihan'),
            'biaya'          => $this->request->getPost('biaya'),
            'id_periode'     => $this->request->getPost('id_periode'),
        ];

        if ($this->PelatihanModel->save($updateData)) {
            return redirect()->to(base_url('ketua/pelatihan'))->with('success', 'Data pelatihan berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal update data: ' . implode(', ', $this->PelatihanModel->errors()));
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            return redirect()->to(base_url('ketua/pelatihan'))->with('error', 'ID pelatihan tidak ditemukan.');
        }

        // Cek apakah data milik UKM ketua yang login
        $pelatihan = $this->PelatihanModel->where(['id_pelatihan' => $id, 'id_ukm' => session()->get('id_ukm')])->first();
        
        if ($pelatihan) {
            $this->PelatihanModel->delete($id);
            return redirect()->to(base_url('ketua/pelatihan'))->with('success', 'Data pelatihan berhasil dihapus.');
        }

        return redirect()->to(base_url('ketua/pelatihan'))->with('error', 'Akses ditolak atau data tidak ditemukan!');
    }
}