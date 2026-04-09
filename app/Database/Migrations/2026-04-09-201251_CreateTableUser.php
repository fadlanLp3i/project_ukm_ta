<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'nama_lengkap' => ['type' => 'VARCHAR','constraint' => 100],
            'username' => ['type' => 'VARCHAR','constraint' => 50],
            'email' => ['type' => 'VARCHAR','constraint' => 100],
            'password' => ['type' => 'VARCHAR','constraint' => 255],
            'role' => ['type' => 'ENUM','constraint' => ['admin','ketua','anggota','pengajar']],
            'no_hp' => ['type' => 'VARCHAR','constraint' => 15],
            'status' => ['type' => 'ENUM','constraint' => ['aktif','nonaktif']],
            'created_at' => ['type' => 'DATETIME','null' => true]
        ]);

        $this->forge->addKey('id_user', true);
        $this->forge->addUniqueKey('username');
        $this->forge->addKey('role');
        $this->forge->createTable('tb_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}
