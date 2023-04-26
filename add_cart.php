<?php
    session_start();
    require 'inc/myconnect.php';
    if (!isset($_SESSION["id"])){
        $message = "Vui lòng đăng nhập để thêm vào giỏ hàng!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=account.php');
    } else {
            $spid = $_POST["idsp"];
            $slsp = intval($_POST["slsp"]);
            $khid = $_SESSION["khid"];

            $check_exist = "select count(*) as tontai from chitiet_gh where KH_ID = {$khid} and SP_ID = {$spid}";
            $rs_chk = $conn->query($check_exist);
            $r = mysqli_fetch_assoc($rs_chk);
            if ($r["tontai"]>0) {
                $sql = "update chitiet_gh set SP_SOLUONG = SP_SOLUONG + {$slsp}
                        where KH_ID = {$khid} and SP_ID = {$spid}";
                $message = "Cập nhật giỏ hàng thành công";
            } else {
                $sql = "insert into chitiet_gh values ($khid, $spid, $slsp)";
                $message = "Thêm giỏ hàng thành công";
            }

            if($conn->query($sql) == true){
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Refresh: 0;url=product.php?id='.$spid);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            

            // $sl;
            // if(isset($_SESSION['cart'][$idsp]))
            // {
            //     $sl = $_SESSION['cart'][$idsp] +1;
            // }
            // else
            // {
            //     $sl=1;
            // }
            // $_SESSION['cart'][$idsp] = $sl;
                //  echo "<script>window.location.replace('http://host2.org/cart.php'); </script>";
        
    }
?>