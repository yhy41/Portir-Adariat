<?= $this->extend('Admin/LayoutView') ?>

<?= $this->section('style') ?>
<style>
    .galleries::-webkit-scrollbar-track {
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    .galleries::-webkit-scrollbar {
        width: 7px;
        background-color: #F5F5F5;
    }

    .galleries::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-color: #555;
    }

    @media (max-width: 576px) {
        .btn-btm {
            width: 100%;
            display: block;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('posts') ?>">Kegiatan</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $post['judul'] ?></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-8 mb-3 mb-lg-0">
                        <h5 class="font-weight-bold">Nama Kegiatan</h5>
                        <p><?= $post['judul'] ?></p>
                        <h5 class="font-weight-bold">Lokasi</h5>
                        <p><?= $post['lokasi'] ?></p>
                        <h5 class="font-weight-bold">Tanggal Pelaksanaan</h5>
                        <p><?= date('d M Y', strtotime($post['tanggal'])) ?></p>
                        <h5 class="font-weight-bold">Deskripsi</h5>
                        <p><?= $post['deskripsi'] ?></p>
                    </div>
                    <div class="col-12 col-lg-4">
                    <div class="galleries overflow-auto mb-3 p-2" style="max-height: 600px;">
                        <?php
                        $photos = json_decode($post['foto']); 
                        foreach ($photos as $foto):
                        ?>
                            <img src="<?= base_url() . '/uploads/imgs/' . $foto ?>" alt="" class="img-fluid rounded mb-2">
                        <?php endforeach ?>
                    </div>
                    <a href="<?= route_to('edit-gallery', $post['slug'] . '-' . $post['u_code']) ?>" class="btn btn-sm btn-block btn-primary">
                        <i class="fa fa-images"></i> Edit Galeri Foto
                    </a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                        <a href="<?= route_to('edit', $post['slug'] . '-' . $post['u_code']) ?>" class="btn btn-warning btn-btm">
                            <i class="fa fa-edit"></i> Edit Kegiatan
                        </a>
                    </div>
                    <div class="col-12 col-sm-auto">
                        <form action="<?= route_to('destroy', $post['slug'] . '-' . $post['u_code']) ?>" method="POST" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-btm" onclick="return confirm('Yakin ingin menghapus data. Data akan terhapus secara permanen.')">
                                <i class="fa fa-trash"></i> Hapus Kegiatan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>