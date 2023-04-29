<?php
require 'inc/myconnect.php';
session_start();
    if( isset($_POST['submit']) ){
    $tk = addslashes($_POST['txtus']) ;
    $mk = addslashes($_POST['txtem']) ;

        $sql = "select * from khach_hang where kh_tendangnhap = '".strtolower($tk)."'  and kh_matkhau = '".$mk."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION["pic"]=$row['KH_AVATAR'];
            $_SESSION["id"] = $row['KH_ID'];
            $_SESSION["pass"] = $row['KH_MATKHAU'];
            $_SESSION["khid"] = $row['KH_ID'];
            $_SESSION["name"] = $row['KH_HOTEN'];
            $_SESSION["email"] = $row['KH_EMAIL'];
            $_SESSION["sdt"] = $row['KH_SDT'];
            $_SESSION["date"] =$row['KH_NGAYSINH'];
            $_SESSION["location"] =$row['KH_DIACHI'];
            $_SESSION["sex"] =$row['KH_GIOITINH'];
            header('location: index.php');
        } else
        {
            $message = "Sai tài khoản hoặc mật khẩu!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Refresh: 0;url=account.php');
        }

    }
?>