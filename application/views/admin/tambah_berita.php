            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/berita">Berita</a></div>
                    <div class="breadcrumb-item">Form Tambah Berita</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart('admin/tambah_berita'); ?>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul berita</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Berita">
                                    <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Berita</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" id="kategori" name="kategori">
                                        <option>Pengumuman</option>
                                        <option>Berita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Berita</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea type="text" class="form-control" id="isi_berita" name="isi_berita" placeholder="Masukkan Isi Berita"></textarea>
                                    <?= form_error('isi_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                        <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label class="custom-file-label">Pilih Gambar</label>
                                    </div>
                                    <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <a href="<?= base_url(''); ?>admin/berita" class="btn btn-secondary">Batal</a>
                                    <button type="submit" name="tambah" id="tombol" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>