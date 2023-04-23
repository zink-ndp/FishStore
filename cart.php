<?php
ob_start();
?>
<?php
require "login.php";
if (!isset($_SESSION['txtus'])) // If session is not set then redirect to Login Page
{
	// header("Location:giohangchuacodnhap.php");
}

?> 
<?php
include "head.php"
?>
<?php
$title = "Shop Cá Kiểng";
$name = "Shop Cá Kiểng";
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
if (is_countable($_SESSION['cart']) == 0) {
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
				$ok = 1;
				if (isset($_SESSION['cart'])) {
					foreach ($_SESSION['cart'] as $key => $value) {
						if (isset($key)) {
							$ok = 2;
						}
					}
				}

				if ($ok == 2) {
					echo "Có " . count($_SESSION['cart']) . " sản phẩm trong giỏ hàng ";
				} else {
					echo   "<p>Không có SẢN PHẨM nào trong giỏ hàng</p>";
				}

				$sl = count($_SESSION['cart']);
				?>
			</p>
		</div>
		<?php

		require "inc/myconnect.php";

		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key  => $value) {
				$item[] = $key;
			}
			// echo $item;
			$str = implode(",", $item);
			$query = "SELECT s.SP_ID,s.SP_Ten,s.SP_Gia,s.SP_HinhAnh,s.SP_Mota, l.LSP_Ten as Tenloaisp,s.LSP_ID
				from san_pham s 
				LEFT JOIN loai_sp l on s.LSP_ID = l.LSP_ID
				 WHERE  s.SP_ID  in ($str)";
			$result = $conn->query($query);
			$total = 0;
			foreach ($result as $s) {
		?>

				<div class="row">
					<form name="form5" id="ff5" method="POST" action="removecart.php">
						<div class="product well">
							<div class="col-md-3">
								<div class="image">
									<img src="assets/img/product_img/<?php echo $s["SP_HinhAnh"] ?>" style="width:300px;height:300px" />
								</div>
							</div>
							<div class="col-md-9">
								<div class="caption">
									<div class="name">
										<h3><a href="product.php?id=<?php echo $s["SP_ID"] ?>"><?php echo $s["SP_Ten"] ?></a></h3>
									</div>
									<div class="info">
										<ul>
											<li>Loại sản phẩm: <?php echo $s["Tenloaisp"] ?></li>
										</ul>
									</div>
									
									<div class="price"><?php echo $s["SP_Gia"] ?> VNĐ</div>
									

									<label>Số lượng: </label>
									<input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99" type="number" name="qty[<?php echo $s["SP_ID"] ?>]" value="<?php echo $_SESSION['cart'][$s["SP_ID"]] ?>">
									<div>
										<input type="submit" name="update" style="margin-top:31px" value="Cập nhật sản phẩm" class="btn btn-2" />
									</div>
									<hr>
									<input type="submit" name="remove" value="Delete" class="btn btn-default pull-right" />
									<input type="hidden" name="idsprm" value="<?php echo $s["SP_ID"] ?>" />
									
									<label style="color:red">Thành tiền: <?php echo  $_SESSION['cart'][$s["SP_ID"]] * $s["SP_Gia"] ?> </label>
																				
									

								</div>
							</div>

							<div class="clear"></div>
						</div>
					</form>
					
					<?php $total += $_SESSION['cart'][$s["SP_ID"]] * $s["SP_Gia"] ?>
						
					
				</div>
		<?php
			}
		}
		?>

		<div class="row">
			<a href="rmcart.php" class="btn btn-2" style="margin-bottom:31px">Xóa hết giỏ hàng</a>
			<div class="col-md-4 col-md-offset-8 ">
				<center><a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những sản phẩm khác</a></center>
			</div>
			<div class="row">
				<div class="pricedetails">
					<div class="col-md-4 col-md-offset-8">
						<table style="margin-right:31px">
							<h6>Price Details</h6>
							<tr>
								<td>Số lượng sản phẩm </td>
								<td><?php echo $sl ?></td>
							</tr>
							<tr style="border-top: 1px solid #333">
								<td>
									<h5>Tổng cộng</h5>
								</td>
								<td><?php echo $total ?>VNĐ</td>
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