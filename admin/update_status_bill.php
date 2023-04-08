<?php
  session_start();
  $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "shop_db";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
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