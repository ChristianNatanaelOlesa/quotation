<?php 
	include ("fungsi_romawi.php");
	include ("koneksi.php");

	date_default_timezone_set('Asia/Jakarta');


	$transid			= $_POST['transid'];
	$transdate			= $_POST['transdate'];
	$noprospect			= $_POST['noprospect'];

	$nama_cust			= $_POST['nama_cust'];
	$perusahaan_cust	= $_POST['perusahaan_cust'];
	$alamat_cust		= $_POST['alamat_cust'];
	$area_cust			= $_POST['area_cust'];
	$telepon_cust		= $_POST['telepon_cust'];
	$email_cust			= $_POST['email_cust'];
	$custqq_code		= $_POST['custqq_code'];
	$custqq_name		= $_POST['custqq_name'];

	$project_cust		= $_POST['project_cust'];
	$segment			= $_POST['segment'];
	$sub_segment		= $_POST['sub_segment'];
	
	$nama_sales			= $_POST['nama_sales'];
	$telepon_sales		= $_POST['telepon_sales'];
	$email_sales		= $_POST['email_sales'];
	$groupsales			= $_POST['groupsales'];

	$ppn				= $_POST['ppn'];
	$delivery_date		= $_POST['delivery_date'];
	$id_currency		= $_POST['id_currency'];
	$rate_currency		= $_POST['rate_currency'];

	// $kode_top  		= $_POST['kode_top'];
	// $desc_other 		= $_POST['desc_other'];
	// $desc_top 		= $_POST['desc_top'];

	$nama_item			= $_POST['nama_item'];
	$type_trafo			= $_POST['type_trafo'];

	$id_status			= 1; //OTOMATIS STATUS OPEN
	$dt_create			= date('Y-m-d h:m:s');

	$bulan 			= date('n');
	$romawi 		= getRomawi($bulan);
	$tahun 			= date ('Y');
	$format_trans 	= "/PEN/".$romawi."/".$tahun;

	// membaca kode / nilai tertinggi dari penomoran yang ada didatabase berdasarkan tanggal
	$query_trans 	= $mysqli->query("select max(transid) as maxTrans FROM transaction WHERE month(transdate)='$bulan'");
	$data_trans 	= mysqli_fetch_array($query_trans);
	$no_trans 		= $data_trans['maxTrans'];
	$noUrutTrans 	= $no_trans + 1;

	//membuat Nomor Surat Otomatis dengan awalan depan 0 misalnya , 01,02 
	//jika ingin 003 ,tinggal ganti %03
	$kode_trans = sprintf("%04s", $noUrutTrans);
	$nomorTrans = $kode_trans.$format_trans;

	$mysqli->query("INSERT INTO transaction (transid, transdate, noprospect, nama_cust, perusahaan_cust, alamat_cust, area_cust, telepon_cust, email_cust, custqq_code, custqq_name, project_cust, segment, sub_segment,  nama_sales, telepon_sales, email_sales, groupsales, ppn, delivery_date, id_currency, rate_currency, nama_item, type_trafo, id_status, dt_create) VALUES ('$nomorTrans', '$transdate', '$noprospect', '$nama_cust','$perusahaan_cust','$alamat_cust','$area_cust','$telepon_cust','$email_cust', '$custqq_code', '$custqq_name','$project_cust','$segment','$sub_segment','$nama_sales', '$telepon_sales', '$email_sales', '$groupsales', '$ppn', '$delivery_date', '$id_currency', '$rate_currency', '$nama_item', '$type_trafo', '$id_status', '$dt_create')");

	$mysqli->query("UPDATE trx_item SET transid='$nomorTrans', nama_item='$nama_item', type_trafo='$type_trafo' WHERE noprospect = '$noprospect'");

	// $total = count($kode_top);


	// for($i=0; $i<$total; $i++){
 //        $mysqli->query("insert into trx_top set
 //            kode_top    = '$kode_top[$i]',
 //            transid     = '$nomorTrans'");
 //    }

	

    echo "<script>alert('Data Sukses Tersimpan');window.location.href='detail_transaction.php?transid=$nomorTrans'</script>";
?>