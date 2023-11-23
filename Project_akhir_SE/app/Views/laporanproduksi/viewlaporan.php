<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Laporan Produksi</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
    'class' => 'btn btn-info mb-3',
    'onclick' => "location.href=('" . site_url('/Laporan_produksi/formtambah') . "')"
]) ?>
<?= form_button('', ' <i class="fa fa-plus-circle"> </i>Cetak', [
    'class' => 'btn btn-success mb-3',
    'onclick' => "location.href=('" . site_url('/Laporan_produksi/cetak') . "')"
]) ?>
</div>

<table class="table table-bordered table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>id Laporan</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Kode Barang</th>
            <th>Tanggal Keluar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($tampildata as $row) :
        ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['id_laporan'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['kd_barang'] ?></td>
                <td><?= $row['tgl_keluar'] ?></td>
                
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