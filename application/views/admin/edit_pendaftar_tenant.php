            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Validasi Pendaftar Tenant</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?php base_url('admin/edit_pendaftar_tenant'); ?>" enctype="multipart/form-data">
                                <!-- <form action="" method="POST"> -->
                                <input type="hidden" name="id" value="<?= $pendaftar['id'] ?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Induk Kependudukan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nomor Nik" value="<?= $pendaftar['nik']; ?>" readonly>
                                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Lengkap" value="<?= $pendaftar['nama_pemilik']; ?>" readonly>
                                        <?= form_error('nama_pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" id="jenis_kelamin" name="jenis_kelamin">
                                            <?php foreach ($jenis_kelamin as $jenis_kelamin) : ?>
                                                <?php if ($jenis_kelamin == $pemilik['jenis_kelamin']) : ?>
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
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $pendaftar['alamat']; ?>" readonly>
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
                                        <input type="number" class="form-control" id="nomor_telpon" name="nomor_telpon" placeholder="Masukkan Nomor Telpon" value="<?= $pendaftar['nomor_telpon']; ?>" readonly>
                                        <?= form_error('nomor_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= $pendaftar['tanggal_lahir']; ?>" readonly>
                                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= $pendaftar['nama_produk']; ?>" readonly>
                                        <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tagline Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="tagline_produk" name="tagline_produk" placeholder="Masukkan Tagline Produk" value="<?= $pendaftar['tagline_produk']; ?>" readonly>
                                        <?= form_error('tagline_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk" value="<?= $pendaftar['deskripsi_produk']; ?>" readonly>
                                        <?= form_error('deskripsi_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 col-md-7">
                                        <input type="hidden" class="form-control" id="password" name="password" placeholder="Masukkan Deskripsi Produk" value="<?= $pendaftar['password']; ?>" readonly>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ubah Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" id="status" name="status">
                                            <?php foreach ($status as $status) : ?>
                                                <?php if ($status == $pendaftar['status']) : ?>
                                                    <option value="<?= $status; ?>" selected><?= $status; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $status; ?>"><?= $status; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/login/img/gambar/') . $pendaftar['foto_profil']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="foto_profil" class="form-control" id="foto_profil" for="foto_profil" value="<?= $pendaftar['foto_profil']; ?>">
                                            </div>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/login/img/gambar/') . $pendaftar['foto_ktp']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="foto_ktp" class="form-control" id="foto_ktp" for="foto_ktp" value="<?= $pendaftar['foto_ktp']; ?>">
                                            </div>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/login/img/gambar/') . $pendaftar['foto_produk']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="foto_produk" class="form-control" id="foto_produk" for="foto_produk" value="<?= $pendaftar['foto_produk']; ?>">
                                            </div>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="<?= base_url(''); ?>admin/pendaftar_tenant" class="btn btn-secondary">Batal</a>
                                        <button type="submit" name="edit" id="tombol" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>