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

    $sql = "select max(NH_ID) as maxid from nguon_hang;";
    if ($conn->query($sql)==true){
        $rs = $conn->query($sql);
        $row = mysqli_fetch_assoc($rs);
        $id = $row["maxid"] + 1;
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }


    $ten = $_POST["ten"];
    $mota = $_POST["mota"];

    $sql = "insert into nguon_hang values ($id, '".$ten."', '".$mota."');";

    if ($conn->query($sql)==true){
        $message = "Thêm đối tác ".$ten." thành công!";
        echo "<br><script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=pdsource.php');
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }

?>