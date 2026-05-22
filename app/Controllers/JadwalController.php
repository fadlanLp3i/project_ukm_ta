<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalModel;

class JadwalController extends BaseController
{
    protected $jadwalModel;
    protected $db;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->db = \Config\Database::connect();
    }

    // 1. TAMPIL DATA (Hanya jadwal milik UKM sekretaris)
    public function index()
    {
        // Ambil id_ukm sekretaris dari session login
        $id_ukm = session()->get('id_ukm'); 

        $data = [
            'title'  => 'Daftar Jadwal Pelatihan',
            'jadwal' => $this->jadwalModel->getJadwalByUkm($id_ukm)
        ];

        return view('sekretaris/jadwal/index', $data);
    }

    // 2. FORM TAMBAH DATA (Dropdown pelatihan disaring hanya milik UKM ini)
    public function create()
    {
        $id_ukm = session()->get('id_ukm');

        $data = [
            'title'     => 'Tambah Jadwal',
            // Filter: Hanya menampilkan jenis pelatihan milik UKM sekretaris yang login
            'pelatihan' => $this->db->table('pelatihan')->where('id_ukm', $id_ukm)->get()->getResultArray(),
            'pengajar'  => $this->db->table('pengajar')->get()->getResultArray()
        ];

        return view('sekretaris/jadwal/create', $data);
    }

    // 3. SIMPAN DATA
    public function save()
    {
        // Validasi tambahan untuk memastikan id_pelatihan yang dikirim benar milik UKM-nya
        $id_ukm = session()->get('id_ukm');
        $id_pelatihan = $this->request->getPost('id_pelatihan');
        
        $cekPelatihan = $this->db->table('pelatihan')
                                 ->where(['id_pelatihan' => $id_pelatihan, 'id_ukm' => $id_ukm])
                                 ->get()->getRow();

        if (!$cekPelatihan) {
            session()->setFlashdata('error', 'Anda tidak memiliki akses untuk pelatihan ini.');
            return redirect()->to('/sekretaris/jadwal');
        }

        $simpan = $this->jadwalModel->save([
            'id_pelatihan'    => $id_pelatihan,
            'id_pengajar'     => $this->request->getPost('id_pengajar'),
            'tanggal_mulai'   => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'total_pertemuan' => $this->request->getPost('total_pertemuan'),
            'status'          => $this->request->getPost('status')
        ]);

        if ($simpan) {
            session()->setFlashdata('success', 'Jadwal berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan jadwal.');
        }
        
        return redirect()->to('/sekretaris/jadwal');
    }

    // 4. FORM EDIT DATA
    public function edit($id)
    {
        $id_ukm = session()->get('id_ukm');

        // Pastikan jadwal yang diedit adalah jadwal milik UKM-nya
        $jadwal = $this->jadwalModel->getJadwalByUkm($id_ukm, $id);

        if (empty($jadwal)) {
            session()->setFlashdata('error', 'Data jadwal tidak ditemukan atau Anda tidak memiliki akses.');
            return redirect()->to('/sekretaris/jadwal');
        }

        $data = [
            'title'     => 'Edit Jadwal',
            'jadwal'    => $jadwal,
            'pelatihan' => $this->db->table('pelatihan')->where('id_ukm', $id_ukm)->get()->getResultArray(),
            'pengajar'  => $this->db->table('pengajar')->get()->getResultArray()
        ];

        return view('sekretaris/jadwal/edit', $data);
    }

    // 5. UPDATE DATA
    public function update($id)
    {
        $id_ukm = session()->get('id_ukm');
        
        // Cek kepemilikan jadwal sebelum update
        $jadwal = $this->jadwalModel->getJadwalByUkm($id_ukm, $id);
        if (empty($jadwal)) {
            session()->setFlashdata('error', 'Akses ditolak.');
            return redirect()->to('/sekretaris/jadwal');
        }

        $update = $this->jadwalModel->update($id, [
            'id_pelatihan'    => $this->request->getPost('id_pelatihan'),
            'id_pengajar'     => $this->request->getPost('id_pengajar'),
            'tanggal_mulai'   => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'total_pertemuan' => $this->request->getPost('total_pertemuan'),
            'status'          => $this->request->getPost('status')
        ]);

        if ($update) {
            session()->setFlashdata('success', 'Jadwal berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui jadwal.');
        }

        return redirect()->to('/sekretaris/jadwal');
    }

    // 6. HAPUS DATA
    public function delete($id)
    {
        $id_ukm = session()->get('id_ukm');
        
        // Cek kepemilikan jadwal sebelum hapus
        $jadwal = $this->jadwalModel->getJadwalByUkm($id_ukm, $id);
        if (empty($jadwal)) {
            session()->setFlashdata('error', 'Akses ditolak.');
            return redirect()->to('/sekretaris/jadwal');
        }

        if ($this->jadwalModel->delete($id)) {
            session()->setFlashdata('success', 'Jadwal berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus jadwal.');
        }
        return redirect()->to('/sekretaris/jadwal');
    }
}