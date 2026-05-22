<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPengajar extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_pengajar' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_pengajar' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id_pengajar', true);
        $this->forge->createTable('pengajar');
    }

    public function down()
    {
        $this->forge->dropTable('pengajar');
    }
}
