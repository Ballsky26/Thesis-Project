<div class="section-header">
    <h1><?= $title; ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Validasi Pendaftar Pelatihan</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?php base_url('admin/edit_pendaftar_pelatihan'); ?>" enctype="multipart/form-data">
                    <!-- <form action="" method="POST"> -->
                    <input type="hidden" name="id" value="<?= $peserta_pelatihan['id_peserta'] ?>">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelatihan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Lengkap" value="<?= $peserta_pelatihan['nama_kegiatan']; ?>" readonly>
                            <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Lengkap" value="<?= $peserta_pelatihan['nama_pemilik']; ?>" readonly>
                            <?= form_error('nama_pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Daftar</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="tanggal_daftar" name="tanggal_daftar" placeholder="Masukkan Nama Lengkap" value="<?= date('d-m-Y', strtotime($peserta_pelatihan['tanggal_daftar'])); ?>" readonly>
                            <?= form_error('tanggal_daftar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ubah Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" id="status" name="status">
                                <?php foreach ($status as $status) : ?>
                                    <?php if ($status == $peserta_pelatihan['status']) : ?>
                                        <option value="<?= $status; ?>" selected><?= $status; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $status; ?>"><?= $status; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <a href="<?= base_url(''); ?>admin/pendaftar_pelatihan" class="btn btn-secondary">Batal</a>
                            <button type="submit" name="edit" id="tombol" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>