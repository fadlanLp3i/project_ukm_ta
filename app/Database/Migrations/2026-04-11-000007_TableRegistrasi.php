<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbRegistrasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_registrasi' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_peserta' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_ukm' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'biaya' => ['type' => 'INT', 'constraint' => 11],
        ]);
        $this->forge->addKey('id_registrasi', true);
        $this->forge->addForeignKey('id_peserta', 'peserta', 'id_peserta', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm', 'CASCADE', 'CASCADE');
        $this->forge->createTable('registrasi');
    }

    public function down()
    {
        $this->forge->dropTable('registrasi');
    }
}
