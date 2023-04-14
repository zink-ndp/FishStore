<?php
  session_start();
  require 'connect.php';
	
	$reason = null ;

	$mahd = $_POST["mahd"];
    $status = $_POST["status"];
	if (isset($_POST["lido"])){
		$reason = $_POST["lido"];
	};
	$nvid = $_SESSION["nvid"];

	$sql = "update hoa_don set TT_ID = {$status}";

	if ($status!=1){
		$sql .= ", NV_ID = {$nvid}";
	} else {
		$sql .= ", NV_ID = null";
	}

	if ($reason!=null){
		$sql .= ", HD_LIDOHUY = '{$reason}'";
	}

	$sql .= " where HD_ID = {$mahd}";


	$rs = $conn->query($sql);
	if($rs) {
		$message = "Cập nhật đơn hàng thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
		header('Refresh: 0;url=products_wait.php');
	}

?>