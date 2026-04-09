<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePeserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peserta' => ['type'=>'INT','auto_increment'=>true, 'constraint'=>11,'unsigned'=>true],
            'id_user' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'id_ukm' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'id_tingkat' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'null'=>true],
            'tanggal_daftar' => ['type'=>'DATE'],
            'status' => ['type'=>'ENUM','constraint'=>['aktif','nonaktif']],
            'created_at' => ['type' => 'DATETIME','null' => true]
        ]);

        $this->forge->addKey('id_peserta', true);

        $this->forge->addForeignKey('id_user','tb_user','id_user','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_tingkat','tb_tingkat_kelas','id_tingkat','SET NULL','CASCADE');

        $this->forge->createTable('tb_peserta');
    }
    public function down()
    {
        $this->forge->dropTable('tb_peserta');
    }
}
