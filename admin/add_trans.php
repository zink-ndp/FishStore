<?php

session_start();

  require 'connect.php';

    $sql = "select max(NVC_ID) as maxid from nha_van_chuyen;";
    if ($conn->query($sql)==true){
        $rs = $conn->query($sql);
        $row = mysqli_fetch_assoc($rs);
        $id = $row["maxid"] + 1;
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }


    $ten = $_POST["ten"];

    $sql = "insert into nha_van_chuyen values ($id, '".$ten."');";

    if ($conn->query($sql)==true){
        $message = "Thêm đối tác ".$ten." thành công!";
        echo "<br><script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=pdsource.php');
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }

?>