<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Penyewaan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_sewa' => 1,
                'id_penyewa' => 1,
                'tanggal_sewa' => '2024-01-01',
                'tanggal_kembali' => '2024-01-07',
                'total_harga' => 100.0,
                'pembayaran_awal' => 50.0,
            ],
            [
                'id_sewa' => 2,
                'id_penyewa' => 2,
                'tanggal_sewa' => '2024-02-01',
                'tanggal_kembali' => '2024-02-07',
                'total_harga' => 150.0,
                'pembayaran_awal' => 75.0,
            ]
        ];

        $this->db->table('penyewaan')->insertBatch($data);
    }
}
