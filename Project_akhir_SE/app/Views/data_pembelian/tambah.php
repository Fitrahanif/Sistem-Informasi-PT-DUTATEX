<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h3 class="page-title"> Tambah Data Pembelian </h3>
</div>
<div class="card">
    <div class="card-body">
        <form action="/pembelian/simpan" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="pemasok">Pemasok</label>
                <select class="form-control <?= ($validation->hasError('pemasok')) ? 'is-invalid' : ''; ?>" id="pemasok" name="pemasok">
                    <option>Pilih Pemasok</option>
                    <?php foreach ($pembelian as $key => $value) : ?>
                        <option value="<?= $value['id_pemasok']; ?>"><?= $value['pemasok']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('pemasok'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang"></input>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_barang'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="jumlah">Jumlah</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" type="number" name="jumlah" placeholder="Masukkan Nama jumlah">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jumlah'); ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('tgl_masuk')) ? 'is-invalid' : ''; ?>" id="tgl_masuk" type="date" name="tgl_masuk" placeholder="Masukkan tgl_masuk">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_masuk'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="harga_satuan">Harga Satuan</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('harga_satuan')) ? 'is-invalid' : ''; ?>" id="harga_satuan" type="number" name="harga_satuan" placeholder="Masukkan Nama harga_satuan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga_satuan'); ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="total_harga">Total Harga</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('total_harga')) ? 'is-invalid' : ''; ?>" id="total_harga" type="number" name="total_harga" placeholder="Masukkan total harga">
                        <div class="invalid-feedback">
                            <?= $validation->getError('total_harga'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info mr-2">Submit</button>
            <a href="/pembelian" class="btn btn-dark">Cancel</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>