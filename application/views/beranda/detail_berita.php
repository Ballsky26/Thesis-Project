<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="tickets">
                            <div class="ticket-content">
                                <div class="ticket-header">
                                    <div class="ticket-detail">
                                        <div class="ticket-title">
                                            <h3><?= $berita['judul']; ?></h3>
                                            <p><?= $berita['kategori']; ?> <?= date('d F Y H:i:s', $berita['tanggal_terbit']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-description">
                                    <img src="<?php echo base_url('assets/login/img/berita/') . $berita['gambar']; ?>" alt="Gambar" width="1000" height="500">
                                    <div class="ticket-divider"></div>
                                    <br>
                                    <p><?= $berita['isi_berita']; ?></p>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url(''); ?>beranda" class="btn btn-primary float-primary">Kembali</a>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>