<?php


require 'connect.php';


    $nvid = $_POST["nvid"];
    $sql = "select tk_id, nv_hoten from nhan_vien where nv_id = {$nvid}";
    if($conn->query($sql)==TRUE){
        $row = mysqli_fetch_assoc($conn->query($sql)); 
        $tkid = $row["tk_id"];
        $nvten = $row["nv_hoten"];
        $sql1 = "delete from nhan_vien where nv_id = {$nvid};";
        $sql2 = "delete from tai_khoan where tk_id = {$tkid};";
        
        if(($conn->query($sql1)==TRUE)&&($conn->query($sql2)==TRUE)){
            $message = "Xoá nhân viên ".$nvten." thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Refresh: 0;url=staff.php');
        } else {
            echo "Error: " . $sql1 ."<br>". $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>