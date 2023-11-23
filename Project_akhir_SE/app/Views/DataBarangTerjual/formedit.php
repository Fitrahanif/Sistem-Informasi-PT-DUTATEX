<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Barang Terjual</h1>
<?php if (session()->getFlashdata('errorNamaBarangTerjual')) : ?>
    <div class="alert alert-danger" role="alert">
        <p>Somthing error here!</p>
        <ul>
            <?php foreach (session()->getFlashdata('errorNamaBarangTerjual') as $err) : ?>
                <li><?= $err ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="form group">
    <?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
        'class' => 'btn btn-primary mb-3',
        'onclick' => "location.href=('" . site_url('/BarangTerjual/index') . "')"
    ]) ?>
</div>

<?= form_open('BarangTerjual/updatedata', '', [
    'idBarangTerjual' => $id
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

<div class="form-group">
    <label for="kd_barang">Harga</label>
    <?= form_input('harga', $harga, [
        'class' => 'form-control',
        'id' => 'harga',
        'autofocus' => 'true',
    ])
    ?>
</div>
<div class="form-group">
    <label for="kd_barang">Jumlah</label>
    <?= form_input('jumlah', $jumlah, [
        'class' => 'form-control',
        'id' => 'jumlah',
        'autofocus' => 'true',
    ])
    ?>
</div>
<div class="form-group">
    <label for="id_pelanggan">Pelanggan</label>
    <select name="id_pelanggan" id="id_pelanggan" class="form-control">
        <option value="">-- PILIH Pelanggan --</option>
        <?php foreach ($pelanggans as $pelanggan) : ?>
            <option value="<?= $pelanggan['id_customer'] ?>" <?php if ($pelanggan['id_customer'] == $id_pelanggan) : ?>selected<?php endif ?>><?= $pelanggan['nm_customer'] ?></option>
        <?php endforeach ?>
    </select>
</div>

<div class="form group">
    <?= form_submit('', 'Update', [
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>