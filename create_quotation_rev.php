<?php 
	include ("fungsi_romawi.php");
	include ("koneksi.php");


	$transid			= $_POST['transid'];
	$transid_rev		= $_POST['transid_rev'];
	$transdate			= $_POST['transdate'];
	$id_status			= $_POST['id_status'];
	$id_cust			= $_POST['id_cust'];
	$nama_cust			= $_POST['nama_cust'];
	$perusahaan_cust	= $_POST['perusahaan_cust'];
	$alamat_cust		= $_POST['alamat_cust'];
	$area_cust			= $_POST['area_cust'];
	$telepon_cust		= $_POST['telepon_cust'];
	$email_cust			= $_POST['email_cust'];
	$custqq_code		= $_POST['custqq_code'];
	$custqq_name		= $_POST['custqq_name'];
	$id_sales			= $_POST['id_sales'];
	$nama_sales			= $_POST['nama_sales'];
	$telepon_sales		= $_POST['telepon_sales'];
	$email_sales		= $_POST['email_sales'];
	$ppn				= $_POST['ppn'];
	$delivery_date		= $_POST['delivery_date'];
	$id_currency		= $_POST['id_currency'];
	$rate_currency		= $_POST['rate_currency'];

	$id_item			= $_POST['id_item'];
	$nama_item			= $_POST['nama_item'];
	$type_item			= $_POST['type_item'];
	$detail_item		= $_POST['detail_item'];
	$harga_item			= $_POST['harga_item'];
	$qty_item			= $_POST['qty_item'];

	$total = count($id_item);

	$bulan = date('n');
	$romawi = getRomawi($bulan);
	$tahun = date ('Y');
	$format_trans_rev = "/PEN/".$romawi."/".$tahun."-".;

	// membaca kode / nilai tertinggi dari penomoran yang ada didatabase berdasarkan tanggal
	$query_trans_rev=$mysqli->query("select max(transid_rev) as maxTransRev FROM transaction_rev WHERE month(transdate)='$bulan'");
	$data_trans_rev=mysqli_fetch_array($query_trans_rev);
	$no_trans_rev= $data_trans_rev['maxTransRev'];
	$noUrutTransRev= $no_trans_rev + 1;

	//membuat Nomor Surat Otomatis dengan awalan depan 0 misalnya , 01,02 
	//jika ingin 003 ,tinggal ganti %03
	$kode_trans_rev =  sprintf("%02s", $noUrutTransRev);
	$transid_rev = $format_trans_rev.$kode_trans_rev;

	//melakukan perulangan input
    for($i=0; $i<$total; $i++){

        $mysqli->query("insert into trx_item set
        	id_item		= '$id_item[$i]',
        	transid_rev	= '$transid_rev',
        	transid		= '$transid',
        	id_cust		= '$id_cust',
        	nama_item	= '$nama_item',
        	type_item	= '$type_item',	
            detail_item	= '$detail_item[$i]',
            harga_item  = '$harga_item[$i]',
            qty_item  	= '$qty_item[$i]'
        ");
    }


	$mysqli->query("INSERT INTO transaction_rev (transid_rev, transid, transdate, id_status, id_cust, nama_cust, perusahaan_cust, alamat_cust, area_cust, telepon_cust, email_cust, custqq_code, custqq_name, id_sales, nama_sales, telepon_sales, email_sales, ppn, delivery_date, id_currency, rate_currency) VALUES ('$transid', '$transid', '$transdate', '$id_status', '$id_cust', '$nama_cust','$perusahaan_cust','$alamat_cust','$area_cust','$telepon_cust','$email_cust', '$custqq_code', '$custqq_name','$id_sales','$nama_sales', '$telepon_sales', '$email_sales', '$ppn', '$delivery_date', '$id_currency', '$rate_currency')");	


	$kode_top	= $_POST['kode_top'];

	$total = count($kode_top);

	//melakukan perulangan input
    for($i=0; $i<$total; $i++){

        $mysqli->query("insert into trx_top set
        	kode_top	= '$kode_top[$i]',
        	transid		= '$transid_rev'
        "); 


    }
    echo "<script>alert('Data Sukses Tersimpan');window.location.href='detail_transaction.php?transid=$transid_rev'</script>";



?>