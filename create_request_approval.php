<?php
include("koneksi.php");

date_default_timezone_set('Asia/Jakarta');

$id_status = 2;
$tgl_pengajuan 	= date('Y-m-d h:m:s');
$status_app = "Waiting For Approval";

$mysqli->query("UPDATE transaction SET id_status='$id_status', tgl_pengajuan='$tgl_pengajuan', status_app='$status_app' WHERE transid='$_POST[transid]'");

echo "<script type='text/javascript'>
			alert('Pengajuan approval berhasil!'); 
			document.location = 'dashboard.php'; 
		</script>";

?>