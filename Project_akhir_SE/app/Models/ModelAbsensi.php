<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAbsensi extends Model
{

    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $allowedFields = [
        'id_absensi',
        'id_karyawan',
        'id_jabatan',
        'waktu',
        'keterangan'
    ];

    public function cariData($cari)
    {
        return $this->table('absensi')->like('id_absensi', $cari);
    }

    public function getJoin()
    {
        return $this->db->table('karyawan')
            ->join('absensi', 'absensi.id_karyawan=karyawan.id_karyawan')
            ->join('jabatan', 'jabatan.id_jabatan=karyawan.id_jabatan')
            ->get()->getResultArray();
    }
}