<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelJadwal;

class Jadwal extends BaseController
{
    private ModelJadwal $jadwalproduksi;
    private ModelBarang $modelbarang;
    public function __construct()
    {
        $this->jadwalproduksi = new ModelJadwal();
        $this->modelbarang = new ModelBarang();
    }

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/jadwalproduksi/index');
        } else {
            $cari = session()->get('cari_kategori');
        }

        $dataJadwal = $this->jadwalproduksi->join('barang', 'barang.kd_barang=jadwal_produksi.kd_barang')->select('id,nama_barang,tgl,waktu,jml_produksi,jadwal_produksi.kd_barang')->paginate(5);
        // $dataJadwal = $cari ? $this->jadwalproduksi->cariData($cari)->paginate(5, 'jadwalproduksi') : $this->jadwalproduksi->paginate(5, 'jadwalproduksi');
        $nohalaman = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'tampildata' => $dataJadwal,
            'pager' => $this->jadwalproduksi->pager,
            'nohalaman' => $nohalaman
        ];
        return view('jadwalproduksi/viewjadwal', $data);
    }

    public function formtambah()
    {
        $data['barangs'] = $this->modelbarang->select('kd_barang,nama_barang')->findAll();
        return view('jadwalproduksi/formtambah', $data);
    }

    public function simpandata()
    {
        $kd_barang = $this->request->getVar('kd_barang');
        $tgl = $this->request->getVar('tgl');
        $waktu = $this->request->getVar('waktu');
        $jml_produksi = $this->request->getVar('jml_produksi');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'Kode barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'tgl' => [
                'rules' => 'required',
                'label' => 'Tanggal Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'waktu' => [
                'rules' => 'required',
                'label' => 'Waktu Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'jml_produksi' => [
                'rules' => 'required',
                'label' => 'Jumlah Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaJadwal' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url() . 'Jadwal/formtambah');
        } else {
            $this->jadwalproduksi->insert([
                'kd_barang' => $kd_barang,
                'tgl' => $tgl,
                'waktu' => $waktu,
                'jml_produksi' => $jml_produksi

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Jadwal/index');
        }
    }

    public function formedit($id)
    {
        $rowData = $this->jadwalproduksi->find($id);
        $barangs = $this->modelbarang->select('kd_barang,nama_barang')->findAll();

        if ($rowData) {
            $data = [
                'id' => $id,
                'kd_barang' => $rowData['kd_barang'],
                'tgl' => $rowData['tgl'],
                'waktu' => $rowData['waktu'],
                'jml_produksi' => $rowData['jml_produksi'],
                'barangs' => $barangs
            ];
            return view('jadwalproduksi/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $idjadwal = $this->request->getVar('idjadwal');
        $kd_barang = $this->request->getVar('kd_barang');
        $tgl = $this->request->getVar('tgl');
        $waktu = $this->request->getVar('waktu');
        $jml_produksi = $this->request->getVar('jml_produksi');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'kd_barang' => [
                'rules' => 'required',
                'label' => 'Kode barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'tgl' => [
                'rules' => 'required',
                'label' => 'Tanggal Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'waktu' => [
                'rules' => 'required',
                'label' => 'Waktu Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
            'jml_produksi' => [
                'rules' => 'required',
                'label' => 'Jumlah Produksi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaJadwal' => $validation->getErrors()
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url('Jadwal/formedit/' . $idjadwal));
        } else {
            $this->jadwalproduksi->update($idjadwal, [
                'kd_barang' => $kd_barang,
                'tgl' => $tgl,
                'waktu' => $waktu,
                'jml_produksi' => $jml_produksi
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to(base_url() . 'Jadwal/index');
        }
    }

    public function hapus($id)
    {
        $rowData = $this->jadwalproduksi->find($id);
        if ($rowData) {
            $this->jadwalproduksi->delete($id);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/Jadwal/index');
        } else {
            exit('Data Tidak Ditemukan');
        }
    }
    public function print()
    {
        $dataJadwal = $this->jadwalproduksi->join('barang', 'barang.kd_barang=jadwal_produksi.kd_barang')->select('id,nama_barang,tgl,waktu,jml_produksi,jadwal_produksi.kd_barang')->findAll();
        $data = [
            'tampildata' => $dataJadwal,
        ];
        $file_name = "" . date('y/m/d') . ".pdf";
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents(ROOTPATH . 'public/assets/css/kv-mpdf-bootstrap.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML(view('pdf/laporan_jadwal',$data), 2);
        $this->response->setHeader('Content-Type', 'application/pdf');
        // D => download 
        // I => VIEW
        return $mpdf->Output($file_name, 'I');
    }
}
