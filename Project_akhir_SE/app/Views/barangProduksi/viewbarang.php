<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Barang</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
    'class' => 'btn btn-info mb-3',
    'onclick' => "location.href=('" . site_url('/Barang/formtambah') . "')"
]) ?>
</div>
<table class="table table-bordered table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Satuan</th>
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
                <td><?= $row['harga'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['satuan'] ?></td>
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
    <?= $pager->links('barangProduksi', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/Barang/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data jadwal akan di hapus?');

        if (pesan) {
            window.location = ('/Barang/hapus/' + id);
        } else {
            return false;
        }
    }
</script>
<?= $this->endSection() ?>