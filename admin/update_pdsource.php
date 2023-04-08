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