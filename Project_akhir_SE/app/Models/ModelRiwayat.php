<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRiwayat extends Model
{

    protected $table = 'auth_logins';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'email',
        'user_id',
        'date'
    ];

    public function cariData($cari)
    {
        return $this->table('auth_logins')->like('email', $cari);
    }
}