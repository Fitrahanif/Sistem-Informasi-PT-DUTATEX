<?= $this->extend('main/template') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Data Riwayat Login</h1>
<table class="table table-bordered table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>ID riwayat</th>
            <th>email user</th>
            <th>id user</th>
            <th>waktu login</th>
        </tr>
    </thead>
    <tbody>
        <?php   
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($tampildata as $row):
            ?>
            <tr>
                <td>
                    <?= $nomor++; ?>
                </td>
                <td>
                    <?= $row['id'] ?>
                </td>
                <td>
                    <?= $row['email'] ?>
                </td>
                <td>
                    <?= $row['user_id'] ?>
                </td>
                <td>
                    <?= $row['date'] ?>
                </td>
                
            </tr>
        <?php endforeach ?>



    </tbody>
</table>
<!-- pagination -->
<div class="float-center">
    <?= $pager->links('karyawan', 'paging'); ?>
</div>


</script>
<?= $this->endSection() ?>