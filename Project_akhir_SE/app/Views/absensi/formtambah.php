<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Tambah Data Absensi</h1>
<div class="form group">
    <?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
        'class' => 'btn btn-primary mb-3',
        'onclick' => "location.href=('" . site_url('/Absensi/index') . "')"
    ]) ?>
</div>

<?= form_open('Absensi/simpandata') ?>
<div class="form-group">
    <label for="id_absensi">Id Absensi</label>
    <?= form_input('id_absensi', '', [
        'class' => 'form-control',
        'id' => 'id_absensi',
        'autofocus' => 'true',
        'placeholder' => 'isikan id absensi'
    ]) ?>
    <label for="id_karyawan">Id karyawan</label>
    <?= form_input('id_karyawan', '', [
        'class' => 'form-control',
        'id' => 'id_karyawan',
        'autofocus' => 'true',
        'placeholder' => 'isikan id karyawan'
    ]) ?>
    <label for="id_jabatan">Id Jabatan</label>
    <input type="text" name="id_jabatan" class="form-control" id="id_jabatan">
    <div class="mb-3">
        <label for="waktu" class="form-label">waktu masuk</label>
        <input type="date" class="form-control" id="waktu" name="waktu">
    </div>

    <label for="keterangan">keterangan</label>
    <?= form_input('keterangan', '', [
        'class' => 'form-control',
        'id' => 'keterangan',
        'autofocus' => 'true',
        'placeholder' => 'isikan jabatan karyawan'
    ])
        ?>
    <?= session()->getFlashdata('errorNamaKaryawan') ?>
</div>
<div class="form group">
    <?= form_submit('', 'Simpan', [
        'class' => 'btn btn-success'
    ])
        ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>