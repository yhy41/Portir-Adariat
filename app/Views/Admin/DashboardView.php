<?= $this->extend('Admin/LayoutView') ?>

<?= $this->section('style') ?>
<style>
    .card-text {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    @media (max-width: 576px) {
        .btn-act {
            width: 100%;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Kegiatan Terbaru</h1>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-auto">
                            <a href="<?= route_to('create') ?>" class="btn btn-success btn-act mb-md-0 mb-2">
                                <i class="fa fa-plus"></i> Tambah Kegiatan Baru
                            </a>
                        </div>
                        <?php if ($post): ?>
                        <div class="col-sm-auto">
                            <a href="<?= route_to('posts') ?>" class="btn btn-primary btn-act">Lihat Semua Kegiatan</a>
                        </div>
                        <?php endif ?>
                    </div>
                    <hr>
                    <div class="row">
                        <?php if ($post): ?>
                        <?php foreach ($post as $row): ?>
                        <div class="col col-lg-4 mb-3">
                            <div class="card w-100">
                                <?php $photos = json_decode($row['foto']); ?>
                                <img src="<?= base_url() . '/uploads/imgs/' . $photos[0] ?>" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['judul'] ?></h5>
                                    <p class="card-text"><?= $row['deskripsi'] ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= route_to('detail', $row['slug'] . '-' . $row['u_code']) ?>" class="btn btn-sm btn-info mb-1 mb-lg-0">Lihat Detail</a>
                                    <a href="<?= route_to('edit', $row['slug'] . '-' . $row['u_code']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <?php else: ?>
                        <h3 class="m-3 text-center">Tidak ada data.</h3>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>