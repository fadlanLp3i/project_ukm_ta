<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKegiatanDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_kegiatan' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_peserta' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'status_kehadiran' => ['type' => 'VARCHAR', 'constraint' => 50],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_kegiatan', 'kegiatan_header', 'id_kegiatan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_peserta', 'peserta', 'id_peserta', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kegiatan_detail');
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan_detail');
    }
}
