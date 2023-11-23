<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPemasok extends Model
{

    protected $table            = 'data_pemasok';
    protected $primaryKey       = 'id_pemasok';
    protected $allowedFields    = ['pemasok', 'alamat', 'no_hp', 'email'];

    public function getPemasok()
    {
        return $this->db->table('data_pemasok')->get()->getResultArray();
    }

    public function getPemasokById($id)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pemasok' => $id])->first();
    }
}
