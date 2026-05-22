<?php

namespace App\Controllers;

use App\Models\PengajarModel;

class PengajarController extends BaseController
{
    protected $pengajarModel;

    public function __construct()
    {
        $this->pengajarModel = new PengajarModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Daftar Pengajar',
            'pengajar' => $this->pengajarModel->findAll()
        ];
        return view('sekretaris/pengajar/index', $data);
    }

    public function create()
    {
        return view('sekretaris/pengajar/create', ['title' => 'Tambah Pengajar']);
    }

    public function save()
    {
        $this->pengajarModel->save([
            'nama_pengajar' => $this->request->getPost('nama_pengajar'),
            'no_telpon'     => $this->request->getPost('no_telpon'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
        ]);
        return redirect()->to(base_url('sekretaris/pengajar'))->with('success', 'Data pengajar berhasil ditambah.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Pengajar',
            'pengajar' => $this->pengajarModel->find($id)
        ];
        return view('sekretaris/pengajar/edit', $data);
    }

    public function update($id)
    {
        $this->pengajarModel->update($id, [
            'nama_pengajar' => $this->request->getPost('nama_pengajar'),
            'no_telpon'     => $this->request->getPost('no_telpon'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
        ]);
        return redirect()->to(base_url('sekretaris/pengajar'))->with('success', 'Data pengajar berhasil diubah.');
    }

    public function delete($id)
    {
        $this->pengajarModel->delete($id);
        return redirect()->to(base_url('sekretaris/pengajar'))->with('success', 'Data pengajar berhasil dihapus.');
    }
}