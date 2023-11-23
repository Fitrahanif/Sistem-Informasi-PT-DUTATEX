<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h3 class="text-center">Data Pemasok</h4>
        <table class='table table-bordered'>
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
                        <td><?= $row['no_hp']; ?></td>
                        <td><?= $row['email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</body>

</html>