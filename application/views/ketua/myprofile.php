            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">My Profile</div>
                </div>
            </div>
            <div class="section-body">
                <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="card-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="<?= base_url('assets/login/img/staff/') . $staff['foto']; ?>" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Tempat Lahir</div>
                                        <div class="profile-widget-item-value"><?= $staff['tempat_lahir']; ?></div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Tanggal Lahir</div>
                                        <div class="profile-widget-item-value"><?= $staff['tanggal_lahir']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name"><?= $staff['nama']; ?><div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> <?= $staff['posisi']; ?>
                                    </div>
                                </div>
                                <?= $staff['bio']; ?>
                            </div>
                            <hr>
                            <div class="card-footer text-left">
                                <div class="font-weight-bold mb-2">Biodata Saya</div>
                                <div class="font-weight mb-2">Nik : </div>
                                <?= $staff['nik']; ?>
                                <hr>
                                <div class="font-weight mb-2">Email : </div>
                                <?= $staff['email']; ?>
                                <hr>
                                <div class="font-weight mb-2">Nik : </div>
                                <?= $staff['nik']; ?>
                                <hr>
                                <div class="font-weight mb-2">Alamat : </div>
                                <?= $staff['alamat']; ?>
                                <hr>
                                <div class="font-weight mb-2">Nomor Telpon : </div>
                                <?= $staff['nomor_telpon']; ?>
                                <hr>
                                <div class="font-weight mb-2">Bergabung Sejak : </div>
                                <?= date('d F Y', $staff['date_created']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card">
                            <form method="post" action="<?php base_url('ketua/myprofile'); ?>" enctype="multipart/form-data">
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $staff['nama'] ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $staff['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $staff['tanggal_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Bio</label>
                                            <textarea class="form-control summernote-simple" id="bio" name="bio"><?= $staff['bio'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $staff['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Nomor Induk Kependudukan</label>
                                            <input type="number" class="form-control" id="nik" name="nik" value="<?= $staff['nik'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Nomor Telpon</label>
                                            <input type="number" class="form-control" id="nomor_telpon" name="nomor_telpon" value="<?= $staff['nomor_telpon'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $staff['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Foto Profil</label>
                                            <img src="<?= base_url('assets/login/img/staff/') . $staff['foto']; ?>" class="img-thumbnail">
                                            <div class="col-sm-12">
                                                <br>
                                                <div class="col-sm-12">
                                                    <div class="custom-file">
                                                        <input type="file" name="foto" class="custom-file-input" id="foto">
                                                        <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        <label class="custom-file-label">Pilih Gambar</label>
                                                    </div>
                                                    <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="<?= base_url(''); ?>ketua/dashboard" class="btn btn-secondary">Batal</a>
                                        <button type="submit" name="edit" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
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