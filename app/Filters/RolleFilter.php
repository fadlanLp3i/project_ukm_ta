<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RolleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // 1. Cek apakah user sudah login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $userRole    = $session->get('role');
        $userJabatan = $session->get('jabatan');

        // 2. Jika filter memiliki argumen (contoh: 'roleFilter[admin,pembina]')
        if (!empty($arguments)) {
            
            /* Kita cek apakah role user saat ini ada di dalam daftar argumen.
               Jika user adalah 'pembina' dan argumennya ['pengurus', 'pembina'], maka diizinkan.
            */
            if (!in_array($userRole, $arguments)) {
                
                /* Cek tambahan: Jika user bukan role utama tersebut, 
                   mungkin jabatan (sub-role) nya yang terdaftar di argumen.
                */
                if (!in_array($userJabatan, $arguments)) {
                    return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki akses.');
                }
            }
        }

        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu aksi setelah request
    }
}