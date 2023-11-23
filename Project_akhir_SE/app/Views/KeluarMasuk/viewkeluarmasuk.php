<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Keluar/Masuk</h1><br>
<div class="form group">
    <?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
        'class' => 'btn btn-warning mb-3',
        'onclick' => "location.href=('" . site_url('/Datakeluarmasuk/formtambah') . "')"
    ]) ?>
    <?= form_button('', '  </i>Print', [
        'class' => 'float-center btn btn-success mb-3  bi bi-printer',
        'onclick' => "window.print()"
    ]) ?>
</div>
<table>
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 10%;">Kode Barang</th>
            <th style="width: 10%;">Nama Barang</th>
            <th style="width: 9%;">Tanggal</th>
            <th style="width: 10%;">Jumlah barang</th>
            <th style="width: 8%;">Waktu</th>
            <th style="width: 5%;">Keterangan</th>
            <th style="width: 8%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($tampildata as $row):
            ?>
            <tr>
                <td>
                    <?= $nomor++; ?>
                </td>
                <td>
                    <?= $row['kd_barang'] ?>
                </td>
                <td>
                    <?= $row['nm_barang'] ?>
                </td>
                <td>
                    <?= $row['tanggal'] ?>
                </td>
                <td>
                    <?= $row['jml_barang'] ?>
                </td>
                <td>
                    <?= $row['waktu'] ?>
                </td>
                <td>
                    <?= $row['keterangan'] ?>
                </td>
                <td>
                    <button class="btn btn-primary" type="button" tittle="Edit Data"
                        onclick="edit('<?= $row['id_transaksi'] ?>')">Edit</button>

                    <button class="btn btn-danger" type="button" tittle="Hapus Data"
                        onclick="hapus('<?= $row['id_transaksi'] ?>')">Hapus</button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<!-- pagination -->
<div class="float-center">
    <?= $pager->links('KeluarMasuk', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/Datakeluarmasuk/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data keluar/masuk akan di hapus?');

        if (pesan) {
            window.location = ('/Datakeluarmasuk/hapus/' + id);
        } else {
            return false;
        }
    }
</script>
<?= $this->endSection() ?>