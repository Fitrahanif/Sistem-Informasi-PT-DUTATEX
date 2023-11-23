<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{

    protected $table            = 'barang';
    protected $primaryKey       = 'kd_barang';
    protected $allowedFields    = [
        'kd_barang', 'nama_barang','harga','jumlah','satuan'
    ];

    public function cariData($cari)
    {
        return $this->table('barangproduksi')->like('nm_barang', $cari);
    }
}

