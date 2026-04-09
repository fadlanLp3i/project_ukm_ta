<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTingkatKelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tingkat' => ['type'=>'INT','constraint' => 11,'unsigned' => true,'auto_increment'=>true],
            'nama_tingkat' => ['type'=>'VARCHAR','constraint'=>50],
            'keterangan' => ['type'=>'TEXT','null'=>true],
            'created_at' => ['type' => 'DATETIME','null' => true]
        ]);

        $this->forge->addKey('id_tingkat', true);
        $this->forge->createTable('tb_tingkat_kelas');
    }
    public function down()
    {
        $this->forge->dropTable('tb_tingkat_kelas');
    }
}
