<?= $this->extend('main/template') ?>
<?= $this->section('content') ?>
<div class="page-header">
    <h3 class="page-title"> Data Pemasok </h3>
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
            <a href="<?= base_url('/DP/tambah'); ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Tambah data</a>
            <a href="<?= base_url('/DP/cetak_pemasok'); ?>" class="btn btn-secondary btn-sm"><i class="bi bi-printer"></i> Cetak data</a>
        </div>
        <table id="order-listing" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemasok</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pemasok as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['pemasok']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['no_hp']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td>
                            <a href="/DP/edit/<?= $row['id_pemasok']; ?>" class="btn btn-primary btn-rounded"><i class="bi bi-pencil-square"></i></a>
                            <a href="/DP/delete/<?= $row['id_pemasok']; ?>" class="btn btn-danger btn-rounded" onclick="return confirm('Apakah Data akan dihapus?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>