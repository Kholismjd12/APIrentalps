<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengembalian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengembalian' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_sewa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tanggal_pengembalian' => [
                'type' => 'DATE',
            ],
            'keterangan_tepat_waktu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pelunasan_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_pengembalian', true);
        $this->forge->addForeignKey('id_sewa', 'penyewa', 'id_penyewa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengembalian');
    }

    public function down()
    {
        $this->forge->dropTable('pengembalian');
    }
}
