<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbTagihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tagihan' => ['type'=>'INT','auto_increment'=>true],
            'id_peserta' => ['type'=>'INT'],
            'id_jadwal' => ['type'=>'INT'],
            'bulan' => ['type'=>'VARCHAR','constraint'=>20],
            'jumlah_tagihan' => ['type'=>'DECIMAL','constraint'=>'12,2'],
            'status' => ['type'=>'ENUM','constraint'=>['belum_bayar','lunas']],
            'tanggal_bayar' => ['type'=>'DATE','null'=>true],
        ]);
        $this->forge->addKey('id_tagihan', true);
        $this->forge->addForeignKey('id_peserta','tb_peserta','id_peserta');
        $this->forge->addForeignKey('id_jadwal','tb_jadwal_pelatihan','id_jadwal');
        $this->forge->createTable('tb_tagihan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tagihan');
    }
}