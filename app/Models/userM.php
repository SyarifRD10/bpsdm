<?php

namespace App\Models;

use CodeIgniter\Model;

class userM extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'idUser';
    protected $allowedFields = ['email', 'password', 'level'];
}
