<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Tambah Barang</h1>
<?php if (session()->getFlashdata('errorNamaBarang')) : ?>
    <div class="alert alert-danger" role="alert">
        <p>Somthing error here!</p>
        <ul>
            <?php foreach (session()->getFlashdata('errorNamaBarang') as $err) : ?>
                <li><?= $err?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-warning mb-3',
    'onclick' => "location.href=('" . site_url('/Barang/index') . "')"
]) ?>
</div>

<?= form_open('Barang/simpandata') ?>
<div class="form-group">
    <label for="kd_barang">Kode Barang</label>
    <?= form_input('kd_barang', '', [
        'class' => 'form-control',
        'id' => 'kd_barang',
        'autofocus' => 'true',
        'placeholder' => 'isikan kode barang'
    ])
    ?>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="form-group">
    <label for="kd_barang">Nama Barang</label>
    <?= form_input('nama_barang', '', [
        'class' => 'form-control',
        'id' => 'nama_barang',
        'autofocus' => 'true',
        'placeholder' => 'isikan nama barang'
    ])
    ?>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="form-group">
    <label for="kd_barang">Harga</label>
    <?= form_input('harga', '', [
        'class' => 'form-control',
        'id' => 'harga',
        'autofocus' => 'true',
        'placeholder' => 'isikan harga barang'
    ])
    ?>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="form-group">
    <label for="kd_barang">Jumlah</label>
    <?= form_input('jumlah', '', [
        'class' => 'form-control',
        'id' => 'jumlah',
        'autofocus' => 'true',
        'placeholder' => 'isikan jumlah barang'
    ])
    ?>
    <?= session()->getFlashdata('errorNamaJadwal') ?>
</div>
<div class="mb-3">
    <label for="satuan" class="form-label">Satuan</label>
    <select id="satuan" name="satuan" class="form-control">
    <option value="">--Pilih Satuan Barang --</option>
        <option>Kodi</option>
        <option>Lusin</option>
        <option>Gross</option>
    </select>
</div>
<div class="form group">
    <?= form_submit('', 'Simpan', [
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>