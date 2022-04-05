<?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
  }

  $session_nama     = $_SESSION['nama'];
  $session_jabatan  = $_SESSION['jabatan'];
  $session_level    = $_SESSION['level'];
  $session_bagian   = $_SESSION['bagian'];
?>

<?php
  include("koneksi.php");
  $sql=$mysqli->query("select * FROM transaction WHERE transid ='$_GET[transid]'");
  $row=mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="layout-top-nav">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-7 float-sm-left">
            <h4 class="m-0"> APPROVAL QUOTATION - <?php echo $row['transid']; ?> - <?php echo $row['nama_sales']; ?></h4>
          </div><!-- /.col -->
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="review_request_app.php">Request Approval</a></li>
              <li class="breadcrumb-item active"><?php echo $row['transid']; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">

          <div class="card card-primary card-outline">
            <div class="card-body">

              <form class="form-horizontal" name="request_approval_form" action="" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md-12">
                    <font size="5" color="red">GENERAL INFORMATION</font>
                  </div>
                </div>

                <br>

                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label><font color="blue">NO QUOTATION</font></label>
                      <input type="text" name="transid" class="form-control" value="<?php echo $row['transid']; ?>" readonly>  
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label><font color="blue">NO PROSPECT</font></label>
                      <input type="text" name="noprospect" class="form-control" value="<?php echo $row['noprospect']; ?>" readonly>  
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label><font color="blue">TGL QUOTATION</font></label>
                      <input type="date" name="transdate" class="form-control" value="<?php echo $row['transdate']; ?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label><font color="blue">TGL PENGIRIMAN</font></label>
                        <input type="date"  name="delivery_date" class="form-control" value="<?php echo $row['delivery_date']; ?>" readonly>
                    </div>
                  </div>

                </div>

                <br>

                <div class="row">
                  <div class="col-md-12">
                    <font size="5" color="red">CUSTOMER INFORMATION</font>
                  </div>
                </div>

                <br>

                <div class="row">

                  <div class="col-md-4">
                      <div class="form-group">
                          <label><font color="blue">NAMA CUSTOMER</font></label>
                          <input type="text" id="nama_cust" name="nama_cust" class="form-control" value="<?php echo $row['nama_cust']; ?>" readonly>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label><font color="blue">NAMA PERUSAHAAN</font></label>
                          <input type="text" id="perusahaan_cust" name="perusahaan_cust" class="form-control" value="<?php echo $row['perusahaan_cust']; ?>" readonly>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">ALAMAT</font></label>
                        <input type="text" id="alamat_cust" name="alamat_cust" class="form-control" value="<?php echo $row['alamat_cust']; ?>" readonly>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">AREA</font></label>
                        <input type="text" id="area_cust" name="area_cust" class="form-control" value="<?php echo $row['area_cust']; ?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">NO. TELEPON</font></label>
                        <input type="number" id="telepon_cust" name="telepon_cust" class="form-control" value="<?php echo $row['telepon_cust']; ?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">EMAIL</font></label>
                        <input type="text" id="email_cust" name="email_cust" class="form-control" value="<?php echo $row['email_cust']; ?>" readonly>
                    </div>
                  </div>

                </div>

                <br>

                <div class="row">
                  <div class="col-md-12">
                    <font size="5" color="red">SALES INFORMATION</font>
                  </div>
                </div>

                <br>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">Nama Sales</font></label>
                        <input type="text" id="nama_sales" name="nama_sales" class="form-control" value="<?php echo $row['nama_sales']; ?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">Nomor Sales</font></label>
                        <input type="text" id="telepon_sales" name="telepon_sales" class="form-control" value="<?php echo $row['telepon_sales']; ?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">Email Sales</font></label>
                        <input type="text" id="email_sales" name="email_sales" class="form-control" value="<?php echo $row['email_sales']; ?>" readonly>
                    </div>
                  </div>

                </div>

                <br>

                <div class="row">
                  <div class="col-md-12">
                    <font size="5" color="red">COST INFORMATION</font>
                  </div>
                </div>

                <br>

                <div class="row">

                  <div class="col-md-4">
                      <div class="form-group">
                        <label><font color="blue">PPN(%) :</font></label>
                        <input type="number" id="ppn" name="ppn" class="form-control" value="<?php echo $row['ppn']; ?>" readonly>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">Currency</font></label>
                        <input type="text" id="id_currency" name="id_currency" class="form-control" value="<?php if($row['id_currency'] == 1){
                            echo 'IDR';
                          }else if ($row['id_currency'] == 2) {
                            echo 'SGD';
                          }else if ($row['id_currency'] == 3) {
                            echo 'USD';
                          }else if ($row['id_currency'] == 4) {
                            echo 'YUAN';
                          }else if ($row['id_currency'] == 5) {
                            echo 'GBP';
                          }
                    ?>" readonly>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label><font color="blue">Rate</font></label>
                        <input type="number" name="rate_currency" id="rate_currency" class="form-control" value="<?php echo $row['rate_currency']; ?>" readonly>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <thead>
                      <tr>
                        <th style="text-align: center">NO.</th>
                        <th style="text-align: center">DESKRIPSI TOP</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      include ("koneksi.php");
                      $query_top=mysqli_query($mysqli,"select desc_top FROM trx_top where transid = '$_GET[transid]' union select desc_other from trx_top_other where transid = '$_GET[transid]' ");


                      if(mysqli_num_rows($query_top) == 0){
                        echo '<tr><td colspan="8">Tidak Ada Data.</td></tr>';
                      }else{
                        $no = 1;
                        while($top = mysqli_fetch_assoc($query_top)){
                          echo '
                          <tr>
                            <td style="text-align: center">'.$no.'</td>
                            <td style="text-align: center">'.$top['desc_top'].'</td>
                          </tr>
                          ';
                          $no++;
                        }
                      }
                      ?>
                      </tbody>    
                    </table>
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-md-12">
                    <font size="5" color="red">TRAFO INFORMATION</font>
                  </div>
                </div>

                <br>

                <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Item</label>
                        <input type="text" name="nama_item" class="form-control" value="<?php echo $row['nama_item']; ?>" readonly>  
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Type Item</label>
                        <input type="text" name="type_trafo" class="form-control" value="<?php echo $row['type_trafo']; ?>" readonly>  
                      </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <thead>
                      <tr>
                        <th style="text-align: center">NO.</th>
                        <th style="text-align: center">No Sub Prospect</th>
                        <th style="text-align: center">Deskripsi</th>
                        <th style="text-align: center">Harga</th>
                        <th style="text-align: center">Quantity</th>
                      </tr>
                      </thead>

                      <tbody>
                      <?php
                      include ("koneksi.php");
                      $sql=mysqli_query($mysqli,"select a.transid, a.noprospect, b.* from transaction a inner join trx_item b ON a.noprospect = b.noprospect where b.noprospect = '$row[noprospect]' and a.transid = '$_GET[transid]' order by id asc");

                      if(mysqli_num_rows($sql) == 0){
                        echo '<tr><td colspan="5">Tidak Ada Data.</td></tr>';
                      }else{
                        $no = 1;
                        while($row = mysqli_fetch_assoc($sql)){
                      echo'
                          <tr>
                            <td style="text-align: center; width: 10%;">'.$no.'</td>
                            <td style="text-align: center">'.$row['nopracost'].'</td>
                            <td style="text-align: center">'.$row['detail_item'].'</td>
                            <td style="text-align: center">'.$row['harga_item'].'</td>
                            <td style="text-align: center">'.$row['qty_item'].'</td>
                          </tr>';
                          ?>
                          <?php 
                              $no++;
                            }
                          }
                          ?>
                      </tbody>    
                    </table>
                  </div>

                </div>

                <br>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <center>
                  
                      <input type="submit" name="app"  onclick="return confirm('Anda sudah yakin Approve? Akan langsung terkirim ke Sales ')" value="APPROVE" class="btn btn-success" />

                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg" onclick="return confirm('Mohon jelaskan alasan reject di form berikut ')" value="REJECT">
                                  REJECT
                      </button>

                      <a href="review_request_app.php"><button type="button" class="btn btn-primary">BACK</button></a>

                      </center>
                      
                      <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">ALASAN REJECT</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                               <div class="col-md-3">
                                  <div class="form-group">
                                    <input type="hidden" Readonly name="noprospect" autofocus  class="form-control" value="<?php echo $row['noprospect'];  ?> "/>
                                  </div>
                              </div>
                              </div>
                              <textarea rows="10" class="form-control" name="ket_reject" placeholder="Tulis Alasan Reject Disini" required></textarea>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" name="reject" class="btn btn-primary" onclick="return confirm('Yakin Ingin Reject ? Mohon Periksa alasan reject..')" value="Submit Reject">Submit</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>   
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div><!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  date_default_timezone_set('Asia/Jakarta');

  if(isset($_POST["app"])){
    if($_POST["app"]){
      $id_status    = 3;
      $status_app   = 'APPROVED';
      $tgl_approve  = date('Y-m-d h:m:s');
      $leader_app   = 'Christiana Sari Dewi';

      $mysqli->query("UPDATE transaction SET id_status='$id_status', tgl_approve='$tgl_approve', leader_app='$leader_app', status_app='$status_app' WHERE transid='$_POST[transid]'"); 

      echo "<script type='text/javascript'>
      alert('Approval Berhasil!!'); 
      document.location = 'dashboard.php'; 
    </script>";     
    }
  }
  ?>

  <?php
  date_default_timezone_set('Asia/Jakarta');

  if(isset($_POST["reject"])){
    if($_POST["reject"]){
      $id_status  = 4;
      $status_app = 'REJECTED';
      $tgl_reject = date('Y-m-d h:m:s');
      $leader_app = 'Christiana Sari Dewi';
      $ket_reject = $_POST['ket_reject'];

      $mysqli->query("UPDATE transaction SET id_status='$id_status', tgl_reject='$tgl_reject', leader_app='$leader_app', status_app='$status_app', ket_reject='$ket_reject' WHERE transid='$_POST[transid]'");

      echo "<script type='text/javascript'>
      alert('Approval Berhasil!!'); 
      document.location = 'dashboard.php'; 
    </script>";    
    }
  }
  ?>

  <!-- Main Footer -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 . PT. Trafoindo Prima Perkasa</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>

</body>
</html>
