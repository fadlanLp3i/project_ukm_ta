<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbUkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ukm' => ['type' => 'INT', 'auto_increment' => true],
            'nama_ukm' => ['type' => 'VARCHAR', 'constraint' => 100],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif','nonaktif'], 'default' => 'aktif']
        ]);
        $this->forge->addKey('id_ukm', true);
        $this->forge->createTable('tb_ukm');
    }

    public function down()
    {
        $this->forge->dropTable('tb_ukm');
    }
}