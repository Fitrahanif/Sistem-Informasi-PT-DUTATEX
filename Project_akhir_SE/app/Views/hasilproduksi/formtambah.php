<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Tambah Hasil Produksi</h1>
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

<?= form_open('Hasil_produksi/simpandata') ?>
<div class="form-group">
    <label for="kd_barang">Nama Barang</label>
    <select name="kd_barang" class="form-control" autofocus>
        <option value="">--Pilih Kode Barang --</option>
        <?php foreach ($barangs as $barang) : ?>
            <option value="<?= $barang['kd_barang']?>"><?= $barang['nama_barang']?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="mb-3">
    <label for="tgl_produksi" class="form-label">Tanggal</label>
    <input type="date" class="form-control" id="tgl_produksi" name="tgl_produksi">
</div>
<div class="mb-3">
    <label for="kondisi" class="form-label">Kondisi</label>
    <select id="kondisi" name="kondisi" class="form-control">
    <option value="">--Pilih kondisi Barang --</option>
        <option>Baik</option>
        <option>Rusak</option>
    </select>
</div>
<div class="form-group">
    <label for="kd_barang">Hasil Produksi</label>
    <?= form_input('hasil_produksi', '', [
        'class' => 'form-control',
        'id' => 'hasil_produksi',
        'autofocus' => 'true',
        'placeholder' => 'isikan hasil produksi'
    ])
    ?>
</div>
<div class="form-group">
    <label for="kd_barang">Keterangan</label>
    <?= form_input('keterangan', '', [
        'class' => 'form-control',
        'id' => 'keterangan',
        'autofocus' => 'true',
        'placeholder' => 'isikan keterangan produksi'
    ])
    ?>
</div>

<div class="form group">
    <?= form_submit('', 'Simpan', [
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>