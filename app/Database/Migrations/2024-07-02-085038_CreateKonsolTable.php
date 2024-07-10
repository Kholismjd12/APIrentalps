<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKonsolTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_konsol' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_konsol' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);
        $this->forge->addKey('id_konsol', true);
        $this->forge->createTable('konsol');
    }

    public function down()
    {
        $this->forge->dropTable('konsol');
    }
}
