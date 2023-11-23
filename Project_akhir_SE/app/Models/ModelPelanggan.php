<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{

    protected $table            = 'data_customer';
    protected $primaryKey       = 'nm_customer';
    protected $allowedFields    = [
        'nm_customer', 'jk','no_hp','alamat','nama_barang','jml_beli','id_customer','nama_barang'
    ];


    public function cariData($cari)
    {
        return $this->table('data_customer')->like('nm_customer', $cari);
    }

}

