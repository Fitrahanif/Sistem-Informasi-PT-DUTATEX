<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Data Absensi</h1>
<div class="form group">
    <?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
        'class' => 'btn btn-primary mb-3',
        'onclick' => "location.href=('" . site_url('/Absensi/index') . "')"
    ]) ?>
</div>

<?= form_open('Absensi/updatedata', '', [
    'id_absensi' => $id
]) ?>
<div class="form-group">
    <label for="id_karyawan">Id karyawan</label>
    <?= form_input('id_karyawan', $id_karyawan, [
        'class' => 'form-control',
        'id' => 'id_karyawan',
        'autofocus' => 'true',
    ])
        ?>
    <?= session()->getFlashdata('errorNamakaryawan') ?>
    <label for="id_jabatan">Id Jabatan karyawan</label>
    <?= form_input('id_jabatan', $id_jabatan, [
        'class' => 'form-control',
        'id' => 'id_jabatan',
        'autofocus' => 'true',
    ])
        ?>
    <div class="mb-3">
        <label for="waktu" class="form-label">waktu Absensi</label>
        <input type="date-time" value="<?= $waktu ?>" class="form-control" id="waktu" name="waktu">
    </div>
    <label for="keterangan">keterangan</label>
    <?= form_input('keterangan', $keterangan, [
        'class' => 'form-control',
        'id' => 'namakaryawan',
        'autofocus' => 'true',
    ])
        ?>
    <?= session()->getFlashdata('errorNamakaryawan') ?>

</div>
<div class="form group">
    <?= form_submit('', 'Update', [
        'class' => 'btn btn-success'
    ])
        ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>