  <?php
  include("header2.php");


  include("koneksi.php");
  $sql=$mysqli->query("select * FROM transaction WHERE transid ='$_GET[transid]'");
  $row=mysqli_fetch_array($sql);

  $sql2=$mysqli->query("select a.transid, b.id_item, b.nama_item, b.type_item, b.detail_item, b.harga_item, b.qty_item FROM transaction a INNER JOIN trx_item b ON a.transid = b.transid WHERE b.transid ='$_GET[transid]'");
  $row2=mysqli_fetch_array($sql2); 




?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Quotation</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Quotation Form</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Quotation Form</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

     <form class="form-horizontal" name="add_top_form" action="index.php?page=create_top" method="post" enctype="multipart/form-data">
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
            <input type="date" id="transdate" name="transdate" class="form-control" value="<?php echo $row['transdate']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Status</label>
            <input type="text" id="id_status" name="id_status" class="form-control" value="<?php if($row['id_status'] == 1){echo 'OPEN';
            }else if ($row['id_status'] == 2) {
              echo 'APPROVE';
            }else if ($row['id_status'] == 3) {
              echo 'PRINT';
            }else if ($row['id_status'] == 4) {
              echo 'REVISI';
            } ?>" disabled>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
            <label>Customer Code</label>
            <input type="text" name="id_cust" class="form-control" value="<?php echo $row['id_cust']; ?>" readonly>  
          </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" id="nama_cust" name="nama_cust" class="form-control" value="<?php echo $row['nama_cust']; ?>" disabled>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" id="perusahaan_cust" name="perusahaan_cust" class="form-control" value="<?php echo $row['perusahaan_cust']; ?>" disabled>
            </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-8">
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" id="alamat_cust" name="alamat_cust" class="form-control" value="<?php echo $row['alamat_cust']; ?>" disabled>
              </div>
          </div>

        <div class="col-md-4">
              <div class="form-group">
                  <label>Area</label>
                  <input type="text" id="area_cust" name="area_cust" class="form-control" value="<?php echo $row['area_cust']; ?>" disabled>
              </div>
          </div>

      </div>

      <div class="row">

        <div class="col-md-2">
          <div class="form-group">
              <label>No. Telepon</label>
              <input type="number" id="telepon_cust" name="telepon_cust" class="form-control" value="<?php echo $row['telepon_cust']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
              <label>Email</label>
              <input type="text" id="email_cust" name="email_cust" class="form-control" value="<?php echo $row['email_cust']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
              <label>Customer QQ Code</label>
              <input type="text" id="custqq_code" name="custqq_code" class="form-control" value="<?php echo $row['custqq_code']; ?>" disabled>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Customer QQ Name</label>
                <input type="text" id="custqq_name" name="custqq_name" class="form-control" value="<?php echo $row['custqq_name']; ?>" disabled>
            </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label>Sales Code</label>
            <input type="text" id="id_sales" name="id_sales" class="form-control" value="<?php echo $row['id_sales']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
              <label>Nama Sales</label>
              <input type="text" id="nama_sales" name="nama_sales" class="form-control" value="<?php echo $row['nama_sales']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
              <label>Nomor Sales</label>
              <input type="text" id="telepon_sales" name="telepon_sales" class="form-control" value="<?php echo $row['telepon_sales']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
              <label>Email Sales</label>
              <input type="text" id="email_sales" name="email_sales" class="form-control" value="<?php echo $row['email_sales']; ?>" disabled>
          </div>
        </div>

      </div>

        <div class="row">

          <div class="col-md-3">
              <div class="form-group">
                <label>PPN(%) :</label>
                <input type="number" id="ppn" name="ppn" class="form-control" value="<?php echo $row['ppn']; ?>" disabled>
              </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Delivery Date</label>
                <input type="date" id="delivery_date" name="delivery_date" class="form-control" value="<?php echo $row['delivery_date']; ?>" disabled>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <label>Currency</label>
               <input type="number" id="id_currency" name="id_currency" class="form-control" value="<?php echo $row['id_currency ']; ?>" disabled>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <label>Rate</label>
                <input type="number" name="rate_currency" id="rate_currency" class="form-control" value="<?php echo $row['rate_currency']; ?>"  disabled>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-12">
            <div class="form-group">
              <label>Term of Payment</label>
              <select class="form-control" name="kode_top[]" id="kode_top"  onchange = "CheckTop()">
                <option selected="selected">-- Pilih Term of Payment --</option>
                <?php
                include "koneksi.php";
                $sql=mysqli_query($mysqli,"select * from ms_top where status_top = 1 order by id_top asc");
                while ($data = mysqli_fetch_array($sql)){
                    echo '<option name="kode_top[]" value="'.$data['kode_top'].'">'.$data['desc_top'].'</option>';
                }?>
              </select>
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