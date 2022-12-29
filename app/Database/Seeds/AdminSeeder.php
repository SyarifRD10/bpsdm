<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'namaAdmin' => 'Admin',
            'kontak' => '082224335161',
            'user_idUser' => 1,

        ];

        $this->db->table('admin')->insert($data);
    }
}
