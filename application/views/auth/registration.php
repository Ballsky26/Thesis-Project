<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 mt-3">
                        <img src="<?= base_url(''); ?>assets/login/img/background_logo/logokotapekalongan.png" height="100">
                        <img src="<?= base_url(''); ?>assets/login/img/background_logo/logotechnopark.png" height="180">
                        <hr>
                        <p class="text-muted text-center">Silahkan mengisi form pendaftaran dibawah ini dengan baik dan benar.</p>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <label for="text">Nomor Induk Kependudukan</label>
                                <input id="text" type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan Nomor NIK" value="<?= set_value('nik'); ?>">
                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="text">Nama Lengkap</label>
                                <input id="text" type="text" class="form-control form-control-user" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama_pemilik'); ?>">
                                <?= form_error('nama_pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="text">Email</label>
                                <input id="text" type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Alamat Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control form-control-user" data-indicator="pwindicator" id="password1" name="password1" placeholder="Masukkan Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Konfirmasi Password</label>
                                    <input id="password" type="password" class="form-control form-control-user" data-indicator="pwindicator" id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <a href="<?= base_url(''); ?>auth/lupa_password" class="float-left mt-3">
                                    Lupa Password?
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Buat Akun
                                </button>
                            </div>
                            <div class="mt-5 text-center">
                                Sudah Punya Akun? <a href="<?= base_url(''); ?>auth">Login</a>
                            </div>
                        </form>
                        <div class="text-center mt-5 text-small">
                            <div class="mt-2">
                                <a href="<?= base_url(''); ?>beranda">Kembali Ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url(''); ?>assets/login/img/background_logo/back_regis.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5">
                            <div class="mb-5 pb-2">
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