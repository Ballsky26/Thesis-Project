<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemilik UKM Tenant</title>
    <style>
        .line-title {
            border: 1;
            border-style: unset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <hr>
    <table class="table table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <td></td>
                <td>
                    <img src="<?= base_url(); ?>assets/login/img/login/logotechnopark.png" style="width: 158px; height: auto;">
                </td>
                <td align="center" colspan="6">
                    <!-- <span style="line-height: 3; font-weight: bold;"> -->
                    <h1>TECHNOPARK PERIKANAN KOTA PEKALONGAN</h1>
                    <h5>Jl. Wr. Supratman Panjang Wetan, Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51141. Telp 081 689 9928</h5>
                    <!-- </span> -->
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <hr class="line-title">
                    <p align="center">
                        Laporan Daftar Pemilik UKM Tenant<br>
                        <b>Tanggal <?= date('d-m-Y'); ?></b>
                    </p>
                </td>
            </tr>
            <br>
            <!-- </thead>
    </table>
    <table class="table table-bordered">
        <thead> -->
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Tagline Produk</th>
                <th>Nama Pemilik</th>
                <th>Alamat</th>
                <th>Nomor Telpon</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $i = 1; ?>
                <?php foreach ($pemilikukmtenant as $pemilik) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $pemilik['nama_produk']; ?></td>
                <td><?= $pemilik['tagline_produk']; ?></td>
                <td><?= $pemilik['nama_pemilik']; ?></td>
                <td><?= $pemilik['alamat']; ?></td>
                <td><?= $pemilik['nomor_telpon']; ?></td>
                <!-- <td><img src="<?= base_url('assets/login/img/pemilik/') . $pemilik['foto_produk']; ?>" class="thumbnail" width="100"></td> -->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>