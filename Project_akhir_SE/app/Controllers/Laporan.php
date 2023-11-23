<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembelian;

class Laporan extends BaseController
{
    protected $ModelPembelian;
    public function __construct()
    {
        $this->ModelPembelian = new ModelPembelian();
    }
    public function index()
    {
        $data = [
            'title' => 'PT DUTATEX | Laporan',
            'pembelian' => $this->ModelPembelian->getPembelian(),
        ];
        return view('laporan/index', $data);
    }
}
