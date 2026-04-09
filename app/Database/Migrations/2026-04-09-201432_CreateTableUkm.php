<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ukm' => ['type'=>'INT','constraint' => 11,'unsigned' => true,'constraint' => 11,'unsigned' => true,'auto_increment'=>true],
            'nama_ukm' => ['type'=>'VARCHAR','constraint'=>100],
            'deskripsi' => ['type'=>'TEXT','null'=>true],
            'ketua_id' => ['type'=>'INT','null'=>true, 'constraint' => 11, 'unsigned' => true],
            'status' => ['type'=>'ENUM','constraint'=>['aktif','nonaktif']],
            'created_at' => ['type' => 'DATETIME','null' => true]
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
