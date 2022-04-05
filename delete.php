<?php 
   $hapus=$mysqli->query("SELECT * FROM trx_item where id='$_GET[id]'");
    $mysqli->query("DELETE FROM transaction WHERE id='$_GET[id]'");
    header('location:index.php');
?>