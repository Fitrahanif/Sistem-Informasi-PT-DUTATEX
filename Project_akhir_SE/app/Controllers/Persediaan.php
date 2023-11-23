<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelStokpersediaan;
use App\Models\ModelBarang;


class Persediaan extends BaseController
{
private ModelStokpersediaan $Stokpersediaan;
private ModelBarang $modelbarang;
    public function __construct()
    {
        
        $this->Stokpersediaan = new ModelStokpersediaan(); 
        $this->modelbarang = new ModelBarang();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/Stokpersediaan/index');
        } else {
            $cari = session()->get('cari_kategori');
        }

        $dataPersediaan = $cari ? $this->Stokpersediaan->cariData($cari)->paginate(5, 'Stokpersediaan') : $this->Stokpersediaan->joinTobarang()->paginate(5, 'Stokpersediaan');
        //$dataPersediaan = $cari ? $this->Stokpersediaan->cariData($cari)->paginate(5, 'Stokpersediaan') : $this->Stokpersediaan->paginate(5, 'Stokpersediaan');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $dataPersediaan,
            'pager' => $this->Stokpersediaan->pager,
            'nohalaman' => $nohalaman
        ];
        return view('Stokpersediaan/viewStokpersediaan', $data);
    }

    public function formtambah()
    {
        $data['barangs'] = $this->modelbarang->select('kd_barang,nama_barang')->findAll();
        return view('Stokpersediaan/formtambah', $data);
    }

    public function simpandata()
    {
        $kd_barang = $this->request->getVar('kd_barang');
        $tanggal = $this->request->getVar('tanggal');
        $jml_barang = $this->request->getVar('jml_barang');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'kd_barang',
                'label' => 'tanggal',
                'label' => 'jml_barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaPersediaan' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Stokpersediaan/formtambah');
        } else {
            $this->Stokpersediaan->insert([
                'kd_barang' => $kd_barang,
                'tanggal' => $tanggal,
                'jml_barang' => $jml_barang,

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Persediaan/index');
        }
    }
 
    
    public function formedit($id)
    {
        $rowData = $this->Stokpersediaan->find($id);
        $barangs = $this->modelbarang->select('kd_barang,nama_barang')->findAll();

        if ($rowData) {
            $data = [
                'kd_barang' => $rowData['kd_barang'],
                'tanggal' => $rowData['tanggal'],
                'jml_barang' => $rowData['jml_barang'],
                'barangs'=>$barangs,
            ];
            // dd($data);
            return view('Stokpersediaan/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $kd_barang= $this->request->getVar('kd_barang');
        $tanggal = $this->request->getVar('tanggal');
        $jml_barang = $this->request->getVar('jml_barang');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => 'required',
        ]);

        // if (!$valid) {
        //     $pesan = [
        //         'errorNamaJadwal' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
        //     ];
        //     session()->setFlashdata($pesan);
        //     return redirect()->back();
        // } else {
            $update = $this->Stokpersediaan->update($kd_barang, [
                'tanggal' => $tanggal,
                'jml_barang' => $jml_barang
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Persediaan/index');
        // }
    }



    public function hapus($id)
    {
        $rowData = $this->Stokpersediaan->find($id);
        if ($rowData) {
            $this->Stokpersediaan->delete($id);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/Persediaan/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
}
