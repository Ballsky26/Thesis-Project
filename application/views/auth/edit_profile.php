<div class="main-wrapper">
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= $title; ?></h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?= form_open_multipart('user/edit_profile'); ?>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Gambar</label>
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/login/img/avatar/') . $user['image']; ?>" class="img-thumbnail">
                                    <br>
                                    <div class="col-sm-12 col-md-8">
                                        <br>
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</section>
<footer class="main-footer">
    <div class="footer-right">
        <span>Copyright &copy; Technopark Perikanan Kota Pekalongan <?= date('Y'); ?></span>
    </div>
</footer>
</div>
</div>
</footer>