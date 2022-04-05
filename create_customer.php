<?php 
    //INPUT TRANSACTION
    $id_cust				= $_POST['id_cust'];
    $nama_cust				= $_POST['nama_cust'];
    $perusahaan_cust		= $_POST['perusahaan_cust'];
    $alamat_cust			= $_POST['alamat_cust'];
	$area_cust				= $_POST['area_cust'];
	$telepon_cust			= $_POST['telepon_cust'];
	$email_cust				= $_POST['email_cust'];
	$custqq_code			= $_POST['custqq_code'];
	$custqq_name			= $_POST['custqq_name'];
	
	$mysqli->query("INSERT INTO ms_customer (id_cust, nama_cust, perusahaan_cust, alamat_cust, area_cust, telepon_cust, email_cust, custqq_code, custqq_name) VALUES ('$id_cust', '$nama_cust','$perusahaan_cust','$alamat_cust','$area_cust','$telepon_cust','$email_cust', '$custqq_code', '$custqq_name')");	

	header('location:index.php');

?>