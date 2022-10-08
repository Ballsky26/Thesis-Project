            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/berita">Berita</a></div>
                    <div class="breadcrumb-item">Form Edit Berita</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?php base_url('admin/edit_berita'); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $berita['id'] ?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Berita</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Berita" value="<?= $berita['judul']; ?>">
                                        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" id="kategori" name="kategori">
                                            <?php foreach ($kategori as $kategori) : ?>
                                                <?php if ($kategori == $berita['kategori']) : ?>
                                                    <option value="<?= $kategori; ?>" selected><?= $kategori; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $kategori; ?>"><?= $kategori; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Berita</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control summernote-simple" id="isi_berita" name="isi_berita"><?= $berita['isi_berita'] ?></textarea>
                                        <?= form_error('isi_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img src="<?= base_url('assets/login/img/berita/') . $berita['gambar']; ?>" class="img-thumbnail" width="250">
                                        <hr>
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
                                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>