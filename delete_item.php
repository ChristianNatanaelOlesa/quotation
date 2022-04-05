<?php 
include ("koneksi.php");

   $transid = $_GET['transid'];
   $id_item = $_GET['id_item'];

   
   $hapus=$mysqli->query("select a.transid, b.* FROM transaction a INNER JOIN trx_item b ON a.transid = b.transid where transid='$transid' ");
   $mysqli->query("delete FROM trx_item WHERE id_item ='$id_item' AND transid ='$transid'");

   echo "<script>alert('Item Berhasil Di Delete');window.location.href='detail_transaction.php?transid='$transid';</script>";


?>