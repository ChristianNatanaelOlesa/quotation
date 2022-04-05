<?php
	error_reporting( error_reporting() & ~E_NOTICE );
	include "koneksi.php";

   
    if ($_GET['page']=="dashboard") {
		include "dashboard.php";
	}

	else if ($_GET['page']=="add_new_member") {
		include "add_new_member.php";
	}


	else if ($_GET['page']=="create_quotation") {
		include "create_quotation.php";
	}

	else if ($_GET['page']=="create_customer") {
		include "create_customer.php";
	}

	else if ($_GET['page']=="create_item") {
		include "create_item.php";
	}

	else if ($_GET['page']=="create_top") {
		include "create_top.php";
	}

	else if ($_GET['page']=="create_request_approval") {
		include "create_request_approval.php";
	}

	else if ($_GET['page']=="approval_atasan") {
		include "create_approval_atasan.php";
	}


	else if ($_GET['page']=="update_quotation") {
		include "update_quotation.php";
	}

	else if ($_GET['page']=="update_quotation_reject") {
		include "update_quotation_reject.php";
	}

	else if ($_GET['page']=="update_item") {
		include "update_item.php";
	}

	else if ($_GET['page']=="detail_transaction") {
		include "detail_transaction.php";
	}

	else if ($_GET['page']=="detail_transaction_rev") {
		include "detail_transaction_rev.php";
	}

	else if ($_GET['page']=="update_approval") {
		include "update_approval.php";
	}


	else if ($_GET['page']=="delete_item") {
		include "delete_item.php";
	}

	else if ($_GET['page']=="delete_top") {
		include "delete_top.php";
	}

	else{
		include "login.php";
	}
?>