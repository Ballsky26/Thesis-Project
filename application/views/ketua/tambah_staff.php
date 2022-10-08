            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>ketua/data_staff">Data Staff</a></div>
                    <div class="breadcrumb-item">Form Tambah Data Staff</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart('ketua/tambah_staff'); ?>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Induk Kependudukan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nomor NIK">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Posisi</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Masukkan Posisi Staff">
                                    <?= form_error('posisi', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="foto">
                                        <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label class="custom-file-label">Pilih Gambar</label>
                                    </div>
                                    <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <a href="<?= base_url(''); ?>ketua/data_staff" class="btn btn-secondary">Batal</a>
                                    <button type="submit" name="tambah" id="tombol" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            </form>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>