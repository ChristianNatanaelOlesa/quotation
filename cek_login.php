<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan ID USER dan password yang sesuai
$login = mysqli_query($mysqli,"select * from login where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah ID USER dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai Staff
	if($data['jabatan']=="Staff" AND $data['level'] == "sales"){
		$_SESSION['username'] 	= $username;
		$_SESSION['nama'] 		= $data['nama'];
		$_SESSION['bagian'] 	= "Sales Swasta";
		$_SESSION['jabatan'] 	= "Staff";
		$_SESSION['level'] 		= "sales";
		$_SESSION['Manager'] 	= "Christiana S Dewi";

		header("location:dashboard.php");

	// cek jika user login sebagai Manager
	}else if($data['jabatan']=="Manager" AND $data['level'] == "sales"){
		$_SESSION['username'] 	= $username;
		$_SESSION['nama'] 		= $data['nama'];
		$_SESSION['bagian'] 	= "Sales Swasta";
		$_SESSION['jabatan'] 	= "Manager";
		$_SESSION['level'] 		= "sales";
		$_SESSION['Manager'] 	= "Christiana S Dewi";

		header("location:dashboard.php");
	}

	else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
		
}else{
	header("location:login.php?pesan=gagal");
}

?>