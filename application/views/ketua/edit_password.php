            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Password</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('ketua/edit_password'); ?>" method="post">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Lama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" id="current_password" name=" current_password"" placeholder=" Tulis password lama" autofocus>
                                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Baru</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="Password Minimal 3 Karakter">
                                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ulangi Password Baru</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Password Minimal 3 Karakter">
                                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="<?= base_url(''); ?>admin/dashboard" class="btn btn-secondary">Batal</a>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Ubah Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>