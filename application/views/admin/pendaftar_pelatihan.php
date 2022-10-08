<div class="section-header">
    <h1><?= $title; ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>admin/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Pendaftar Pelatihan</div>
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
                                    <th scope="col">Nama Pelatihan</th>
                                    <th scope="col">Nama Pemilik</th>
                                    <th scope="col">Tanggal Daftar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($peserta_pelatihan as $p) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $p['nama_kegiatan']; ?></td>
                                        <td><?= $p['nama_pemilik']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($p['tanggal_daftar'])); ?></td>
                                        <td>
                                            <?php
                                            if ($p['status'] == 'Proses') {
                                                echo '<span class="badge badge-warning">Proses</span>';
                                            } elseif ($p['status'] == 'Acc') {
                                                echo  '<span class="badge badge-success">Acc</span>';
                                            } elseif ($p['status'] == 'Tolak') {
                                                echo  '<span class="badge badge-danger">Tolak</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($p['status'] == 'Proses') : ?>
                                                <a href="<?= base_url('admin/edit_pendaftar_pelatihan/' . $p['id_peserta']); ?>" class="badge badge-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/hapus_pendaftar_pelatihan/' . $p['id_peserta']); ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                            <?php else : ?>
                                                <a href="<?= base_url('admin/edit_pendaftar_pelatihan/' . $p['id_peserta']); ?>" class="badge badge-warning"><i class="fas fa-edit"></i></a>
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