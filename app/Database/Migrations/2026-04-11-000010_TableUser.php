<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'role' => ['type' => 'ENUM', 'constraint' => ['pembina', 'peserta', 'pengajar', 'pengurus']],
            'id_peserta' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_pengajar' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_pengurus' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'username' => ['type' => 'VARCHAR', 'constraint' => 100],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_peserta', 'peserta', 'id_peserta', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pengajar', 'pengajar', 'id_pengajar', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pengurus', 'pengurus', 'id_pengurus', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
