            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/pelatihan">Jadwal Pelatihan</a></div>
                    <div class="breadcrumb-item">Form Edit Jadwal Pelatihan</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?php base_url('admin/edit_pelatihan'); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $jadwal['id'] ?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kegiatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="<?= $jadwal['nama_kegiatan']; ?>
                                        ">
                                        <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Mulai</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo $jadwal['tanggal_mulai'];  ?>">
                                        <?= form_error('tanggal_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Waktu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" id="waktu" name="waktu">
                                            <?php foreach ($waktu as $waktu) : ?>
                                                <?php if ($waktu == $jadwal['waktu']) : ?>
                                                    <option value="<?= $waktu; ?>" selected><?= $waktu; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $waktu; ?>"><?= $waktu; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pemateri</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="pemateri" name="pemateri" placeholder="Masukkan Nama Pemateri" value="<?= $jadwal['pemateri']; ?>">
                                        <?= form_error('pemateri', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Pelatihan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan Nama Tempat Pelatihan" value="<?= $jadwal['tempat']; ?>">
                                        <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Materi Pelatihan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="materi_pelatihan" class="custom-file-input" id="materi_pelatihan">
                                            <?= form_error('materi_pelatihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label"><?= $jadwal['materi_pelatihan']; ?></label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran File Maksimal 2MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Profil Pemateri</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('/assets/login/img/jadwal/profil_pemateri/') . $jadwal['profil_pemateri']; ?>" class="img-thumbnail" width="250">
                                        <hr>
                                        <div class="custom-file">
                                            <input type="file" name="profil_pemateri" class="custom-file-input" id="profil_pemateri">
                                            <?= form_error('profil_pemateri', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <label class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran Gambar Maksimal 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" id="status" name="status">
                                            <?php foreach ($status as $s) : ?>
                                                <?php if ($s == $jadwal['status']) : ?>
                                                    <option value="<?= $s; ?>" selected><?= $s; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $s; ?>"><?= $s; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="<?= base_url(''); ?>admin/pelatihan" class="btn btn-secondary">Batal</a>
                                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>