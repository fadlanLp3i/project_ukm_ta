<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokumen' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_ukm' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'jenis_dokumen' => ['type' => 'VARCHAR', 'constraint' => 100],
            'upload' => ['type' => 'VARCHAR', 'constraint' => 255],
            'pengesahan' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id_dokumen', true);
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('dokumen');
    }
}
