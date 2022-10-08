<?php
header("Content-type: application/octet-stream/");

header("Content-Disposition: attachment; filename=$title.xls");


header("Pragma: no-cache");

header("Expires: 0");
?>
<h3>Laporan Jadwal Pelatihan Tanggal <?= date('d F Y'); ?></h3>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Tanggal Mulai</th>
            <th>Pemateri</th>
            <th>Status</th>
            <th>Kouta</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $i = 1; ?>
            <?php foreach ($jadwal as $ja) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $ja['nama_kegiatan']; ?></td>
            <td><?= $ja['tanggal_mulai']; ?></td>
            <td><?= $ja['pemateri']; ?></td>
            <td><?= $ja['status']; ?></td>
            <td><?= $ja['kouta']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>