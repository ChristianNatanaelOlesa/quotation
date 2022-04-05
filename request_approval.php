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
  
  <?php
  include("header2.php");

  include("koneksi.php");
  $sql=$mysqli->query("select * FROM transaction WHERE transid ='$_GET[transid]'");
  $row=mysqli_fetch_array($sql);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Request Approval</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Request Approval</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">


     <form class="form-horizontal" name="request_approval_form" action="index.php?page=create_request_approval" method="post" enctype="multipart/form-data">
    <div class="card-body">

      <div class="row">
        <div class="col-md-12">
          <font size="5" color="red">GENERAL INFORMATION</font>
        </div>
      </div>

      <br>

      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label>Quotation No.</label>
            <input type="text" name="transid" class="form-control" value="<?php echo $row['transid']; ?>" readonly>  
          </div>
        </div>

         <div class="col-md-3">
          <div class="form-group">
            <label>No Prospect</label>
            <input type="text" name="noprospect" class="form-control" value="<?php echo $row['noprospect']; ?>" readonly>  
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label>Date</label>
            <input type="date" name="transdate" class="form-control" value="<?php echo $row['transdate']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label>Status</label>
						<select class="form-control select2" name="id_status" id="id_status">
              <option value="2" selected>REQUEST APPROVAL</option>
            </select>	
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

        <div class="col-md-6">
            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" id="nama_cust" name="nama_cust" class="form-control" value="<?php echo $row['nama_cust']; ?>" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" id="perusahaan_cust" name="perusahaan_cust" class="form-control" value="<?php echo $row['perusahaan_cust']; ?>" readonly>
            </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-6">
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" id="alamat_cust" name="alamat_cust" class="form-control" value="<?php echo $row['alamat_cust']; ?>" readonly>
              </div>
          </div>

        <div class="col-md-6">
              <div class="form-group">
                  <label>Area</label>
                  <input type="text" id="area_cust" name="area_cust" class="form-control" value="<?php echo $row['area_cust']; ?>" readonly>
              </div>
          </div>

      </div>

      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
              <label>No. Telepon</label>
              <input type="number" id="telepon_cust" name="telepon_cust" class="form-control" value="<?php echo $row['telepon_cust']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
              <label>Email</label>
              <input type="text" id="email_cust" name="email_cust" class="form-control" value="<?php echo $row['email_cust']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
              <label>Customer QQ Code</label>
              <input type="text" id="custqq_code" name="custqq_code" class="form-control" value="<?php 
            if(empty($row['custqq_code'])){echo '-';
                  }else {
                    echo $row['custqq_code'];
                  } 
                ?>" readonly>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Customer QQ Name</label>
                <input type="text" id="custqq_name" name="custqq_name" class="form-control" value="<?php 
            if(empty($row['custqq_name'])){echo '-';
                  }else {
                    echo $row['custqq_name'];
                  } 
                ?>" readonly>
            </div>
        </div>

      </div>

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
        <table class="table text-nowrap">
          <thead>
          <tr>
            <th style="text-align: center">NO.</th>
            <th style="text-align: left">TERM OF PAYMENT</th>
          </tr>
          </thead>
          <tbody>
          <?php
          include ("koneksi.php");
          $query_top=mysqli_query($mysqli,"select desc_top FROM trx_top where transid = '$_GET[transid]' union select desc_other from trx_top_other where transid = '$_GET[transid]' ");


          if(mysqli_num_rows($query_top) == 0){
            echo '<tr><td colspan="2">Tidak Ada Data.</td></tr>';
          }else{
            $no = 1;
            while($top = mysqli_fetch_assoc($query_top)){
              echo '
              <tr>
                <td style="text-align: center">'.$no.'</td>
                <td style="text-align: left">'.$top['desc_top'].'</td>
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


      <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
             <button type="submit" class="btn btn-primary"><font size="5">SUBMIT</font></button>
        </div>
      </div>
      
  </form>

   

  
</div>
</section>




<?php
  include("footer2.php");
?>