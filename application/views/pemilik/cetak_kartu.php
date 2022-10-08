<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        .line-title {
            border: 2;
            border-style: unset;
            border-top: 100px solid #000;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td>
                <img src="<?= base_url(); ?>assets/login/img/login/logotechnopark.png" style="width: 158px; height: auto;">
            </td>
            <td align="center">
                <span style="line-height: 3,6; font-weight: bold;">
                    <h2>Technopark Perikanan Kota Pekalongan</h2>
                    <h5>Jl. Wr. Supratman Panjang Wetan, Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51141. Telp 081 689 9928</h5>
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center">
        Kartu Peserta Pelatihan UKM Tenant <br>
        <b>Tanggal <?= date('d-m-Y'); ?></b>
    </p>
    <img alt="image" src="<?= base_url('assets/login/img/gambar/') . $peserta_pelatihan['foto_profil']; ?>" style="width: 150px; height: auto;">

    <div class="card-body">
        <div class="card text-center">

            <div class="card-body">
                <p class="card-text">Nama Pelatihan : <?= $peserta_pelatihan['nama_kegiatan']; ?></p>
                <p class="card-text">Nama Pemilik : <?= $peserta_pelatihan['nama_pemilik']; ?></p>
                <p class="card-text">Tanggal Daftar : <?= date('d-m-Y', strtotime($peserta_pelatihan['tanggal_daftar'])); ?></p>
                <p class="card-text">Status : <?= $peserta_pelatihan['status']; ?></p>
                <hr>
            </div>

        </div>
    </div>

</body>

</html>