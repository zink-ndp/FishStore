<?php
	// require 'inc/myconnect.php';
    $soluonggiohang = 0;
    if (isset($_SESSION["khid"])){
        $khid = $_SESSION["khid"];
        $sql = "select count(*) as soluong from chitiet_gh where KH_ID = {$khid}";
        $rs_slgh = $conn->query($sql);
        $row_gh = mysqli_fetch_assoc($rs_slgh);
        $soluonggiohang = $row_gh["soluong"];
    }
    echo $soluonggiohang;
?>