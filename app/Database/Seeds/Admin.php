<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'Ucup',
                'password' => password_hash('ucup123', PASSWORD_DEFAULT),
            ],
            [
                'username' => 'Sumarni',
                'password' => password_hash('marni123', PASSWORD_DEFAULT),
            ],
        ];

        // Using Query Builder
        $this->db->table('admin')->insertBatch($data);
    }
}