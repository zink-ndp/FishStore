<?php

    session_start();

    require 'connect.php';

    $pdid = $_POST["temp_id"];
    $quant = $_POST["quantity"];

    $sql = "UPDATE san_pham SET sp_soluong = sp_soluong + CAST('".$quant."' AS int) WHERE sp_id = {$pdid};";
    
    $sql1 = "INSERT INTO chitiet_nhap
             SELECT {$pdid}, NH_ID, '".$_SESSION["id"]."', sysdate(), CAST('".$quant."' AS int) 
             FROM chitiet_nhap
             where SP_ID = {$pdid}";

    if(($conn->query($sql) == true) && ($conn->query($sql1) == true)){
        $message = "Nhập thêm sản phẩm thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=products.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

?>