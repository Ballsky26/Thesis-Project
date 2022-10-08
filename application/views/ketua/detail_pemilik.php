            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>ketua/pemilik_tenant">Data Pemilik Tenant</a></div>
                    <div class="breadcrumb-item">Detail Pemilik Tenant</div>
                </div>
            </div>
            <div class="card">
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
                            background-image: url("<?php echo base_url('assets/login/img/pemilik/') . $pemilik['foto_produk']; ?>");
                            background-size: cover;
                            padding: 50px 0;
                            text-align: center;
                        }

                        .card {
                            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2);
                            transition: 0.3s;
                        }
                    </style>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-xl-4 mt-2">
                                <div class="card">
                                    <div class="widget-profile-card-3">
                                        <img class="img-fluid img-thumbnail csa rounded-circle" src="<?php echo base_url('assets/login/img/pemilik/') . $pemilik['foto_profil']; ?>" alt="Profile-user">
                                    </div>
                                    <div class="card-body text-center">
                                        <h3><?= $pemilik['nama_produk']; ?></h3>
                                        <p><?= $pemilik['nama_pemilik']; ?></p>
                                    </div>
                                    <div class="card-footer bg-inverse">
                                        <div class="row text-center">
                                            <div class="col">
                                                <span>Foto KTP :</span>
                                                <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/login/img/pemilik/') . $pemilik['foto_ktp'];  ?>" alt="Foto KTP">
                                            </div>
                                            <div class="col">
                                                <span>Foto Produk :</span>
                                                <?php
                                                if ($pemilik['foto_produk'] != null) { ?>
                                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/login/img/pemilik/') . $pemilik['foto_produk']; ?>" alt="Foto Produk">
                                                <?php
                                                } else {
                                                ?>
                                                    <i>*Tidak Ada Data</i><br>
                                                <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>

                            </div>
                            <div class="col-sm-8 mt-2">
                                <div class="card" style="height:565px;">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-danger btn-icon" role="button"><i class="fas fa-closed-captioning"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Tagline Produk</div>
                                                <p class="chat-header text-muted"><?= $pemilik['tagline_produk']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-danger btn-icon" role="button"><i class="fas fa-scroll"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Deskripsi Produk</div>
                                                <p class="chat-header text-muted"><?= $pemilik['deskripsi_produk']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-primary btn-icon" role="button"><i class="fas fa-id-card"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">NIK</div>
                                                <p class="chat-header text-muted"><?= $pemilik['nik']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-info btn-icon" role="button"><i class="fas fa-birthday-cake"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Tanggal Lahir</div>
                                                <p class="chat-header text-muted"><?= date('d-m-Y', strtotime($pemilik['tanggal_lahir'])); ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-info btn-icon" role="button"><i class="fas fa-venus-mars"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Jenis Kelamin</div>
                                                <p class="chat-header text-muted"><?= $pemilik['jenis_kelamin']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-info btn-icon" role="button"><i class="fas fa-tag"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Alamat</div>
                                                <p class="chat-header text-muted"><?= $pemilik['alamat']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-primary btn-icon" role="button"><i class="fas fa-at"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Email</div>
                                                <p class="chat-header text-muted"><?= $pemilik['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-success btn-icon" role="button"><i class="fas fa-mobile-alt"></i>
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
                    <a href="<?= base_url(''); ?>ketua/pemilik_tenant" class="btn btn-info float-right">Kembali</a>
                </div>
            </div>