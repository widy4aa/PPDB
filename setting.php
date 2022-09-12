<?php
    session_start();
    if (!isset($_SESSION['login'])) {
      header('Location: auth/login.php');
    }

    require('koneksi.php');

    $loginsess = $_SESSION['login'];
    $query = mysqli_query($conn,"SELECT * FROM user WHERE id = $loginsess");
    $user = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMK TEKNOLOGI BALUNG</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #7FB77E;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link">
      <span class="brand-text font-weight-semibold ml-2">PENDAFTARAN SISWA</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $user['photo_profile'] ? 'asset/photoProfile/' . $user['photo_profile'] : 'asset/photoProfile/blank-profile.png' ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user['name'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="daftarsiswa.php" class="nav-link">
            <i class="nav-icon bi bi-people-fill"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="jurusan.php" class="nav-link">
            <i class="nav-icon bi bi-pc-display"></i>
              <p>
                Jurusan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon bi bi-gear"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #7FB77E;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-white">Pengaturan Akun</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Foto Profil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="action/proses_user_setting.php?id=<?= $user['id'] ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="category" value="changepp">
                <?php if ($user['photo_profile']) { ?>
                  <input type="hidden" name="oldimg" value="<?= $user['photo_profile'] ?>">
                <?php } ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">Foto profile input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile" onchange="loadFile(event)">
                        <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <img id="output" />
                    <img src="<?= $user['photo_profile'] ? 'asset/photoProfile/' . $user['photo_profile'] : 'asset/photoProfile/blank-profile.png' ?>" width="140" alt="" id="ppnow">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" disabled class="btn btn-primary" id="btnupdatepp">Perbarui</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
      <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah bio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="action/proses_user_setting.php?id=<?= $user['id'] ?>" method="POST">
                <input type="hidden" name="category" value="changebio">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="<?= $user['name'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="<?= $user['email'] ?>" required >
                  </div>
                  <div class="form-group">
                    <label for="notelp">No Telepon</label>
                    <input type="number" class="form-control" id="notelp" name="no_telp" placeholder="Masukkan no telepon" value="<?= $user['no_telp'] ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          </div>
          <div class="row">
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="action/proses_user_setting.php?id=<?= $user['id'] ?>" method="POST">
                <input type="hidden" name="category" value="changepw">
                <div class="card-body">
                  <div class="form-group">
                    <label for="pwlm">Password Lama</label>
                    <input type="password" name="oldpw" class="form-control <?php if (isset($_SESSION['message'])) {
                      if ($_SESSION['message'] == 'error_oldpw') { ?>
                        border-2 border-danger
                    <?php }} ?>" id="pwlm" placeholder="Masukkan password lama" required>
                    <?php if (isset($_SESSION['message'])) {
                        if ($_SESSION['message'] == 'error_oldpw') { ?>
                          <p class="text-bold text-red">password lama salah</p>
                    <?php }} ?>
                  </div>
                  <div class="form-group">
                    <label for="pwbr">Password Baru</label>
                    <input type="password" name="newpw" class="form-control" id="pwbr" placeholder="Masukkan password baru" required>
                  </div>
                  <?php if (isset($_SESSION['message'])) {
                        if ($_SESSION['message'] == 'success_pw') { ?>
                  <div class="alert alert-success" role="alert">
                      Password berhasil diperbarui
                  </div>
                  <?php }} ?>
                </div>
                <!-- /.card-body -->
                          
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-2">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Keluar Akun</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="auth/logout-action.php" method="POST">
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          </div>
      </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
  unset($_SESSION["message"])
?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script>
    let loadFile = function(event) {
    let ppnow = document.getElementById('ppnow')
    ppnow.style.display = 'none'

    document.getElementById('btnupdatepp').disabled = false

    let output = document.getElementById('output')
    output.style.width = '140px'
    output.src = URL.createObjectURL(event.target.files[0])
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };
</script>
</body>
</html>
