<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{

    protected $table            = 'jadwal_produksi';
    protected $primaryKey       = 'kd_barang';
    protected $allowedFields    = [
        'kd_barang','tgl','waktu','jml_produksi'
    ];
    protected $returnType = 'array';

    public function cariData($cari)
    {
        return $this->table('jadwalproduksi')->like('nm_barang', $cari);
    }

    public function joinTobarang():mixed    
    {
        return $this->join('barang','barang.kd_barang=jadwal.kd_barang');
    }
}   

