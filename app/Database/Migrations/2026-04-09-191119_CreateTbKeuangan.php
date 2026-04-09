<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKeuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keuangan' => ['type'=>'INT','auto_increment'=>true],
            'id_ukm' => ['type'=>'INT'],
            'jenis' => ['type'=>'ENUM','constraint'=>['pemasukan','pengeluaran']],
            'jumlah' => ['type'=>'DECIMAL','constraint'=>'10,2'],
            'tanggal' => ['type'=>'DATE'],
            'keterangan' => ['type'=>'TEXT','null'=>true],
        ]);

        $this->forge->addKey('id_keuangan', true);

        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm','CASCADE','CASCADE');

        $this->forge->createTable('tb_keuangan');
    }
    public function down()
    {
        $this->forge->dropTable('tb_keuangan');
    }
}
