<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Data Penjualan</h1>
<?php if (session()->getFlashdata('errorNamaPelanggan')) : ?>
    <div class="alert alert-danger" role="alert">
        <p>Somthing error here!</p>
        <ul>
            <?php foreach (session()->getFlashdata('errorNamaPelanggan') as $err) : ?>
                <li><?= $err?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-primary mb-3',
    'onclick' => "location.href=('" . site_url('/Pelanggan/index') . "')"
]) ?>
</div>

<?= form_open('Pelanggan/updatedata', '', [
    'idPelanggan' => $id
]) ?>
<div class="form-group">
    <label for="nm_customer">Nama Customer</label>
    <?= form_input('nm_customer', $nm_customer, [
        'class' => 'form-control',
        'id' => 'nm_customer',
        'autofocus' => 'true',
    ])
    ?>
</div>
<div class="mb-3">
      <label for="jk" class="form-label">Jenis Kelamin</label>
      <select id="jk" name="jk" class="form-control">
        <option <?php if($jk === "Laki-Laki"):?>selected<?php endif?> value="Laki-Laki">Laki-Laki</option>
        <option <?php if($jk === "Perempuan"):?>selected<?php endif?> value="Perempuan">Perempuan</option>
      </select>
    </div>

<div class="form-group">
    <label for="nm_customer">No Hp</label>
    <?= form_input('no_hp', $no_hp, [
        'class' => 'form-control',
        'id' => 'no_hp',
        'autofocus' => 'true',
    ])
    ?>
</div>
<div class="form-group">
    <label for="nm_customer">Alamat</label>
    <?= form_input('alamat', $alamat, [
        'class' => 'form-control',
        'id' => 'alamat',
        'autofocus' => 'true',
    ])
    ?>
</div>

<div class="form-group">
    <label for="nm_customer">Nama Produk</label>
    <?= form_input('nama_barang', $nama_barang, [
        'class' => 'form-control',
        'id' => 'nama_barang',
        'autofocus' => 'true',
    ])
    ?>
</div>

<div class="form-group">
    <label for="nm_customer">Jumlah Beli</label>
    <?= form_input('jml_beli', $jml_beli, [
        'class' => 'form-control',
        'id' => 'jml_beli',
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