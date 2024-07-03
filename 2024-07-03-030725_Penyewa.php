<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyewaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyewa' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'no_telephone' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
        ]);

        $this->forge->addKey('id_penyewa', true);
        $this->forge->createTable('penyewa');
    }

    public function down()
    {
        $this->forge->dropTable('penyewa');
    }
}
