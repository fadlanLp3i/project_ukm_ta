<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPeriode extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_periode' => ['type' => 'INT', 'auto_increment' => true],
            'tahun' => ['type' => 'YEAR'],
            'tanggal_mulai' => ['type' => 'DATE'],
            'tanggal_selesai' => ['type' => 'DATE'],
            'status' => ['type' => 'ENUM', 'constraint' => ['aktif','nonaktif']]
        ]);
        $this->forge->addKey('id_periode', true);
        $this->forge->createTable('tb_periode');
    }

    public function down()
    {
        $this->forge->dropTable('tb_periode');
    }
}