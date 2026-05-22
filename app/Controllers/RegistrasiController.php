<?php

namespace App\Controllers;

use App\Models\RegistrasiModel;
use App\Models\PesertaModel;

class RegistrasiController extends BaseController
{
    protected $registrasiModel;
    protected $pesertaModel;

    public function __construct()
    {
        $this->registrasiModel = new RegistrasiModel();
        $this->pesertaModel    = new PesertaModel();
    }

    public function index()
    {
        // Mengambil ID UKM dari session login
        $id_ukm_user = session()->get('id_ukm');

        $data = [
            'title'      => 'Daftar Registrasi',
            'registrasi' => $this->registrasiModel->getRegistrasiByUkm($id_ukm_user)
        ];
        return view('sekretaris/registrasi/index', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Tambah Registrasi',
            'peserta' => $this->pesertaModel->findAll() // Untuk pilihan dropdown peserta
        ];
        return view('sekretaris/registrasi/create', $data);
    }

    public function save()
    {
        $id_ukm_user = session()->get('id_ukm');

        $this->registrasiModel->save([
            'id_peserta' => $this->request->getPost('id_peserta'),
            'id_ukm'     => $id_ukm_user, // Otomatis tersimpan sesuai UKM sekretaris
            'biaya'      => $this->request->getPost('biaya'),
        ]);

        return redirect()->to(base_url('sekretaris/registrasi'))->with('success', 'Data registrasi berhasil disimpan.');
    }

    public function edit($id)
    {
        $id_ukm_user = session()->get('id_ukm');
        $data_regis = $this->registrasiModel->find($id);

        // Keamanan: Jika mencoba edit data milik UKM lain, tendang balik
        if ($data_regis['id_ukm'] != $id_ukm_user) {
            return redirect()->to(base_url('sekretaris/registrasi'))->with('error', 'Akses ditolak!');
        }

        $data = [
            'title'      => 'Edit Registrasi',
            'registrasi' => $data_regis,
            'peserta'    => $this->pesertaModel->findAll()
        ];
        return view('sekretaris/registrasi/edit', $data);
    }

    public function update($id)
    {
        $id_ukm_user = session()->get('id_ukm');

        $this->registrasiModel->update($id, [
            'id_peserta' => $this->request->getPost('id_peserta'),
            'id_ukm'     => $id_ukm_user,
            'biaya'      => $this->request->getPost('biaya'),
        ]);

        return redirect()->to(base_url('sekretaris/registrasi'))->with('success', 'Data berhasil diperbarui.');
    }

   public function delete($id)
{
    // Mengambil ID UKM dari session untuk keamanan tambahan
    $id_ukm_user = session()->get('id_ukm');
    $data = $this->registrasiModel->find($id);

    // Pastikan data yang dihapus milik UKM yang sama dengan pengurus yang login
    if ($data && $data['id_ukm'] == $id_ukm_user) {
        $this->registrasiModel->delete($id);
        return redirect()->to(base_url('sekretaris/registrasi'))->with('success', 'Data berhasil dihapus.');
    }

    return redirect()->to(base_url('sekretaris/registrasi'))->with('error', 'Gagal menghapus data atau akses dilarang.');
}
}