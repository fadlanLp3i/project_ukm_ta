<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPembayaranHeader extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_jadwal' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_regist' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'bulan' => ['type' => 'VARCHAR', 'constraint' => 20],
            'biaya' => ['type' => 'INT', 'constraint' => 11],
            'cicilan' => ['type' => 'INT', 'constraint' => 11],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50],
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_jadwal', 'jadwal', 'id_jadwal', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_regist', 'registrasi', 'id_registrasi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran_header');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran_header');
    }
}
