<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Data Pelanggan</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
    'class' => 'btn btn-warning mb-3',
    'onclick' => "location.href=('" . site_url('/Pelanggan/formtambah') . "')"
]) ?>
</div>
<table class="table table-bordered ">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Kelamin</th>
            <th>No HandPhone</th>
            <th>Alamat</th>
            <th>Nama Produk</th>
            <th>Jumlah Beli</th>
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
                <td><?= $row['nm_customer'] ?></td>
                <td><?= $row['jk'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jml_beli'] ?></td>
                <td>
                    <button class="btn btn-primary" type="button" tittle="Edit Data" onclick="edit('<?= $row['nm_customer'] ?>')">Edit</button>

                    <button class="btn btn-danger" type="button" tittle="Hapus Data" onclick="hapus('<?= $row['nm_customer'] ?>')">Hapus</button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<!-- pagination -->
<div class="float-center">
    <?= $pager->links('DataPenjualan', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/Pelanggan/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data Pelanggan akan di hapus?');

        if (pesan) {
            window.location = ('/Pelanggan/hapus/' + id);
        } else {
            return false;
        }
    }
</script>
<?= $this->endSection() ?>