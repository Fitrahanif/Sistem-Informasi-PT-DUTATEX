<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAbsensi;
use App\Models\Modelkaryawan;


class Absensi extends BaseController
{

    public function __construct()
    {
        $this->absensi = new ModelAbsensi();
    }

    public function index()
    {
        $model = new ModelAbsensi();
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_kategori',$cari);
            redirect()->to('/Absensi/index');
        } else {
            $cari = session()->get('cari_karyawan');
        }

        $dataAbsensi = $cari ? $this->absensi->cariData($cari)->paginate(5, 'absensi') : $this->absensi->paginate(5, 'absensi');
        $nohalaman = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') : 1;
        $data = [
            'tampildata' => $dataAbsensi,
            'pager' => $this->absensi->pager,
            'nohalaman' => $nohalaman,
            'dataabsensi' => $model->getJoin()
        ];
        return view('absensi/viewkaryawan', $data);
    }

    public function formtambah()
    {
        return view('absensi/formtambah');
    }

    public function simpandata()
    {
        $absensi = $this->request->getVar('id_absensi');
        $id_karyawan = $this->request->getVar('id_karyawan');
        $id_jabatan = $this->request->getVar('id_jabatan');
        $waktu = $this->request->getVar('waktu');
        $keterangan = $this->request->getVar('keterangan');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'id_absensi' => [
                'rules' => 'required',
                'label' => 'id absensi',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'errorid_absensi' => '<br><div class="alert alert-danger">' . $validation->getError() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('absensi/formtambah');
        } else {
            $this->absensi->insert([
                'id_absensi' => $absensi,
                'id_karyawan' => $id_karyawan,
                'id_jabatan' => $id_jabatan,
                'waktu' => $waktu,
                'keterangan' => $keterangan

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil disimpan..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('absensi/index');
        }
    }

    public function formedit($id)
    {
        $rowData = $this->absensi->find($id);

        if ($rowData) {
            $data = [
                'id' => $id,
                'id_absensi' => $rowData['id_absensi'],
                'id_karyawan' => $rowData['id_karyawan'],
                'jabatan' => $rowData['id_jabatan'],
                'waktu' => $rowData['waktu'],
                'keterangan' => $rowData['keterangan'],


            ];
            return view('absensi/formedit', $data);
        } else {
            exit("Data tidak ditemukan");
        }
    }

    public function updatedata()
    {
        $iddata = $this->request->getVar('iddata');
        $id_absensi = $this->request->getVar('id_absensi');
        $id_karyawan = $this->request->getVar('id_karyawan');
        $id_jabatan = $this->request->getVar('id_jabatan');
        $waktu = $this->request->getVar('waktu');
        $keterangan = $this->request->getVar('keterangan');


        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'id_karyawan' => [
                'rules' => 'required',
                'label' => 'id_absensi',
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
            return redirect()->to('absensi/formedit' . $id_karyawan);
        } else {
            $this->absensi->update($id_absensi, [
                'id_absensi' => $id_absensi,
                'id_karyawan' => $id_karyawan,
                'id_jabatan' => $id_jabatan,
                'waktu' => $waktu,
                'keterangan' => $keterangan,

            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil diedit..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('absensi/index');
        }
    }

    public function hapus($id_absensi)
    {
        $rowData = $this->absensi->find($id_absensi);
        if ($rowData) {
            $this->absensi->delete($id_absensi);
            $pesan = [
                'sukses' => '<div class="alert alert-success" >Data berhasil dihapus..</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/absensi/index');
        } else {
            exit('Data Tidak Ditemukan');
        }

    }
}