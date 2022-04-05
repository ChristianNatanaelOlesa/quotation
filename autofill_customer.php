<?php
$koneksi = mysqli_connect("localhost", "root", "", "quotation");

$id = $_GET['id_cust'];
$query = mysqli_query($koneksi,"select * from ms_customer WHERE id_cust='$id'");
$cust = mysqli_fetch_array($query);
$data = array('nama_cust' => @$cust['nama_cust'],
              'perusahaan_cust' => @$cust['perusahaan_cust'], 
              'alamat_cust' => @$cust['alamat_cust'],
              'area_cust' => @$cust['area_cust'],
              'telepon_cust' => @$cust['telepon_cust'], 
              'email_cust' => @$cust['email_cust']);
echo json_encode($data);
?>