        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>pemilik/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Agenda Pelatihan</div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="clearfix mb-3"></div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Kegiatan</th>
                                            <th scope="col">Tanggal Mulai</th>
                                            <th scope="col">Waktu</th>
                                            <!-- <th scope="col">Pemateri</th> -->
                                            <th scope="col">Status</th>
                                            <!-- <th scope="col">Kouta</th> -->
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pelatihan as $j) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $j['nama_kegiatan']; ?></td>
                                                <td><?= date('d-m-Y', strtotime($j['tanggal_mulai'])); ?></td>
                                                <td><?= $j['waktu']; ?></td>
                                                <!-- <td><?= $j['pemateri']; ?></td> -->
                                                <td><?php
                                                    if ($j['status'] == 'Buka') {
                                                        echo '<span class="badge badge-success">Buka</span>';
                                                    } elseif ($j['status'] == 'Tutup') {
                                                        echo  '<span class="badge badge-danger">Tutup</span>';
                                                    }
                                                    ?></td>
                                                <!-- <td><?= $j['kouta']; ?></td> -->
                                                <td>
                                                    <?php if ($j['status'] == 'Buka') : ?>
                                                        <a title="Detail" href="<?= base_url('pemilik/detail_agenda_pelatihan/' . $j['id']); ?>" class="badge badge-info"><i class="fas fa-info"></i></a>
                                                    <?php else : ?>
                                                        <p>Pendaftaran Tutup</p>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var flash = $('#flash').data('flash');
                if (flash) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data Berhasil ' + flash
                    })
                }
                $('.tombol-hapus').on('click', function(e) {
                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal.fire({
                        title: 'Apakah Anda Yakin?',
                        text: "Data ini akan Dihapus",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = href;
                        }
                    })

                });
            </script>