<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHasilProduksi extends Model
{

    protected $table            = 'hasil_produksi';
    protected $primaryKey       = 'kd_barang';
    protected $allowedFields    = [
        'kd_barang','tgl_produksi','kondisi','hasil_produksi','keterangan'
    ];

    public function cariData($cari)
    {
        return $this->joinTobarang()->like('nm_barang', $cari);
    }

    public function joinTobarang():mixed    
    {
        return $this->join('barang','barang.kd_barang=hasil_produksi.kd_barang');
    }
}

