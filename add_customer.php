<?php
	include("header2.php");
?>

<div class="container">
	<div class="content">
		<h3><center>New Customer Input Form</center></h3>
		<hr />
		<form class="form-horizontal" name="customer_form" action="index.php?page=create_customer" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-sm-3 control-label">Code Customer</label>
				<div class="col-sm-2">
					<input type="text" name="id_cust" class="form-control" placeholder="Code Customer" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Customer</label>
				<div class="col-sm-4">	
					<input type="text" name="nama_cust" class="form-control" placeholder="Nama Customer" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Perusahaan</label>
				<div class="col-sm-4">	
					<input type="text" name="perusahaan_cust" class="form-control" placeholder="Nama Perusahaan" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-4">	
					<input type="text" name="alamat_cust" class="form-control" placeholder="Alamat" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Area</label>
				<div class="col-sm-4">	
					<input type="text" name="area_cust" class="form-control" placeholder="Area" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">No. Telepon</label>
				<div class="col-sm-4">	
					<input type="text" name="telepon_cust" class="form-control" placeholder="No. Telepon" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Email</label>
				<div class="col-sm-4">	
					<input type="email" name="email_cust" class="form-control" placeholder="Email" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Customer QQ Code</label>
				<div class="col-sm-4">	
					<input type="text" name="custqq_code" class="form-control" placeholder="Customer QQ Code">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Customer QQ Name</label>
				<div class="col-sm-4">	
					<input type="text" name="custqq_name" class="form-control" placeholder="Customer QQ Name">
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
</div>



<?php
	include("footer2.php");
?>