<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Admin UKM',
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'pembina',
                'status' => 'aktif'
            ],
        ];
        $this->db->table('tb_user')->insertBatch($data);

    }
}
