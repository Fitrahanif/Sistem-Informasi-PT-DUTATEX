<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Tambah Data</h1>
<div class="form group">
    <?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
        'class' => 'btn btn-primary mb-3',
        'onclick' => "location.href=('" . site_url('/Datakeluarmasuk/index') . "')"
    ]) ?>
</div>

<?= form_open('Datakeluarmasuk/simpandata') ?>
<div class="form-group">
    <label for="kd_barang">Kode Barang</label>
    <select name="kd_barang" id="kd_barang" class="form-control">
        <option value="">Pilih Kode Barang</option>
        <?php foreach ($persediaan as $row): ?>
            <option value="<?= $row['kd_barang'] ?>"><?= $row['kd_barang'] ?></option>
        <?php endforeach; ?>
    </select>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="form-group">
    <label for="kd_barang">Nama Barang</label>
    <?= form_input('nm_barang', '', [
        'class' => 'form-control',
        'id' => 'nm_barang',
        'autofocus' => 'true',
        'placeholder' => 'isikan nama barang'
    ])
        ?>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="mb-3">
    <label for="tgl" class="form-label">Tanggal</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal">
</div>
<div class="form-group">
    <label for="kd_barang">Jumlah Barang</label>
    <?= form_input('jml_barang', '', [
        'class' => 'form-control',
        'id' => 'jml_barang',
        'autofocus' => 'true',
        'placeholder' => 'isikan jumlah barang'
    ])
        ?>
    <?= session()->getFlashdata('errorNamaBarang') ?>
</div>
<div class="mb-3">
    <label for="waktu" class="form-label">Waktu</label>
    <input type="time" class="form-control" id="waktu" name="waktu">
</div>
<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <select name="keterangan" id="keterangan" class="form-control">
        <option value="Masuk">Masuk</option>
        <option value="Keluar">Keluar</option>
    </select>
    <?= session()->getFlashdata('errorNamaBarang') ?>
</div>
<div class="form group">
    <?= form_submit('', 'Simpan', [
        'class' => 'btn btn-success'
    ])
        ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>