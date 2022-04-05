

<?php
	include 'koneksi.php';

	$noprospect = $_POST['noprospect'];

	echo "<option value=''>Pilih Sub Prospect</option>";
 

	$sql=mysqli_query($mysqli,"SELECT * FROM trx_item WHERE noprospect='$noprospect' ORDER BY nopracost ASC");		
	while($row = mysqli_fetch_assoc($sql)){
		echo "<option value='" . $row['nopracost'] . "'>" . $row['nopracost'] . "</option>";
	}
?>
