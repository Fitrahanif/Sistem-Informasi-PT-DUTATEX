<?php

namespace App\Controllers;

use App\Models\ModelPembelian;

class Pembelian extends BaseController
{
    protected $ModelPembelian;
    //membuat function construct
    public function __construct()
    {
        $this->ModelPembelian = new ModelPembelian();
    }

    public function index()
    {
        $data = [
            'title' => 'PT Dutatex | Data Pembelian',
            'pembelian' => $this->ModelPembelian->getPembelian()
        ];
        return view('data_pembelian/index', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'PT Dutatex | Tambah Data Pembelian',
            'validation' => \Config\Services::validation(),
            'pembelian' => $this->ModelPembelian->getAllPemasok(),
        ];
        return view('data_pembelian/tambah', $data);
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
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tgl_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'harga_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'total_harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]

        ])) {
            return redirect()->to('pembelian/tambah')->withInput();
        }
        $this->ModelPembelian->save([
            'id_pemasok'   => $this->request->getVar('pemasok'),
            'nama_barang'    => $this->request->getVar('nama_barang'),
            'jumlah'     => $this->request->getVar('jumlah'),
            'tgl_masuk'    => $this->request->getVar('tgl_masuk'),
            'harga_satuan'    => $this->request->getVar('harga_satuan'),
            'total_harga'    => $this->request->getVar('total_harga')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/pembelian');
    }

    public function edit($id)
    {
        session();
        $data = [
            'title' => 'PT Dutatex | Edit Data Pembelian',
            'validation' => \Config\Services::validation(),
            'pembelian' => $this->ModelPembelian->getPembelianById($id),
            'pemasok' => $this->ModelPembelian->getAllPemasok()
        ];
        // jika id data tidak ada di table
        if (empty($data['pembelian'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('data_pembelian/edit', $data);
    }

    public function update($id)
    {
        // dd($_POST);
        // validasi input
        if (!$this->validate([
            'pemasok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tgl_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'harga_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'total_harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]

        ])) {
            return redirect()->to('pembelian/edit/' . $this->request->getVar('id_pembelian'))->withInput();
        }

        // validasi data sukses
        $this->ModelPembelian->save([
            'id_pembelian' => $id,
            'id_pemasok'   => $this->request->getVar('pemasok'),
            'nama_barang'    => $this->request->getVar('nama_barang'),
            'jumlah'     => $this->request->getVar('jumlah'),
            'tgl_masuk'    => $this->request->getVar('tgl_masuk'),
            'harga_satuan'    => $this->request->getVar('harga_satuan'),
            'total_harga'    => $this->request->getVar('total_harga')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        return redirect()->to('/pembelian');
    }
    public function delete($id)
    {
        $this->ModelPembelian->delete($id);

        session()->setFlashdata('hapus', 'Data berhasil dihapus!..');
        return redirect()->to('/pembelian');
    }
}
