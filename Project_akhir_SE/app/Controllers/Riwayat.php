<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRiwayat;


class Riwayat extends BaseController
{

    private ModelRiwayat $Riwayat;
    public function __construct()
    {
        $this->riwayat = new ModelRiwayat();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/Riwayat/index');
        } else {
            $cari = session()->get('cari_kategori');
        }

        $datariwayat = $cari ? $this->riwayat->cariData($cari)->paginate(5, 'Riwayat') : $this->riwayat->paginate(5, 'Riwayat');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $datariwayat,
            'pager' => $this->riwayat->pager,
            'nohalaman' => $nohalaman
        ];
        return view('riwayat/viewriwayat', $data);
    }
}