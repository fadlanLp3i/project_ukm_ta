<?php

namespace App\Controllers;

use App\Models\UkmModel;
use App\Controllers\BaseController;

class UkmController extends BaseController
{
    protected $ukmModel;

    public function __construct()
    {
        $this->ukmModel = new UkmModel();
    }

    /*
    |--------------------------------------------------------------------------
    | Menampilkan daftar UKM
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $role = session()->get('role');
        $id_ukm_user = session()->get('id_ukm');

        // Pembina/Admin lihat semua
        if ($role === 'pembina' || $role === 'admin') {
            $data['ukm'] = $this->ukmModel->findAll();
        } else {
            // Pengurus hanya lihat UKM miliknya
            $data['ukm'] = $this->ukmModel
                ->where('id_ukm', $id_ukm_user)
                ->findAll();
        }

        $data['title'] = 'Data UKM';

        return view('pembina/ukm/index', $data);
    }

    /*
|--------------------------------------------------------------------------
| Tambahkan di UkmController.php
|--------------------------------------------------------------------------
*/

public function create()
{
    // hanya pembina yang boleh tambah UKM
    if (session()->get('role') !== 'pembina') {
        return redirect()->to('/dashboard')
            ->with('error', 'Anda tidak berhak menambah data UKM');
    }

    $data = [
        'title' => 'Tambah UKM'
    ];

    return view('pembina/ukm/create', $data);
}

public function save()
{
    // Ambil data dari form
    $data = [
        'nama_ukm'  => $this->request->getPost('nama_ukm'),
        'deskripsi' => $this->request->getPost('deskripsi'),
    ];

    // Simpan ke database menggunakan model
    $this->ukmModel->save($data);

    // Redirect kembali ke daftar UKM setelah berhasil
    return redirect()->to('/pembina/ukm')->with('success', 'Data berhasil disimpan!');
}

public function store()
{
    // hanya pembina yang boleh simpan UKM
    if (session()->get('role') !== 'pembina') {
        return redirect()->to('/dashboard')
            ->with('error', 'Anda tidak berhak menambah data UKM');
    }

    $nama_ukm = $this->request->getPost('nama_ukm');

    // validasi sederhana
    if (!$nama_ukm) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Nama UKM wajib diisi');
    }

    $this->ukmModel->save([
        'nama_ukm' => $nama_ukm
    ]);

    return redirect()->to('/pembina/ukm')
        ->with('success', 'Data UKM berhasil ditambahkan');
}



    /*
    |--------------------------------------------------------------------------
    | Form Edit
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        // hanya pembina atau pemilik UKM
        if (
            session()->get('role') !== 'pembina'
            && session()->get('id_ukm') != $id
        ) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak berhak mengedit data ini');
        }

        $ukm = $this->ukmModel->find($id);

        if (!$ukm) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit UKM',
            'ukm'   => $ukm
        ];

        return view('pembina/ukm/edit', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Proses Update
    |--------------------------------------------------------------------------
    */

    public function update($id)
    {
        // hanya pembina atau pemilik UKM
        if (
            session()->get('role') !== 'pembina'
            && session()->get('id_ukm') != $id
        ) {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak berhak mengupdate data ini');
        }

        $nama_ukm = $this->request->getPost('nama_ukm');

        // validasi sederhana
        if (!$nama_ukm) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nama UKM wajib diisi');
        }

        $this->ukmModel->update($id, [
            'nama_ukm' => $nama_ukm
        ]);

        return redirect()->to('/pembina/ukm')
            ->with('success', 'Data UKM berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        if (session()->get('role') !== 'pembina') {
            return redirect()->to('/dashboard')
                ->with('error', 'Anda tidak berhak menghapus data');
        }

        $this->ukmModel->delete($id);

        return redirect()->to('/pembina/ukm')
            ->with('success', 'Data UKM berhasil dihapus');
    }
}