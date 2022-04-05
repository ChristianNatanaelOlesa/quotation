<?php 
	include ("koneksi.php");
    
//INPUT ITEN
	$nopracost 		= $_POST['nopracost'];
    $transid		= $_POST['transid'];
    $noprospect		= $_POST['noprospect'];
	$nama_item		= $_POST['nama_item'];
	$type_item		= $_POST['type_item'];
	$detail_item	= $_POST['detail_item'];
	$harga_item		= $_POST['harga_item'];
	$qty_item		= $_POST['qty_item'];

	$total = count($nopracost);

	for($i=0; $i<$total; $i++){

        $mysqli->query("insert into trx_item set
            nopracost   = '$nopracost[$i]',
            transid     = '$transid[$i]',
            noprospect  = '$noprospect[$i]',
            nama_item   = '$nama_item[$i]',
            type_item   = '$type_item[$i]',
            detail_item = '$detail_item[$i]',
            harga_item  = '$harga_item[$i]',
            qty_item    = '$qty_item[$i]'
        ");
    }

    echo "<script>alert('Data Sukses Tersimpan');window.location.href='detail_transaction.php?transid=$transid'</script>";
?>