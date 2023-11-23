<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Persediaan</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-primary mb-3',
    'onclick' => "location.href=('" . site_url('/Persediaan/index') . "')"
]) ?>
</div>
<?= form_open('Persediaan/updatedata', '', [
    'kd_barang' => $kd_barang
]) ?>
<div class="form-group">
<label for="kd_barang">Nama Barang</label>
<select name="kd_barang" class="form-control" autofocus>
    <option value="">--Pilih Kode Barang --</option>
    <?php foreach ($barangs as $barang) : ?>
        <option <?php if($barang['kd_barang'] === $kd_barang):?>selected<?php endif?> value="<?= $barang['kd_barang']?>"><?= $barang['nama_barang']?></option>
    <?php endforeach ?>
</select>
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

<div class="form group">
    <?= form_submit('', 'Update', [
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>