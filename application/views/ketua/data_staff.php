        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Data Staff</div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="float-left">
                            <a href="<?= base_url(''); ?>ketua/tambah_staff" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="clearfix mb-3"></div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nomor Telpon</th>
                                            <th scope="col">Posisi</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data_staff as $s) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $s['nama']; ?></td>
                                                <td><?= $s['nomor_telpon']; ?></td>
                                                <td><?= $s['posisi']; ?></td>
                                                <td><img src="<?= base_url('assets/login/img/staff/') . $s['foto']; ?>" class="thumbnail" width="100"></td>
                                                <td>
                                                    <a href="<?= base_url('ketua/detail_staff/' . $s['id']); ?>" class="badge badge-info"><i class="fas fa-info"></i></a>
                                                    <a href="<?= base_url('ketua/edit_staff/' . $s['id']); ?>" class="badge badge-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= base_url('ketua/hapus_staff/' . $s['id']); ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
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