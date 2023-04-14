<?php


require 'connect.php';

    $nid = $_POST["nid"];
    $sql = "delete from tin_tuc where TTC_ID = $nid";

    if($conn->query($sql)==TRUE){
        
        $message = "Xoá tin thành công";
        header('Refresh: 0;url=news.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>