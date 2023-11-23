<?php

namespace App\Controllers;

use App\Models\ModelBarangTerjual;
use App\Models\ModelPelanggan;

class LaporanPemasaran extends BaseController
{
    protected $modelPelanggan;
    protected $modelBarangterjual;
    public function __construct()
    {
        $this->modelPelanggan = new ModelPelanggan();
        $this->modelBarangterjual = new ModelBarangTerjual();
    }
    public function index()
    {
        $laporan = $this->modelPelanggan->join('barang_terjual', 'barang_terjual.id_customer=data_customer.id_customer')->select("*")->get()->getResultArray();
        return view('DataLaporan/viewDataLaporan', ['laporan' => $laporan]);
    }

    public function cetakLaporan()
    {
        return view('DataLaporan/viewDataLaporan');
    }

    public function laporan()
    {
    }
}
