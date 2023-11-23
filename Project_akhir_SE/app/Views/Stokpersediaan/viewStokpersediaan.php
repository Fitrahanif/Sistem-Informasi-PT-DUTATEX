<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Persediaan</h1><br>
<div class="form group">
<?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
    'class' => 'btn btn-warning mb-3',
    'onclick' => "location.href=('" . site_url('/Persediaan/formtambah') . "')"
]) ?>
<?= form_button('', '  </i>Print', [
    'class' => 'float-center btn btn-success mb-3  bi bi-printer',
    'onclick' => "window.print()"
]) ?>
</div>
<table class="table table-bordered table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal</th>
            <th >Jumlah barang</th>
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
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['jml_barang'] ?></td>
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
    <?= $pager->links('Stokpersediaan', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/Persediaan/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data persediaan akan di hapus?');

        if (pesan) {
            window.location = ('/Persediaan/hapus/' + id);
        } else {
            return false;
        }
    }
</script>
<?= $this->endSection() ?>