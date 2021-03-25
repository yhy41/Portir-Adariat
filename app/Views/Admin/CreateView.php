<?= $this->extend('Admin/LayoutView') ?>

<?= $this->section('style') ?>
<style>
    .custom-file {
        width: 75%;
    }
    @media (max-width: 576px) {
        .custom-file {
            width: 100%;
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
                    <li class="breadcrumb-item active" aria-current="page">Tambah Kegiatan Baru</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan Baru</h6>
                </div>
                <div class="card-body">
                    <form action="<?= route_to('store') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="judul">Nama Kegiatan</label>
                            <input class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" name="judul" id="judul" type="text" value="<?= old('judul') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pelaksanaan Kegiatan</label>
                                    <input class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : '' ?>" name="tanggal" id="tanggal" type="date" value="<?= old('tanggal') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input class="form-control <?= $validation->hasError('lokasi') ? 'is-invalid' : '' ?>" name="lokasi" id="lokasi" type="text" value="<?= old('lokasi') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lokasi') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Kegiatan</label>
                            <textarea class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : '' ?>" name="deskripsi" id="deskripsi" rows="5"><?= old('deskripsi') ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi') ?>
                            </div>
                        </div>
                        <label for="galleries">Foto Dokumentasi</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="galleries[]" id="galleries" class="custom-file-input <?= $validation->hasError('galleries') ? 'is-invalid' : '' ?>" multiple>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('galleries') ?>
                                </div>
                                <label for="galleries" class="custom-file-label">Pilih foto...</label>
                                <small class="form-text text-muted">Maks. 10 foto | Tipe foto .jpg, .jpeg, .png | Maks. ukuran 5 MB per foto.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('.custom-file input').change(function() {
        var $el = $(this),
        files = $el[0].files,
        label = files[0].name;
        if (files.length > 1) {
            label = label + " dan " + String(files.length - 1) + " foto lainnya"
        }
        $('.custom-file-label').html(label);
    });
</script>
<?= $this->endSection() ?>