<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJabatan extends Model
{

    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $returnType = 'array';

    public function cariData($cari)
    {
        return $this->table('jabatan')->like('nama_jabatan', $cari);
    }

    public function getJabatan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_jabatan' => $id]);
        }
    }

}