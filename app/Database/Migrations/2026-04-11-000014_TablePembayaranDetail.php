<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPembayaranDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pembayaran' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tanggal_bayar' => ['type' => 'DATE'],
            'cicilan' => ['type' => 'INT', 'constraint' => 11],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_pembayaran', 'pembayaran_header', 'id_pembayaran', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran_detail');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran_detail');
    }
}
