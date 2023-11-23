<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;


class Barang extends BaseController
{
    private ModelBarang $barangProduksi;
    public function __construct()
    {
        
        $this->barangProduksi = new ModelBarang();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/barangProduksi/index');
        } else {
            $cari = session()->get('cari_kategori');
        }

        $dataBarang = $cari ? $this->barangProduksi->cariData($cari)->paginate(5, 'barangProduksi') : $this->barangProduksi->paginate(5, 'barangProduksi');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $dataBarang,
            'pager' => $this->barangProduksi->pager,
            'nohalaman' => $nohalaman
        ];
        return view('barangProduksi/viewbarang', $data);
    }

    public function formtambah()
    {
        return view('barangProduksi/formtambah');
    }

    public function simpandata()
    {
        $kd_barang = $this->request->getVar('kd_barang');
        $nama_barang = $this->request->getVar('nama_barang');
        $harga = $this->request->getVar('harga');
        $jumlah = $this->request->getVar('jumlah');
        $satuan = $this->request->getVar('satuan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'Kode barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'nama_barang' => [
                'rules' => 'required',
                'label' => 'Nama Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'label' => 'Harga Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'jumlah' => [
                'rules' => 'required',
                'label' => 'Jumlah Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'satuan' => [
                'rules' => 'required',
                'label' => 'Satuan Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaBarang' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url() . 'Barang/formtambah');
        } else {
            $this->barangProduksi->insert([
                'kd_barang' => $kd_barang,
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'jumlah' => $jumlah,
                'satuan' => $satuan

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Barang/index');
        }
    }

    public function formedit($id)
    {
        $rowData = $this->barangProduksi->find($id);

        if ($rowData) {
            $data = [
                'id' => $id,
                'kd_barang' => $rowData['kd_barang'],
                'nama_barang' => $rowData['nama_barang'],
                'harga' => $rowData['harga'],
                'jumlah' => $rowData['jumlah'],
                'satuan' => $rowData['satuan']
            ];
            return view('barangProduksi/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $idbarang = $this->request->getVar('idbarang');
        $kd_barang = $this->request->getVar('kd_barang');
        $nama_barang = $this->request->getVar('nama_barang');
        $harga = $this->request->getVar('harga');
        $jumlah = $this->request->getVar('jumlah');
        $satuan = $this->request->getVar('satuan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'Kode barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'nama_barang' => [
                'rules' => 'required',
                'label' => 'Nama Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'label' => 'Harga Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'jumlah' => [
                'rules' => 'required',
                'label' => 'Jumlah Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'satuan' => [
                'rules' => 'required',
                'label' => 'Satuan Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaBarang' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url('Barang/formedit/' . $idbarang));
        } else {
            $this->barangProduksi->update($idbarang, [
                'kd_barang' => $kd_barang,
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'jumlah' => $jumlah,
                'satuan' => $satuan
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Barang/index');
        }
    }

    public function hapus($id)
    {
        $rowData = $this->barangProduksi->find($id);
        if ($rowData) {
            $this->barangProduksi->delete($id);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/Barang/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
}
