<?php
    session_start();
                    $tkid = $_SESSION["id"];
                    $mk = $_SESSION["pass"];
                    $mkcu = $_POST["oldpw"];
                    $mkmoi = $_POST["newpw"];
                    $nhaplaimkmoi = $_POST["renewpw"];

                    if($mkcu != $mk){
                        $message = "Mật khẩu cũ không đúng!" ;
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    } elseif ($mkmoi != $nhaplaimkmoi){
                        $message = "Nhập lại mật khẩu mới không khớp!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
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

                        $sql = "update tai_khoan set tk_matkhau = '$mkmoi' where tk_id = '$tkid' ";

                        if($conn->query($sql)==true){
                            $message = "Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            header('Refresh: 0;url=dangxuat.php');
                        } else {
                            $message = "Xảy ra lỗi!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            header('Refresh: 0;url=account.php');
                        }

                    } 
            ?>