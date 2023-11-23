<?= $this->extend('main/template') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
  <div class="row ">
    <div class="col">
      <div class="card " style="width: 50rem;">
      <img src="<?=base_url ('/assets/images/pt.png');?>" class="card-img-top">
        <div class="card-body">
        <h1 class="display-4">Hello, admin!</h1>
          <p class="lead">Selamat Datang di Aplikasi Pt Dutatex</p>

        </div>
      </div>
    </div>
    
  </div>
</div>
<?= $this->endSection() ?>