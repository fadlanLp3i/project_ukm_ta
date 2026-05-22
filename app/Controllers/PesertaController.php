<?php

namespace App\Controllers;

use App\Models\PesertaModel;

class PesertaController extends BaseController
{
    protected $PesertaModel;

    public function __construct()
    {
        $this->PesertaModel = new PesertaModel();
    }

    // Menampilkan semua data peserta
    public function index()
    {
        $data = [
            'title'   => 'Daftar Peserta',
            'peserta' => $this->PesertaModel->findAll()
        ];
        return view('sekretaris/peserta/index', $data);
    }

    // Form Tambah Peserta
    public function create()
    {
        return view('sekretaris/peserta/create', ['title' => 'Tambah Peserta']);
    }

    // Simpan Data Baru
    public function save()
    {
        $rules = [
            'nama_peserta' => 'required',
            'nim'          => 'required|is_unique[peserta.nim]',
            'tgl_lahir'    => 'required',
            'prodi'        => 'required',
            'no_telpon'    => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->PesertaModel->save([
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'nim'          => $this->request->getPost('nim'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
            'prodi'        => $this->request->getPost('prodi'),
            'no_telpon'    => $this->request->getPost('no_telpon'),
        ]);
        return redirect()->to('/sekretaris/peserta')->with('success', 'Data berhasil ditambahkan.');
    }

    // Form Edit Peserta
    public function edit($id)
    {
        $data = [
            'title'   => 'Edit Peserta',
            'peserta' => $this->PesertaModel->find($id)
        ];
        return view('sekretaris/peserta/edit', $data);
    }

    // Update Data
    public function update($id)
    {
        $rules = [
            'nama_peserta' => 'required',
            'nim'          => 'required|is_unique[peserta.nim,id_peserta,' . $id . ']',
            'tgl_lahir'    => 'required',
            'prodi'        => 'required',
            'no_telpon'    => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->PesertaModel->update($id, [
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'nim'          => $this->request->getPost('nim'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
            'prodi'        => $this->request->getPost('prodi'),
            'no_telpon'    => $this->request->getPost('no_telpon'),
        ]);
        return redirect()->to('/sekretaris/peserta')->with('success', 'Data berhasil diubah.');
    }

    // Hapus Data
    public function delete($id)
    {
        $this->PesertaModel->delete($id);
        return redirect()->to('sekretaris/peserta')->with('success', 'Data berhasil dihapus.');
    }
}
