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

  $query_trans=$mysqli->query("SELECT * FROM transaction WHERE transid ='$_GET[transid]'");
  $row=mysqli_fetch_array($query_trans);
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Transaction</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Edit Transaction</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">


     <form class="form-horizontal" name="edit_quotation_form" action="index.php?page=update_quotation" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
            <label>Quotation No.</label>
            <input type="text" name="transid" class="form-control" value="<?php echo $row['transid']; ?>" readonly>  
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Date</label>
            <input type="date" name="transdate" class="form-control" value="<?php echo $row['transdate']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
                <label>Status</label>
								<input type="text" name="id_status" class="form-control" value="<?php 
            if($row['id_status'] == 1){echo 'OPEN';
                  }else if ($row['id_status'] == 2) {
                    echo 'REQUEST APPROVAL';
                  }else if ($row['id_status'] == 3) {
                    echo 'APPROVED';
                  }else if ($row['id_status'] == 4) {
                    echo 'REJECTED';
                  }else if ($row['id_status'] == 5) {
                    echo 'PRINT';
                  }else if ($row['id_status'] == 6) {
                    echo 'REVISI';
                  }else if ($row['id_status'] == 7) {
                    echo 'CREATE SO';
                  } 
                ?>" readonly>
            </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" id="nama_cust" name="nama_cust" class="form-control" value="<?php echo $row['nama_cust']; ?>" required>
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
                  <input type="text" id="alamat_cust" name="alamat_cust" class="form-control" value="<?php echo $row['alamat_cust']; ?>" required>
              </div>
          </div>

        <div class="col-md-6">
              <div class="form-group">
                  <label>Area</label>
                  <input type="text" id="area_cust" name="area_cust" class="form-control" value="<?php echo $row['area_cust']; ?>" required>
              </div>
          </div>

      </div>

      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
              <label>No. Telepon</label>
              <input type="number" id="telepon_cust" name="telepon_cust" class="form-control" value="<?php echo $row['telepon_cust']; ?>" required>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
              <label>Email</label>
              <input type="text" id="email_cust" name="email_cust" class="form-control" value="<?php echo $row['email_cust']; ?>" required>
          </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
              <label>Customer QQ Code</label>
              <input type="text" id="custqq_code" name="custqq_code" class="form-control" value="<?php echo $row['custqq_code']; ?>">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Customer QQ Name</label>
                <input type="text" id="custqq_name" name="custqq_name" class="form-control" value="<?php echo $row['custqq_name']; ?>">
            </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
              <label>Nama Sales</label>
              <input type="text" id="nama_sales" name="nama_sales" class="form-control" value="<?php echo $row['nama_sales']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
              <label>Nomor Sales</label>
              <input type="text" id="telepon_sales" name="telepon_sales" class="form-control" value="<?php echo $row['telepon_sales']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
              <label>Email Sales</label>
              <input type="text" id="email_sales" name="email_sales" class="form-control" value="<?php echo $row['email_sales']; ?>" readonly>
          </div>
        </div>

      </div>

        <div class="row">

          <div class="col-md-3">
            <div class="form-group">
              <label>Delivery Date</label>
                <input type="date"  name="delivery_date" class="form-control" value="<?php echo $row['delivery_date']; ?>">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <label>PPN</label>
                <input type="number" name="ppn" id="ppn" class="form-control" value="<?php echo $row['ppn']; ?>" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <label>Currency</label>
								<select class="form-control select2" name="id_currency" id="id_currency" onchange="isi_otomatis4()">
	              	<option selected="selected"><?php if($row['id_currency'] == 1){
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
            ?></option>
									<?php
			            include "koneksi.php";
			            $sql=mysqli_query($mysqli,"select * from ms_currency order by id_currency asc");
			            while ($data = mysqli_fetch_array($sql)){
			                echo '<option name="code_currency" value="'.$data['id_currency'].'">'.$data['code_currency'].'</option>';
			            }?>
	            </select>	
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <label>Rate</label>
                <input type="number" name="rate_currency" id="rate_currency" class="form-control" value="<?php echo $row['rate_currency']; ?>" readonly>
            </div>
          </div>

        </div>

      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
             <button type="reset" class="btn btn-danger">Reset</button>
             <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
      
  </form>
</div>
</section>




<?php
  include("footer2.php");
?>