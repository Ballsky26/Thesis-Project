            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>pendaftar/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Profile Pendaftar</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?php base_url('pendaftar/edit_profile'); ?>" enctype="multipart/form-data">
                                <!-- <form action="" method="POST"> -->
                                <input type="hidden" name="id" value="<?= $pendaftar['id'] ?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Induk Kependudukan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nomor Nik" value="<?= $pendaftar['nik']; ?>">
                                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Lengkap" value="<?= $pendaftar['nama_pemilik']; ?>">
                                        <?= form_error('nama_pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" id="jenis_kelamin" name="jenis_kelamin">
                                            <?php foreach ($jenis_kelamin as $jenis_kelamin) : ?>
                                                <?php if ($jenis_kelamin == $pendaftar['jenis_kelamin']) : ?>
                                                    <option value="<?= $jenis_kelamin; ?>" selected><?= $jenis_kelamin; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $jenis_kelamin; ?>"><?= $jenis_kelamin; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $pendaftar['alamat']; ?>">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Nama Email" value="<?= $pendaftar['email']; ?>" readonly>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telpon</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" id="nomor_telpon" name="nomor_telpon" placeholder="Masukkan Nomor Telpon" value="<?= $pendaftar['nomor_telpon']; ?>">
                                        <?= form_error('nomor_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= $pendaftar['tanggal_lahir']; ?>">
                                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= $pendaftar['nama_produk']; ?>">
                                        <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tagline Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="tagline_produk" name="tagline_produk" placeholder="Masukkan Tagline Produk" value="<?= $pendaftar['tagline_produk']; ?>">
                                        <?= form_error('tagline_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk" value="<?= $pendaftar['deskripsi_produk']; ?>">
                                        <?= form_error('deskripsi_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pendaftar['foto_profil']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="foto_profil" class="custom-file-input" id="foto_profil">
                                            <?= form_error('foto_profil', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto KTP</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pendaftar['foto_ktp']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="foto_ktp" class="custom-file-input" id="foto_ktp">
                                            <?= form_error('foto_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pendaftar['foto_produk']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="foto_produk" class="custom-file-input" id="foto_produk">
                                            <?= form_error('foto_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="<?= base_url(''); ?>pendaftar/dashboard" class="btn btn-secondary">Batal</a>
                                        <button type="submit" name="edit" id="tombol" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>