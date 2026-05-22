<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class DokumenController extends BaseController
{
    protected $dokumenModel;
    protected $db;

    public function __construct()
    {
        $this->dokumenModel = new DokumenModel();
        $this->db = \Config\Database::connect();
    }

    // 1. TAMPIL DATA (Hanya dokumen milik UKM sekretaris)
    public function index()
    {
        $id_ukm = session()->get('id_ukm');

        $data = [
            'title'   => 'Daftar Dokumen UKM',
            'dokumen' => $this->dokumenModel->getDokumenByUkm($id_ukm)
        ];

        return view('sekretaris/dokumen/index', $data);
    }

    // 2. FORM TAMBAH DATA
    public function create()
    {
        $data = [
            'title' => 'Tambah Dokumen Baru'
        ];

        return view('sekretaris/dokumen/create', $data);
    }

    // 3. SIMPAN DATA + UPLOAD FILE
    public function save()
    {
        $id_ukm = session()->get('id_ukm');
        $fileDokumen = $this->request->getFile('upload');

        // Validasi file upload
        if ($fileDokumen->isValid() && !$fileDokumen->hasMoved()) {
            // Ambil nama acak agar tidak bentrok di server
            $namaFile = $fileDokumen->getRandomName();
            $fileDokumen->move(ROOTPATH . 'public/uploads/dokumen', $namaFile);
        } else {
            session()->setFlashdata('error', 'File dokumen wajib diunggah atau format tidak valid.');
            return redirect()->back()->withInput();
        }

        $simpan = $this->dokumenModel->save([
            'id_ukm'        => $id_ukm, // Otomatis mengikat ke id_ukm sekretaris
            'jenis_dokumen' => $this->request->getPost('jenis_dokumen'),
            'upload'        => $namaFile,
            'pengesahan'    => $this->request->getPost('pengesahan')
        ]);

        if ($simpan) {
            session()->setFlashdata('success', 'Dokumen berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan dokumen.');
        }

        return redirect()->to('/sekretaris/dokumen');
    }

    // 4. FORM EDIT DATA
    public function edit($id)
    {
        $id_ukm = session()->get('id_ukm');
        $dokumen = $this->dokumenModel->getDokumenByUkm($id_ukm, $id);

        if (empty($dokumen)) {
            session()->setFlashdata('error', 'Data dokumen tidak ditemukan atau Anda tidak memiliki akses.');
            return redirect()->to('/sekretaris/dokumen');
        }

        $data = [
            'title'   => 'Edit Dokumen',
            'dokumen' => $dokumen
        ];

        return view('sekretaris/dokumen/edit', $data);
    }

    // 5. UPDATE DATA + KONDISI FILE BARU
    public function update($id)
    {
        $id_ukm = session()->get('id_ukm');
        $dokumenLama = $this->dokumenModel->getDokumenByUkm($id_ukm, $id);

        if (empty($dokumenLama)) {
            session()->setFlashdata('error', 'Akses ditolak.');
            return redirect()->to('/sekretaris/dokumen');
        }

        $fileDokumen = $this->request->getFile('upload');

        // Cek apakah user mengupload file baru
        if ($fileDokumen->isValid() && !$fileDokumen->hasMoved()) {
            $namaFile = $fileDokumen->getRandomName();
            $fileDokumen->move(ROOTPATH . 'public/uploads/dokumen', $namaFile);
            
            // Hapus file fisik lama di folder server jika ada
            if (file_exists(ROOTPATH . 'public/uploads/dokumen/' . $dokumenLama['upload'])) {
                unlink(ROOTPATH . 'public/uploads/dokumen/' . $dokumenLama['upload']);
            }
        } else {
            // Jika tidak upload file baru, gunakan nama file lama
            $namaFile = $dokumenLama['upload'];
        }

        $update = $this->dokumenModel->update($id, [
            'jenis_dokumen' => $this->request->getPost('jenis_dokumen'),
            'upload'        => $namaFile,
            'pengesahan'    => $this->request->getPost('pengesahan')
        ]);

        if ($update) {
            session()->setFlashdata('success', 'Dokumen berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui dokumen.');
        }

        return redirect()->to('/sekretaris/dokumen');
    }

    // 6. HAPUS DATA + HAPUS FILE FISIK
    public function delete($id)
    {
        $id_ukm = session()->get('id_ukm');
        $dokumen = $this->dokumenModel->getDokumenByUkm($id_ukm, $id);

        if (empty($dokumen)) {
            session()->setFlashdata('error', 'Akses ditolak.');
            return redirect()->to('/sekretaris/dokumen');
        }

        // Hapus file fisik dari folder public sebelum menghapus row data di database
        if (file_exists(ROOTPATH . 'public/uploads/dokumen/' . $dokumen['upload'])) {
            unlink(ROOTPATH . 'public/uploads/dokumen/' . $dokumen['upload']);
        }

        if ($this->dokumenModel->delete($id)) {
            session()->setFlashdata('success', 'Dokumen berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus dokumen.');
        }

        return redirect()->to('/sekretaris/dokumen');
    }
}