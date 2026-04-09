<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => ['type'=>'INT','auto_increment'=>true],
            'id_peserta' => ['type'=>'INT'],
            'tanggal' => ['type'=>'DATE'],
            'jumlah' => ['type'=>'DECIMAL','constraint'=>'10,2'],
            'status' => ['type'=>'ENUM','constraint'=>['lunas','pending']],
            'bukti' => ['type'=>'VARCHAR','constraint'=>255],
        ]);

        $this->forge->addKey('id_pembayaran', true);

        $this->forge->addForeignKey('id_peserta','tb_peserta','id_peserta','CASCADE','CASCADE');

        $this->forge->createTable('tb_pembayaran');
    }
    public function down()
    {
        $this->forge->dropTable('tb_pembayaran');
    }
}
