<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPengajar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengajar' => ['type'=>'INT','auto_increment'=>true],
            'id_user' => ['type'=>'INT'],
            'keahlian' => ['type'=>'VARCHAR','constraint'=>100],
        ]);

        $this->forge->addKey('id_pengajar', true);
        $this->forge->addForeignKey('id_user','tb_user','id_user','CASCADE','CASCADE');

        $this->forge->createTable('tb_pengajar');
    }
    public function down()
    {
        $this->forge->dropTable('tb_pengajar');
    }
}
