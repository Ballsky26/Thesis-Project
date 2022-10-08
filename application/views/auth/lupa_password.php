<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 mt-3">
                        <img src="<?= base_url(''); ?>assets/login/img/background_logo/logokotapekalongan.png" height="100">
                        <img src="<?= base_url(''); ?>assets/login/img/background_logo/logotechnopark.png" height="180">
                        <hr>
                        <p class="text-muted text-center">Silahkan Masukan Email Anda, dan Kami Akan Mengirimkan Link Untuk Me-reset Password Anda.</p>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="POST" action="<?= base_url('auth/lupa_password'); ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Alamat Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <div class="form-group text-right">
                                <a href="<?= base_url(''); ?>auth" class="float-left mt-3">
                                    Sudah Punya Akun?
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Reset Password
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                                Belum Punya Akun? <a href="<?= base_url(''); ?>auth/registration">Buat Akun</a>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            <div class="mt-4">
                                <a href="<?= base_url(''); ?>beranda">Kembali Ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url(''); ?>assets/login/img/background_logo/login-bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-8 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        var h = (new Date()).getHours();
                                        var m = (new Date()).getMinutes();
                                        var s = (new Date()).getSeconds();
                                        if (h >= 4 && h < 10) document.writeln("Selamat Pagi");
                                        if (h >= 10 && h < 15) document.writeln("Selamat Siang");
                                        if (h >= 15 && h < 18) document.writeln("Selamat Sore");
                                        if (h >= 18 || h < 4) document.writeln("Selamat Malam");
                                        //]]>
                                    </script>
                                </h1>
                                <h5 class="font-weight-normal text-muted-transparent">
                                    <p><span id="tanggalwaktu"></span></p>
                                    <script>
                                        var tw = new Date();
                                        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
                                        else(a = tw.getTime());
                                        tw.setTime(a);
                                        var tahun = tw.getFullYear();
                                        var hari = tw.getDay();
                                        var bulan = tw.getMonth();
                                        var tanggal = tw.getDate();
                                        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
                                        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
                                        document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;
                                    </script>
                                </h5>
                            </div>
                            <a class="text-light">Copyright &copy; Technopark Perikanan Kota Pekalongan <?= date('Y'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>