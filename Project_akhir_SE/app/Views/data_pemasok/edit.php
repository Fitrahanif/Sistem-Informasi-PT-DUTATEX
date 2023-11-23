<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h3 class="page-title"> Edit Data Pemasok </h3>
</div>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url('DP/update/' . $pemasok['id_pemasok']); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id_pemasok" value="<?= $pemasok['id_pemasok']; ?>">
            <div class="form-group row">
                <div class="col">
                    <label for="pemasok">Pemasok</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('pemasok')) ? 'is-invalid' : ''; ?>" id="pemasok" type="text" name="pemasok" placeholder="Masukkan Nama Pemasok" autofocus value="<?= $pemasok['pemasok']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pemasok'); ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="email">Email</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" type="email" name="email" placeholder="Masukkan Email" autocomplete="off" value="<?= $pemasok['email']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" rows="4" name="alamat" placeholder="Masukkan Alamat Pemasok"><?= $pemasok['alamat']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="tel" pattern="[0]{1}[0-9]{11}" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" placeholder="Masukkan NO HP : 0898988999" value="<?= $pemasok['no_hp']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_hp'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-info mr-2">Submit</button>
            <a href="/DP" class="btn btn-dark">Cancel</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>