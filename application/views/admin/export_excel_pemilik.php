<?php
header("Content-type: application/octet-stream/");

header("Content-Disposition: attachment; filename=$title.xls");


header("Pragma: no-cache");

header("Expires: 0");
?>
<h3>Daftar Pemilik UKM Tenant di <br>Technopark Perikanan Kota Pekalongan <b>Tanggal <?= date('d-m-Y'); ?></b></h3>
<table border="1" width="100%">
    <thead>
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
            <?php foreach ($pemilik as $pemilik) : ?>
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