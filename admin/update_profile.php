<?php

    $nvid = $_POST["staff_id"];
    $nvname = $_POST["staff_name"];
    $nvbirth = $_POST["staff_birth"];
    $nvsex = $_POST["staff_sex"];
    $nvemail = $_POST["staff_mail"];
    $nvsdt = $_POST["staff_phone"];

    require 'connect.php';

    $sql = "update nhan_vien set
                nv_hoten = '{$nvname}',
                nv_sdt = '{$nvsdt}',
                nv_email = '{$nvemail}',
                nv_ngaysinh = '{$nvbirth}',
                nv_gioitinh = '{$nvsex}'
            where nv_id = {$nvid}";

    if ($conn->query($sql) == true){
        $message = "Cập nhật thông tin thành công. Vui lòng đăng nhập lại!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=sign-in.php');
    }

?>