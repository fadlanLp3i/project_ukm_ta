<?php

namespace App\Controllers;

use App\Models\PeriodeModel;
use App\Controllers\BaseController;

class PeriodeController extends BaseController
{
    protected $periodeModel;

    public function __construct()
    {
        $this->periodeModel = new PeriodeModel();
    }

    // Menampilkan daftar periode
    public function index()
    {
        $data['periode'] = $this->periodeModel->findAll();
        return view('pembina/periode/index', $data);
    }

    public function create()
    {
        return view('Pembina/periode/create', [
            'title' => 'Tambah Periode'
        ]);
    }
    // Menyimpan data periode baru
    public function store()
    {
        // Validasi: sesuaikan hanya dengan kolom 'periode'
        $rules = [
            'periode' => 'required|min_length[3]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->periodeModel->save([
            'periode' => $this->request->getPost('periode'),
        ]);

        return redirect()->to('/pembina/periode')->with('success', 'Periode berhasil ditambahkan');
    }

    public function edit($id)
    {
        $periode = $this->periodeModel->find($id);
        if (!$periode) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('Pembina/periode/edit', [
            'title' => 'Edit Periode',
            'periode' => $periode
        ]);
    }


    // Mengupdate data periode
    public function update($id)
    {
        // Pastikan data ada
        $periode = $this->periodeModel->find($id);
        if (!$periode) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Validasi
        $rules = [
            'periode' => 'required|min_length[3]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan perubahan
        // Penting: Masukkan id_periode agar model tahu ini adalah proses Update
        $this->periodeModel->save([
            'id_periode' => $id,
            'periode'    => $this->request->getPost('periode'),
        ]);

        return redirect()->to('/pembina/periode')->with('success', 'Periode berhasil diperbarui');
    }

    // Menghapus periode
    public function delete($id)
    {
        $this->periodeModel->delete($id);
        return redirect()->to('/pembina/periode')->with('success', 'Periode berhasil dihapus');
    }
}