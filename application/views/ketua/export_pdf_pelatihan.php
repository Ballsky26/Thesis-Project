<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadwal Pelatihan</title>
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
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <td></td>
                <td>
                    <img src="<?= base_url(); ?>assets/login/img/login/logotechnopark.png" style="width: 158px; height: auto;">
                </td>

                <td align="center" colspan="">
                    <span style="line-height: 3; font-weight: bold;">
                        <h2>Technopark Perikanan Kota Pekalongan</h2>
                        <h5>Jl. Wr. Supratman Panjang Wetan, Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51141. Telp 081 689 9928</h5>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <hr class="line-title">
                    <!-- <p align="center">
                        Laporan Daftar Pemilik <br>
                        <b>Tanggal <?= date('d F Y'); ?></b>
                    </p> -->
                </td>
            </tr>
            <br>
        </thead>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Mulai</th>
                <th>Waktu</th>
                <th>Pemateri</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $i = 1; ?>
                <?php foreach ($jadwalpelatihan as $jadwal) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $jadwal['nama_kegiatan']; ?></td>
                <td><?= date('d-m-Y', strtotime($jadwal['tanggal_mulai'])); ?></td>
                <td><?= $jadwal['waktu']; ?></td>
                <td><?= $jadwal['pemateri']; ?></td>
                <td><?= $jadwal['status']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>