<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelHasilProduksi;


class Hasil_produksi extends BaseController
{

    private ModelHasilProduksi $hasilproduksi;
    private ModelBarang $modelbarang;
    public function __construct()
    {
        $this->hasilproduksi = new ModelHasilProduksi();
        $this->modelbarang = new ModelBarang();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/hasilproduksi/index');
        } else {
            $cari = session()->get('cari_kategori');
        }
        //$dataHasil_produksi = $this->hasilproduksi->join('barang', 'barang.kd_barang=jadwal_produksi.kd_barang')->select('id,nama_barang,tgl_produksi,kondisi,hasil_produksi,keterangan.kd_barang')->findAll();
        $dataHasil_produksi = $cari ? $this->hasilproduksi->cariData($cari)->paginate(5, 'hasilproduksi') : $this->hasilproduksi->joinTobarang()->paginate(5, 'hasilproduksi');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $dataHasil_produksi,
            'pager' => $this->hasilproduksi->pager,
            'nohalaman' => $nohalaman
        ];
        return view('hasilproduksi/viewhasilproduksi', $data);
    }

    public function formtambah()
    {
        $data['barangs'] = $this->modelbarang->select('kd_barang,nama_barang')->findAll();
        return view('hasilproduksi/formtambah',$data);
    }

    public function simpandata()
    {
        $kd_barang = $this->request->getVar('kd_barang');
        $tgl_produksi = $this->request->getVar('tgl_produksi');
        $kondisi = $this->request->getVar('kondisi');
        $hasil_produksi = $this->request->getVar('hasil_produksi');
        $keterangan = $this->request->getVar('keterangan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
        'kd_barang' => [
            'rules' => 'required',
            'label' => 'Kode barang',
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ],
        ],
        'tgl_produksi' => [
            'rules' => 'required',
            'label' => 'Tanggal Produksi',
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ],
        ],
        'kondisi' => [
            'rules' => 'required',
            'label' => 'Kondisi Produksi',
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ],
        ],
        'hasil_produksi' => [
            'rules' => 'required',
            'label' => 'Hasil Produksi',
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ],
        ],
        'keterangan' => [
            'rules' => 'required',
            'label' => 'Keterangan Produksi',
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ],
        ],
    ]);
        if (!$valid) {
            $pesan = [
                'errorNamaHasil_produksi' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url().'Hasil_produksi/formtambah');
        } else {
            $this->hasilproduksi->insert([
                'kd_barang' => $kd_barang,
                'tgl_produksi' => $tgl_produksi,
                'kondisi' => $kondisi,
                'hasil_produksi' => $hasil_produksi,
                'keterangan' => $keterangan

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Hasil_produksi/index');
        }
    }

    public function formedit($id)
    {
        $rowData = $this->hasilproduksi->find($id);
        $barangs = $this->modelbarang->select('kd_barang,nama_barang')->findAll();

        if ($rowData) {
            $data = [
                'id' => $id,
                'kd_barang' => $rowData['kd_barang'],
                'tgl_produksi' => $rowData['tgl_produksi'],
                'kondisi' => $rowData['kondisi'],
                'hasil_produksi' => $rowData['hasil_produksi'],
                'keterangan' => $rowData['keterangan'],
                'barangs'=>$barangs
            ];
            return view('hasilproduksi/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $idhasil= $this->request->getVar('idhasil');
        $kd_barang= $this->request->getVar('kd_barang');
        $tgl_produksi = $this->request->getVar('tgl_produksi');
        $kondisi = $this->request->getVar('kondisi');
        $hasil_produksi = $this->request->getVar('hasil_produksi');
        $keterangan = $this->request->getVar('keterangan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'Kode barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'tgl_produksi' => [
                'rules' => 'required',
                'label' => 'Tanggal Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'kondisi' => [
                'rules' => 'required',
                'label' => 'Kondisi Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'hasil_produksi' => [
                'rules' => 'required',
                'label' => 'Hasil Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'label' => 'Keterangan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaHasil_produksi' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url('Hasil_produksi/formedit/'.$idhasil));
        } else {
            $this->hasilproduksi->update($idhasil, [
                'kd_barang' => $kd_barang,
                'tgl_produksi' => $tgl_produksi,
                'kondisi' => $kondisi,
                'hasil_produksi' => $hasil_produksi,
                'keterangan' => $keterangan
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Hasil_produksi/index');
        }
    }

    public function hapus($id)
    {
        $rowData = $this->hasilproduksi->find($id);
        if ($rowData) {
            $this->hasilproduksi->delete($id);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/Hasil_produksi/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
    public function print()
    {
        $dataHasil_produksi = $this->hasilproduksi->joinTobarang()->findAll();
        $data = [
            'tampildata' => $dataHasil_produksi,
        ];
        $file_name = "" . date('y/m/d') . ".pdf";
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents(ROOTPATH . 'public/assets/css/kv-mpdf-bootstrap.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML(view('pdf/laporan_hasilProduksi',$data), 2);
        $this->response->setHeader('Content-Type', 'application/pdf');
        // D => download 
        // I => VIEW
        return $mpdf->Output($file_name, 'I');
    }
}
