<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangTerjual extends Model
{

    protected $table            = 'barang_terjual';
    protected $primaryKey       = 'kd_barang';
    protected $allowedFields    = [
        'kd_barang','harga','jumlah','id_customer'
    ];

    public function cariData($cari)
    {
        return $this->table('barang_terjual')->like('nm_barang', $cari);
    }

    public function joinTobarang():mixed    
    {
        return $this->join('barang','barang.kd_barang=barang_terjual.kd_barang');
    }

    public function joinToPelanggan()
    {
        return $this->join('data_customer', 'data_customer.id_customer=barang_terjual.id_terjual')->select('barang_terjual.kd_barang,barang_terjual.nama_barang,data_customer.nm_customer,data_customer.alamat,data_customer.jml_beli');
        
    }
}

