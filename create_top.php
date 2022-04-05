<?php 
include ("koneksi.php");

$transid    = $_POST['transid'];
$desc_top   = $_POST['desc_top'];
$desc_other = $_POST['desc_other'];

    if ($desc_other != "" and $desc_top != "") {
        $mysqli->query("INSERT INTO trx_top_other (transid, desc_other) VALUES ('$transid', '$desc_other')");

        for($i = 0; $i < sizeof($desc_top); $i++){
            $mysqli->query("INSERT INTO trx_top (transid, desc_top)VALUES ('$transid', '$desc_top[$i]')");

        }
    }else if ($desc_other == "" and $desc_top != "") {
        for($i = 0; $i < sizeof($desc_top); $i++){
            $mysqli->query("INSERT INTO trx_top (transid, desc_top)VALUES ('$transid', '$desc_top[$i]')");

        }
    }else if ($desc_other != "" and $desc_top == "") {
        $mysqli->query("INSERT INTO trx_top_other (transid, desc_other) VALUES ('$transid', '$desc_other')");

    }

    echo "<script>alert('Term Of Payment Berhasil Ditambahkan');window.location.href='detail_transaction.php?transid=$transid'</script>";
?>