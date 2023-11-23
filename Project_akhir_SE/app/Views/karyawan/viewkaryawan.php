<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Data Karyawan</h1>
<div class="form group">
    <?= form_button('', ' <i class="fa fa-plus-circle"> </i>Tambah Data', [
        'class' => 'btn btn-warning mb-3',
        'onclick' => "location.href=('" . site_url('/Karyawan/formtambah') . "')"
    ]) ?>
</div>
<table class="table table-bordered table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>ID karyawan</th>
            <th>nama karyawan</th>
            <th>alamat karyawan</th>
            <th>jenis kelamin</th>
            <th>jabatan karyawan</th>
            <th>gaji</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($datakaryawan as $row):
            ?>
            <tr>
                <td>
                    <?= $nomor++; ?>
                </td>
                <td>
                    <?= $row['id_karyawan'] ?>
                </td>
                <td>
                    <?= $row['nama'] ?>
                </td>
                <td>
                    <?= $row['alamat'] ?>
                </td>
                <td>
                    <?= $row['kelamin'] ?>
                </td>
                <td>

                    <?= $row['nama_jabatan'] ?>
                </td>
                <td>

                    <?= $row['gaji'] ?>
                </td>
                <td>
                    <a href="<?= base_url('Karyawan/formedit/' . $row['id_karyawan']); ?>" class="btn btn-primary">
                        Edit
                    </a>
                    <a href="<?= base_url('Karyawan/hapus/' . $row['id_karyawan']); ?>" class="btn btn-danger">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach ?>



    </tbody>
</table>
<!-- pagination -->
<div class="float-center">
    <?= $pager->links('karyawan', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/Karyawan/formedit/' + id);
    }

    function hapus(id) {
        pesan = confirm('Yakin data jadwal akan di hapus?');

        if (pesan) {
            window.location = ('/Karyawan/hapus/' + id);
        } else {
            return false;
        }
    }
</script>
<?= $this->endSection() ?>