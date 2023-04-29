<?php

    session_start();
                    $tkid = $_SESSION["id"];
                    $p = $_SESSION["pw"];
                    $op = $_POST["oldpw"];
                    $new_p = $_POST["newpw"];
                    $rnew_p = $_POST["renewpw"];

                    if($op != $p){
                        $message = "Mật khẩu cũ khônhg đúng!" ;
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    } elseif ($new_p != $rnew_p){
                        $message = "Nhập lại mật khẩu mới không khớp!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
                        require 'connect.php';


                        $sql = "update nhan_vien set nv_matkhau = '{$new_p}' where nv_id = '$tkid' ";

                        if($conn->query($sql)==true){
                            $message = "Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            header('Refresh: 0;url=sign-in.php');
                        } else {
                            $message = "Xảy ra lỗi!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            header('Refresh: 0;url=profile.php');
                        }

                    } 
            ?>