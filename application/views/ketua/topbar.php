<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <script type="text/javascript">
            //
        </script>
        <div class="text-white" id="clock">/</div>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        $tz_time = date("F j, Y h:i:s"); ?>
        <p id="clock"></p>
    </form>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url('assets/login/img/staff/') . $staff['foto']; ?>" class="rounded-circle mr-2">
                <div class="d-sm-none d-lg-inline-block"><?= $staff['nama']; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url(''); ?>ketua/myprofile" class="dropdown-item has-icon">
                    <i class="fas fa-user"></i>My Profile
                </a>
                <a href="<?= base_url(''); ?>ketua/edit_password" class="dropdown-item has-icon">
                    <i class="fas fa-key"></i> Edit Password
                </a>
                <hr>
                <a href="<?= base_url(''); ?>auth/logout" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<script type="text/javascript">
    var currenttime = '<?php echo $tz_time; ?>'; // Timestamp of the timezone you want to use, in this case, it's server time
    var servertime = new Date(currenttime);

    function padlength(l) {
        var output = (l.toString().length == 1) ? "0" + l : l;
        return output;
    }

    function digitalClock() {
        servertime.setSeconds(servertime.getSeconds() + 1);
        var timestring = padlength(servertime.getHours()) + ":" + padlength(servertime.getMinutes()) + ":" + padlength(servertime.getSeconds());
        document.getElementById("clock").innerHTML = timestring + " CEST";
    }
    window.onload = function() {
        setInterval("digitalClock()", 1000);
    }
</script>
<script>
    function digitalClock() {
        var tanggal = new Date();
        var kode_hari = tanggal.getDay();
        var nama_hari = "";
        switch (kode_hari) {
            case 0:
                nama_hari = "Minggu";
                break;
            case 1:
                nama_hari = "Senin";
                break;
            case 2:
                nama_hari = "Selasa";
                break;
            case 3:
                nama_hari = "Rabu";
                break;
            case 4:
                nama_hari = "Kamis";
                break;
            case 5:
                nama_hari = "Jumat";
                break;
            case 6:
                nama_hari = "Sabtu";
        }
        // document.write(nama_hari);
        // document.write(", " + tanggal.getDate() +
        //     "/" + (tanggal.getMonth() + 1) +
        //     "/" + tanggal.getFullYear());
        // document.write("-");

        var h = tanggal.getHours();
        var m = tanggal.getMinutes();
        var s = tanggal.getSeconds();
        var hrs;
        var mins;
        var tsecs;
        var secs;
        hrs = h;
        mins = m;
        secs = s;
        var ctime = nama_hari + ", " + tanggal.getDate() +
            "/" + (tanggal.getMonth() + 1) +
            "/" + tanggal.getFullYear() + "-" + hrs + ":" + mins + ":" + secs;
        document.getElementById("clock").firstChild.nodeValue = ctime;
    }
    window.onload = function() {
        digitalClock();
        setInterval('digitalClock()', 1000);
    }
</script>