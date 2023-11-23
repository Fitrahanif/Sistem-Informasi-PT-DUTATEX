<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Hasil Produksi</h1>
<?php if (session()->getFlashdata('errorNamaHasil_produksi')) : ?>
    <div class="alert alert-danger" role="alert">
        <p>Somthing error here!</p>
        <ul>
            <?php foreach (session()->getFlashdata('errorNamaHasil_produksi') as $err) : ?>
                <li><?= $err?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-warning mb-3',
    'onclick' => "location.href=('" . site_url('/Hasil_produksi/index') . "')"
]) ?>
</div>

<?= form_open('Hasil_produksi/updatedata', '', [
    'idhasil' => $id
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
    <label for="tgl_produksi" class="form-label">Tanggal</label>
    <input type="date" value="<?= $tgl_produksi ?>" class="form-control" id="tgl_produksi" name="tgl_produksi">
</div>
<div class="mb-3">
      <label for="kondisi" class="form-label">Kondisi</label>
      <select id="kondisi" name="kondisi" class="form-control">
        <option <?php if($kondisi === "Baik"):?>selected<?php endif?> value="Baik">Baik</option>
        <option <?php if($kondisi === "Rusak"):?>selected<?php endif?> value="Rusak">Rusak</option>
      </select>
    </div>
<div class="form-group">
    <label for="kd_barang">Hasil Produksi</label>
    <?= form_input('hasil_produksi', $hasil_produksi, [
        'class' => 'form-control',
        'id' => 'hasil_produksi',
        'autofocus' => 'true',

    ])
    ?>
</div>
<div class="form-group">
    <label for="kd_barang">Keterangan</label>
    <?= form_input('keterangan', $keterangan, [
        'class' => 'form-control',
        'id' => 'keterangan',
        'autofocus' => 'true',
    ])
    ?>
</div>

<div class="form group">
    <?= form_submit('', 'Update', [
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>