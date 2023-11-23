<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkaryawan extends Model
{

    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = [
        'id_karyawan',
        'nama',
        'alamat',
        'kelamin',
        'id_jabatan'
    ];
    protected $returnType = 'array';

    public function cariData($cari)
    {
        return $this->db->table('karyawan')
            ->join('jabatan', 'karyawan.id_jabatan=jabatan.id_jabatan')->like('nama_karyawan', $cari)->get()->getResultArray();
    }

    public function getKaryawan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_karyawan' => $id]);
        }
    }

    public function getJoin()
    {
        return $this->db->table('karyawan')
            ->join('jabatan', 'jabatan.id_jabatan=karyawan.id_jabatan')
            ->get()->getResultArray();
    }

}