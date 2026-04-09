<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePengajar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengajar' => [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true
            ],

            'id_user' => [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true // WAJIB
            ],
            'keahlian' => ['type'=>'VARCHAR','constraint'=>100],
            'created_at' => ['type' => 'DATETIME','null' => true]
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
