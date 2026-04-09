<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokumen' => ['type'=>'INT','auto_increment'=>true],
            '   id_ukm' => ['type'=>'INT'],
            'judul' => ['type'=>'VARCHAR','constraint'=>100],
            'jenis' => ['type'=>'ENUM','constraint'=>['proposal','lpj','sertifikat']],
            'dokumen' => ['type'=>'VARCHAR','constraint'=>255],
            'tanggal_upload' => ['type'=>'DATE'],
        ]);

        $this->forge->addKey('id_dokumen', true);

        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm','CASCADE','CASCADE');

        $this->forge->createTable('tb_dokumen');
    }
    public function down()
    {
        $this->forge->dropTable('tb_dokumen');
    }
}
