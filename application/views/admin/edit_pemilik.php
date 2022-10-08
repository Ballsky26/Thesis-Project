            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/pemilik_tenant">Data Pemilik Tenant</a></div>
                    <div class="breadcrumb-item">Form Edit Data Pemilik Tenant</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?php base_url('admin/edit_pemilik'); ?>" enctype="multipart/form-data">
                                <!-- <form action="" method="POST"> -->
                                <input type="hidden" name="id" value="<?= $pemilik['id'] ?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= $pemilik['nama_produk']; ?>">
                                        <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tagline Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="tagline_produk" name="tagline_produk" placeholder="Masukkan Tagline Produk" value="<?= $pemilik['tagline_produk']; ?>">
                                        <?= form_error('tagline_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk" value="<?= $pemilik['deskripsi_produk']; ?>">
                                        <?= form_error('deskripsi_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Induk Kependudukan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik" value="<?= $pemilik['nik']; ?>">
                                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pemilik</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Pemilik" value="<?= $pemilik['nama_pemilik']; ?>">
                                        <?= form_error('nama_pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" id="jenis_kelamin" name="jenis_kelamin">
                                            <?php foreach ($jenis_kelamin as $jeniskel) : ?>
                                                <?php if ($jeniskel == $pemilik['jenis_kelamin']) : ?>
                                                    <option value="<?= $jeniskel; ?>" selected><?= $jeniskel; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $jeniskel; ?>"><?= $jeniskel; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Alamat" value="<?= $pemilik['tanggal_lahir']; ?>">
                                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $pemilik['alamat']; ?>">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telpon</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" id="nomor_telpon" name="nomor_telpon" placeholder="Masukkan Nomor Telpon" value="<?= $pemilik['nomor_telpon']; ?>">
                                        <?= form_error('nomor_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $pemilik['email']; ?>" readonly>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Profil Usaha</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control summernote-simple" id="profil_usaha" name="profil_usaha"><?= $pemilik['profil_usaha'] ?></textarea>
                                        <?= form_error('profil_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tentang Usaha</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control summernote-simple" id="tentang_usaha" name="tentang_usaha"><?= $pemilik['tentang_usaha'] ?></textarea>
                                        <?= form_error('tentang_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pemilik['foto_profil']; ?>" class="img-thumbnail" width="250">
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
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pemilik['foto_ktp']; ?>" class="img-thumbnail" width="250">
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Produk 1</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pemilik['foto_produk']; ?>" class="img-thumbnail" width="250">
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Produk 2</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pemilik['foto_produk2']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="foto_produk2" class="custom-file-input" id="foto_produk2">
                                            <?= form_error('foto_produk2', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Produk 3</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pemilik['foto_produk3']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="foto_produk3" class="custom-file-input" id="foto_produk3">
                                            <?= form_error('foto_produk3', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Produk 4</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pemilik['foto_produk4']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="foto_produk4" class="custom-file-input" id="foto_produk4">
                                            <?= form_error('foto_produk4', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Produk 5</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/gambar/') . $pemilik['foto_produk5']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="foto_produk5" class="custom-file-input" id="foto_produk5">
                                            <?= form_error('foto_produk5', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="<?= base_url(''); ?>admin/pemilik_tenant" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" name="tambah" id="tombol" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>