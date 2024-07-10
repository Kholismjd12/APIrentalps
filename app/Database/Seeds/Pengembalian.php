<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pengembalian extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pengembalian' => 1,
                'id_sewa' => 1,
                'tanggal_pengembalian' => '2024-01-07',
                'keterangan_tepat_waktu' => 'ya',
                'pelunasan_pembayaran' => 'lunas',
            ],
            [
                'id_pengembalian' => 2,
                'id_sewa' => 2,
                'tanggal_pengembalian' => '2024-02-07',
                'keterangan_tepat_waktu' => 'tidak',
                'pelunasan_pembayaran' => 'tidak lunas',
            ]
        ];

        $this->db->table('pengembalian')->insertBatch($data);
    }
}
