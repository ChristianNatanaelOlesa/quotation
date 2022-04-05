<?php 

   include ("koneksi.php");

   $id_top        = $_GET['id_top'];

   $mysqli->query("delete FROM trx_top WHERE id_top ='$id_top'");

   echo "<script>alert('TOP Berhasil di Delete');window.location.href='detail_transaction.php?transid=$_GET[transid]'</script>";

?>