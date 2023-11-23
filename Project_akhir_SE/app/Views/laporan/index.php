<?= $this->extend('main/template') ?>
<?= $this->section('content') ?>

<center>
    <div class="box" style="width: 50%; ;">
        <div class="box-header">
            <h3 class="box-title"><?= $title; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-left">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_awal">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-sm btn-info"><i class="fa fa-print"></i> Lihat Laporan</button>
            <button class="btn btn-sm btn-success" hidden><i class="fa fa-print"></i> Cetak Laporan</button>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <table id="laporan" class="table table-bordered table-striped">
                        
                        <thead>
    
                            <tr>
                                <th>No</th>
                                <th>Pemasok</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Masuk</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha512-pAoMgvsSBQTe8P3og+SAnjILwnti03Kz92V3Mxm0WOtHuA482QeldNM5wEdnKwjOnQ/X11IM6Dn3nbmvOz365g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let btnLihat = document.querySelector('.btn-info');
    let btnCetak = document.querySelector('.btn-success');
    let tglAwal = document.querySelector('#tgl_awal');
    let tglAkhir = document.querySelector('#tgl_akhir');

    let pembelian = <?= json_encode($pembelian); ?>;
    console.log(pembelian);

    btnLihat.addEventListener('click', function() {
        let tglAwalValue = tglAwal.value;
        let tglAkhirValue = tglAkhir.value;

        let data = pembelian.filter(function(item) {
            return item.tgl_masuk >= tglAwalValue && item.tgl_masuk <= tglAkhirValue;
        });

        console.log(data);
        let table = document.querySelector('table tbody');
        table.innerHTML = '';
        let no = 1;
        data.forEach(function(item) {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${no++}</td>
                <td>${item.pemasok}</td>
                <td>${item.nama_barang}</td>
                <td>${item.jumlah}</td>
                <td>${item.tgl_masuk}</td>
                <td>${item.harga_satuan}</td>
                <td>${item.total_harga}</td>
            `;
            table.appendChild(tr);
        });
        btnCetak.hidden = false;
        btnCetak.addEventListener('click', function() {
            let tableLaporan = document.querySelector('#laporan');
            let laporan = tableLaporan.outerHTML;
            let docDefinition = {
                content: [{
                    table: {
                        headerRows: 1,
                        widths: ['auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'],
                        body: [
                            ['No', 'Pemasok', 'Nama Barang', 'Jumlah', 'Tanggal Masuk', 'Harga Satuan', 'Total Harga'],
                            ...data.map((item, index) => [index + 1, item.pemasok, item.nama_barang, item.jumlah, item.tgl_masuk, item.harga_satuan, item.total_harga])
                        ],
                    }
                }]
            };
            pdfMake.createPdf(docDefinition).open();
        });
    });
</script>
<?= $this->endSection(); ?>