<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbRuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ruangan' => ['type'=>'INT','auto_increment'=>true],
            'nama_ruangan' => ['type'=>'VARCHAR','constraint'=>100],
            'kapasitas' => ['type'=>'INT'],
            'lokasi' => ['type'=>'VARCHAR','constraint'=>100],
        ]);

        $this->forge->addKey('id_ruangan', true);
        $this->forge->createTable('tb_ruangan');
    }
    public function down()
    {
        $this->forge->dropTable('tb_ruangan');
    }
}
