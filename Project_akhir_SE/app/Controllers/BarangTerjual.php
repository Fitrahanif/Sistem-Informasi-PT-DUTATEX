<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarangTerjual;
use App\Models\ModelPelanggan;
use App\Models\ModelBarang;

class BarangTerjual extends BaseController
{
    private ModelBarangTerjual $BarangTerjual;
    private ModelBarang $modelbarang;
    public function __construct()
    {
        $this->BarangTerjual = new ModelBarangTerjual();
        $this->modelbarang = new ModelBarang();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/DataBarangTerjual/index');
        } else {
            $cari = session()->get('cari_kategori');
        }

        //$databarangterjual = $cari ? $this->BarangTerjual->cariData($cari)->paginate(5, 'DataBarangTerjual') : $this->BarangTerjual->paginate(5, 'DataBarangTerjual');
        $databarangterjual = $cari ? $this->BarangTerjual->cariData($cari)->paginate(5, 'DataBarangTerjual') : $this->BarangTerjual->joinTobarang()->paginate(5, 'DataBarangTerjual');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $databarangterjual,
            'pager' => $this->BarangTerjual->pager,
            'nohalaman' => $nohalaman,
        ];
        return view('DataBarangTerjual/viewBarangTerjual', $data);
    }

    public function formtambah()
    {
        
        $modelPelanggan = new ModelPelanggan();
        $data  = [
            'pelanggans' => $modelPelanggan->findAll()
            
            
        ];
        $data['barangs'] = $this->modelbarang->select('kd_barang,nama_barang')->findAll();
        return view('DataBarangTerjual/formtambah', $data);
    }

    public function simpandata()
    {
        $kd_barang = $this->request->getVar('kd_barang');
        $harga = $this->request->getVar('harga');
        $jumlah = $this->request->getVar('jumlah');
        $id_pelanggan = $this->request->getVar('id_pelanggan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'Kode produk',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'label' => 'Harga',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'jumlah' => [
                'rules' => 'required',
                'label' => 'Jumlah Produks',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaBarangTerjual' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url() . 'BarangTerjual/formtambah');
        } else {
            $this->BarangTerjual->insert([
                'kd_barang' => $kd_barang,
                'harga' => $harga,
                'jumlah' => $jumlah,
                'id_customer' => $id_pelanggan
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('BarangTerjual/index');
        }
    }

    public function formedit($id)
    {
        $rowData = $this->BarangTerjual->find($id);
        $barangs = $this->modelbarang->select('kd_barang,nama_barang')->findAll();

        if ($rowData) {
            $modelPelanggan = new ModelPelanggan();

            $data = [
                'id' => $id,
                'kd_barang' => $rowData['kd_barang'],
                'harga' => $rowData['harga'],
                'jumlah' => $rowData['jumlah'],
                'id_pelanggan' => $rowData['id_customer'],
                'barangs'=>$barangs,
                'pelanggans' => $modelPelanggan->findAll()


            ];
            return view('DataBarangTerjual/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $idBarangTerjual = $this->request->getVar('idBarangTerjual');
        $kd_barang = $this->request->getVar('kd_barang');
        $harga = $this->request->getVar('harga');
        $jumlah = $this->request->getVar('jumlah');
        
        $id_pelanggan = $this->request->getVar('id_pelanggan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'Kode produk',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'label' => 'Harga',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'jumlah' => [
                'rules' => 'required',
                'label' => 'Jumlah Produks',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaBarangTerjual' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url('BarangTerjual/formedit/' . $idBarangTerjual));
        } else {
            $this->BarangTerjual->update($idBarangTerjual, [
                'kd_barang' => $kd_barang,
                'harga' => $harga,
                'jumlah' => $jumlah,
                'id_customer' => $id_pelanggan
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url() . 'BarangTerjual/index');
        }
    }

    public function hapus($id)
    {
        $rowData = $this->BarangTerjual->find($id);
        if ($rowData) {
            $this->BarangTerjual->delete($id);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/BarangTerjual/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
}
