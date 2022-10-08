            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>pendaftar/dashboard">Dashboard</a></div>
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
                            background-image: url("<?php echo base_url('assets/login/img/gambar/') . $pendaftar['foto_profil']; ?>");
                            background-size: cover;
                            padding: 50px 0;
                            text-align: center;
                        }

                        .card {
                            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2);
                            transition: 0.3s;
                        }
                    </style>
                    <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-xl-4">
                                <div class="card">
                                    <div class="widget-profile-card-3">
                                        <img class="img-fluid img-thumbnail csa rounded-circle" src="<?php echo base_url('assets/login/img/gambar/') . $pendaftar['foto_profil']; ?>">
                                    </div>
                                    <div class="card-body text-center">
                                        <h3><?= $pendaftar['nama_pemilik']; ?></h3>
                                        <p> Status :
                                            <?php
                                            if ($pendaftar['status'] == 'Diproses') {
                                                echo '<span class="badge badge-warning">Diproses</span>';
                                            } elseif ($pendaftar['status'] == 'Diterima') {
                                                echo  '<span class="badge badge-success">Diterima</span>';
                                            } elseif ($pendaftar['status'] == 'Ditolak') {
                                                echo  '<span class="badge badge-danger">Ditolak</span>';
                                            }
                                            ?>
                                    </div>
                                    <div class="card-footer bg-inverse">
                                        <div class="row text-center">
                                            <div class="col">
                                                <span>Foto KTP :</span>
                                                <?php
                                                if ($pendaftar['foto_ktp'] != null) { ?>
                                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/login/img/gambar/') . $pendaftar['foto_ktp']; ?>">
                                                <?php
                                                } else {
                                                ?>
                                                    <i style="color: red;">*</i> <i>Tidak Ada Data</i><br>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="col">
                                                <span>Foto Produk :</span>
                                                <?php
                                                if ($pendaftar['foto_produk'] != null) { ?>
                                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/login/img/gambar/') . $pendaftar['foto_produk']; ?>">
                                                <?php
                                                } else {
                                                ?>
                                                    <i style="color: red;">*</i> <i>Tidak Ada Data</i><br>
                                                <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>

                            </div>
                            <div class="col-sm-8">
                                <div class="card mt-1" style="height:800px;">
                                    <div class="card-header">
                                        <h5>Detail Informasi <?= $pendaftar['nama_pemilik']; ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-danger btn-icon" role="button"><i class="fas fa-id-card"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">NIK</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['nik']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-info btn-icon" role="button"><i class="fas fa-tag"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Alamat</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['alamat']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-warning btn-icon" role="button"><i class="fas fa-birthday-cake"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Tanggal Lahir</div>
                                                <p class="chat-header text-muted"><?= date('d-m-Y', strtotime($pendaftar['tanggal_lahir'])); ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-primary btn-icon" role="button"><i class="fas fa-at"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Email</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-secondary btn-icon" role="button"><i class="fas fa-venus-mars"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Jenis Kelamin</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['jenis_kelamin']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-success btn-icon" role="button"><i class="fas fa-mobile-alt"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">No Telepon</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['nomor_telpon']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-success btn-icon" role="button"><i class="fas fa-store"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Nama Produk</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['nama_produk']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-success btn-icon" role="button"><i class="fas fa-closed-captioning"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Tagline Produk</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['tagline_produk']; ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="btn btn-outline-success btn-icon" role="button"><i class="fas fa-scroll"></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="chat-header">Deskripsi Produk</div>
                                                <p class="chat-header text-muted"><?= $pendaftar['deskripsi_produk']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tickets">
                                            <div class="ticket-items" id="ticket-items">
                                                <div class="ticket-item active">
                                                    <div class="ticket-title">
                                                        <h4>Mohon Lengkapi Data Anda Apabila Belum Lengkap</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ticket-content">
                                                <p>Keterangan :</p>
                                                <span class="badge badge-warning">Diproses </span><a> : Mohon Menunggu, Karena Staff Sedang Memproses Pendaftaran.</p>
                                                    <span class="badge badge-danger">Ditolak </span><a> : Apabila Ditolak Mohon Memperbaiki Data Yang Sudah Anda Isi, atau Pendaftaran Penuh/Daftar Ulang.</p>
                                                        <span class="badge badge-success">Diterima </span><a> : Silahkan Datang ke Technopark Perikanan Kota Pekalongan Secepatnya Untuk Diwawancarai.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <script>
                var flash = $('#flash').data('flash');
                if (flash) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data Berhasil ' + flash
                    })
                }
                $('.tombol-hapus').on('click', function(e) {
                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah Anda Yakin?',
                        text: "Data ini akan Dihapus",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                        }
                    })

                });
            </script>