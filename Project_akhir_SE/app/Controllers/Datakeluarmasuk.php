<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKeluarmasuk;
use App\Models\ModelStokpersediaan;


class Datakeluarmasuk extends BaseController
{
    protected $KeluarMasuk;
    public function __construct()
    {

        $this->KeluarMasuk = new ModelKeluarmasuk();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/KeluarMasuk/index');
        } else {
            $cari = session()->get('cari_kategori');
        }

        $dataDatakeluarmasuk = $cari ? $this->KeluarMasuk->cariData($cari)->paginate(5, 'KeluarMasuk') : $this->KeluarMasuk->paginate(5, 'KeluarMasuk');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $dataDatakeluarmasuk,
            'pager' => $this->KeluarMasuk->pager,
            'nohalaman' => $nohalaman
        ];
        return view('KeluarMasuk/viewkeluarmasuk', $data);
    }

    public function formtambah()
    {
        $model = new ModelStokpersediaan();
        // Get all data with join
        $data = [
            'persediaan' => $model->findAll()
        ];
        return view('KeluarMasuk/formtambah', $data);
    }

    public function simpandata()
    {
        $kd_barang = $this->request->getVar('kd_barang');
        $nm_barang = $this->request->getVar('nm_barang');
        $tanggal = $this->request->getVar('tanggal');
        $jml_barang = $this->request->getVar('jml_barang');
        $waktu = $this->request->getVar('waktu');
        $keterangan = $this->request->getVar('keterangan');



        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'kd_barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaDatakeluarmasuk' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('KeluarMasuk/formtambah');
        } else {
            $this->KeluarMasuk->insert([
                'kd_barang' => $kd_barang,
                'nm_barang' => $nm_barang,
                'tanggal' => $tanggal,
                'jml_barang' => $jml_barang,
                'waktu' => $waktu,
                'keterangan' => $keterangan,

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Datakeluarmasuk/index');
        }
    }


    public function formedit($id)
    {
        $rowData = $this->KeluarMasuk->find($id);

        if ($rowData) {
            $data = [
                'id_transaksi' => $rowData['id_transaksi'],
                'kd_barang' => $rowData['kd_barang'],
                'nm_barang' => $rowData['nm_barang'],
                'tanggal' => $rowData['tanggal'],
                'jml_barang' => $rowData['jml_barang'],
                'waktu' => $rowData['waktu'],
                'keterangan' => $rowData['keterangan'],
            ];
            // dd($data);
            return view('KeluarMasuk/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $id_transaksi = $this->request->getVar('id_transaksi');
        $kd_barang = $this->request->getVar('kd_barang');
        $nm_barang = $this->request->getVar('nm_barang');
        $tanggal = $this->request->getVar('tanggal');
        $jml_barang = $this->request->getVar('jml_barang');
        $waktu = $this->request->getVar('waktu');
        $keterangan = $this->request->getVar('keterangan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'kd_barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nm_barang' => [
                'rules' => 'required',
                'label' => 'nm_barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'label' => 'tanggal',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jml_barang' => [
                'rules' => 'required',
                'label' => 'jml_barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'label' => 'waktu',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'label' => 'keterangan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaDatakeluarmasuk' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Datakeluarmasuk/formedit/' . $id_transaksi);
        } else {
            $this->KeluarMasuk->update($id_transaksi, [
                'kd_barang' => $kd_barang,
                'nm_barang' => $nm_barang,
                'tanggal' => $tanggal,
                'jml_barang' => $jml_barang,
                'waktu' => $waktu,
                'keterangan' => $keterangan,
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diupdate..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Datakeluarmasuk/index');
        }
    }



    public function hapus($id)
    {
        $rowData = $this->KeluarMasuk->find($id);
        if ($rowData) {
            $this->KeluarMasuk->delete($id);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/Datakeluarmasuk/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
}