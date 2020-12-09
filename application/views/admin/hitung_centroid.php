<!DOCTYPE html>
<html lang="en">

<head>
  <title>Centroid | Project AI - Kelompok Clustering (K-Means)</title>
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

      <li class="nav-item active">
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

          <!-- Content Row -->
          <div class="row justify-content-center">
            <div class="col-md-10 text-center">
              <h1 class="text-dark font-weight-bold pt-3">Data Centroid</h1>
              <h5 class="text-dark mb-5">Klik tombol berwarna <span class="text-danger">merah</span> untuk kembali, dan klik tombol berwarna <span class="text-primary">biru</span> untuk menghitung ulang centroid.</h5>
              <div id="body">
                <div class="mb-5">
              <a class="btn btn-danger" href="<?php echo base_url(); ?>hitung_rata">Kembali</a>
              <a class="btn btn-primary" href="<?php echo base_url(); ?>hitung_centroid">Hitung Ulang Centroid</a>
            </div>
            <h1 class="text-dark font-weight-bold mb-3">List Predikat</h1>
              <div class="table-responsive text-center">
                <table id="table_data" class="table table-bordered table-striped table-admin table-hover table-dark mb-5">
                  <thead class="text-uppercase font-weight-bold">
                    <tr>
                      <td>Centroid</td>
                      <td>Predikat</td>
                      <td>Range</td>
                    </tr>
                  </thead>
                <tbody>
                <tr>
                  <td>Centroid 1</td>
                  <td>Sangat Butuh</td>
                  <td><?php echo $c1; ?></td>
                </tr>
                <tr>
                  <td>Centroid 2</td>
                  <td>Butuh</td>
                  <td><?php echo $c2; ?></td>
                </tr>
                <tr>
                  <td>Centroid 3</td>
                  <td>Tercukupi</td>
                  <td><?php echo $c3; ?></td>
                </tr>
                <tr>
              </tbody>
              </table>
              </div>
              <h1 class="text-dark font-weight-bold mb-3">Hasil Perhitungan Centroid</h1>
              <div class="table-responsive text-center">
              <table  id="table_data" class="table table-bordered table-striped table-admin table-hover table-dark mb-5">
              <thead class="text-uppercase font-weight-bold">
              <tr>
                <td>No</td>
                <td>Nama Provinsi</td>
                <td>Jumlah Terkonfirmasi</td>
                <td>Jumlah Tenaga Medis</td>
                <td>Jumlah Obat</td>
                <td>Rata-Rata</td>
                <td colspan="3">Distance</td>
                <td>Predikat</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data_corona->result_array() as $s){ ?>
              <tr>
                <td class="text-light text-uppercase font-weight-bold"><?php echo $s['no']; ?></td>
                <td><?php echo $s['provinsi']; ?></td>
                <td><?php echo $s['terkonfirmasi']; ?></td>
                <td><?php echo $s['tenaga_medis']; ?></td>
                <td><?php echo $s['Obat']; ?></td>
                <td><?php echo $s['rata_rata']; ?></td>
                <td><?php echo $s['jarak1']; ?></td>
                <td><?php echo $s['jarak2']; ?></td>
                <td><?php echo $s['jarak3']; ?></td>
                <td><?php echo $s['predikat']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
            </table>
              </div>
              </div>
            </div>
          </div>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("_includes/footer.php") ?>
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
  <?php $this->load->view("_includes/modal.php") ?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("_includes/javascript.php") ?>
</body>

</html>
