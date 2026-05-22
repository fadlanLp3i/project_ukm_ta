<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengurusModel; // Pastikan model ini sudah ada

class AuthController extends BaseController
{
    public function index()
    {
        return view('welcome_message'); // Sesuaikan dengan nama file view Anda
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {

                $ses_data = [
                    'id_user'    => $data['id_user'],
                    'username'   => $data['username'],
                    'role'       => $data['role'],
                    'isLoggedIn' => true
                ];

                // Ambil detail pengurus kalau role pengurus atau ketua
                if ($data['role'] === 'pengurus' || $data['role'] === 'ketua') {

                    $pengurusModel = new PengurusModel();

                    $detailPengurus = $pengurusModel
                        ->where('id_pengurus', $data['id_pengurus'])
                        ->first();

                    if ($detailPengurus) {
                        $ses_data['jabatan'] = $detailPengurus['jabatan'];
                        $ses_data['id_ukm']  = $detailPengurus['id_ukm'];
                        $ses_data['id_pengurus'] = $detailPengurus['id_pengurus'];
                    }
                }

                $session->set($ses_data);

                // Redirect berdasarkan role
                if ($data['role'] === 'ketua') {
                    return redirect()->to('/ketua/pelatihan');
                } elseif ($data['role'] === 'pengurus' || $data['role'] === 'sekretaris' || $data['role'] === 'bendahara') {
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/dashboard');
                }
            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'User tidak ditemukan.');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
