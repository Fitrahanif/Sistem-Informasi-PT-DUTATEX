<?= $this->extend('main/template') ?>
<?= $this->section('content') ?>
<div class="page-header">
    <h3 class="page-title"> Data Pembelian </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data table</li>
        </ol>
    </nav>
</div>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <i class="mdi mdi-check-all"></i> <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('hapus')) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <i class="mdi mdi-check-all"></i> <?= session()->getFlashdata('hapus'); ?>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <a href="<?= base_url('/pembelian/tambah'); ?>" class="btn btn-primary btn-sm "><i class="bi bi-plus-circle"></i> Tambah data</a>
        </div>
        <table id="order-listing" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemasok</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th>Harga Satuan</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pembelian as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['pemasok']; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td><?= $row['tgl_masuk']; ?></td>
                        <td><?= $row['harga_satuan']; ?></td>
                        <td>
                            <?php if ($row['jumlah'] > 20) { ?>
                                <h1 class="badge badge-danger text-white">Melebihi Kapasitas</h1>
                            <?php } elseif ($row['jumlah'] == 20) { ?>
                                <h1 class="badge badge-warning text-white">Sudah Penuh</h1>
                            <?php } else { ?>
                                <h1 class="badge badge-success">Belum Penuh</h1>
                            <?php } ?>
                        </td>
                        <td><?= $row['total_harga']; ?></td>
                        <td>
                            <a href="/pembelian/edit/<?= $row['id_pembelian']; ?>" class="btn btn-primary btn-rounded"><i class="bi bi-pencil-square"></i></a>
                            <a href="/pembelian/delete/<?= $row['id_pembelian']; ?>" class="btn btn-danger btn-rounded" onclick="return confirm('Apakah Data akan dihapus?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>