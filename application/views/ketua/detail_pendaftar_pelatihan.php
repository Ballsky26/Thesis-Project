<div class="section-header">
    <h1><?= $title; ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?= base_url(''); ?>ketua/pendaftar_pelatihan">Data Pendaftar Pelatihan</a></div>
        <div class="breadcrumb-item">Detail Pendaftar Pelatihan</div>
    </div>
</div>
<div class="card">

    <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card-header">
                    <h5>Detail Informasi Peserta Pelatihan</h5>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <div class="chat-header">Nama Peserta Pelatihan</div>
                            <p class="chat-header text-muted"><?= $peserta_pelatihan['nama_pemilik']; ?></p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div class="chat-header">Pelatihan Yang Di Ikuti</div>
                            <p class="chat-header text-muted"><?= $peserta_pelatihan['nama_kegiatan']; ?></p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div class="chat-header">Tanggal Daftar Pelatihan</div>
                            <p class="chat-header text-muted">
                                <td><?= date('d-m-Y', strtotime($peserta_pelatihan['tanggal_daftar'])); ?></td>
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div class="chat-header">Status Pendaftaran</div>
                            <p class="chat-header text-muted">
                                <?php
                                if ($peserta_pelatihan['status'] == 'Proses') {
                                    echo '<span class="badge badge-warning">Proses</span>';
                                } elseif ($peserta_pelatihan['status'] == 'Acc') {
                                    echo  '<span class="badge badge-success">Acc</span>';
                                } elseif ($peserta_pelatihan['status'] == 'Tolak') {
                                    echo  '<span class="badge badge-danger">Tolak</span>';
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?= base_url(''); ?>ketua/pendaftar_pelatihan" class="btn btn-info float-right">Kembali</a>
    </div>
</div>