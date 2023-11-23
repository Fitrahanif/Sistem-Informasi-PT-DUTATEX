<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div style="border-bottom:1px solid black;padding-bottom: 1rem;margin: 1rem 0;" class="text-center">
        <h1>Laporan Jadwal Produksi</h1> 
        <h5>Penanggungjawab: admin produksi</h5>   
    </div>
    <div class="row">
        <table class="table table-bordered table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Jumlah Produksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($tampildata as $row) :
                ?>
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $row['kd_barang'] ?></td>
                        <td><?= $row['nama_barang'] ?></td>
                        <td><?= $row['tgl'] ?></td>
                        <td><?= $row['waktu'] ?></td>
                        <td><?= $row['jml_produksi'] ?></td>
                        <td>
                            <?php if ($row['jml_produksi'] < 400) : ?>
                                Gagal Produksi
                            <?php else : ?>
                                Berhasil Produksi
                            <?php endif ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>