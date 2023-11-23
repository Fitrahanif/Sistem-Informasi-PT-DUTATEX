<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Persediaan</h1>
<div class="form group">
    <!-- Back Button wthout form -->
    <a href="/Datakeluarmasuk/index" class="btn btn-primary mb-3">
        <i class="fa fa-backward"> </i> Kembali
    </a>
</div>
<?= form_open('/Datakeluarmasuk/updatedata', [
    'class' => 'form-group',
    'id' => 'formtambah',
    'method' => 'POST'
]) ?>
<input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
<div class="form-group">
    <label for="kd_barang">Kode Barang</label>
    <?= form_input('kd_barang', $kd_barang, [
        'class' => 'form-control',
        'id' => 'kd_barang',
        'autofocus' => 'true',
        'readonly' => 'true',
    ])
        ?>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="form-group">
    <label for="kd_barang">Nama Barang</label>
    <?= form_input('nm_barang', $nm_barang, [
        'class' => 'form-control',
        'id' => 'nm_barang',
        'autofocus' => 'true',
    ])
        ?>
    <?= session()->getFlashdata('errorNamaKategori') ?>
</div>
<div class="mb-3">
    <label for="tgl" class="form-label">Tanggal</label>
    <input type="date" value="<?= $tanggal ?>" class="form-control" id="tanggal" name="tanggal">
</div>
<div class="form-group">
    <label for="kd_barang">Jumlah Barang</label>
    <?= form_input('jml_barang', $jml_barang, [
        'class' => 'form-control',
        'id' => 'jml_barang',
        'autofocus' => 'true',
    ])
        ?>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="mb-3">
    <label for="waktu" class="form-label">waktu</label>
    <input type="time" value="<?= $waktu ?>" class="form-control" id="waktu" name="waktu">
</div>
<div class="form-group">
    <label for="kd_barang">Keterangan</label>
    <select name="keterangan" id="keterangan" class="form-control">
        <option value="Masuk" <?= ($keterangan == 'Masuk') ? 'selected' : '' ?>>Masuk</option>
        <option value="Keluar" <?= ($keterangan == 'Keluar') ? 'selected' : '' ?>>Keluar</option>
    </select>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="form group">
    <?= form_submit('', 'Update', [
        'class' => 'btn btn-success'
    ])
        ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>