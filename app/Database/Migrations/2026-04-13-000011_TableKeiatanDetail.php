<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKegiatanDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => ['type'=>'INT','auto_increment'=>true],
            'id_kegiatan' => ['type'=>'INT'],
            'id_peserta' => ['type'=>'INT'],
            'status_kehadiran' => ['type'=>'ENUM','constraint'=>['hadir','tidak_hadir','izin']],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_kegiatan','tb_kegiatan_header','id_kegiatan');
        $this->forge->addForeignKey('id_peserta','tb_peserta','id_peserta');
        $this->forge->createTable('tb_kegiatan_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kegiatan_detail');
    }
}