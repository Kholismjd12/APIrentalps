<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyewaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sewa' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_penyewa' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'tanggal_sewa' => [
                'type' => 'DATE',
            ],
            'tanggal_kembali' => [
                'type' => 'DATE',
            ],
            'total_harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'pembayaran_awal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addKey('id_sewa', true);
        $this->forge->addForeignKey('id_penyewa', 'penyewa', 'id_penyewa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penyewaan');
    }

    public function down()
    {
        $this->forge->dropTable('penyewaan');
    }
}
