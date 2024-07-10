<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Konsol extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_konsol' => 1,
                'jenis_konsol' => 'PlayStation 5',
                'stok' => 10
            ],
            [
                'id_konsol' => 2,
                'jenis_konsol' => 'Xbox Series X',
                'stok' => 8
            ]
        ];

        $this->db->table('konsol')->insertBatch($data);
    }
}
