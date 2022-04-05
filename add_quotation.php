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

<form class="form-horizontal" name="add_quotation_form" action="index.php?page=create_quotation" method="post" enctype="multipart/form-data">
	<div class="card-body">
		<div class="row">

			<div class="col-md-6">
			    <div class="form-group">
			      <label>Date</label>
			      <input class="form-control" type="date" name="transdate" id="transdate" required>
			    </div>
			</div>

			<div class="col-md-6">
			  	<div class="form-group">
				    <label>No Prospect</label>
				    <select class="form-control select2" name="noprospect" id="noprospect" onchange="autofill()">
					    <option selected="selected">-- Pilih No Prospect --</option>
					    <?php
					    include "koneksi.php";
					    $sql=mysqli_query($mysqli,"select a.noprospect, a.sales, b.transid from ms_prospect a inner join trx_item b ON a.noprospect = b.noprospect where a.sales = '$session_nama' and b.transid = '' order by noprospect asc");
					    while ($data = mysqli_fetch_array($sql)){
					        echo '<option name="noprospect" value="'.$data['noprospect'].'">'.$data['noprospect'].'</option>';
					    }?>
				    </select>
	        	<input type="hidden" name="hidden_prospect" id="hidden_prospect" />
			  	</div>
			</div>

	  	</div>

		<div class="row">

			<div class="col-md-6">
			    <div class="form-group">
			        <label>Customer Name</label>
			        <input type="text" name="nama_cust" value="Christian Natanael Olesa" id="nama_cust" class="form-control" required>
			    </div>
			</div>

			<div class="col-md-6">
			    <div class="form-group">
			      	<label>Company Name</label>
			      	<input type="text" name="perusahaan_cust" value="" id="perusahaan_cust" class="form-control" readonly>
			    </div>
			</div>

		</div>

		<div class="row">

			<div class="col-md-8">
		        <div class="form-group">
		          	<label>Alamat</label>
		          	<input type="text" name="alamat_cust" value="Tytyan Kencana A1 No. 8" id="alamat_cust" class="form-control" required>
		        </div>
		    </div>

			<div class="col-md-4">
		        <div class="form-group">
		          	<label>Area</label>
		          	<input type="text" name="area_cust" value="Bekasi Utara" id="area_cust" class="form-control" required>
		        </div>
		    </div>

		</div>

		<div class="row">

			<div class="col-md-2">
				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="telepon_cust" value="081283264650" id="telepon_cust" class="form-control" required>
				</div>
			 </div>

			<div class="col-md-4">
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email_cust" value="christianolesa@gmail.com" id="email_cust" class="form-control" required>
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

		<div class="row">

			<div class="col-md-4">
			    <div class="form-group">
			        <label>Project</label>
			        <input type="text" name="project_cust" value="" id="project_cust" class="form-control" readonly>
			    </div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
				    <label>Segment</label>
				    <input type="text" name="segment" value="" id="segment" class="form-control" readonly>
			  	</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
			    	<label>Sub Segment</label>
				    <input type="text" name="sub_segment" value="" id="sub_segment" class="form-control" readonly>      
			  	</div>
			</div>

		</div>

		<div class="row">

			<div class="col-md-3">
				<div class="form-group">
				    <label>Nama Sales</label>
				    <input type="text" name="nama_sales" value="" id="nama_sales" class="form-control" readonly>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
				    <label>Nomor Sales</label>
				    <input type="text" name="telepon_sales" value="081312654869" id="telepon_sales" class="form-control" required>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
				    <label>Email Sales</label>
				    <input type="text" name="email_sales" value="seekerneo2@gmail.com" id="email_sales" class="form-control" required>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
				    <label>Group Sales</label>
				    <input type="text" name="groupsales" value="" id="groupsales" class="form-control" readonly>
				</div>
			</div>

		</div>

		<div class="row">

		    <div class="col-md-3">
		        <div class="form-group">
		          <label>PPN(%) :</label>
		          <input type="number" name="ppn" class="form-control" value="10" placeholder="0.0000" readonly>
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

		<!-- <div class="row">
			<div class="col-md-12">
				<div class="form-group">
	        <label>Term Of Payments</label>
	        <select id="desc_top" name="desc_top[]" class="select2" multiple="multiple" data-placeholder="Select Term of Payment" style="width: 100%;">
						<?php
					    include "koneksi.php";
					    $sql=mysqli_query($mysqli,"select * from ms_top where status_top = 1 and kode_top != 'other' order by id_top asc");
					    while ($data = mysqli_fetch_array($sql)){
					        echo '<option name="desc_top[]" value="'.$data['desc_top'].'">'.$data['desc_top'].'</option>';
					    }?>
	        </select>
	      </div>
			</div>
		</div> -->

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
		      <input type="text" name="type_trafo" value="" id="type_trafo" class="form-control" readonly>
		    </div>
		</div>

	</div>

		<div class="row">
	    <div class="col-md-12">
				<table class="table table-bordered">
					<thead>
			      <tr>
			        <th style="width: 900px; text-align:center;">Term Of Payment</th>
			        <th style="width: 200px; text-align:center;"><button type="button" class="btn btn-primary" id="btn-tambah">Tambah</button></th>
			      </tr>
		      </thead>
		      <tbody id="tbl-top-body"></tbody>
	      </table>
	    </div>
		</div>

		<div class="row">
	    <div class="col-md-12">
	    	<label>Other Top</label>
				<div class="form-group">
					<div class="form-group">
						<textarea class="form-control" name="desc_other" id="desc_other" placeholder="Other Term of Payment"></textarea>
					</div>
				</div>
	    </div>
		</div>



<!-- 		<div class="row">
			<div class="col-md-12">
			    <h4>LIST ITEM</h4>
		  </div>

		</div>

		<div class="row">
			<table class="table">
				<thead>
		      <tr>
		        <th style="width: 150px">No Sub Prospect</th>
		        <th style="width: 200px">Category</th>
		        <th style="width: 550px">Tipe Trafo</th>
		        <th style="width: 150px">Service Condition</th>
		        <th style="width: 150px">Tipe Trafo</th>
		      </tr>
	      </thead>

	      	<tbody></tbody>

			</table>
		</div> -->

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


<!-- <script>
$(document).ready(function(){

  load_data();
  
  function load_data(query='')
  {
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{query:query},
      success:function(data)
      {
        $('tbody').html(data);
      }
    })
  }

  $('#noprospect').change(function(){
    $('#hidden_prospect').val($('#noprospect').val());
    var query = $('#hidden_prospect').val();
    load_data(query);
  });
  
});
</script> -->

 <script>
        $(function(){
            $('#btn-tambah').on('click', function(){
                $('#tbl-top-body').append(`
									<tr>
                    <td>
											<select id="desc_top" name="desc_top[]" class="form-control select2" data-placeholder="Select Term of Payment" style="width: 100%;">
                          <?php
												    include "koneksi.php";
												    $sql=mysqli_query($mysqli,"select * from ms_top where status_top = 1 and kode_top != 'other' order by id_top asc");
												    while ($data = mysqli_fetch_array($sql)){
												        echo '<option name="desc_top[]" value="'.$data['desc_top'].'">'.$data['desc_top'].'</option>';
											    }?>
                      </select>
                    </td>
                    <td style="text-align:center;"><button type="button" class="btn btn-danger removeItem">Remove</button></td>
                  </tr>
                `);

                $('.removeItem').on('click', function(){
                    $(this).closest("tr").remove();
                })
            })
        })
    </script>

<?php
	include("footer2.php");
?>