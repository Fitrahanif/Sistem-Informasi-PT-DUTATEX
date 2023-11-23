<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Jadwal</h1>
<?php if (session()->getFlashdata('errorNamaJadwal')) : ?>
    <div class="alert alert-danger" role="alert">
        <p>Somthing error here!</p>
        <ul>
            <?php foreach (session()->getFlashdata('errorNamaJadwal') as $err) : ?>
                <li><?= $err?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-warning mb-3',
    'onclick' => "location.href=('" . site_url('/Jadwal/index') . "')"
]) ?>
</div>

<?= form_open(base_url('Jadwal/updatedata'), '', [
    'idjadwal' => $id
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
    <input type="date" value="<?= $tgl ?>" class="form-control" id="tgl" name="tgl">
  </div>
<div class="form-group">
    <label for="kd_barang">Waktu</label>
    <?= form_input('waktu', $waktu, [
        'class' => 'form-control',
        'id' => 'waktu',
        'autofocus' => 'true',
    ])
    ?>
</div>
<div class="form-group">
    <label for="kd_barang">Jumlah Produksi</label>
    <?= form_input('jml_produksi', $jml_produksi, [
        'class' => 'form-control',
        'id' => 'jml_produksi',
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