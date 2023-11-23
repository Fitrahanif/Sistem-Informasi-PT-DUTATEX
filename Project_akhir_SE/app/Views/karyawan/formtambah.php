<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Tambah Data Karyawan</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-primary mb-3',
    'onclick' => "location.href=('" . site_url('/Karyawan/index') . "')"
]) ?>
</div>

<?= form_open('Karyawan/simpandata') ?>
    <div class="form-group">
        <label for="IDkaryawan">ID karyawan</label>
        <?= form_input('id_karyawan','',[
            'class' =>'form-control',
            'id' => 'id_karyawan',
            'autofocus' => 'true',
            'placeholder' => 'isikan id karyawan'
        ])?>
        <label for="namakaryawan">Nama karyawan</label>
        <?= form_input('nama','',[
            'class' =>'form-control',
            'id' => 'nama',
            'autofocus' => 'true',
            'placeholder' => 'isikan nama karyawan'
        ])?>
        <label for="alamat">Alamat karyawan</label>
        <?= form_input('alamat','',[
            'class' =>'form-control',
            'id' => 'alamat',
            'autofocus' => 'true',
            'placeholder' => 'isikan alamat karyawan'
        ])?>
        <label for="kelamin">Jenis kelamin</label>
        <?= form_input('kelamin','',[
            'class' =>'form-control',
            'id' => 'kelamin',
            'autofocus' => 'true',
            'placeholder' => 'isikan kelamin karyawan'
        ])?>
        <label for="id_jabatan">Jabatan karyawan</label>
        <?= form_input('id_jabatan','',[
            'class' =>'form-control',
            'id' => 'id_jabatan',
            'autofocus' => 'true',
            'placeholder' => 'isikan jabatan karyawan'
        ])
        ?> 
        <?= session()->getFlashdata('errorNamaKaryawan')?>
    </div>
    <div class="form group">
        <?=form_submit('','Simpan',[
            'class' => 'btn btn-success'
        ])
        ?>
    </div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>