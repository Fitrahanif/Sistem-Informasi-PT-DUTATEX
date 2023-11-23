<?php

namespace App\Controllers;

use App\Models\ModelPemasok;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

class DP extends BaseController
{
    protected $ModelPemasok;
    //membuat function construct
    public function __construct()
    {
        $this->ModelPemasok = new ModelPemasok();
    }

    public function index()
    {
        $data = [
            'title' => 'PT Dutatex | Data Pemasok',
            'pemasok' => $this->ModelPemasok->getPemasok()
        ];
        return view('data_pemasok/index', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'PT Dutatex | Tambah Data Pemasok',
            'validation' => \Config\Services::validation()
        ];
        return view('data_pemasok/tambah', $data);
    }
    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'pemasok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]

        ])) {
            return redirect()->to('DP/tambah')->withInput();
        }
        $this->ModelPemasok->save([
            'pemasok'   => $this->request->getVar('pemasok'),
            'alamat'    => $this->request->getVar('alamat'),
            'email'     => $this->request->getVar('email'),
            'no_hp'    => $this->request->getVar('no_hp')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/DP');
    }

    public function edit($id)
    {
        session();
        $data = [
            'title' => 'PT Dutatex | Edit Data Pemasok',
            'validation' => \Config\Services::validation(),
            'pemasok' => $this->ModelPemasok->getPemasokById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['pemasok'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('data_pemasok/edit', $data);
    }

    public function update($id)
    {
        // validasi input
        if (!$this->validate([
            'pemasok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]

        ])) {
            return redirect()->to('DP/edit/' . $this->request->getVar('id_pemasok'))->withInput();
        }

        // validasi data sukses
        $this->ModelPemasok->save([
            'id_pemasok' => $id,
            'pemasok' => $this->request->getVar('pemasok'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        return redirect()->to('/DP');
    }
    public function delete($id)
    {
        $this->ModelPemasok->delete($id);

        session()->setFlashdata('hapus', 'Data berhasil dihapus!..');
        return redirect()->to('/DP');
    }

    public function cetak_pemasok()
    {
        $data = [
            'pemasok' => $this->ModelPemasok->getPemasok()
        ];
        $file_name = 'Data Pemasok';
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents(ROOTPATH . 'public/assets/css/kv-mpdf-bootstrap.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML(view('data_pemasok/cetak_pemasok', $data), 2);
        $this->response->setHeader('Content-Type', 'application/pdf');
        // D => download 
        // I => VIEW
        return $mpdf->Output($file_name, 'I');
    }

    // public function update($id)
    // {
    //     // validasi update 
    //     // cek judul
    //     $alias = url_title($this->request->getVar('judul'), '-', true);
    //     $this->bukuModel->save([
    //         'id'        => $id,
    //         'judul'     => $this->request->getVar('judul'),
    //         'alias'      => $alias,
    //         'penulis'   => $this->request->getVar('penulis'),
    //         'penerbit'  => $this->request->getVar('penerbit'),
    //         'harga'  => $this->request->getVar('harga'),
    //         'cover'     => $this->request->getVar('cover')
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil diubah.');
    //     return redirect()->to('/kategori/index');
    // }
    // public function formedit($slug)
    // {
    //     $data = [
    //         'title' => 'Form Ubah Data Buku',
    //         'validation' => \Config\Services::validation(),
    //         'buku' => $this->bukuModel->getBuku($slug)
    //     ];

    //     echo view('kategori/bo');
    //     return view('kategori/formedit', $data);
    // }
}
