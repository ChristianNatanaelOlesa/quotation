  <?php
  include("header2.php");

    include("koneksi.php");
  $sql=$mysqli->query("select * FROM transaction WHERE transid ='$_GET[transid]'");
  $row=mysqli_fetch_array($sql);

  $sql2=$mysqli->query("select a.transid, b.id_item, b.nama_item, b.type_item, b.detail_item, b.harga_item, b.qty_item FROM transaction a INNER JOIN trx_item b ON a.transid = b.transid WHERE b.transid ='$_GET[transid]'");
  $row2=mysqli_fetch_array($sql2); 

  $sql3=$mysqli->query("select max(id_item) as maxItem FROM trx_item");
  $row3=mysqli_fetch_array($sql3);

  $sql4=$mysqli->query("select kode_top FROM trx_top");
  $row4=mysqli_fetch_array($sql4);
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add Item</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Add Item</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">


     <form class="form-horizontal" name="add_item_form" action="index.php?page=create_item" method="post" enctype="multipart/form-data">
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
            <input type="date" name="transdate" class="form-control" value="<?php echo $row['transdate']; ?>" disabled>
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

        <div class="col-md-3">
          <div class="form-group">
              <label>No. Telepon</label>
              <input type="number" id="telepon_cust" name="telepon_cust" class="form-control" value="<?php echo $row['telepon_cust']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
              <label>Email</label>
              <input type="text" id="email_cust" name="email_cust" class="form-control" value="<?php echo $row['email_cust']; ?>" disabled>
          </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
              <label>Customer QQ Code</label>
              <input type="text" id="custqq_code" name="custqq_code" class="form-control" value="<?php echo $row['custqq_code']; ?>" disabled>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Customer QQ Name</label>
                <input type="text" id="custqq_name" name="custqq_name" class="form-control" value="<?php echo $row['custqq_name']; ?>" disabled>
            </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-12">

            <label>Term of Payment</label>
            <table class="table table-bordered">
                  <tbody>
                    <?php
                    include ("koneksi.php");
                    $query_top=mysqli_query($mysqli,"select a.transid, a.kode_top, b.desc_top FROM trx_top a INNER JOIN ms_top b ON a.kode_top = b.kode_top where transid = '$_GET[transid]' order by kode_top asc");

                    if(mysqli_num_rows($query_top) == 0){
                      echo '<tr><td colspan="8">Tidak Ada Data.</td></tr>';
                    }else{
                      while($top_row = mysqli_fetch_assoc($query_top)){
                        echo '
                        <tr>
                          <td>'.$top_row['desc_top'].'</td>
                        </tr>
                        ';
                      }
                    }
                    ?>
                  </tbody>
                </table>

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
                <input type="date"  name="delivery_date" class="form-control" value="<?php echo $row['delivery_date']; ?>" disabled>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                <label>Currency</label>
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
            ?>" disabled>
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

          <div class="col-md-6">
              <div class="form-group">
                <label>Nama Item</label>
                <input type="text" name="nama_item" class="form-control" value="<?php echo $row2['nama_item']; ?>" readonly>  
              </div>
          </div>

          <div class="col-md-6">
              <div class="form-group">
                <label>Type Item</label>
                <input type="text" name="type_item" class="form-control" value="<?php echo $row2['type_item']; ?>" readonly>  
              </div>
          </div>


        </div>

        <div class="control-group after-add-more2">

          <div class="row">

            <div class="col-md-2">
              <div class="form-group">
                <label>ID Item</label>
                <input type="text" name="id_item[]" class="form-control" required><?php echo $row3['maxItem'] ?> 
              </div>
              </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Detail Item</label>
                <input type="text" name="detail_item[]" class="form-control" required>
              </div>
              </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>Harga Item</label>
                <input type="text" name="harga_item[]" class="form-control" required>
              </div>
            </div>

            <div class="col-md-1">
              <div class="form-group">
                <label>Qty Item</label>
                <input type="text" name="qty_item[]" class="form-control" required>
              </div>
            </div>

            <div class="col-md-1">
              <div class="form-group">
                <label>Action</label>
                <button class="btn btn-success add-more2" type="button">Add</button>
              </div>
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

  <div class="copy2 invisible">
    <div class="row control-group">

      <div class="col-md-2">
            <div class="form-group">

                <input type="text" name="id_item[]" class="form-control" required>
            </div>
        </div>

      <div class="col-md-6">
        <div class="form-group">

          <input type="text" name="detail_item[]" class="form-control" required>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">

          <input type="text" name="harga_item[]" class="form-control" required>
        </div>
      </div>

      <div class="col-md-1">
        <div class="form-group">

          <input type="text" name="qty_item[]" class="form-control" required>
        </div>
      </div>

       <div class="col-md-1">
          <button class="btn btn-danger remove" type="button"> Remove</button>
        </div>

      </div>

    </div>
</div>
</section>




<?php
  include("footer2.php");
?>