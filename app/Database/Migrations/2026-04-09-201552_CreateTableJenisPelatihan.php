<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableJenisPelatihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis' => ['type'=>'INT','constraint' => 11,'unsigned' => true,'auto_increment'=>true],
            'nama_jenis' => ['type'=>'VARCHAR','constraint'=>100],
            'deskripsi' => ['type'=>'TEXT','null'=>true],
            'created_at' => ['type' => 'DATETIME','null' => true]
        ]);

        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('tb_jenis_pelatihan');
    }
    public function down()
    {
        $this->forge->dropTable('tb_jenis_pelatihan');
    }
}
