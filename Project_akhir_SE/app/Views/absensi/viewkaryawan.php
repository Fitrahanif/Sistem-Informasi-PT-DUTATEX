<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Data Absensi</h1>
<div class="form group">
    <?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
        'class' => 'btn btn-warning mb-3',
        'onclick' => "location.href=('" . site_url('/Absensi/formtambah') . "')"
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
            <th>ID Absensi</th>
            <th>ID Karyawan</th>
            <th>nama karyawan</th>
            <th>jabatan karyawan</th>
            <th>waktu</th>
            <th>keterangan</th>

            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($dataabsensi as $row):
            ?>
            <tr>
                <td>
                    <?= $nomor++; ?>
                </td>
                <td>
                    <?= $row['id_absensi'] ?>
                </td>
                <td>
                    <?= $row['id_karyawan'] ?>
                </td>
                <td>
                    <?= $row['nama'] ?>
                </td>
                <td>
                    <?= $row['nama_jabatan'] ?>
                </td>
                <td>
                    <?= $row['waktu'] ?>
                </td>
                <td>
                    <?= $row['keterangan'] ?>
                </td>
                <td>
                    <button class="btn btn-primary" type="button" tittle="Edit Data"
                        onclick="edit('<?= $row['id_absensi'] ?>')">Edit</button>

                    <button class="btn btn-danger" type="button" tittle="Hapus Data"
                        onclick="hapus('<?= $row['id_absensi'] ?>')">Hapus</button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<!-- pagination -->
<div class="float-center">
    <?= $pager->links('absensi', 'paging'); ?>
</div>
<script>function print() {

    }
    f
    window.print();
</script>

<script>
    function edit(id) {
        window.location = ('/Absensi/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data jadwal akan di hapus?');

        if (pesan) {
            window.location = ('/Absensi/hapus/' + id);
        } else {
            return false;
        }
    }
</script>


<?= $this->endSection() ?>