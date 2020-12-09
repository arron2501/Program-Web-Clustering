<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home | Project AI - Kelompok Clustering (K-Means)</title>
  <?php $this->load->view("_includes/head.php") ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark toggled accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('home') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PROJECT AI</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('home') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('hitung_rata') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Hitung Rata-Rata</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('iterasi_awal') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Proses Iterasi</span>
        </a>
      </li>
    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("_includes/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-2">
            <h1 class="mb-0 text-dark text-uppercase font-weight-bold mt-5">Input Data</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h3 class="mb-0 text-dark text-dark font-weight-light mb-4">Masukkan nama provinsi, jumlah terkonfirmasi, tenaga medis dan Obat yang ingin ditambahkan</h3>
          </div>

          <!-- Content Row -->
          <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="<?php echo base_url(). 'admin/clustering/tambah'; ?>" method="post">
                  <div class="form-group">
                    <label for="provinsi">Nama Provinsi</label>
                    <input type="hidden" name="no">
                    <input type="text" class="form-control" name="provinsi" placeholder="Masukkan nama provinsi">
                  </div>
                  <div class="form-group">
                    <label for="terkonfirmasi">Jumlah Terkonfirmasi</label>
                    <input type="text" class="form-control" name="terkonfirmasi" placeholder="Masukkan jumlah terkonfirmasi">
                  </div>
                  <div class="form-group">
                    <label for="tenaga_medis">Jumlah Tenaga Medis</label>
                    <input type="text" class="form-control" name="tenaga_medis" placeholder="Masukkan jumlah tenaga medis">
                  </div>
                  <div class="form-group">
                    <label for="Obat">Jumlah Obat</label>
                    <input type="text" class="form-control" name="Obat" placeholder="Masukkan jumlah Obat">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  </div>
                </form>
            </div>
          </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <?php $this->load->view("_includes/footer.php") ?>
  </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view("_includes/modal.php") ?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("_includes/javascript.php") ?>
</body>

</html>
