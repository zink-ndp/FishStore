<?php
ob_start();
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
session_start();
include "header.php"
?>
<?php
include "navigation.php"
?>
<!--//////////////////////////////////////////////////-->
<!--///////////////////Cart Page//////////////////////-->
<!--//////////////////////////////////////////////////-->
<?php
// if (is_countable($aa) && count($aa) > 0) :
if (is_countable($_SESSION['cart']) == 0) {
	header('Location: baogiohangtrong.php');
}
?>
<div id="page-content" class="single-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Trang chủ</a></li>
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
			$query = "SELECT s.SP_ID, s.LSP_ID, s.SP_TEN, s.SP_MOTA, s.SP_GIA, s.SP_HINHANH, s.SP_SOLUONG, s.SP_DVT, n.LSP_TEN as tenloaisp
				from san_pham s 
				LEFT JOIN loai_sp l on l.LSP_ID = s.LSP_ID
				 WHERE  s.id  in ($str)";
			$result = $conn->query($query);
			$total = 0;
			foreach ($result as $s) {
		?>
				<div class="row">
					<form name="form5" id="ff5" method="POST" action="removecart.php">
						<div class="product well">
							<div class="col-md-3">
								<div class="image">
									<img src="assets/img/product_img/<?php echo $s["SP_HINHANH"] ?>" style="width:300px;height:300px" />
								</div>
							</div>
							<div class="col-md-9">
								<div class="caption">
									<div class="name">
										<h3><a href="product.php?id=<?php echo $s["SP_ID"] ?>"><?php echo $s["SP_TEN"] ?></a></h3>
									</div>
									<div class="info">
										<ul>
											<li>Loại sản phẩm: <?php echo $s["tenloaisp"] ?></li>
										</ul>
									</div>
									<div class="price"><?php echo $s["SP_GIA"] ?> VNĐ</div>
									<label>Số lượng: </label>
									<input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99" type="number" name="qty[<?php echo $s["SP_ID"] ?>]" value="<?php echo $_SESSION['cart'][$s["SP_ID"]] ?>">
									<div>

									</div>
									<hr>
									<label style="color:red">Thành tiền: <?php echo  $_SESSION['cart'][$s["SP_ID"]] * $s["SP_GIA"] ?> VNĐ</label>

								</div>
							</div>

							<div class="clear"></div>
						</div>
					</form>
					
				</div>
		<?php
			}
		}
		?>

		<div class="row">
			<div class="col-md-4 col-md-offset-8 ">

				<center>
					<p style="color:red"><i class="fa fa-exclamation" aria-hidden="true"> Bạn cần đăng nhập để đặt hàng</i></p>
					<a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những sản phẩm khác</a>
				</center>
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
								<td><?php echo $total ?> VNĐ</td>
							</tr>
						</table>
						<center>
							<a href="account.php" class="btn btn-1">vào trang đăng nhập</a>
						</center>

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