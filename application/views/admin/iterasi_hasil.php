<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hasil Iterasi | Project AI - Kelompok Clustering (K-Means)</title>
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

          <!-- Content Row -->
          <div class="row justify-content-center">
            <div class="col-md-6 text-center">
              <?php error_reporting(0); ?>
              <h1 class="text-dark font-weight-bold mt-3">Hasil Iterasi</h1>
              <h5 class="text-dark mb-5">Klik tombol <span class="text-primary">kembali ke iterasi awal</span> untuk memulai proses iterasi dari awal.</h5>
                  <div id="body">
                  <a class="btn btn-primary mb-5" href="<?php echo base_url(); ?>iterasi_awal">Kembali Ke Iterasi Awal</a>
                  <?php
                  $cluster=array();
                    foreach($data->result_array() as $hq)
                    {

                  ?>
                  <center><h1 class="text-dark font-weight-bold mb-3">Iterasi ke-<?php echo $hq['iterasi']; ?></h1></center>
                  <div class="table-responsive">
                  <table id="table_data" class="table table-bordered table-striped table-admin table-hover table-dark mb-5">
                    <thead class="text-uppercase font-weight-bold">
                    <tr>
                      <td>C1</td>
                      <td>C2</td>
                      <td>C3</td>
                      <td>Cluster</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $q2 = $this->db->query('select * from centroid_temp where iterasi='.$hq['iterasi'].'');
                      foreach($q2->result() as $tq)
                      {
                      $warna1="";
                      $warna2="";
                      $warna3="";

                      if($tq->c1==1) {
                        $warna1='primary';
                      }
                      else {
                        $warna1='dark';
                      }
                      if($tq->c2==1) {
                        $warna2='primary';
                      }
                      else {
                        $warna2='dark';
                      }
                      if($tq->c3==1) {
                        $warna3='primary';
                      }
                      else {
                        $warna3='dark';
                      }
                      if ($tq->c1 == '1') {
                        $cluster = 'C1';
                      }
                      if ($tq->c2 == '1') {
                        $cluster = 'C2';
                      }
                      if ($tq->c3 == '1') {
                        $cluster = 'C3';
                      }
                    ?>
                    <tr align="center">
                      <td class="bg-<?php echo $warna1; ?>"><?php echo $tq->c1; ?></td>
                      <td class="bg-<?php echo $warna2; ?>"><?php echo $tq->c2; ?></td>
                      <td class="bg-<?php echo $warna3; ?>"><?php echo $tq->c3; ?></td>
                      <td ><?php echo $cluster; ?></td>

                    </tr>
                  </tbody>

                    <?php
                      }

                    ?>
                  </table>
                  </div>
                  <?php
                    }
                  ?>
                </div>

                  <h1 class="text-dark font-weight-bold mb-3">Hasil Predikat</h1>
                  <table id="table_data" class="table table-bordered table-admin table-striped table-hover table-dark mb-5">
                    <thead class="text-uppercase font-weight-bold">
                    <tr>
                      <td>No</td>
                      <td>Nama Provinsi</td>
                      <td>Predikat</td>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1; foreach($iterasi_hasil as $h){?>

                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $h->provinsi; ?></td>
                          <td>
                            <?php if ($h->c1 == '1'): ?>
                                <?php echo 'Sangat Butuh'; ?>
                            <?php endif; ?>

                            <?php if ($h->c2 == '1'): ?>
                              <?php echo 'Butuh'; ?>
                            <?php endif; ?>

                            <?php if ($h->c3 == '1'): ?>
                              <?php echo 'Tercukupi'; ?>
                            <?php endif; ?>
                          </td>
                        </tr>
                        <?php
                        $no++;
                          }
                        ?>
                      </tbody>
                  </table>
                  </div>
            </div>
          </div>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

        <!-- Footer -->
        <?php $this->load->view("_includes/footer.php") ?>
        <!-- End of Footer -->

      </div>
      <!-- End of Main Content -->



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
