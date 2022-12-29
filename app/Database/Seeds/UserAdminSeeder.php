<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    public function run()
    {

        $data = [
            'email' => 'test170@gmail.com',
            'password' => password_hash('123456789', PASSWORD_BCRYPT),
            'level' => '1',
        ];

        $this->db->table('user')->insert($data);
    }
}
