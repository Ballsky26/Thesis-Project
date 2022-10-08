        <section class="section">
            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/pelatihan">Jadwal Pelatihan</a></div>
                    <div class="breadcrumb-item">Form Tambah Jadwal Pelatihan</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart('admin/tambah_pelatihan'); ?>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kegiatan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                                    <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Mulai</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                    <?= form_error('tanggal_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Waktu</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" id="waktu" name="waktu">
                                        <option>08.00-08.45</option>
                                        <option>08.45-09.30</option>
                                        <option>09.30-09.45</option>
                                        <option>09.45-10.30</option>
                                        <option>10.30-11.15</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pemateri</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="pemateri" name="pemateri" placeholder="Masukkan Nama Pemateri">
                                    <?= form_error('pemateri', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Pelatihan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan Nama Tempat Pelatihan">
                                    <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Materi Pelatihan</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" name="materi_pelatihan" class="custom-file-input" id="materi_pelatihan">
                                        <?= form_error('materi_pelatihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label class="custom-file-label">Pilih File</label>
                                    </div>
                                    <div class="form-text text-muted">Ukuran File Maksimal 2MB</div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Profil Pemateri</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" name="profil_pemateri" class="custom-file-input" id="profil_pemateri">
                                        <?= form_error('profil_pemateri', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label class="custom-file-label">Pilih File</label>
                                    </div>
                                    <div class="form-text text-muted">Ukuran File Maksimal 2MB</div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" id="status" name="status">
                                        <option>Buka</option>
                                        <option>Tutup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <a href="<?= base_url(''); ?>admin/pelatihan" class="btn btn-secondary">Batal</a>
                                    <button type="submit" name="tambah" id="tombol" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>