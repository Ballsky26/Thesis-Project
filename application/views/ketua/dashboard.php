<div class="section-header">
    <h1><?= $title; ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
    </div>
</div>
<div class="col-12 mb-4">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <a href="pemilik_tenant">
                            <h4>Pemilik Tenant</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php $pemilik = $this->db->get('pemilik')->num_rows(); ?>
                        <?php echo $pemilik; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <a href="pendaftar_tenant">
                            <h4>Pendaftar Tenant</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php $pendaftar = $this->db->get('pendaftar')->num_rows(); ?>
                        <?php echo $pendaftar; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <a href="pendaftar_pelatihan">
                            <h4>Pendaftar Pelatihan</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php $peserta_pelatihan = $this->db->get('peserta_pelatihan')->num_rows(); ?>
                        <?php echo $peserta_pelatihan; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <a href="pelatihan">
                            <h4>Jadwal Pelatihan</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php $jadwal = $this->db->get('jadwal')->num_rows(); ?>
                        <?php echo $jadwal; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <a href="data_staff">
                            <h4>Staff Pengelola</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php $staff = $this->db->get('staff')->num_rows(); ?>
                        <?php echo $staff; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>