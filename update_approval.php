<?php
include("koneksi.php");

$transid 	= $_POST['transid'];
$aksi		= $_POST['aksi'];
$leader_app	= 22222;
$ket_reject = $_POST['ket_reject'];
$tgl_approve = date('Y-m-d h:m:s');
$tgl_reject = date('Y-m-d h:m:s');
$status_app = "";
$id_status = "";

if($aksi=="2"){
	$status_app="Rejected";
	$id_status="4";
	$mysqli->query("UPDATE transaction SET id_status='$id_status', status_app='$status_app', leader_app='$leader_app', tgl_reject='$tgl_reject', ket_reject='$ket_reject' WHERE transid='$_POST[transid]'");
		echo "<script>alert('Transaksi di Reject');window.location.href='review_request_app.php'</script>";
	
}else{
	$status_app="Approved";
	$id_status="3";
	$mysqli->query("UPDATE transaction SET status_app='$status_app', leader_app='$leader_app', tgl_approve='$tgl_approve' WHERE transid='$_POST[transid]'");
		echo "<script>alert('Transaksi di Approve');window.location.href='dashboard.php'</script>";
	
}
?>