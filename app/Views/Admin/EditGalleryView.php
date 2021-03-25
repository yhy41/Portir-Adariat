<?= $this->extend('Admin/LayoutView') ?>

<?= $this->section('style') ?>
<style>
    .img-item {
        overflow: visible;
        position: relative;
    }

    .btn-trash {
        position: absolute;
        top: -10px;
        right: 0px;
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
                <li class="breadcrumb-item"><a href="<?= route_to('detail', $post['uri']) ?>"><?= $post['judul'] ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Foto Dokumentasi</li>
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
                <h6 class="m-0 font-weight-bold text-primary">Foto Dokumentasi</h6>
            </div>
            <div class="card-body">
                <?php if (count($photos) < 10): ?>
                <div class="row">
                    <div class="col">
                        <label for="galleries">Tambah foto</label>
                        <form action="<?= route_to('update-gallery', $post['uri']) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-12 col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" name="galleries[]" id="galleries" class="custom-file-input <?= $validation->hasError('galleries') ? 'is-invalid' : '' ?>" multiple>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('galleries') ?>
                                        </div>
                                        <label for="galleries" class="custom-file-label">Pilih foto...</label>
                                        <small class="form-text text-muted">Maks. <?= 10 - count($photos) ?> foto | Tipe foto .jpg, .jpeg, .png | Maks. ukuran 5 MB per foto.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-save btn-block">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
                <?php endif ?>
                <div class="row">
                <?php
                    if (count($photos) > 1):
                    foreach ($photos as $foto): 
                ?>
                    <div class="col-12 col-md-4 img-item mb-4">
                        <form action="<?= route_to('delete-photo', $foto) ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <?= csrf_field() ?>
                            <input type="hidden" name="uri" value="<?= $post['uri'] ?>">
                            <button type="submit" class="btn btn-sm btn-circle btn-danger btn-trash border-white" onclick="return confirm('Yakin ingin menghapus foto? Foto akan dihapus secara permanen.')">
                                <i class="fa fa-trash"></i>
                            </button>
                            <img src="<?= base_url() . '/uploads/imgs/' . $foto ?>" alt="<?= $post['judul'] ?>" class="card-img-top rounded">
                        </form>
                    </div>
                <?php 
                    endforeach;
                    else:
                ?>
                    <div class="col img-item mb-4">
                        <img src="<?= base_url() . '/uploads/imgs/' . $photos[0] ?>" alt="<?= $post['judul'] ?>" class="card-img-top rounded">
                    </div>
                <?php endif ?>
                </div>
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