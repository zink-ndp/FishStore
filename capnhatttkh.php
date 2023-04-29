<?php
    $tkid= $_POST["tkid"];
    $khname = $_POST["khname"];
    $khbirth = $_POST["khbirth"];
    $khsex = $_POST["khsex"];
    $khemail = $_POST["khmail"];
    $khsdt = $_POST["khphone"];
    $khdiachi = $_POST["khposition"];

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
    session_start();

    $sql = "update khach_hang set
                KH_HOTEN = '$khname',
                KH_SDT = '$khsdt',
                KH_EMAIL = '$khemail',
                KH_NGAYSINH = '$khbirth',
                KH_DIACHI = '$khdiachi',
                KH_GIOITINH = '$khsex'
            where TK_ID = '$tkid'";

    if ($conn->query($sql) == true){
        $message = "Cập nhật thông tin thành công. Vui lòng đăng nhập lại!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=dangxuat.php');
    }
?>