<?php
    $koneksi = mysqli_connect("localhost", "root", "", "quotation");

    $id = $_GET['id_currency'];
    $query = mysqli_query($koneksi,"select * from ms_currency where id_currency='$id'");
    $curr = mysqli_fetch_array($query);
    $data = array('code_currency' => @$curr['code_currency'],
                  'rate_currency' => @$curr['rate_currency']);
    
    echo json_encode($data);
?>