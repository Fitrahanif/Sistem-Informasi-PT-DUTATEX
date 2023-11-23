<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Edit Data Karyawan</h1>
<div class="form group">
<?= form_button('', ' <i class="fa fa-backward"> </i>Kembali', [
    'class' => 'btn btn-primary mb-3',
    'onclick' => "location.href=('" . site_url('/Karyawan/index') . "')"
]) ?>
</div>

<?= form_open('Karyawan/updatedata', '', [
    'id_karyawan' => $id
]) ?>
    <div class="form-group">
        <label for="nama">Nama karyawan</label>
        <?= form_input('nama',$nama,[
            'class' =>'form-control',
            'id' => 'nama',
            'autofocus' => 'true',
        ])
        ?> 
        <?= session()->getFlashdata('errorNamakaryawan')?>
        <label for="alamatkaryawan">Alamat karyawan</label>
        <?= form_input('alamat',$alamat,[
            'class' =>'form-control',
            'id' => 'alamat',
            'autofocus' => 'true',
        ])
        ?>
        <?= session()->getFlashdata('errorNamakaryawan')?>
        <label for="alamatkaryawan">Jenis kelamin karyawan</label>
        <?= form_input('kelamin',$kelamin,[
            'class' =>'form-control',
            'id' => 'kelamin',
            'autofocus' => 'true',
        ])
        ?> 
        <?= session()->getFlashdata('errorNamakaryawan')?>
        <label for="jabatankaryawan">Jabatan karyawan</label>
        <?= form_input('id_jabatan',$id_jabatan,[
            'class' =>'form-control',
            'id' => 'jabatan',
            'autofocus' => 'true',
        ])
        ?> 
        <?= session()->getFlashdata('errorNamakaryawan')?>
        
    </div>
    <div class="form group">
        <?=form_submit('','Update',[
            'class' => 'btn btn-success'
        ])
        ?>
    </div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>