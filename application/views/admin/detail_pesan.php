<div class="section-header">
    <h1><?= $title; ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?= base_url(''); ?>admin/pesan">Pesan</a></div>
        <div class="breadcrumb-item">Detail Pesan</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pesan['nama']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $pesan['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telpon</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon" value="<?= $pesan['nomor_telpon']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pesan['alamat']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Dikirim </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="tanggal_kirim" name="tanggal_kirim" value="<?= date('d ', $pesan['tanggal_kirim']) . $bulan_indo[intval(date('m', $pesan['tanggal_kirim']))] . date(' Y', $pesan['tanggal_kirim']); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Pesan</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control summernote-simple" id="isi_pesan" name="isi_pesan" readonly><?= $pesan['isi_pesan'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <a href="<?= base_url(''); ?>admin/pesan" class="btn btn-primary float-right">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>