<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKehadiran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kehadiran' => ['type'=>'INT','auto_increment'=>true],
            'id_registrasi' => ['type'=>'INT'],
            'tanggal' => ['type'=>'DATE'],
            'status_hadir' => ['type'=>'ENUM','constraint'=>['hadir','tidak_hadir','izin']],
        ]);
        $this->forge->addKey('id_kehadiran', true);
        $this->forge->addForeignKey('id_registrasi','tb_registrasi','id_registrasi');
        $this->forge->createTable('tb_kehadiran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kehadiran');
    }
}