<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portir Addariat Banyuwangi | <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/assets/font-awesome/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sb-admin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <?= $this->renderSection('style') ?>

</head>

<body id="page-top" class="sidebar-toggled">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= route_to('index') ?>">
                <div class="sidebar-brand-icon">
                    <img src="" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Portir Addaariat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= route_to('index') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= strpos(uri_string(), 'kegiatan') ? 'active' : '' ?>">
                <a class="nav-link <?= strpos(uri_string(), 'kegiatan') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>Kegiatan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= uri_string() == 'admin/kegiatan/add' ? 'active' : '' ?>" href="<?= route_to('create') ?>">Kegiatan Baru </a>
                        <a class="collapse-item <?= uri_string() == 'admin/kegiatan' ? 'active' : '' ?>" href="<?= route_to('posts') ?>">Daftar Kegiatan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small nav-hi">Hi, <?= session('nama') ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item edit-profile" href="<?= route_to('edit-profile') ?>" data-toggle="modal" data-target="#profile-modal">
                                    <button class="btn btn-link"><i class="fa fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Edit Profil
                                    </button>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <form action="<?= route_to('logout') ?>" method="POST">
                                        <button type="submit" class="btn btn-link"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout</button>
                                    </form>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="main-container-content">

                    <?= $this->renderSection('content') ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= route_to('update-profile') ?>" method="POST" class="update-form">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" name="nama" id="nama" type="text" value="">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" name="username" id="username" type="text">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" name="password" id="password" type="password">
                            <small><a href="#" id="show-pass">Lihat password</a></small>
                        </div>
                        <hr>
                        <a class="btn btn-secondary" href="#" data-dismiss="modal">Batal</a>
                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sb-admin/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/profile.min.js') ?>"></script>
    <?= $this->renderSection('script') ?>

</body>

</html>