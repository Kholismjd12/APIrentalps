<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyewaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'no_telephone' => [
                'type'       => 'INT',
                'constraint' => '15',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penyewa');
    }

    public function down()
    {
        $this->forge->dropTable('penyewa');
    }
}
