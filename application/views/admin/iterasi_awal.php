<!DOCTYPE html>
<html lang="en">

<head>
  <title>Iterasi Awal | Project AI - Kelompok Clustering (K-Means)</title>
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
            <div class="col-md-10 text-center">
              <h1 class="text-dark font-weight-bold mt-3">Iterasi Awal (Inisialisasi)</h1>
              <h5 class="text-dark mb-5">Klik tombol <span class="text-primary">Mulai Iterasi</span> untuk memulai proses iterasi.</h5>
                <div id="body">
                  <a class="btn btn-outline-primary shadow-sm mb-5" href="<?php echo base_url(); ?>edit_centroid_awal">
                    <span class="fa fa-pen"></span> Edit Nilai Centroid Awal
                  </a>&nbsp;
                <a class="btn btn-primary mb-5" href="<?php echo base_url(); ?>iterasi_lanjut">Mulai Iterasi</a>
                <div class="table-responsive text-center">
                <table id="table_data" class="table table-bordered table-striped table-admin table-hover table-dark mb-5">
                  <thead class="text-uppercase font-weight-bold" >
                  <tr>
                    <td rowspan="2" style="vertical-align: middle;">No</td>
                    <td rowspan="2" style="vertical-align: middle;">Nama Provinsi</td>
                    <td rowspan="2" style="vertical-align: middle;">Jumlah Terkonfirmasi</td>
                    <td rowspan="2" style="vertical-align: middle;">Jumlah Tenaga Medis</td>
                    <td rowspan="2" style="vertical-align: middle;">Jumlah Obat</td>
                  <td colspan="3">Centroid 1</td>
                  <td colspan="3">Centroid 2</td>
                  <td colspan="3">Centroid 3</td>
                  <td rowspan="2" width="30" style="vertical-align: middle;">C1</td>
                  <td rowspan="2" width="30" style="vertical-align: middle;">C2</td>
                  <td rowspan="2" width="30" style="vertical-align: middle;">C3</td>
                  </tr>

                  <tr>
                    <?php foreach($centroid_awal->result_array() as $s){ ?>
                    <td><?php echo $s['c1a']; ?></td><td><?php echo $s['c1b']; ?></td><td><?php echo $s['c1c']; ?></td>
                    <td><?php echo $s['c2a']; ?></td><td><?php echo $s['c2b']; ?></td><td><?php echo $s['c2c']; ?></td>
                    <td><?php echo $s['c3a']; ?></td><td><?php echo $s['c3b']; ?></td><td><?php echo $s['c3c']; ?></td>
                  <?php } ?>
                  </tr>
                </thead>

                  <?php
                  $c1a = "";
                  $c1b = "";
                  $c1c = "";

                  $c2a = "";
                  $c2b = "";
                  $c2c = "";

                  $c3a = "";
                  $c3b = "";
                  $c3c = "";

                  foreach($centroid_awal->result_array() as $s){
                  $c1a = $s['c1a'];
                  $c1b = $s['c1b'];
                  $c1c = $s['c1c'];

                  $c2a = $s['c2a'];
                  $c2b = $s['c2b'];
                  $c2c = $s['c2c'];

                  $c3a = $s['c3a'];
                  $c3b = $s['c3b'];
                  $c3c = $s['c3c'];
                  }

                  $c1a_b = "";
                  $c1b_b = "";
                  $c1c_b = "";

                  $c2a_b = "";
                  $c2b_b = "";
                  $c2c_b = "";

                  $c3a_b = "";
                  $c3b_b = "";
                  $c3c_b = "";

                  $hc1=0;
                  $hc2=0;
                  $hc3=0;

                  $no=0;
                  $arr_c1 = array();
                  $arr_c2 = array();
                  $arr_c3 = array();

                  $arr_c1_temp = array();
                  $arr_c2_temp = array();
                  $arr_c3_temp = array();

                  $this->db->query('truncate table centroid_temp');
                  $this->db->query('truncate table hasil_centroid');

                  foreach($data_corona->result_array() as $s){ ?>
                    <tbody>
                  <tr>
                    <td class="text-uppercase font-weight-bold"><?php echo $s['no']; ?></td>
                    <td><?php echo $s['provinsi']; ?></td>
                    <td><?php echo $s['terkonfirmasi']; ?></td>
                    <td><?php echo $s['tenaga_medis']; ?></td>
                    <td><?php echo $s['Obat']; ?></td>

                  <td colspan="3"><?php
                    $hc1 = round(sqrt(pow(($s['terkonfirmasi']-$c1a),2) + pow(($s['tenaga_medis']-$c1b), 2) + pow(($s['Obat']-$c1c), 2)), 2);
                    echo $hc1;
                  ?></td>
                  <td colspan="3"><?php
                    $hc2 = round(sqrt(pow(($s['terkonfirmasi']-$c2a),2) + pow(($s['tenaga_medis']-$c2b), 2) + pow(($s['Obat']-$c2c), 2)), 2);
                    echo $hc2;
                  ?></td>
                  <td colspan="3"><?php
                    $hc3 = round(sqrt(pow(($s['terkonfirmasi']-$c3a),2) + pow(($s['tenaga_medis']-$c3b), 2) + pow(($s['Obat']-$c3c), 2)), 2);
                    echo $hc3;
                  ?></td>
                  <?php

                  if($hc1<=$hc2)
                  {
                    if($hc1<=$hc3)
                    {
                      $arr_c1[$no] = 1;
                    }
                    else
                    {
                      $arr_c1[$no] = '0';
                    }
                  }
                  else
                  {
                    $arr_c1[$no] = '0';
                  }

                  if($hc2<=$hc1)
                  {
                    if($hc2<=$hc3)
                    {
                      $arr_c2[$no] = 1;
                    }
                    else
                    {
                      $arr_c2[$no] = '0';
                    }
                  }
                  else
                  {
                    $arr_c2[$no] = '0';
                  }

                  if($hc3<=$hc1)
                  {
                    if($hc3<=$hc2)
                    {
                      $arr_c3[$no] = 1;
                    }
                    else
                    {
                      $arr_c3[$no] = '0';
                    }
                  }
                  else
                  {
                    $arr_c3[$no] = '0';
                  }


                  $arr_c1_temp[$no] = $s['terkonfirmasi'];
                  $arr_c2_temp[$no] = $s['tenaga_medis'];
                  $arr_c3_temp[$no] = $s['Obat'];

                  $warna1="";
                  $warna2="";
                  $warna3="";
                  ?>
                  <?php if($arr_c1[$no]==1) {
                    $warna1='primary';
                  }
                  else {
                    $warna1='dark';
                  } ?>
                  <td class="bg-<?php echo $warna1; ?>"><?php echo $arr_c1[$no] ;?></td>
                  <?php
                  if($arr_c2[$no]==1) {
                    $warna2='primary';
                  }
                  else {
                    $warna2='dark';
                  } ?>
                  <td class="bg-<?php echo $warna2; ?>"><?php echo $arr_c2[$no] ;?></td>
                  <?php
                  if($arr_c3[$no]==1) {
                    $warna3='primary';
                  }
                  else {
                    $warna3='dark';
                  } ?>
                  <td class="bg-<?php echo $warna3; ?>"><?php echo $arr_c3[$no] ;?></td>
                  </tr>
                </tbody>
                  <?php

                  $q = "insert into centroid_temp(iterasi,no,c1,c2,c3) values(1,'".$s['no']."','".$arr_c1[$no]."','".$arr_c2[$no]."','".$arr_c3[$no]."')";
                  $this->db->query($q);

                  $no++; }

                  //centroid baru 1.a
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c1);$i++)
                  {
                    $arr[$i] = $arr_c1_temp[$i]*$arr_c1[$i];
                    if($arr_c1[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c1a_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 1.b
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c2);$i++)
                  {
                    $arr[$i] = $arr_c2_temp[$i]*$arr_c1[$i];
                    if($arr_c1[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c1b_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 1.c
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c3);$i++)
                  {
                    $arr[$i] = $arr_c3_temp[$i]*$arr_c1[$i];
                    if($arr_c1[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c1c_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 2.a
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c1);$i++)
                  {
                    $arr[$i] = $arr_c1_temp[$i]*$arr_c2[$i];
                    if($arr_c2[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c2a_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 2.b
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c2);$i++)
                  {
                    $arr[$i] = $arr_c2_temp[$i]*$arr_c2[$i];
                    if($arr_c2[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c2b_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 2.c
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c3);$i++)
                  {
                    $arr[$i] = $arr_c3_temp[$i]*$arr_c2[$i];
                    if($arr_c2[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c2c_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 3.a
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c1);$i++)
                  {
                    $arr[$i] = $arr_c1_temp[$i]*$arr_c3[$i];
                    if($arr_c3[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c3a_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 3.b
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c2);$i++)
                  {
                    $arr[$i] = $arr_c2_temp[$i]*$arr_c3[$i];
                    if($arr_c3[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c3b_b = round(array_sum($arr)/$jum, 2);

                  //centroid baru 3.c
                  $jum = 0;
                  $arr = array();
                  for($i=0;$i<count($arr_c3);$i++)
                  {
                    $arr[$i] = $arr_c3_temp[$i]*$arr_c3[$i];
                    if($arr_c3[$i]==1)
                    {
                      $jum++;
                    }
                  }
                  $c3c_b = round(array_sum($arr)/$jum, 2);


                  $q = "insert into hasil_centroid(c1a,c1b,c1c,c2a,c2b,c2c,c3a,c3b,c3c) values('".$c1a_b."','".$c1b_b."','".$c1c_b."','".$c2a_b."','".$c2b_b."','".$c2c_b."','".$c3a_b."','".
                  $c3b_b."','".$c3c_b."')";
                  $this->db->query($q);


                  ?>
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
