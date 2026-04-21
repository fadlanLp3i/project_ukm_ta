<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPembayaranDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => ['type'=>'INT','auto_increment'=>true],
            'id_pembayaran' => ['type'=>'INT'],
            'bulan' => ['type'=>'VARCHAR','constraint'=>20],
            'pemasukan' => ['type'=>'DECIMAL','constraint'=>'12,2','default'=>0],
            'pengeluaran' => ['type'=>'DECIMAL','constraint'=>'12,2','default'=>0],
            'keterangan' => ['type'=>'VARCHAR','constraint'=>255],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_pembayaran','tb_pembayaran_header','id_pembayaran');
        $this->forge->createTable('tb_pembayaran_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pembayaran_detail');
    }
}