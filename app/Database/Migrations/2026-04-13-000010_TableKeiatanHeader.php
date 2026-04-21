<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKegiatanHeader extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kegiatan' => ['type'=>'INT','auto_increment'=>true],
            'id_jadwal' => ['type'=>'INT'],
            'tanggal' => ['type'=>'DATE'],
            'materi' => ['type'=>'VARCHAR','constraint'=>255],
            'keterangan' => ['type'=>'TEXT'],
        ]);
        $this->forge->addKey('id_kegiatan', true);
        $this->forge->addForeignKey('id_jadwal','tb_jadwal_pelatihan','id_jadwal');
        $this->forge->createTable('tb_kegiatan_header');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kegiatan_header');
    }
}