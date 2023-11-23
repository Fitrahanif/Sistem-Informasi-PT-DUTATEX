<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelkaryawan;
use App\Models\ModelJabatan;


class Karyawan extends BaseController
{

    public function __construct()
    {
        $this->karyawan = new Modelkaryawan();

    }

    public function index()
    {
        $modelkaryawan = new Modelkaryawan();

        //Membuat kondisi pencarian

        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/Karyawan/index');
        } else {
            $cari = session()->get('cari_karyawan');
        }

        $dataKaryawan = $cari ? $this->karyawan->cariData($cari)->paginate(5, 'karyawan') : $this->karyawan->paginate(5, 'karyawan');
        $nohalaman = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') : 1;
        $data = [
            'tampildata' => $dataKaryawan,
            'pager' => $this->karyawan->pager,
            'nohalaman' => $nohalaman,
            'datakaryawan' => $modelkaryawan->getJoin()
        ];
        return view('karyawan/viewkaryawan', $data);
    }

    public function formtambah()
    {
        return view('karyawan/formtambah');
    }

    public function simpandata()
    {
        $idKaryawan = $this->request->getVar('id_karyawan');
        $namaKaryawan = $this->request->getVar('nama');
        $alamatKaryawan = $this->request->getVar('alamat');
        $kelamin = $this->request->getVar('kelamin');
        $jabatanKaryawan = $this->request->getVar('id_jabatan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'id_karyawan' => [
                'rules' => 'required',
                'label' => 'id karyawan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'errorid_Karyawan' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('karyawan/formtambah');
        } else {
            $this->karyawan->insert([
                'id_karyawan' => $idKaryawan,
                'nama' => $namaKaryawan,
                'alamat' => $alamatKaryawan,
                'kelamin' => $kelamin,
                'id_jabatan' => $jabatanKaryawan

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('karyawan/index');
        }
    }

    public function formedit($id)
    {
        $rowData = $this->karyawan->find($id);

        if ($rowData) {
            $data = [
                'id' => $id,
                'id_karyawan' => $rowData['id_karyawan'],
                'nama' => $rowData['nama'],
                'alamat' => $rowData['alamat'],
                'kelamin' => $rowData['kelamin'],
                'id_jabatan' => $rowData['id_jabatan']

            ];
            return view('karyawan/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $iddata = $this->request->getVar('iddata');
        $id_karyawan = $this->request->getVar('id_karyawan');
        $nama_Karyawan = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $kelamin = $this->request->getVar('kelamin');
        $id_jabatan = $this->request->getVar('id_jabatan');


        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'id_karyawan' => [
                'rules' => 'required',
                'label' => 'id_karyawan',
                'label' => 'nama',
                'label' => 'alamat',
                'label' => 'id_jabatan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'errorNamaKaryawan' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('karyawan/formedit' . $id_karyawan);
        } else {
            $this->karyawan->update($id_karyawan, [
                'id_karyawan' => $id_karyawan,
                'nama' => $nama_Karyawan,
                'alamat' => $alamat,
                'kelamin' => $kelamin,
                'id_jabatan' => $id_jabatan,

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Karyawan/index');
        }
    }

    public function hapus($id_karyawan)
    {
        $rowData = $this->karyawan->find($id_karyawan);
        if ($rowData) {
            $this->karyawan->delete($id_karyawan);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/karyawan/index');
        } else {
            exit('Data Tidak Ditemukan');
        }

    }
}