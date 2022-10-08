            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>ketua/data_staff">Data staff</a></div>
                    <div class="breadcrumb-item">Detail Staff</div>
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
                            background-image: url("<?php echo base_url('assets/login/img/staff/') . $staff2['foto']; ?>");
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
                            <div class="col-md-12 col-xl-4">
                                <div class="card">
                                    <div class="widget-profile-card-3">
                                        <img class="img-fluid img-thumbnail csa rounded-circle" src="<?php echo base_url('assets/login/img/staff/') . $staff2['foto']; ?>" alt="Profile-user">
                                    </div>
                                    <div class="card-body text-center">
                                        <h3><?= $staff2['nama']; ?></h3>
                                    </div>
                                    <div class="card-footer bg-inverse">
                                        <div class="row text-center">
                                            <div class="col">
                                                <span></span>
                                                <h4></h4>
                                            </div>
                                            <div class="col">
                                                <span></span>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>

                            </div>
                            <div class="col-sm-8">
                                <div class="card" style="height:425px;">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-danger btn-icon" role="button"><i class="fas fa-id-card"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">NIK</div>
                                                <p class="chat-header text-muted"><?= $staff2['nik']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-info btn-icon" role="button"><i class="fas fa-tag"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Alamat</div>
                                                <p class="chat-header text-muted"><?= $staff2['alamat']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-warning btn-icon" role="button"><i class="fas fa-birthday-cake"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Tanggal Lahir</div>
                                                <p class="chat-header text-muted"><?= date('d-m-Y', strtotime($staff2['tanggal_lahir'])); ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-primary btn-icon" role="button"><i class="fas fa-at"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Email</div>
                                                <p class="chat-header text-muted"><?= $staff2['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-success btn-icon" role="button"><i class="fas fa-mobile-alt"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">No Telepon</div>
                                                <p class="chat-header text-muted"><?= $staff2['nomor_telpon']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-secondary btn-icon" role="button"><i class="fas fa-user"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Bergabung Sejak</div>
                                                <p class="chat-header text-muted"><?= date('d F Y H:i', $staff2['date_created']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>ketua/data_staff" class="btn btn-primary float-right">Kembali</a>
                    </div>