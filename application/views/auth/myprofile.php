<div class="main-wrapper">
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= $title; ?></h1>
            </div>
            <div class="section-body">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="card-body">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= base_url('assets/login/img/avatar/') . $user['image']; ?>" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Heading</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url(''); ?>assets/login/img/news/img07.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Heading</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url(''); ?>assets/login/img/news/img08.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Heading</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama Pengguna : <?= $user['name']; ?></li>
                    <li class="list-group-item">Email : <?= $user['email']; ?></li>
                    <li class="list-group-item">Bergabung Sejak : <?= date('d F Y', $user['date_created']); ?></li>
                </ul>
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