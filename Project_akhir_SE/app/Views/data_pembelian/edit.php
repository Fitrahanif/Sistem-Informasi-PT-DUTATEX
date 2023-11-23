<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h3 class="page-title"> Edit Data Pemasok </h3>
</div>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url('pembelian/update/' . $pembelian['id_pembelian']); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id_pembelian" value="<?= $pembelian['id_pembelian']; ?>">
            <div class="form-group">
                <label for="pemasok">Pemasok</label>
                <select class="form-control <?= ($validation->hasError('pemasok')) ? 'is-invalid' : ''; ?>" id="pemasok" name="pemasok" autofocus>
                    <?php foreach ($pemasok as $key => $value) : ?>
                        <option value="<?= $value['id_pemasok']; ?>" <?= $value['id_pemasok'] == $pembelian['id_pemasok'] ? 'selected' : ''; ?>><?= $value['id_pemasok'] == $pembelian['id_pemasok'] ? $value['pemasok'] : $value['pemasok']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('pemasok'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="<?= $pembelian['nama_barang']; ?>"></input>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_barang'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="jumlah">Jumlah</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" type="number" name="jumlah" placeholder="Masukkan Nama jumlah" value="<?= $pembelian['jumlah']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jumlah'); ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('tgl_masuk')) ? 'is-invalid' : ''; ?>" id="tgl_masuk" type="date" name="tgl_masuk" placeholder="Masukkan tgl_masuk" value="<?= $pembelian['tgl_masuk']; ?>">
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
                        <input class="form-control <?= ($validation->hasError('harga_satuan')) ? 'is-invalid' : ''; ?>" id="harga_satuan" type="number" name="harga_satuan" placeholder="Masukkan Nama harga_satuan" value="<?= $pembelian['harga_satuan']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga_satuan'); ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="total_harga">Total Harga</label>
                    <div>
                        <input class="form-control <?= ($validation->hasError('total_harga')) ? 'is-invalid' : ''; ?>" id="total_harga" type="number" name="total_harga" placeholder="Masukkan total_harga" value="<?= $pembelian['total_harga']; ?>">
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