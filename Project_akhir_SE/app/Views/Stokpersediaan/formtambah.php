<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Tambah Data</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-primary mb-3',
    'onclick' => "location.href=('" . site_url('/Persediaan/index') . "')"
]) ?>
</div>

<?= form_open('Persediaan/simpandata') ?>
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

<div class="form group">
    <?= form_submit('', 'Simpan', [
        'class' => 'btn btn-success'
    ])
    ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>