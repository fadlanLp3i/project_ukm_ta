<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPeserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peserta' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_peserta' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id_peserta', true);
        $this->forge->createTable('peserta');
    }

    public function down()
    {
        $this->forge->dropTable('peserta');
    }
}
