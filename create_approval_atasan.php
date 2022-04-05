<?php
include("koneksi.php");

date_default_timezone_set('Asia/Jakarta');

if ($_POST['id_status'] == 3) {
	$status_app = 'APPROVED';
	$tgl_approve = date('Y-m-d h:m:s');
	$leader_app = 'Christiana Sari Dewi';

	$mysqli->query("UPDATE transaction SET id_status='$_POST[id_status]', tgl_approve='$tgl_approve', leader_app='$leader_app', status_app='$status_app' WHERE transid='$_POST[transid]'");

} else if ($_POST['id_status'] == 4) {
	$status_app = 'REJECTED';
	$tgl_reject = date('Y-m-d h:m:s');
	$leader_app = 'Christiana Sari Dewi';

	$mysqli->query("UPDATE transaction SET id_status='$_POST[id_status]', tgl_reject='$tgl_reject', leader_app='$leader_app', status_app='$status_app' WHERE transid='$_POST[transid]'");
}

echo "<script type='text/javascript'>
			alert('Approval Berhasil!!'); 
			document.location = 'dashboard.php'; 
		</script>";

?>