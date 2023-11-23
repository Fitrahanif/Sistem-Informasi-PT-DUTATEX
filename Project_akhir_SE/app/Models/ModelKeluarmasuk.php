<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeluarmasuk extends Model
{

    protected $table = 'data_keluar_masuk';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_transaksi',
        'kd_barang',
        'nm_barang',
        'tanggal',
        'jml_barang',
        'waktu',
        'keterangan'
    ];

    // Method untuk mencari data berdasarkan nama barang dengan join tabel stokpersediaan
    public function cariData($cari)
    {
        return $this->table('KeluarMasuk')->like('nm_barang', $cari);
    }

    // Method joint tabel stokpersediaan dengan tabel keluar masuk
    public function getStokpersediaan()
    {
        return $this->db->table('data_persediaan')
            ->join('data_keluar_masuk', 'data_persediaan.kd_barang = data_keluar_masuk.kd_barang')
            ->get()->getResultArray();
    }
}