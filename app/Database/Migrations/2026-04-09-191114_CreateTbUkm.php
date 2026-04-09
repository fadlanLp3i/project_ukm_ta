<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbUkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ukm' => ['type'=>'INT','auto_increment'=>true],
            'nama_ukm' => ['type'=>'VARCHAR','constraint'=>100],
            'deskripsi' => ['type'=>'TEXT','null'=>true],
            'ketua_id' => ['type'=>'INT','null'=>true],
            'status' => ['type'=>'ENUM','constraint'=>['aktif','nonaktif']],
        ]);

        $this->forge->addKey('id_ukm', true);

        $this->forge->addForeignKey('ketua_id','tb_user','id_user','SET NULL','CASCADE');

        $this->forge->createTable('tb_ukm');
    }
    public function down()
    {
        $this->forge->dropTable('tb_ukm');
    }
}
