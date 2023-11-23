<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Data BarangTerjual</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
    'class' => 'btn btn-warning mb-3',
    'onclick' => "location.href=('" . site_url('/BarangTerjual/formtambah') . "')"
]) ?>
</div>
<table class="table table-bordered ">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
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
    <?= $pager->links('DataBarangTerjual', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/BarangTerjual/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data BarangTerjual akan di hapus?');

        if (pesan) {
            window.location = ('/BarangTerjual/hapus/' + id);
        } else {
            return false;
        }
    }
</script>
<?= $this->endSection() ?>