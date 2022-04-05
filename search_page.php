<?php
include("koneksi.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QUOTATION TRANSACTION</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="avatar/logo.jpg"/>
	<style>
		.content {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<table>
				<tr>
					<td><img src="avatar/logo.jpg" class="img-responsive" style="max-height:30px"> </td>
					<td><a class="navbar-brand" href="index.php">QUOTATION TRANSACTION</a></td>
				</tr>
			</table>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="index.php">HOME</a></li>
  			<li><a href="add_new.php">TAMBAH DATA</a></li>
  		</ul>
  	</div>
  </nav>


	<div class="container">
		<div class="content">
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM transaction WHERE id='$id'");	
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data Tidak Ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM transaction WHERE id='$id'");
					if($delete){
						echo '<div class="alert alert-danger">Data Berhasil Dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data Gagal Dihapus.</div>';
					}
				}
			}
			?>

			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="urut" class="form-control" onchange="form.submit()">
						<option value="0">Filter</option>
						<?php $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
						<option value="OPEN" <?php if($urut == 'OPEN'){ echo 'selected'; } ?>>OPEN</option>
						<option value="APPROVE" <?php if($urut == 'APPROVE'){ echo 'selected'; } ?>>APPROVE</option>
						<option value="REJECT" <?php if($urut == 'REJECT'){ echo 'selected'; } ?>>REJECT</option>
					</select>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table">
				<thead>
				<tr>
					<th style="text-align: center">NO.</th>
					<th style="text-align: center">Transaction Date</th>
					<th style="text-align: center">Quotation No.</th>
					<th style="text-align: center">Nama Perusahaan</th>
					<th style="text-align: center">Nama Customer</th>
					<th style="text-align: center">Alamat</th>
					<th style="text-align: center">Area</th>
					<th style="text-align: center">TOP</th>
					<th style="text-align: center">Delivery Date</th>
					<th style="text-align: center">Status</th>
				</tr>
				</thead>
				<?php
				if($urut){
					$sql = mysqli_query($koneksi, "SELECT * FROM transaction WHERE status='$urut' ORDER BY id ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM transaction ORDER BY transid ASC");
				}

				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak Ada Data.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
				?>	
				<tr>
				  <td><?= $no++; ?></td>
				  <td><?= $row->transdate; ?></td>
				  <td><?= $row->transid; ?></td>
				  <td><?= $row->nama_perusahaan; ?></td>
				  <td><?= $row->nama_cust; ?></td>
				  <td><?= $row->alamat; ?></td>
				  <td><?= $row->area; ?></td>
				  <td><?= $row->top; ?></td>
				  <td><?= $row->delivery_date; ?></td>
				  <td><?php if($row->status == 'APPROVE'){ echo '<span class="label label-success">APPROVE</span>'; }else{ echo '<span class="label label-warning">REJECT</span>'; } ?></td>
				  <td><td>
	                <a href="detail.php?id='.$row['id'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
	                <a href="edit.php?id='.$row['id'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
	                <a href="view.php?aksi=delete&id='.$row['id'].'" title="Hapus Data" onclick="return confirm(\'Data Akan Dihapus?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></td>
	            </tr>
	        <?php } ?>			
			</table>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>