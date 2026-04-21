<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPeserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peserta' => ['type'=>'INT','auto_increment'=>true],
            'id_ukm' => ['type'=>'INT'],
            'nim' => ['type'=>'VARCHAR','constraint'=>20],
            'nama' => ['type'=>'VARCHAR','constraint'=>100],
            'jurusan' => ['type'=>'VARCHAR','constraint'=>100],
            'no_hp' => ['type'=>'VARCHAR','constraint'=>15],
            'alamat' => ['type'=>'TEXT'],
            'status' => ['type'=>'ENUM','constraint'=>['aktif','nonaktif']]
        ]);
        $this->forge->addKey('id_peserta', true);
        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm','CASCADE','CASCADE');
        $this->forge->createTable('tb_peserta');
    }

    public function down()
    {
        $this->forge->dropTable('tb_peserta');
    }
}