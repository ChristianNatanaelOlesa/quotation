<?php 

   include ("koneksi.php");

   $id_top_other  = $_GET['id_top_other'];

   $mysqli->query("delete FROM trx_top_other WHERE id_top_other = $id_top_other");

   echo "<script>alert('TOP OTHER Berhasil di Delete');window.location.href='detail_transaction.php?transid=$_GET[transid]'</script>";

?>