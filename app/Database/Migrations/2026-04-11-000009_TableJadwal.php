<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbJadwal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwal' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pelatihan' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_pengajar' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tanggal_mulai' => ['type' => 'DATE'],
            'tanggal_selesai' => ['type' => 'DATE'],
            'total_pertemuan' => ['type' => 'INT', 'constraint' => 5],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50],
        ]);
        $this->forge->addKey('id_jadwal', true);
        $this->forge->addForeignKey('id_pelatihan', 'pelatihan', 'id_pelatihan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pengajar', 'pengajar', 'id_pengajar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal');
    }
}
