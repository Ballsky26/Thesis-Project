            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/pemilik_tenant">Data Pemilik Tenant</a></div>
                    <div class="breadcrumb-item">Form Tambah Data Pemilik Tenant</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart('admin/tambah_pemilik'); ?>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
                                    <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tagline Produk</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="tagline_produk" name="tagline_produk" placeholder="Masukkan Tagline Produk">
                                    <?= form_error('tagline_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Produk</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk">
                                    <?= form_error('deskripsi_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Induk Kependudukan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pemilik</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Pemilik">
                                    <?= form_error('nama_pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" id="status" name="jenis_kelamin">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telpon</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" id="nomor_telpon" name="nomor_telpon" placeholder="Masukkan Nomor Telpon">
                                    <?= form_error('nomor_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="password" class="form-control" data-indicator="pwindicator" id="password1" name="password1" placeholder="Masukkan Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ulangi Password</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukkan Kembali Password">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Profil Usaha</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea type="text" class="form-control" id="profil_usaha" name="profil_usaha" placeholder="Masukkan Isi Profil Usaha"></textarea>
                                    <?= form_error('profil_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tentang Usaha</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea type="text" class="form-control" id="tentang_usaha" name="tentang_usaha" placeholder="Masukkan Isi Tentang Usaha"></textarea>
                                    <?= form_error('tentang_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
                                <div class="col-sm-12 col-md-7">
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
                                    <a href="<?= base_url(''); ?>admin/pemilik_tenant" class="btn btn-secondary">Batal</a>
                                    <button type="submit" name="tambah" id="tombol" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            </form>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>