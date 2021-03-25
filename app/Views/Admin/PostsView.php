<?= $this->extend('Admin/LayoutView') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" href="<?= base_url('assets/dataTable/dataTables.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Daftar Kegiatan</h1>
                <a href="<?= route_to('create') ?>" class="btn btn-success">
                    <i class="fa fa-plus"></i> Tambah Kegiatan Baru
                </a>
            </div>
            <?php if ($notif): ?>
            <div class="alert alert-<?= $notif['status'] ?> alert-dismissible fade show" role="alert" id="notif-alert">
                <?= $notif['msg'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered w-100" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kegiatan</th>
                                    <th class="desc">Deskripsi</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($post): $no=1; ?>
                            <?php foreach ($post as $row): ?>
                                <tr>
                                    <td width="1%"><?= $no ?></td>
                                    <td><?= $row['judul'] ?></td>
                                    <td width="30%"><?= $row['deskripsi'] ?></td>
                                    <td width="12%"><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                                    <td><?= $row['lokasi'] ?></td>
                                    <td width="13%">
                                        <a href="<?= route_to('detail', $row['slug'] . '-' . $row['u_code']) ?>" class="btn btn-sm btn-info mb-2">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?= route_to('edit', $row['slug'] . '-' . $row['u_code']) ?>" class="btn btn-sm btn-primary mb-2">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="<?= route_to('destroy', $row['slug'] . '-' . $row['u_code']) ?>" method="POST" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus data. Data akan terhapus secara permanen.')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            <?php endforeach ?>    
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets/dataTable/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/dataTable/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/js/posts.min.js') ?>"></script>
<?= $this->endSection() ?>