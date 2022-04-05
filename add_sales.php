<?php
	include("header.php");
?>

<div class="container">
	<div class="content">
		<h3><center>New Sales Input Form</center></h3>
		<hr />
		<form class="form-horizontal" name="quotation_form" action="index.php?page=create" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-sm-3 control-label">Code Sales</label>
				<div class="col-sm-2">
					<input type="text" name="id_sales" class="form-control" placeholder="Code Sales" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Sales</label>
				<div class="col-sm-4">	
					<input type="text" name="nama_sales" value="" id="nama_sales" class="form-control" required>
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-6">
					   <button type="reset" class="btn btn-danger">Reset</button>
					   <button type="submit" name="Submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>



<?php
	include("footer.php");
?>