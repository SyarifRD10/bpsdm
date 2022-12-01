<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'namaUser' => 'Admin',
            'email' => 'test!170@gmail.com',
            'password' => password_hash('1234567890', PASSWORD_BCRYPT),
            'level' => '1',
        ];
        $this->db->table('user')->insert($data);
    }
}
