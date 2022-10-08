<div class="section-header">
    <h1><?= $title; ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?= base_url(''); ?>ketua/data_staff">Data Staff</a></div>
        <div class="breadcrumb-item">Form Edit Data Staff</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?php base_url('ketua/edit_staff'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $staff2['id'] ?>">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Induk Kependudukan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nomor NIK" value="<?= $staff2['nik'] ?>">
                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="<?= $staff2['nama'] ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $staff2['tempat_lahir'] ?>">
                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= $staff2['tanggal_lahir'] ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $staff2['alamat'] ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telpon</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control" id="nomor_telpon" name="nomor_telpon" placeholder="Masukkan Nomor Telpon" value="<?= $staff2['nomor_telpon'] ?>">
                            <?= form_error('nomor_telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Posisi</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Masukkan Posisi Staff" value="<?= $staff2['posisi'] ?>">
                            <?= form_error('posisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $staff2['email'] ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
                        <div class="col-sm-12 col-md-7">
                            <img src="<?= base_url('assets/login/img/staff/') . $staff2['foto']; ?>" class="img-thumbnail" width="250">
                            <hr>
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
            </div>
        </div>
    </div>