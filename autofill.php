<?php
$koneksi = mysqli_connect("localhost", "root", "", "quotation");

$id = $_GET['noprospect'];
$query = mysqli_query($koneksi,"select a.*, b.* from ms_prospect a INNER JOIN trx_item b ON a.noprospect = b.noprospect WHERE a.noprospect='$id'");
$cust = mysqli_fetch_array($query);
$data = array('perusahaan_cust' => @$cust['customer'], 
			  'project_cust' => @$cust['project'], 
              'segment' => @$cust['segment'],
              'sub_segment' => @$cust['sub_segment'],
              'nama_sales' => @$cust['sales'],
              'groupsales' => @$cust['grupsales'],
          	  'type_trafo' => @$cust['type_trafo']);
echo json_encode($data);
?>