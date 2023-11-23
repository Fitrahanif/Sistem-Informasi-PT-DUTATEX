<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStokpersediaan extends Model
{

    protected $table = 'data_persediaan';
    protected $primaryKey = 'kd_barang';
    protected $allowedFields = [
        'kd_barang',
        'tanggal',
        'jml_barang'
    ];

    public function cariData($cari)
    {
        return $this->table('Stokpersediaan')->like('nm_barang', $cari);
    }
    public function joinTobarang():mixed    
    {
        return $this->join('barang','barang.kd_barang=data_persediaan.kd_barang');
    }
}