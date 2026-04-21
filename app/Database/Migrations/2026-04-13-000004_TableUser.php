<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => ['type' => 'INT', 'auto_increment' => true],
            'id_ukm' => ['type' => 'INT'],
            'nama_lengkap' => ['type' => 'VARCHAR', 'constraint' => 100],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'role' => ['type' => 'ENUM', 'constraint' => ['admin','ketua','sekretaris']],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif','nonaktif'], 'default'=>'aktif'],
            'created_at' => [
    'type' => 'TIMESTAMP',
    'null' => true,
    'default' => null
]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm','CASCADE','CASCADE');
        $this->forge->createTable('tb_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}