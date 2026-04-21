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
            'id_periode' => ['type'=>'INT'],
            'id_jenis' => ['type'=>'INT'],
            'id_pengajar' => ['type'=>'INT'],
            'nama_pelatihan' => ['type'=>'VARCHAR','constraint'=>100],
            'tanggal' => ['type'=>'DATE'],
            'jam_mulai' => ['type'=>'TIME'],
            'jam_selesai' => ['type'=>'TIME'],
            'lokasi' => ['type'=>'VARCHAR','constraint'=>100],
            'kuota' => ['type'=>'INT'],
            'status' => ['type'=>'ENUM','constraint'=>['aktif','selesai','batal']],
        ]);
        $this->forge->addKey('id_jadwal', true);
        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm');
        $this->forge->addForeignKey('id_periode','tb_periode','id_periode');
        $this->forge->addForeignKey('id_jenis','tb_jenis_pelatihan','id_jenis');
        $this->forge->addForeignKey('id_pengajar','tb_pengajar','id_pengajar');
        $this->forge->createTable('tb_jadwal_pelatihan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jadwal_pelatihan');
    }
}