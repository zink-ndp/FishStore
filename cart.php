<?php
ob_start();
?>
<?php
 require "login.php";
      if(!isset($_SESSION['txtus'])) // If session is not set then redirect to Login Page
       {
           header("Location:giohangchuacodnhap.php");  
       }

?>
<?php 
	include "head.php"
	?>
<?php
$title ="Shop huy";
$name ="Điện thoai";
?>
<?php 
	include "top.php"
    ?>
    <?php 
	include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>
	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Cart Page//////////////////////-->
	<!--//////////////////////////////////////////////////-->
	<?php 
	if(is_countable($_SESSION['cart']) == 0)
	{
		header('Location: baogiohangtrong.php');
	}
	?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="cart.php">Giỏ hàng</a></li>
					</ul>
				</div>
			</div>
			<div class="cart">
			<p><?php
			$ok=1;
			 if(isset($_SESSION['cart']))
			 {
				 foreach($_SESSION['cart'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo "Có ".count($_SESSION['cart']). " sách trong giỏ hàng ";
			 }
			else
			{
				echo   "<p>Không có có Sách nào trong giỏ hàng</p>";
			}
			
			$sl = count($_SESSION['cart']);
			?>
			</p>			
			</div>
			<?php

			require "inc/myconnect.php";

			?>
			<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
//làm rỗng giỏ hàng
if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) unset($_SESSION['giohang']);
//xóa sp trong giỏ hàng
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}
//lấy dữ liệu từ form
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $hinh = $_POST['hinh'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    //kiem tra sp co trong gio hang hay khong?

    $fl = 0; //kiem tra sp co trung trong gio hang khong?

    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {

        if ($_SESSION['giohang'][$i][1] == $tensp) {
            $fl = 1;
            $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $soluongnew;
            break;
        }
    }
    //neu khong trung sp trong gio hang thi them moi
    if ($fl == 0) {
        //them moi sp vao gio hang
        $sp = [$hinh, $tensp, $gia, $soluong];
        $_SESSION['giohang'][] = $sp;
    }

    // var_dump($_SESSION['giohang']);
}

function showgiohang()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        if (sizeof($_SESSION['giohang']) > 0) {
            $tong = 0;
            for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tong += $tt;
                echo '<tr>
                            <td>' . ($i + 1) . '</td>
                            <td><img src="images/' . $_SESSION['giohang'][$i][0] . '" alt=""></td>
                            <td>' . $_SESSION['giohang'][$i][1] . '</td>
                            <td>' . $_SESSION['giohang'][$i][2] . '</td>
                            <td>' . $_SESSION['giohang'][$i][3] . '</td>
                            <td>
                                <div>' . $tt . '</div>
                            </td>
                            <td>
                                <a href="cart.php?delid=' . $i . '">Xóa</a>
                            </td>
                        </tr>';
            }
            echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>' . $tong . '</div>
                        </th>
    
                    </tr>';
        } else {
            echo "Giỏ hàng rỗng!";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | View Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1> CỬA HÀNG CÁ KIỂNG</h1>
        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="cart.php">Giỏ hàng</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi đáp</a></li>
            </ul>
        </div>
        <div class="row mb ">
            <div class="boxtrai mr" id="bill">
                <div class="row">
                    <h1>THÔNG TIN NHẬN HÀNG</h1>
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><input type="text" name="hoten" id="input-hoten" required></td>
                            <span style="display: none" id="error-message-name">This is required</span>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi" required></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="dienthoai" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                    </table>
                </div>
                <div class="row mb">
                    <h1>GIỎ HÀNG</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền ($)</th>
                            <th>Xóa</th>
                        </tr>
                        <?php showgiohang(); ?>
                        <!-- <tr>
                            

                        </tr> -->
                    </table>
                </div>
                <div class="row mb">
                    <input type="submit" id="submit-btn" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
                    <a href="cart.php?delcart=1"><input type="button" value="XÓA GIỎ HÀNG"></a>
                    <a href="index.php"><input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
                </div>
            </div>
            <div class="boxphai">
                <div class="row mb ">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent formtaikhoan">
                        <form action="#" method="post">
                            <div class="row mb10">
                                Tên đăng nhập<br>
                                <input type="text" name="user">
                            </div>
                            <div class="row mb10">
                                Mật khẩu<br>

                                <input type="password" name="pass">
                            </div>
                            <div class="row mb10">
                                <input type="checkbox" name=""> Ghi nhớ tài khoản?
                            </div>
                            <div class="row mb10">
                                <input type="submit" value="Đăng nhập">
                            </div>
                        </form>
                        <li>
                            <a href="#">Quên mật khẩu</a>
                        </li>
                        <li>
                            <a href="#">Đăng ký thành viên</a>
                        </li>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <li>
                                <a href="#">Cá Cảnh</a>
                            </li>
                            <li>
                                <a href="#">Bể cá</a>
                            </li>
                            <li>
                                <a href="#">Phụ kiện nuôi</a>
                            </li>
                            <li>
                                <a href="#">Thuốc trị bệnh cá</a>
                            </li>
                            <li>
                                <a href="#">Sản phẩm bổ trợ cho cá</a>
                            </li>
                            <li>
                                <a href="#">Thức ăn cá</a>
                            </li>
                            <li>
                                <a href="#">Hồ cá lớn</a>
                            </li>
                        </ul>
                    </div>
                    <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="boxtitle">TOP 5 LOẠI CÁ YÊU THÍCH</div>
                    <div class="row boxcontent">
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Cá Huyết Long</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/5.jpg" alt="">
                            <a href="#">Cá KOI NHẬT</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/3.jpg" alt="">
                            <a href="#">Cá Hề</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/4.jpg" alt="">
                            <a href="#">Cá Lia Thia</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Cá Hổ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb footer">
            B2003809
        </div>
    </div>
    <script>
        const submitBtn = document.getElementById('submit-btn');
        const inputName =document.getElementById('input-hoten');
        submitBtn.addEventListener('click', () => {
            const errorMessageElement = document.getElementById('error-message-name');
            errorMessageElement.style.display = inputName.value  ? "none" : "block";
            console.log(inputName.value);
        });
    </script>
</body>

</html>
				
			<div class="row">
			<a href="rmcart.php" class="btn btn-2" style="margin-bottom:31px">Xóa hết giỏ hàng</a>
				<div class="col-md-4 col-md-offset-8 ">
					<center><a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những sách khác</a></center>
				</div>
			<div class="row">
				<div class="pricedetails">
					<div class="col-md-4 col-md-offset-8" >
						<table style="margin-right:31px">
							<h6>Price Details</h6>
							<tr>
								<td>Số lượng sách </td>
								<td><?php echo $sl ?></td>
							</tr>
							<tr style="border-top: 1px solid #333">
								<td><h5>Tổng cộng</h5></td>
								<td><?php echo $total ?>.000</td>
							</tr>
						</table>
						<center><a href="dathang.php" class="btn btn-1">Đặt hàng</a></center>
					</div>
				</div>
			</div>
		</div> 
	</div>	
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
<?php ob_end_flush(); ?>

