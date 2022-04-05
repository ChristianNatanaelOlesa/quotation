<?php
	include("header2.php");

	include("koneksi.php");

	$sql=$mysqli->query("select max(id_item) as maxItem FROM trx_item");
  $row=mysqli_fetch_array($sql);

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
    </div>

    <script>
$(document).ready(function(){
    $("select.segment").change(function(){
        var selectedSegment = $(".segment option:selected").val();
        $.ajax({
            type: "POST",
            url: "populate_dropdown_list.php",
            data: { segment : selectedSegment } 
        }).done(function(data){
            $("#sub_segment").html(data);
        });
    });
});
</script>

<script type="text/javascript">
function CheckTop(value){
  var st = $("#kode_top").val();
  if(st == "other"){
    document.getElementById("desc_other").disabled = false;
  } else {
  document.getElementById("desc_other").disabled = true;
  }
}
</script>


     <form class="form-horizontal" name="add_quotation_form" action="index.php?page=create_quotation" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row">

        <div class="col-md-12">
            <div class="form-group">
              <label>Date</label>
              <input class="form-control" type="date" name="transdate" id="transdate" required>
            </div>
        </div>

		  </div>

	    <div class="row">

	    	<div class="col-md-4">
          <div class="form-group">
            <label>Customer Code</label>
            <select class="form-control select2" name="id_cust" id="id_cust" onchange="isi_otomatis()">
            <option selected="selected">-- Pilih Customer Code --</option>
						<?php
            include "koneksi.php";
            $sql=mysqli_query($mysqli,"select * from ms_customer order by id_cust asc");
            while ($data = mysqli_fetch_array($sql)){
                echo '<option name="id_cust" value="'.$data['id_cust'].'">'.$data['id_cust'].'</option>';
            }?>
            </select>			        
          </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" name="nama_cust" value="" id="nama_cust" class="form-control" readonly>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
              	<label>Company Name</label>
              	<input type="text" name="perusahaan_cust" value="" id="perusahaan_cust" class="form-control" readonly>
            </div>
        </div>

	    </div>

	    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label>Project</label>
                <input type="text" name="project_cust" value="" id="project_cust" class="form-control" required>
            </div>
        </div>

        <div class="col-md-4">
        	<div class="form-group">
            <label>Segment</label>
            <select class="form-control select2 country" name="segment" id="segment" >
            <option selected="selected">-- Pilih Segment --</option>
						<?php
            include "koneksi.php";
            $sql=mysqli_query($mysqli,"select distinct segment from ms_segment order by id_segment asc");
            while ($data = mysqli_fetch_array($sql)){
                echo '<option name="segment" value="'.$data['segment'].'">'.$data['segment'].'</option>';
            }?>
            </select>			        
          </div>
        </div>

        <div class="col-md-4">
        	<div class="form-group">
            <label>Sub Segment</label>
            <select class="form-control select2 sub_segment" id="sub_segment" name="sub_segment">
						  <option selected="selected" value=""> -- Pilih Sub Segment -- </option>
						</select>	        
          </div>
        </div>

	    </div>

	    <div class="row">

	    	<div class="col-md-8">
	            <div class="form-group">
	              	<label>Alamat</label>
	              	<input type="text" name="alamat_cust" value="" id="alamat_cust" class="form-control" readonly>
	            </div>
	        </div>

	    	<div class="col-md-4">
	            <div class="form-group">
	              	<label>Area</label>
	              	<input type="text" name="area_cust" value="" id="area_cust" class="form-control" readonly>
	            </div>
	        </div>

	    </div>

	    <div class="row">

	    	<div class="col-md-2">
          <div class="form-group">
            	<label>No. Telepon</label>
            	<input type="text" name="telepon_cust" value="" id="telepon_cust" class="form-control" readonly>
          </div>
	      </div>

	    	<div class="col-md-4">
          <div class="form-group">
            	<label>Email</label>
            	<input type="text" name="email_cust" value="" id="email_cust" class="form-control" readonly>
          </div>
	      </div>

        <div class="col-md-2">
            <div class="form-group">
              <label>Customer QQ Code</label>
              <input type="text" name="custqq_code" value="" id="custqq_code" class="form-control" placeholder="Customer QQ Code">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Customer QQ Name</label>
                <input type="text" name="custqq_name" value="" id="custqq_name" class="form-control" placeholder="Customer QQ Name"/>
            </div>
        </div>

	    </div>

		<div class="control-group after-add-more">

          <div class="row">

            <div class="col-md-11">
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

            <div class="col-md-1">
            	<label>Action</label>
            	<button class="btn btn-success add-more" type="button">Add</button>
          	</div>

        </div>

      </div>

      	<div class="row">
            <div class="col-md-12">
				<div class="form-group">
					<div class="form-group" id="divDesc" style="display: none">
						<textarea class="form-control" name="desc_other[]" id="desc_other" placeholder="Other Term of Payment"></textarea>
					</div>
				</div>
            </div>
        </div>

			<div class="row">

				<div class="col-md-3">
					<div class="form-group">
						<label>Sales Code</label>
              <select class="form-control select2" name="id_sales" id="id_sales" onchange="isi_otomatis2()">
              	<option selected="selected">-- Pilih Sales Code --</option>
								<?php
		            include "koneksi.php";
		            $sql=mysqli_query($mysqli,"select * from ms_sales order by id_sales asc");
		            while ($data = mysqli_fetch_array($sql)){
		                echo '<option name="id_sales" value="'.$data['id_sales'].'">'.$data['id_sales'].'</option>';
		            }?>
	            </select>		
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
					    <label>Nama Sales</label>
					    <input type="text" name="nama_sales" value="" id="nama_sales" class="form-control" readonly>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
					    <label>Nomor Sales</label>
					    <input type="text" name="telepon_sales" value="" id="telepon_sales" class="form-control" readonly>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
					    <label>Email Sales</label>
					    <input type="text" name="email_sales" value="" id="email_sales" class="form-control" readonly>
					</div>
				</div>

			</div>

				<div class="row">

	        <div class="col-md-3">
	            <div class="form-group">
	              <label>PPN(%) :</label>
	              <input type="number" name="ppn" class="form-control" value="10" placeholder="0.0000" required>
	            </div>
	        </div>

			    <div class="col-md-3">
						<div class="form-group">
						  <label>Delivery Date</label>
						    <input class="form-control" type="date" name="delivery_date" id="delivery_date" class="form-control" required>
						</div>
					</div>

					<div class="col-md-3">
            <div class="form-group">
                <label>Currency</label>
								<select class="form-control select2" name="id_currency" id="id_currency" onchange="isi_otomatis4()">
	              	<option selected="selected">-- Pilih Currency --</option>
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
                <input type="number" name="rate_currency" value="" id="rate_currency" class="form-control" readonly>
            </div>
	        </div>

	      </div>

	      <div class="row">

	        <div class="col-md-6">
	            <div class="form-group">
	              <label>Nama Item</label>
	              <input type="text" name="nama_item" class="form-control"  placeholder="Nama Item" required>
	            </div>
	        </div>

	        <div class="col-md-6">
	            <div class="form-group">
	              <label>Type Item</label>
	              <input type="text" name="type_item" class="form-control"  placeholder="Type Item" required>
	            </div>
	        </div>

	      </div>

      	<div class="control-group after-add-more2">

      		<div class="row">

      			<div class="col-md-2">
	      			<div class="form-group">
	              <label>ID Item</label>
                <input type="text" name="id_item[]" class="form-control" required><?php echo $row['maxItem'] ?>  
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
	              <button class="btn btn-success add-more2" type="button"> Add</button>
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

	<div class="copy invisible">
		<div class="row control-group">

			<div class="col-md-11">
        <div class="form-group">
          <select class="form-control" name="kode_top[]" id="kode_top">
          <option selected="selected">-- Pilih Term of Payment --</option>
          <?php
          include "koneksi.php";
          $sql=mysqli_query($mysqli,"select * from ms_top where status_top = 1 or kode_top <> 'other' order by id_top asc");
          while ($data = mysqli_fetch_array($sql)){
              echo '<option name="kode_top[]" value="'.$data['kode_top'].'">'.$data['desc_top'].'</option>';
          }?>
          </select>   
        </div>
      </div>

      <div class="col-md-1">
      	<button class="btn btn-danger remove" type="button">Remove</button>
      </div>

  	</div>

	  </div>

	  <div class="copy2 invisible">

	    <div class="row control-group">

	    	<div class="col-md-2">
	            <div class="form-group">

	                <input type="text" name="id_item[]" class="form-control" required><?php echo $row['maxItem']; ?>
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
	      	<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
	      </div>

	      
	      </div>

    </div>

  </div>

</section>

<?php
	include("footer2.php");
?>