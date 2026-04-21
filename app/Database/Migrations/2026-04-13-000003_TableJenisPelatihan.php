<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbJenisPelatihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis' => ['type' => 'INT', 'auto_increment' => true],
            'nama_jenis' => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi' => ['type' => 'TEXT', 'null' => true]
        ]);
        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('tb_jenis_pelatihan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis_pelatihan');
    }
}