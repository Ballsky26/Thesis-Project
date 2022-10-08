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
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Tagline Produk</th>
                                        <th scope="col">Nama Pemilik</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pemilik as $p) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $p['nama_produk']; ?></td>
                                            <td><?= $p['tagline_produk']; ?></td>
                                            <td><?= $p['nama_pemilik']; ?></td>
                                            <td>
                                                <a href="<?= base_url('beranda/detail_pemilik/' . $p['id']); ?>" class="badge badge-info">Lihat Detail</i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <a href="<?= base_url(''); ?>beranda" class="btn btn-primary float-right">Kembali</a>
        </div>
    </div>