<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLP extends Model
{
    public function joinTobarang():mixed    
    {
        return $this->join('barang','barang.kd_barang=jadwal.kd_barang');
    }
}

