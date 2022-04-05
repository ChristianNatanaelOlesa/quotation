<?php

$mysqli->query("UPDATE trx_item SET detail_item='$_POST[detail_item]', harga_item='$_POST[harga_item]', qty_item='$_POST[qty_item]' WHERE noprospect = '$_POST[noprospect]' AND nopracost = '$_POST[nopracost]'");

 echo "<script>alert('Data Berhasil Di Rubah');window.location.href='detail_transaction.php?transid=$_POST[transid]'</script>";
  
?>