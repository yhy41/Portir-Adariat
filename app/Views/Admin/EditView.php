<?= $this->extend('Admin/LayoutView') ?>

<?= $this->section('style') ?>
<style>
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
                <li class="breadcrumb-item"><a href="<?= route_to('detail', $post['slug'] . '-' . $post['u_code']) ?>"><?= $post['judul'] ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Detail Kegiatan</li>
            </ol>
        </nav>
        <?php if ($notif): ?>
        <div class="alert alert-<?= $notif['status'] ?> alert-dismissible fade show" role="alert" id="notif-alert">
            <?= $notif['msg'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Detail Kegiatan</h6>
            </div>
            <div class="card-body">
                <form action="<?= route_to('update', $post['slug'] . '-' . $post['u_code']) ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="judul">Nama Kegiatan</label>
                        <input class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" name="judul" id="judul" type="text" value="<?= old('judul') ? old('judul') : $post['judul'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input class="form-control <?= $validation->hasError('lokasi') ? 'is-invalid' : '' ?>" name="lokasi" id="lokasi" type="text" value="<?= old('lokasi') ? old('lokasi') : $post['lokasi'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lokasi') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Pelaksanaan Kegiatan</label>
                                <input class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : '' ?>" name="tanggal" id="tanggal" type="date" value="<?= old('tanggal') ? old('tanggal') : $post['tanggal'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Kegiatan</label>
                        <textarea class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : '' ?>" name="deskripsi" id="deskripsi" rows="5"><?= old('deskripsi') ? old('deskripsi') : $post['deskripsi'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm mb-2 mb-sm-0">
                            <button type="submit" class="btn btn-primary btn-btm">Simpan</button>
                        </div>
                        <div class="col-12 col-sm">
                            <a href="<?= route_to('edit-gallery', $post['slug'] . '-' . $post['u_code']) ?>" class="btn btn-info btn-btm float-right">
                                <i class="fa fa-images"></i> Edit Galeri Foto
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>