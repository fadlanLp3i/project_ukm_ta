<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAbsensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_absensi' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'id_jadwal' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'id_peserta' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'tanggal' => ['type'=>'DATE'],
            'status' => ['type'=>'ENUM','constraint'=>['hadir','izin','alpha']],
            'keterangan' => ['type'=>'TEXT','null'=>true],
            'created_at' => ['type' => 'DATETIME','null' => true]
        ]);

        $this->forge->addKey('id_absensi', true);
        $this->forge->addKey('tanggal');

        $this->forge->addForeignKey('id_jadwal','tb_jadwal_pelatihan','id_jadwal','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_peserta','tb_peserta','id_peserta','CASCADE','CASCADE');

        $this->forge->createTable('tb_absensi');
    }
    public function down()
    {
        $this->forge->dropTable('tb_absensi');
    }
}
