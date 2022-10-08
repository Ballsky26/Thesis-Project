            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/berita">Berita</a></div>
                    <div class="breadcrumb-item">Detail Berita</div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="container-fluid">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                                        <i class="fas fa-list"></i> Detail Berita
                                    </a>
                                    <div class="tickets">
                                        <div class="ticket-content">
                                            <div class="ticket-header">
                                                <div class="ticket-detail">
                                                    <div class="ticket-title">
                                                        <h3><?= $berita['judul']; ?></h3>
                                                        <span class="badge badge-primary"> <?= date('d ', $berita['tanggal_terbit']) . $bulan_indo[intval(date('m', $berita['tanggal_terbit']))] . date(' Y', $berita['tanggal_terbit']); ?></span>
                                                        <span class="badge badge-success"> <?= $berita['kategori']; ?></< /span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ticket-description">
                                                <img src="<?php echo base_url('assets/login/img/berita/') . $berita['gambar']; ?>" alt="Gambar" class="img-fluid" alt="Responsive image">
                                                <div class="ticket-divider"></div>
                                                <br>
                                                <p><?= $berita['isi_berita']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url(''); ?>admin/berita" class="btn btn-info float-right">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>