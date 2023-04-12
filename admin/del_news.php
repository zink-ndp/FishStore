<?php


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

    $nid = $_POST["nid"];
    $sql = "delete from tin_tuc where TTC_ID = $nid";

    if($conn->query($sql)==TRUE){
        
        $message = "Xoá tin thành công";
        header('Refresh: 0;url=news.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>