<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Data Laporan</h1>
<?= form_button('', '  </i>Print', [
        'class' => 'float-center btn btn-success mb-3  bi bi-printer',
        'onclick' => "window.print()"
    ]) ?>
<div class="box">

    <!-- /.box-header -->
    <div class="box-body">

        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Jumlah Beli</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($laporan as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['kd_barang'] ?></td>
                        <td><?= $row['nama_barang'] ?></td>
                        <td><?= $row['nm_customer'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['jml_beli'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?= $this->endSection() ?>