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

<?php include("header2.php"); ?>



<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Review Request Approval</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Review Request Approval</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-">
        <div class="card card-primary card-tabs">
          <div class="card-body">
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
                  <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include ("koneksi.php");
                $sql=mysqli_query($mysqli,"select * from transaction where id_status = 2 order by transid desc");

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
                      if($row['id_status'] == 1){
                          echo '<span class="label label-success" style="text-align: center">OPEN</span>';
                        }else if ($row['id_status'] == 2) {
                          echo '<span class="label label-warning" style="text-align: center">REQEUST APPROVAL</span>';
                        }else if ($row['id_status'] == 3) {
                          echo '<span class="label label-warning" style="text-align: center">PRINT</span>';
                        }else if ($row['id_status'] == 4) {
                          echo '<span class="label label-warning" style="text-align: center">REVISI</span>';
                        }
                    echo '
                      </td>
                      <td style="text-align: center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default">
                            <a href="approval_quotation.php?transid='.$row['transid'].'" title="Approve Transaction"><i class="fas fa-edit"></i></a>
                          </button>
                        </div>
                      </td>
                    </tr>
                    ';
                    $no++;
                  }
                }
                ?>
                </tbody>    
              </table>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php include("footer2.php"); ?>