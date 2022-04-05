<?php
include_once("inc/db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$updateField='';
	if(isset($input['harga_item'])) {
		$updateField.= "harga_item='".$input['harga_item']."'";
	} else if(isset($input['qty_item'])) {
		$updateField.= "qty_item='".$input['qty_item']."'";
	}
	if($updateField && $input['id']) {
		$sqlQuery = "UPDATE trx_item SET $updateField WHERE id='" . $input['id'] . "'";	
		mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));		
	}
}


