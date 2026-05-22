<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPelatihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelatihan' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_pelatihan' => ['type' => 'VARCHAR', 'constraint' => 100],
            'id_ukm' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'biaya' => ['type' => 'INT', 'constraint' => 11],
            'id_periode' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id_pelatihan', true);
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_periode', 'periode', 'id_periode', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pelatihan');
    }

    public function down()
    {
        $this->forge->dropTable('pelatihan');
    }
}
