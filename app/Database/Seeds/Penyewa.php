<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Penyewa extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'nama_lengkap' => 'John Doe',
                'alamat' => 'Jl. Elm 123',
                'no_telephone' => '123-456-7890'
            ],
            [
                'id' => 2,
                'nama_lengkap' => 'Jane Smith',
                'alamat' => 'Jl. Oak 456',
                'no_telephone' => '987-654-3210'
            ]
        ];

        // Menggunakan Query Builder untuk menyisipkan data
        $this->db->table('penyewa')->insertBatch($data);
    }
}
