
<?php
	session_start();
	include 'koneksi.php';
	 
	  // cek apakah yang mengakses halaman ini sudah login
	  if($_SESSION['username']==""){
	    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
	  }else {
	  	$session = $_SESSION['nama'];
	  }

	
 
	echo "<option value=''>-- Pilih No Prospect --</option>"; 
	$sql=mysqli_query($mysqli,"SELECT * FROM ms_prospect WHERE sales = '$session' ORDER BY noprospect ASC");		
	while($row = mysqli_fetch_assoc($sql)){
		echo "<option value='" . $row['noprospect'] . "'>" . $row['noprospect'] . "</option>";
	}
	
	

?>

