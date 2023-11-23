<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembelian extends Model
{

    protected $table            = 'data_pembelian';
    protected $primaryKey       = 'id_pembelian';
    protected $allowedFields    = ['id_pemasok', 'nama_barang', 'jumlah', 'tgl_masuk', 'harga_satuan', 'total_harga'];

    public function getPembelian()
    {
        return $this->db->table('data_pembelian')->join('data_pemasok', 'data_pemasok.id_pemasok = data_pembelian.id_pemasok')->get()->getResultArray();
    }

    public function getAllPemasok()
    {
        return $this->db->table('data_pemasok')->get()->getResultArray();
    }

    public function getPembelianById($id)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pembelian' => $id])->first();
    }
}
