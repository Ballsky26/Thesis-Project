            <div class="section-header">
                <h1><?= $title; ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url(''); ?>ketua/pelatihan">Jadwal Pelatihan</a></div>
                    <div class="breadcrumb-item">Detail Jadwal Pelatihan</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Pendaftaran Pelatihan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Pelatihan : </th>
                                        <th scope="col"><?= $jadwal['nama_kegiatan']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tanggal Pelaksanaan : </th>
                                        <th scope="col"><?= date('d-m-Y', strtotime($jadwal['tanggal_mulai'])); ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Waktu Pelaksanaan : </th>
                                        <th scope="col"><?= $jadwal['waktu']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Pemateri : </th>
                                        <th scope="col"><a href="<?= base_url('/assets/login/img/jadwal/profil_pemateri/' . $jadwal['profil_pemateri']); ?>"><?= $jadwal['pemateri']; ?></a></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tempat Pelatihan : </th>
                                        <th scope="col"><?= $jadwal['tempat']; ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Materi Pelatihan :</th>
                                        <th scope="col"><a href="<?= base_url('/assets/login/img/materi_pelatihan/' . $jadwal['materi_pelatihan']); ?>">Unduh Disini</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Persyaratan : </th>
                                    </tr>
                                    <tr>
                                        <th>Kriteria Peserta</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">1. Sudah menjadi Pemilik atau bergabung dalam program UKM Tenant di Technopark Perikanan Kota Pekalongan</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">2. Sudah melengkapi profil yang ada di menu profile</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">3. Belum pernah mengikuti pelatihan</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th class="alert alert-success" role="alert">Bila ingin mengikuti Pelatihan, Harus terlebih dahulu menjadi Pemilik Tenant</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= base_url(''); ?>ketua/pelatihan" class="btn btn-info">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>