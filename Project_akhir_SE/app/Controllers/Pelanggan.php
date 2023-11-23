<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPelanggan;


class Pelanggan extends BaseController
{

    private ModelPelanggan $Pelanggan;
    public function __construct()
    {
        $this->Pelanggan = new ModelPelanggan();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/DataPenjualan/index');
        } else {
            $cari = session()->get('cari_kategori');
        }

        $datapelanggan = $cari ? $this->Pelanggan->cariData($cari)->paginate(5, 'DataPelanggan') : $this->Pelanggan->paginate(5, 'DataPelanggan');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $datapelanggan,
            'pager' => $this->Pelanggan->pager,
            'nohalaman' => $nohalaman
        ];
        return view('DataPenjualan/viewPenjualan', $data);
    }

    public function formtambah()
    {
        return view('DataPenjualan/formtambah');
    }

    public function simpandata()
    {
        $nm_customer = $this->request->getVar('nm_customer');
        $jk = $this->request->getVar('jk');
        $no_hp = $this->request->getVar('no_hp');
        $alamat = $this->request->getVar('alamat');
        $nama_barang = $this->request->getVar('nama_barang');
        $jml_beli = $this->request->getVar('jml_beli');

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nm_customer' => [
                    'rules' => 'required',
                    'label' => 'Nama Customer',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'jk' => [
                    'rules' => 'required',
                    'label' => 'Jnis Kelamin',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'no_hp' => [
                    'rules' => 'required',
                    'label' => 'No Handphone',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'alamat' => [
                    'rules' => 'required',
                    'label' => 'alamat',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'nama_barang' => [
                    'rules' => 'required',
                    'label' => 'Nama Produk',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'jml_beli' => [
                    'rules' => 'required',
                    'label' => 'Jumlah Beli',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
            ]);
            if (!$valid) {
                $pesan = [
                    'errorNamaPelanggan' => $validation->getErrors()
                ];
                session()->setFlashdata($pesan);
                return redirect()->to(base_url() . 'Pelanggan/formtambah');
            } else {
                $this->Pelanggan->insert([
                'nm_customer' => $nm_customer,
                'jk' => $jk,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'nama_barang' => $nama_barang,
                'jml_beli' => $jml_beli,
    
                ]);
                $pesan = [
                    'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
                ];
                session()->setFlashdata($pesan);
            return redirect()->to('Pelanggan/index');
        }
    }

    public function formedit($id)
    {
        $rowData = $this->Pelanggan->find($id);

        if ($rowData) {
            $data = [
                'id' => $id,
                'nm_customer' => $rowData['nm_customer'],
                'jk' => $rowData['jk'],
                'no_hp' => $rowData['no_hp'],
                'alamat' => $rowData['alamat'],
                'nama_barang' => $rowData['nama_barang'],
                'jml_beli' => $rowData['jml_beli']
            ];
            return view('DataPenjualan/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $idPelanggan= $this->request->getVar('idPelanggan');
        $nm_customer= $this->request->getVar('nm_customer');
        $jk= $this->request->getVar('jk');
        $no_hp = $this->request->getVar('no_hp');
        $alamat = $this->request->getVar('alamat');
        $nama_barang = $this->request->getVar('nama_barang');
        $jml_beli = $this->request->getVar('jml_beli');

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nm_customer' => [
                    'rules' => 'required',
                    'label' => 'Nama Customer',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'jk' => [
                    'rules' => 'required',
                    'label' => 'Jnis Kelamin',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'no_hp' => [
                    'rules' => 'required',
                    'label' => 'No Handphone',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'alamat' => [
                    'rules' => 'required',
                    'label' => 'alamat',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'nama_barang' => [
                    'rules' => 'required',
                    'label' => 'Nama Produk',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
                'jml_beli' => [
                    'rules' => 'required',
                    'label' => 'Jumlah Beli',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ],
                ],
            ]);
            if (!$valid) {
                $pesan = [
                    'errorNamaPelanggan' => $validation->getErrors()
                ];
                session()->setFlashdata($pesan);
                return redirect()->to(base_url('Pelanggan/formedit/' . $idPelanggan));
           
            } else {
                $this->Pelanggan->update($idPelanggan, [
                    'nm_customer' => $nm_customer,
                    'jk' => $jk,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                    'nama_barang' => $nama_barang
                ]);
                $pesan = [
                    'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
                ];
                session()->setFlashdata($pesan);
                return redirect()->to(base_url() . 'Pelanggan/index');
            
        }
    }

    public function hapus($id)
    {
        $rowData = $this->Pelanggan->find($id);
        if ($rowData) {
            $this->Pelanggan->delete($id);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/Pelanggan/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
}
