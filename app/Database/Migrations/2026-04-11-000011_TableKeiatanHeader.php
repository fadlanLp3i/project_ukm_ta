<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKegiatanHeader extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kegiatan' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_jadwal' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tanggal' => ['type' => 'DATE'],
            'pertemuan' => ['type' => 'INT', 'constraint' => 5],
            'materi' => ['type' => 'TEXT'],
        ]);
        $this->forge->addKey('id_kegiatan', true);
        $this->forge->addForeignKey('id_jadwal', 'jadwal', 'id_jadwal', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kegiatan_header');
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan_header');
    }
}
