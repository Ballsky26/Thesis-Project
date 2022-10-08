<br>
<div class="section-title">
    <h2><?= $title; ?></h2>
</div>
<div class="card">
    <section id="profil">
        <div class="container-fluid mb-3 wow fadeInRight">
            <div class="row align-items-center">
                <div class="col-lg-6 p-5"><img alt="gambar site plan technopark" class="feature-half-two" src="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk']; ?>" style="width: 500px;" /></div>
                <div class="col-lg-6">
                    <div class="about-box">
                        <div class="title">
                            <h2 class="mb-3"><?= $pemilik['nama_produk']; ?> </h2>
                            <h2 class="mb-3">"<?= $pemilik['tagline_produk']; ?>" </h2>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                            <p><?= $pemilik['profil_usaha']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Gallery</h2>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        </div>
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk2']; ?>" class="venobox" data-gall="gallery-item">
                        <img src="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk2']; ?>" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk3']; ?>" class="venobox" data-gall="gallery-item">
                        <img src="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk3']; ?>" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk4']; ?>" class="venobox" data-gall="gallery-item">
                        <img src="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk4']; ?>" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk5']; ?>" class="venobox" data-gall="gallery-item">
                        <img src="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_produk5']; ?>" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Tentang</h2>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            </div>
            <ul class="timeline">
                <div class="timeline-panel">
                    <div class="timeline-body">
                        <p class="text-muted"><?= $pemilik['tentang_usaha']; ?></p>
                    </div>
                </div>
            </ul>
        </div>
    </section>
    <div class="card-body">
        <style>
            .chat-header {
                font-family: "Mada", sans-serif;
                font-size: 14px;
                color: #686c71;
                font-weight: 400;
                position: relative;
            }

            .btn {
                border-radius: 0.25rem;
                font-size: 14px;
                margin-bottom: 5px;
                margin-right: 10px;
                transition: all 0.3s ease-in-out;
            }

            .btn-icon,
            .drp-icon {
                width: 40px;
                height: 40px;
                padding: 10px 12px;
                border-radius: 50%;
            }

            .csa {
                max-height: 100px;
                min-width: 100px;
                min-height: 100px;
                max-width: 100px;

            }

            .widget-profile-card-3 {
                background-image: url("<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_profil']; ?>");
                background-size: cover;
                padding: 100px 0;
                text-align: center;
            }

            .card {
                box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2);
                transition: 0.3s;
            }
        </style>
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Pemilik UKM Tenant</h2>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-4 mt-2">
                    <div class="card">
                        <div class="widget-profile-card-3">
                            <!-- <img class="img-fluid img-thumbnail csa rounded-circle" src="<?php echo base_url('assets/login/img/gambar/') . $pemilik['foto_profil']; ?>" alt="Profile-user"> -->
                        </div>
                        <div class="card-body text-center">
                            <h3><?= $pemilik['nama_produk']; ?></h3>
                            <p><?= $pemilik['nama_pemilik']; ?></p><i class="icofont-ui-v-card"></i>
                        </div>
                        <div class="card-footer bg-inverse">
                            <div class="row text-center">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 mt-2">
                    <div class="card" style="height:450px;">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-left">
                                    <a class="btn btn-outline-danger btn-icon" role="button"><i class="icofont-shopping-cart"></i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header">Tagline Produk</div>
                                    <p class="chat-header text-muted"><?= $pemilik['tagline_produk']; ?></p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a class="btn btn-outline-danger btn-icon" role="button"><i class="icofont-prestashop"></i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header">Deskripsi Produk</div>
                                    <p class="chat-header text-muted"><?= $pemilik['deskripsi_produk']; ?></p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a class="btn btn-outline-info btn-icon" role="button"><i class="icofont-birthday-cake"></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header">Tanggal Lahir</div>
                                    <p class="chat-header text-muted"><?= date('d-m-Y', strtotime($pemilik['tanggal_lahir'])); ?></p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a class="btn btn-outline-info btn-icon" role="button"><i class="icofont-users-alt-4"></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header">Jenis Kelamin</div>
                                    <p class="chat-header text-muted"><?= $pemilik['jenis_kelamin']; ?></p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a class="btn btn-outline-info btn-icon" role="button"><i class="icofont-address-book"></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header">Alamat</div>
                                    <p class="chat-header text-muted"><?= $pemilik['alamat']; ?></p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a class="btn btn-outline-primary btn-icon" role="button"><i class="icofont-email"></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header">Email</div>
                                    <p class="chat-header text-muted"><?= $pemilik['email']; ?></p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a class="btn btn-outline-success btn-icon" role="button"><i class="icofont-phone"></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header">No Telepon</div>
                                    <p class="chat-header text-muted"><?= $pemilik['nomor_telpon']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?= base_url(''); ?>beranda/ukm_tenant" class="btn btn-primary float-right">Kembali</a>
    </div>
</div>


</div>