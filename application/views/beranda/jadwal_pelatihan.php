    <br>
    <div class="section-title">
        <h2><?= $title; ?></h2>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix mb-3"></div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pelatihan</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <!-- <th scope="col">Waktu</th> -->
                                        <!-- <th scope="col">Pemateri</th> -->
                                        <!-- <th scope="col">Kouta</th> -->
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pelatihan as $p) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $p['nama_kegiatan']; ?></td>
                                            <td><?= $p['tanggal_mulai']; ?></td>
                                            <!-- <td><?= $p['waktu']; ?></td> -->
                                            <!-- <td><?= $p['kouta']; ?></td> -->
                                            <!-- <td><?= $p['pemateri']; ?></td> -->
                                            <td> <?php
                                                    if ($p['status'] == 'Buka') {
                                                        echo '<span class="badge badge-success">Buka</span>';
                                                    } elseif ($p['status'] == 'Tutup') {
                                                        echo  '<span class="badge badge-danger">Tutup</span>';
                                                    }
                                                    ?></td>
                                            <td>
                                                <?php if ($p['status'] == 'Buka') : ?>
                                                    <a title="Detail" href="<?= base_url('beranda/detail_jadwal_pelatihan/' . $p['id']); ?>" class="badge badge-info">Lihat Detail<i class="fas fa-info"></i></a>
                                                <?php else : ?>
                                                    <p>Pendaftaran Tutup</p>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url(''); ?>beranda" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>