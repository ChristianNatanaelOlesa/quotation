<?php

date_default_timezone_set('Asia/Jakarta');

$dt_update  = date('Y-m-d h:m:s');

$mysqli->query("UPDATE transaction SET transdate='$_POST[transdate]', id_status='$_POST[id_status]',  nama_cust='$_POST[nama_cust]', perusahaan_cust='$_POST[perusahaan_cust]', alamat_cust='$_POST[alamat_cust]', area_cust='$_POST[area_cust]', telepon_cust='$_POST[telepon_cust]', email_cust='$_POST[email_cust]', custqq_code='$_POST[custqq_code]', custqq_name='$_POST[custqq_name]',  nama_sales='$_POST[nama_sales]', telepon_sales='$_POST[telepon_sales]', email_sales='$_POST[email_sales]', ppn='$_POST[ppn]', delivery_date='$_POST[delivery_date]', id_currency='$_POST[id_currency]', rate_currency='$_POST[rate_currency]', dt_update = '$dt_update' WHERE transid = '$_POST[transid]'");

 echo "<script>alert('Data Berhasil Di Rubah');window.location.href='detail_transaction.php?transid=$_POST[transid]'</script>";
  
?>