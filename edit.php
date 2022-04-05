<?php 
  $edit=$mysqli->query("SELECT * FROM transaction WHERE id ='$_GET[id]'");
  $e=mysqli_fetch_array($edit);
?>

<div class="container">
	<div class="content">
		<h2><center>Edit Form</center></h2>
		<hr />

		<form class="form-horizontal" name="edit_tra" action="index.php?page=update_transaction" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-sm-3 control-label">Transaction Date</label>
				<div class="col-sm-2">
					<div class="input-group date" data-provide="datepicker">
						<input type="text" id="transdate" name="transdate" class="form-control" value="<?php echo $e['transdate']; ?>" disabled>
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Quotation No.</label>
				<div class="col-sm-3">
					<input type="text" id="transid" name="transid" class="form-control" value="<?php echo $e['transid']; ?>" placeholder="No KTP" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Customer Code</label>
				<div class="col-sm-3">
					<input type="text" id="id_cust" name="id_cust" class="form-control" value="<?php echo $e['id_cust']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Perusahaan</label>
				<div class="col-sm-4">
					<input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="<?php echo $e['nama_perusahaan']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Customer</label>
				<div class="col-sm-4">
					<input type="text" id="nama_cust" name="nama_cust" class="form-control" value="<?php echo $e['nama_cust']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $e['alamat']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">No Telepon</label>
				<div class="col-sm-4">
					<input type="text" id="no_telepon" name="no_telepon" class="form-control" value="<?php echo $e['no_telepon']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Email</label>
				<div class="col-sm-4">
					<input type="text" id="email" name="email" class="form-control" value="<?php echo $e['email']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Sales Code</label>
				<div class="col-sm-3">
					<input type="text" id="id_sales" name="id_sales" class="form-control" value="<?php echo $e['id_sales']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Sales</label>
				<div class="col-sm-4">
					<input type="text" id="nama_sales" name="nama_sales" class="form-control" value="<?php echo $e['nama_sales']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Term Of Payment</label>
				<div class="col-sm-2">
					<select name="top" id="top" class="form-control" required>
						<option value="">- -</option>
						<option value="1" <?php if($e['top'] == 1){ echo 'selected'; } ?>>1</option>
						<option value="2" <?php if($e['top'] == 2){ echo 'selected'; } ?>>2</option>
						<option value="3" <?php if($e['top'] == 3){ echo 'selected'; } ?>>3</option>
						<option value="4" <?php if($e['top'] == 4){ echo 'selected'; } ?>>4</option>
						<option value="5" <?php if($e['top'] == 5){ echo 'selected'; } ?>>5</option>
						<option value="6" <?php if($e['top'] == 6){ echo 'selected'; } ?>>6</option>
						<option value="7" <?php if($e['top'] == 7){ echo 'selected'; } ?>>7</option>
						<option value="8" <?php if($e['top'] == 8){ echo 'selected'; } ?>>8</option>
						<option value="9" <?php if($e['top'] == 9){ echo 'selected'; } ?>>9</option>
						<option value="10" <?php if($e['top'] == 10){ echo 'selected'; } ?>>10</option>
						<option value="11" <?php if($e['top'] == 11){ echo 'selected'; } ?>>11</option>
						<option value="12" <?php if($e['top'] == 12){ echo 'selected'; } ?>>12</option>
						<option value="13" <?php if($e['top'] == 13){ echo 'selected'; } ?>>13</option>
						<option value="14" <?php if($e['top'] == 14){ echo 'selected'; } ?>>14</option>
						<option value="15" <?php if($e['top'] == 15){ echo 'selected'; } ?>>15</option>
						<option value="16" <?php if($e['top'] == 16){ echo 'selected'; } ?>>16</option>
						<option value="17" <?php if($e['top'] == 17){ echo 'selected'; } ?>>17</option>
						<option value="18" <?php if($e['top'] == 18){ echo 'selected'; } ?>>Other</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Discount (%)</label>
				<div class="col-sm-4">
					<input type="number" id="disc" name="disc" class="form-control" value="<?php echo $e['disc']; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">PPN (%)</label>
				<div class="col-sm-4">
					<input type="number" id="ppn" name="ppn" class="form-control" value="<?php echo $e['ppn']; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Delivery Date</label>
				<div class="col-sm-2">
					<div class="input-group date" data-provide="datepicker">
						<input type="text" id="delivery_date" name="delivery_date" class="form-control" value="<?php echo $e['delivery_date']; ?>" required>
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Status</label>
				<div class="col-sm-2">
					<select name="status" id="status" class="form-control" required>
						<option value="">-- --</option>
						<option value="OPEN" <?php if($e['status'] == 'OPEN'){ echo 'selected'; } ?>>OPEN</option>
						<option value="APPROVE" <?php if($e['status'] == 'APPROVE'){ echo 'selected'; } ?>>APPROVE</option>
						<option value="REJECT" <?php if($e['status'] == 'REJECT'){ echo 'selected'; } ?>>REJECT</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-6">
					<button type="reset" class="btn btn-danger">Reset</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	</div>
</div>