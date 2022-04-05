<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
  }

  $session_nama     = $_SESSION['nama'];
  $session_jabatan  = $_SESSION['jabatan'];
  $session_level    = $_SESSION['level'];
  $session_bagian    = $_SESSION['bagian'];
 
  ?>
  
<?php include("header2.php");?>



<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) --> 
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">

            <?php
            include "koneksi.php";
            $total_open=mysqli_query($mysqli,"select sum(id_status) as total_open from transaction where id_status = 1 and transdate = date(now()) and nama_sales='$session_nama' ");
            $data_open=mysqli_fetch_assoc($total_open); 
            
            if ($data_open['total_open'] > 0) {
              echo '<h3>'.$data_open['total_open'].'</h3>';
            }else {
              echo '<h3>0</h3>';
            }

            ?>
            
            <p>Total OPEN Hari ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <?php
            include "koneksi.php";
            $total_request=mysqli_query($mysqli,"select count(id_status) as total_request from transaction where id_status = 2 and transdate = date(now()) and nama_sales='$session_nama' ");
            $data_request=mysqli_fetch_assoc($total_request); 

            if ($data_request['total_request'] > 0) {
              echo '<h3>'.$data_request['total_request'].'</h3>';
            }else {
              echo '<h3>0</h3>';
            }

            ?>

            <p>Total Request Approval Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <?php
            include "koneksi.php";
            $total_approve=mysqli_query($mysqli,"select count(id_status) as total_approve from transaction where id_status = 3 and transdate = date(now()) and nama_sales='$session_nama' ");
            $data_total_approve=mysqli_fetch_assoc($total_approve); 
            
            if ($data_total_approve['total_approve'] > 0) {
              echo '<h3>'.$data_total_approve['total_approve'].'</h3>';
            }else {
              echo '<h3>0</h3>';
            }

            ?>

            <p>Total Approved Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <?php
            include "koneksi.php";
            $total_reject=mysqli_query($mysqli,"select count(id_status) as total_reject from transaction where id_status = 4 and transdate = date(now()) and nama_sales='$session_nama' ");
            $data_total_reject=mysqli_fetch_assoc($total_reject); 
            
            if ($data_total_reject['total_reject'] > 0) {
              echo '<h3>'.$data_total_reject['total_reject'].'</h3>';
            }else {
              echo '<h3>0</h3>';
            }

            ?>

            <p>Total Rejected Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-12 col-sm-">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">OPEN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">REQUEST APPROVAL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">APPROVED</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">REJECTED</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <table id="exampleOpen" class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                      <th style="text-align: center">NO.</th>
                      <th style="text-align: center">Transaction Date</th>
                      <th style="text-align: center">Quotation No.</th>
                      <th style="text-align: center">Nama Perusahaan</th>
                      <th style="text-align: center">Nama Customer</th>
                      <th style="text-align: center">Delivery Date</th>
                      <th style="text-align: center">Status</th>
                      <th style="text-align: center">Aging</th>
                      <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php
                    include ("koneksi.php");

                    


                    if ($session_jabatan == 'Staff') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 1 and nama_sales = '$session_nama' order by transid desc");
                    }elseif ($session_jabatan == 'Manager') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 1 and groupsales = '$session_bagian' order by transid desc");
                    }


                    
                    if(mysqli_num_rows($sql) == 0){
                      echo '<tr><td colspan="8">Tidak Ada Data.</td></tr>';
                    }else{
                      $no = 1;
                      while($row = mysqli_fetch_assoc($sql)){

                        $dv_dt = time();
                        $tr_dt = strtotime($row['transdate']);
                        $beetween = $dv_dt - $tr_dt;
                        $aging = round($beetween / (60 * 60 * 24));
                            echo '
                        <tr>
                          <td style="text-align: center">'.$no.'</td>
                          <td style="text-align: center">'.$row['transdate'].'</td>
                          <td style="text-align: center">'.$row['transid'].'</td>
                          <td style="text-align: center">'.$row['perusahaan_cust'].'</td>
                          <td style="text-align: center">'.$row['nama_cust'].'</td>
                          <td style="text-align: center">'.$row['delivery_date'].'</td>
                          <td style="text-align: center">';
                           if($row['id_status'] == 1){
                              echo '<span class="badge bg-primary" style="text-align: center;">OPEN</span>';
                            }

                        if ($session_jabatan == 'Staff') {
                          echo '
                          </td>
                          <td class="text-danger" style="text-align: center"><b>'.$aging.'</b></td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="detail_transaction.php?transid='.$row['transid'].'" title="Lihat Detail"><i class="fas fa-list-ul"></i></a>
                              </button>
                            </div>
                          </td>
                        </tr>
                        ';
                        }elseif ($session_jabatan == 'Manager') {
                          echo '
                          </td>
                          <td class="text-danger" style="text-align: center"><b>'.$aging.'</b></td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="view_quotation.php?transid='.$row['transid'].'" title="Lihat Detail"><i class="fas fa-list-ul"></i></a>
                              </button>
                            </div>
                          </td>
                        </tr>
                        ';
                        }
                        
                        $no++;
                      }
                    }
                    ?>
                    </tbody>    
                  </table>

              </div>

            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
             <div class="card">
                <table id="exampleApprove" class="table table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                    <th style="text-align: center">NO.</th>
                    <th style="text-align: center">Transaction Date</th>
                    <th style="text-align: center">Quotation No.</th>
                    <th style="text-align: center">Nama Perusahaan</th>
                    <th style="text-align: center">Nama Customer</th>
                    <th style="text-align: center">Delivery Date</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Aging</th>
                    <th style="text-align: center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    include ("koneksi.php");
                    if ($session_jabatan == 'Staff') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 2 and nama_sales = '$session_nama' order by transid desc");
                    }elseif ($session_jabatan == 'Manager') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 2 and groupsales = '$session_bagian' order by transid desc");
                    }

                    if(mysqli_num_rows($sql) == 0){
                      echo '<tr><td colspan="8">Tidak Ada Data.</td></tr>';
                    }else{
                      $no = 1;
                      while($row = mysqli_fetch_assoc($sql)){

                        $dv_dt = time();
                        $tr_dt = strtotime($row['tgl_pengajuan']);
                        $beetween = $dv_dt - $tr_dt;
                        $aging = round($beetween / (60 * 60 * 24));

                        echo '
                        <tr>
                          <td style="text-align: center">'.$no.'</td>
                          <td style="text-align: center">'.$row['transdate'].'</td>
                          <td style="text-align: center">'.$row['transid'].'</td>
                          <td style="text-align: center">'.$row['perusahaan_cust'].'</td>
                          <td style="text-align: center">'.$row['nama_cust'].'</td>
                          <td style="text-align: center">'.$row['delivery_date'].'</td>
                          <td style="text-align: center">';
                          if ($row['id_status'] == 2) {
                              echo '<span class="label label-warning" style="text-align: center">REQUEST APPROVAL</span>';
                            }

                        if ($session_jabatan == 'Staff') {
                          echo '
                          </td>
                          <td class="text-danger" style="text-align: center"><b>'.$aging.'</b></td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="detail_transaction.php?transid='.$row['transid'].'" title="Lihat Detail"><i class="fas fa-list-ul"></i></a>
                              </button>
 
                            </div>
                          </td>
                        </tr>
                        ';
                        }elseif ($session_jabatan == 'Manager') {
                          echo '
                          </td>
                          <td class="text-danger" style="text-align: center"><b>'.$aging.'</b></td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="view_quotation.php?transid='.$row['transid'].'" title="Lihat Detail"><i class="fas fa-list-ul"></i></a>
                              </button>
                            </div>
                          </td>
                        </tr>
                        ';
                        }
                        $no++;
                      }
                    }
                    ?>
                  </tbody>    
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
             <div class="card">
                <table id="examplePrint" class="table table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                    <th style="text-align: center">NO.</th>
                    <th style="text-align: center">Transaction Date</th>
                    <th style="text-align: center">Quotation No.</th>
                    <th style="text-align: center">Nama Perusahaan</th>
                    <th style="text-align: center">Nama Customer</th>
                    <th style="text-align: center">Delivery Date</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    include ("koneksi.php");

                    if ($session_jabatan == 'Staff') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 3 and nama_sales = '$session_nama' order by transid desc");
                    }elseif ($session_jabatan == 'Manager') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 3 and groupsales = '$session_bagian' order by transid desc");
                    }

                    if(mysqli_num_rows($sql) == 0){
                      echo '<tr><td colspan="8">Tidak Ada Data.</td></tr>';
                    }else{
                      $no = 1;
                      while($row = mysqli_fetch_assoc($sql)){
                        echo '
                        <tr>
                          <td style="text-align: center">'.$no.'</td>
                          <td style="text-align: center">'.$row['transdate'].'</td>
                          <td style="text-align: center">'.$row['transid'].'</td>
                          <td style="text-align: center">'.$row['perusahaan_cust'].'</td>
                          <td style="text-align: center">'.$row['nama_cust'].'</td>
                          <td style="text-align: center">'.$row['delivery_date'].'</td>
                          <td style="text-align: center">';
                           if ($row['id_status'] == 3) {
                              echo '<span class="badge bg-success" style="text-align: center">APPROVED</span>';
                            }
                        if ($session_jabatan == 'Staff') {
                          echo '
                          </td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="detail_transaction.php?transid='.$row['transid'].'" title="Lihat Detail"><i class="fas fa-list-ul"></i></a>
                              </button>
                            </div>
                          </td>
                        </tr>
                        ';
                        }elseif ($session_jabatan == 'Manager') {
                          echo '
                          </td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="view_quotation.php?transid='.$row['transid'].'" title="Lihat Detail"><i class="fas fa-list-ul"></i></a>
                              </button>
                            </div>
                          </td>
                        </tr>
                        ';
                        }
                        $no++;
                      }
                    }
                    ?>
                  </tbody>    
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
             <div class="card">
                <table id="exampleRevisi" class="table table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                    <th style="text-align: center">NO.</th>
                    <th style="text-align: center">Transaction Date</th>
                    <th style="text-align: center">Quotation No.</th>
                    <th style="text-align: center">Nama Perusahaan</th>
                    <th style="text-align: center">Nama Customer</th>
                    <th style="text-align: center">Delivery Date</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    include ("koneksi.php");

                    if ($session_jabatan == 'Staff') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 4 and nama_sales = '$session_nama' order by transid desc");
                    }elseif ($session_jabatan == 'Manager') {
                      $sql=mysqli_query($mysqli,"select * from transaction where id_status = 4 and groupsales = '$session_bagian' order by transid desc");
                    }

                    if(mysqli_num_rows($sql) == 0){
                      echo '<tr><td colspan="8">Tidak Ada Data.</td></tr>';
                    }else{
                      $no = 1;
                      while($row = mysqli_fetch_assoc($sql)){
                        echo '
                        <tr>
                          <td style="text-align: center">'.$no.'</td>
                          <td style="text-align: center">'.$row['transdate'].'</td>
                          <td style="text-align: center">'.$row['transid'].'</td>
                          <td style="text-align: center">'.$row['perusahaan_cust'].'</td>
                          <td style="text-align: center">'.$row['nama_cust'].'</td>
                          <td style="text-align: center">'.$row['delivery_date'].'</td>
                          <td style="text-align: center">';
                           if ($row['id_status'] == 4) {
                              echo '<span class="badge bg-danger" style="text-align: center">REJECTED</span>';
                            }
                        if ($session_jabatan == 'Staff') {
                          echo '
                          </td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="edit_quotation_reject.php?transid='.$row['transid'].'" title="Edit Quptation"><i class="fas fa-list-ul"></i></a>
                              </button>
                            </div>
                          </td>
                        </tr>
                        ';
                        }elseif ($session_jabatan == 'Manager') {
                          echo '
                          </td>
                          <td style="text-align: center">
                            <div class="btn-group">
                             <button type="button" class="btn btn-default">
                                <a href="view_quotation.php?transid='.$row['transid'].'" title="Lihat Detail"><i class="fas fa-list-ul"></i></a>
                              </button>
                            </div>
                          </td>
                        </tr>
                        ';
                        }
                        $no++;
                      }
                    }
                    ?>
                  </tbody>    
                </table>
              </div>
            </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php include("footer2.php"); ?>