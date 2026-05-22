<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbUkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ukm' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_ukm' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id_ukm', true);
        $this->forge->createTable('ukm');
    }

    public function down()
    {
        $this->forge->dropTable('ukm');
    }
}
