<div class="box">
    <div class="box-header text-right">
        <center>
            <h1>Laporan</h1> <br>
        </center>
        <h5><?= $tglawal . " s/d " . $tglakhir; ?></h5>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table id="order-listing" class="table">
            
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemasok</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pemasok as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['pemasok']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td class="text-center"><?= $row['no_hp']; ?></td>
                        <td class="text-center"><?= $row['email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>