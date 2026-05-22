<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PesertaModel;
use App\Models\PengajarModel;
use App\Models\PengurusModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $pesertaModel;
    protected $pengajarModel;
    protected $pengurusModel;

    public function __construct()
    {
        $this->userModel     = new UserModel();
        $this->pesertaModel  = new PesertaModel();
        $this->pengajarModel = new PengajarModel();
        $this->pengurusModel = new PengurusModel();
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX (Menampilkan Tabel & Data Dropdown untuk Header)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data = [
            'title'    => 'Manajemen User',
            'users'    => $this->userModel->findAll(),
            'peserta'  => $this->pesertaModel->findAll(),
            'pengajar' => $this->pengajarModel->findAll(),
            'pengurus' => $this->pengurusModel->findAll(),
        ];

        return view('pembina/user/index', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | STORE (Logika Auto-Create dari Data Master)
    |--------------------------------------------------------------------------
    */
    public function store()
    {
        $role = $this->request->getPost('role');
        $id_target = null;
        $username = '';
        $tgl_lahir = '';

        // Cari data di tabel master sesuai role
        if ($role == 'pengurus') {
            $id_target = $this->request->getPost('id_pengurus');
            $source = $this->pengurusModel->find($id_target);
            if ($source) {
                $username = $source['nim']; 
                $tgl_lahir = $source['tgl_lahir'];
            }
        } elseif ($role == 'pengajar') {
            $id_target = $this->request->getPost('id_pengajar');
            $source = $this->pengajarModel->find($id_target);
            if ($source) {
                $username = $source['no_telpon']; 
                $tgl_lahir = $source['tgl_lahir'];
            }
        } elseif ($role == 'peserta') {
            $id_target = $this->request->getPost('id_peserta');
            $source = $this->pesertaModel->find($id_target);
            if ($source) {
                $username = $source['nim']; 
                $tgl_lahir = $source['tgl_lahir'];
            }
        }

        if (!$id_target || empty($username)) {
            return redirect()->back()->with('error', 'Silahkan pilih nama personil terlebih dahulu!');
        }

        // Cek duplikasi username
        if ($this->userModel->where('username', $username)->first()) {
            return redirect()->back()->with('error', "Gagal! User dengan username $username sudah terdaftar.");
        }

        // Password default: dmY (Contoh: 17081945)
        $password_plain = date('dmY', strtotime($tgl_lahir));

        $this->userModel->save([
            'role'        => $role,
            'username'    => $username,
            'password'    => password_hash($password_plain, PASSWORD_DEFAULT),
            'status'      => 'aktif',
            'id_peserta'  => ($role == 'peserta') ? $id_target : null,
            'id_pengajar' => ($role == 'pengajar') ? $id_target : null,
            'id_pengurus' => ($role == 'pengurus') ? $id_target : null,
        ]);

        return redirect()->to('/pembina/user')->with('success', "User $username berhasil dibuat. Password default: $password_plain");
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE (Untuk memproses data dari Modal Edit)
    |--------------------------------------------------------------------------
    */
    public function update($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }

        // Data dasar yang diupdate dari Modal
        $data = [
            'id_user' => $id,
            'status'  => $this->request->getPost('status'),
        ];

        // Update password hanya jika diinputkan di modal
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            // Validasi minimal panjang password jika diinginkan
            if (strlen($password) < 6) {
                return redirect()->back()->with('error', 'Password baru minimal 6 karakter.');
            }
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($this->userModel->save($data)) {
            return redirect()->to('/pembina/user')->with('success', 'Data user berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        if ($this->userModel->find($id)) {
            $this->userModel->delete($id);
            return redirect()->to('/pembina/user')->with('success', 'User berhasil dihapus.');
        }

        return redirect()->to('/pembina/user')->with('error', 'User gagal dihapus atau tidak ditemukan.');
    }
}