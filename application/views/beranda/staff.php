<section id="doctors" class="doctors">
    <div class="container">
        <div class="section-title">
            <h2><?= $title; ?></h2>
        </div>
        <?php foreach ($staff2 as $staff) : ?>
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="<?= base_url('assets/login/img/staff/') . $staff['foto']; ?>" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4><?= $staff['nama']; ?></h4>
                            <span><?= $staff['posisi']; ?></span>
                            <p><?= $staff['alamat']; ?></p>
                            <p> Bergabung Sejak : <?= date('d F Y', $staff['date_created']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <br>
        <a href="<?= base_url(''); ?>beranda" class="btn btn-primary float-right">Kembali</a>
    </div>
</section><!-- End Doctors Section -->