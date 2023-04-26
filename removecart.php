<?php
require 'inc/myconnect.php';
session_start();
$spid = $_POST["idsprm"];
$khid = $_SESSION["khid"];
if(isset($_POST['remove']))
{
    $sql = "delete from chitiet_gh where SP_ID = $spid and KH_ID = $khid";
    if ($conn->query($sql)==true){
        $message = "Đã xoá sản phẩm ra khỏi giỏ hàng";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=cart.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        // $idsprm = $_POST["idsprm"];
        // $sl;
        // if(isset($_SESSION['cart'][$idsprm]))
        // {
        //     unset($_SESSION['cart'][$idsprm]);
        //     header('Location: cart.php');          
        // }    
}
if(isset($_POST['update']))
{
    $sl = intval($_POST["qty"]);
    $sql = "update chitiet_gh set SP_Soluong = $sl where SP_ID = $spid and KH_ID = $khid";
    if ($conn->query($sql)==true){
        $message = "Đã cập nhật số lượng sản phẩm";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=cart.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // session_start();
    // foreach($sl as $key  => $value)
    // {
    //     if(($value == 0)  and (is_numeric($value)))
    //     {
    //         unset($_SESSION['cart'][$key]);
    //     }
    //     if (($value > 0)  and (is_numeric($value))) {
    //         $_SESSION['cart'][$key] =$value;
    //     }
    // }
    //  header('Location: cart.php');  
}
?>