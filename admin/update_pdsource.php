<?php

    session_start();

    require 'connect.php';

    $id = $_POST["temp_id"];
    $name = $_POST["name"];
    $des = $_POST["des"];

    $sql = "UPDATE nguon_hang SET nh_tennguon = '{$name}', nh_mota = '{$des}' WHERE nh_id = {$id};";

    if($conn->query($sql) == true){
        $message = "Cập nhật thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=pdsource.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>