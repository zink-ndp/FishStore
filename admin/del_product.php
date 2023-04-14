<?php

require 'connect.php';

    $pdid = $_POST["pdid"];

    $sql = "select sp_ten from san_pham where sp_id = {$pdid}";
    if($conn->query($sql)==TRUE){
        $row = mysqli_fetch_assoc($conn->query($sql)); 
        $spten = $row["sp_ten"];
        $sql1 = "delete from chitiet_nhap where sp_id = {$pdid};"; 
        $sql2 = "delete from san_pham where sp_id = {$pdid};";
        
        if($conn->query($sql1)==TRUE){
            if($conn->query($sql2)==TRUE){
                $message = "Xoá sản phẩm ".$spten." thành công";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Refresh: 0;url=products.php');
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>