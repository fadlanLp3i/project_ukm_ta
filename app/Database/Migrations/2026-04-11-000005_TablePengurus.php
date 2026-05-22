<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPengurus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengurus' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_pengurus' => ['type' => 'VARCHAR', 'constraint' => 100],
            'jabatan' => ['type' => 'VARCHAR', 'constraint' => 50],
            'id_ukm' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id_pengurus', true);
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengurus');
    }

    public function down()
    {
        $this->forge->dropTable('pengurus');
    }
}
