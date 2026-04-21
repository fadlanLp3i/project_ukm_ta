<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPembayaranHeader extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => ['type'=>'INT','auto_increment'=>true],
            'id_jadwal' => ['type'=>'INT'],
            'tanggal_mulai' => ['type'=>'DATE'],
            'tanggal_selesai' => ['type'=>'DATE'],
            'status' => ['type'=>'ENUM','constraint'=>['on_going','selesai']],
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_jadwal','tb_jadwal_pelatihan','id_jadwal');
        $this->forge->createTable('tb_pembayaran_header');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pembayaran_header');
    }
}