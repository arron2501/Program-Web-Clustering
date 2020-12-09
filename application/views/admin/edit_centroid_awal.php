<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Nilai Centroid Awal | Project AI - Kelompok Clustering (K-Means)</title>
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
      <li class="nav-item">
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

      <li class="nav-item active">
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
            <h1 class="mb-0 text-dark text-uppercase font-weight-bold mt-5">Edit Nilai Centroid Awal</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h3 class="mb-0 text-dark text-dark font-weight-light mb-4">Masukkan nilai centroid 1, 2, 3 yang baru</h3>
          </div>

          <!-- Content Row -->
          <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
              <?php foreach($data as $u){ ?>
                <form action="<?php echo base_url(). 'admin/clustering/edit_centroid_awal'; ?>" method="post">
                  <div class="form-group">
                    <label for="c1a">Nilai Centroid 1a</label>
                    <input type="hidden" name="nomor" value="<?php echo $u->nomor ?>">
                    <input type="number" class="form-control" name="c1a" value="<?php echo $u->c1a ?>" placeholder="Input angka">
                  </div>
                  <div class="form-group">
                    <label for="c1b">Nilai Centroid 1b</label>
                    <input type="number" class="form-control" name="c1b" value="<?php echo $u->c1b ?>" placeholder="Input angka">
                  </div>
                  <div class="form-group">
                    <label for="c1c">Nilai Centroid 1c</label>
                    <input type="number" class="form-control" name="c1c" value="<?php echo $u->c1c ?>" placeholder="Input angka">
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <label for="c2a">Nilai Centroid 2a</label>
                    <input type="number" class="form-control" name="c2a" value="<?php echo $u->c2a ?>" placeholder="Input angka">
                  </div>
                  <div class="form-group">
                    <label for="c2b">Nilai Centroid 2b</label>
                    <input type="number" class="form-control" name="c2b" value="<?php echo $u->c2b ?>" placeholder="Input angka">
                  </div>
                  <div class="form-group">
                    <label for="c2c">Nilai Centroid 2c</label>
                    <input type="number" class="form-control" name="c2c" value="<?php echo $u->c2c ?>" placeholder="Input angka">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="c3a">Nilai Centroid 3a</label>
                    <input type="number" class="form-control" name="c3a" value="<?php echo $u->c3a ?>" placeholder="Input angka">
                  </div>
                  <div class="form-group">
                    <label for="c3b">Nilai Centroid 3b</label>
                    <input type="number" class="form-control" name="c3b" value="<?php echo $u->c3b ?>" placeholder="Input angka">
                  </div>
                  <div class="form-group">
                    <label for="c3c">Nilai Centroid 3c</label>
                    <input type="number" class="form-control" name="c3c" value="<?php echo $u->c3c ?>" placeholder="Input angka">
                  </div>

                </div>


          </div>
          <div class="row justify-content-center">
          <div class="col-md-5 mb-5">
          <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
          </div>
        </div>
      </div>
          </form>
          <?php } ?>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->

    </div>
    </div>
    <!-- End of Content Wrapper -->
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
