<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbRegistrasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_registrasi' => ['type'=>'INT','auto_increment'=>true],
            'id_peserta' => ['type'=>'INT'],
            'id_jadwal' => ['type'=>'INT'],
            'tanggal_daftar' => ['type'=>'DATE'],
            'status' => ['type'=>'ENUM','constraint'=>['pending','disetujui','ditolak']],
        ]);
        $this->forge->addKey('id_registrasi', true);
        $this->forge->addForeignKey('id_peserta','tb_peserta','id_peserta');
        $this->forge->addForeignKey('id_jadwal','tb_jadwal_pelatihan','id_jadwal');
        $this->forge->createTable('tb_registrasi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_registrasi');
    }
}