<?= $this->extend('main/template') ?>
<?= $this->section('content') ?>
<h1 class="text-center">Jadwal Produksi</h1>
<div class="d-flex justify-content-between">
    <?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
        'class' => 'btn btn-info mb-3',
        'onclick' => "location.href=('" . site_url('/Jadwal/formtambah') . "')"
    ]) ?>
    <a href="<?= base_url('/Jadwal/print')?>" class="btn btn-outline-primary ml-auto mb-3">Cetak Laporan <i class="fa fa-print"></i></a>
</div>
<table class="table table-bordered table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Jumlah Produksi</th>
            <th>Status</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($tampildata as $row) :
        ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['kd_barang'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['tgl'] ?></td>
                <td><?= $row['waktu'] ?></td>
                <td><?= $row['jml_produksi'] ?></td>
                <td>
                    <?php if ($row['jml_produksi'] < 400) : ?>
                        <span class="badge badge-outline-danger badge-pill">Gagal Produksi</span>
                    <?php else : ?>
                        <span class="badge badge-outline-success badge-pill">Berhasil Produksi</span>
                    <?php endif ?>
                </td>
                <td>
                    <button class="btn btn-primary" type="button" tittle="Edit Data" onclick="edit('<?= $row['kd_barang'] ?>')">Edit</button>

                    <button class="btn btn-danger" type="button" tittle="Hapus Data" onclick="hapus('<?= $row['kd_barang'] ?>')">Hapus</button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<!-- pagination -->
<div class="float-center">
    <?= $pager->links('jadwalproduksi', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/Jadwal/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data jadwal akan di hapus?');

        if (pesan) {
            window.location = ('/Jadwal/hapus/' + id);
        } else {
            return false;
        }
    }
</script>
<?= $this->endSection() ?>