<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPengajar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengajar'=>['type'=>'INT','auto_increment'=>true],
            'id_ukm'=>['type'=>'INT'],
            'nama'=>['type'=>'VARCHAR','constraint'=>100],
            'keahlian'=>['type'=>'VARCHAR','constraint'=>100],
            'no_hp'=>['type'=>'VARCHAR','constraint'=>15],
            'status'=>['type'=>'ENUM','constraint'=>['aktif','nonaktif']]
        ]);
        $this->forge->addKey('id_pengajar', true);
        $this->forge->addForeignKey('id_ukm','tb_ukm','id_ukm','CASCADE','CASCADE');
        $this->forge->createTable('tb_pengajar');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pengajar');
    }
}