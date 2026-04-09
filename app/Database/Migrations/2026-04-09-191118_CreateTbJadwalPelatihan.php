<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbJadwalPelatihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwal' => ['type'=>'INT','auto_increment'=>true],
            'id_ukm' => ['type'=>'INT'],
            'id_jenis' => ['type'=>'INT','null'=>true],
            'id_pengajar' => ['type'=>'INT','null'=>true],
            'id_ruangan' => ['type'=>'INT','null'=>true],
            'id_tingkat' => ['type'=>'INT','null'=>true],
            'tanggal' => ['type'=>'DATE'],
            'jam_mulai' => ['type'=>'TIME'],
            'jam_selesai' => ['type'=>'TIME'],
            'status' => ['type'=>'ENUM','constraint'=>['aktif','selesai']],
        ]);

        $this->forge->addKey('id_jadwal', true);
        $this->forge->addKey('tanggal');

        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_jenis','tb_jenis_pelatihan','id_jenis','SET NULL','CASCADE');
        $this->forge->addForeignKey('id_pengajar','tb_pengajar','id_pengajar','SET NULL','CASCADE');
        $this->forge->addForeignKey('id_ruangan','tb_ruangan','id_ruangan','SET NULL','CASCADE');
        $this->forge->addForeignKey('id_tingkat','tb_tingkat_kelas','id_tingkat','SET NULL','CASCADE');

        $this->forge->createTable('tb_jadwal_pelatihan');
    }
    public function down()
    {
        $this->forge->dropTable('tb_jadwal_pelatihan');
    }
}
