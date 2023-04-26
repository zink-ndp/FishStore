<?php 
    require 'inc/myconnect.php';
    session_start();
    // $cart=$_SESSION['cart'];
    // unset($_SESSION['cart']);
    
    $khid = $_SESSION["khid"];
    $sql = "delete from chitiet_gh where KH_ID = {$khid}";
    if ($conn->query($sql)==true){
        $message = "Đã xoá toàn bộ giỏ hàng";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=cart.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>