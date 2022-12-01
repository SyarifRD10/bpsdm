<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idUser' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'namaUser' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
            ],
            'level' => [
                'type' => 'BOOLEAN',
            ],
        ]);
        $this->forge->addKey('idUser', true);
        $this->forge->createTable('user');

    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
