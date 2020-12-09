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

          <!-- Content Row -->
          <div class="row text-center justify-content-center">
            <div class="col-xl-9">
              <div class="col-md-3">
              </div>
              <h1 class="text-dark font-weight-bold pt-3 mb-5">List Data Per Provinsi (Abstrak)</h1>
              <div class="mb-5 d-sm-flex justify-content-center">
                <a class="btn btn-outline-primary shadow-sm" href="input">
                  <span class="fa fa-plus"></span> Tambah Data
                </a>
              </div>
              <div id="body">
              <div class="table-responsive mb-5">
                <table id="table_data" class="table table-bordered table-striped table-admin table-hover table-dark">
                <thead class="text-uppercase font-weight-bold">
                <tr>
                  <td>No</td>
                  <td>Nama Provinsi</td>
                  <td>Jumlah Terkonfirmasi</td>
                  <td>Jumlah Tenaga Medis</td>
                  <td>Jumlah Obat</td>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data_corona->result_array() as $s){ ?>
                <tr>
                  <td class="font-weight-bold"><?php echo $s['no']; ?></td>
                  <td><?php echo $s['provinsi']; ?></td>
                  <td><?php echo $s['terkonfirmasi']; ?></td>
                  <td><?php echo $s['tenaga_medis']; ?></td>
                  <td><?php echo $s['Obat']; ?></td>
                  <td class="text-center" style="vertical-align: middle;">
                    <a href="<?php echo site_url('admin/clustering/edit/'.$s['no']) ?>"class="btn btn-small text-warning">
                      <i class="fas fa-pen"></i>
                    </a>
                    <a href="<?php echo site_url('admin/clustering/hapus/'.$s['no']) ?>" class="btn btn-small text-danger">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
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
