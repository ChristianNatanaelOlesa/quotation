<?php
    $koneksi = mysqli_connect("localhost", "root", "", "quotation");

    $id = $_GET['id_sales'];
    $query = mysqli_query($koneksi,"select * from ms_sales where id_sales='$id'");
    $sales = mysqli_fetch_array($query);
    $data = array('nama_sales' => @$sales['nama_sales'],
                  'telepon_sales' => @$sales['telepon_sales'], 
                  'email_sales' => @$sales['email_sales']);
    
    echo json_encode($data);
?>