<?php
ob_start();
session_start();
require "inc/myconnect.php";
require "soluonggh.php";
?>
<?php

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
if ($soluonggiohang == 0) {
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

					echo "Có " . $soluonggiohang . " sản phẩm trong giỏ hàng ";
				?>
			</p>
		</div>
		<?php


		if ($soluonggiohang>0) {
			// foreach ($_SESSION['cart'] as $key  => $value) {
			// 	$item[] = $key;
			// }
			// echo $item;
			// $str = implode(",", $item);
			$khid = $_SESSION["khid"];
			$sl = 0;
			$sql = "select SP_ID, SP_Soluong from chitiet_gh where KH_ID = {$khid}";
			$rs = $conn->query($sql);
			$total = 0;
			foreach ($rs as $sp) {
				$sl += 1;
				$spid = $sp["SP_ID"];
				$query = "SELECT s.SP_ID,s.SP_Ten,s.SP_Gia,s.SP_HinhAnh,s.SP_Mota, l.LSP_Ten as Tenloaisp,s.LSP_ID
					from san_pham s 
					LEFT JOIN loai_sp l on s.LSP_ID = l.LSP_ID
					 WHERE  s.SP_ID  = $spid";
				$result = $conn->query($query);
				foreach ($result as $s) {
					?>
					<div class="row">
						<form name="form5" id="ff5" method="POST" action="removecart.php">
							<div class="product well">
								<div class="col-md-3">
									<div class="image" style="width:230px;height:230px">
										<img src="assets/img/product_img/<?php echo $s["SP_HinhAnh"] ?>" style="width:100%;height:100%; object-fit:cover;" />
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
										
										<div class="price"><?php echo number_format($s["SP_Gia"]) ?> VNĐ</div>
										

										<label>Số lượng: </label>
										<input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99" type="number" name="qty" value="<?php echo $sp["SP_Soluong"]?>">
										<div>
											<input type="submit" name="update" style="margin-top:31px" value="Cập nhật sản phẩm" class="btn btn-2" />
										</div>
										<hr>
										<input type="submit" name="remove" value="Delete" class="btn btn-default pull-right" style="color: #000 !important;"/>
										<input type="hidden" name="idsprm" value="<?php echo $s["SP_ID"] ?>" />
										
										<label style="color:red">Thành tiền: <?php echo number_format($sp["SP_Soluong"]*$s["SP_Gia"],0) ?> VNĐ</label>
																					
										

									</div>
								</div>

								<div class="clear"></div>
							</div>
						</form>
					</div>
					<?php
					$total += $sp["SP_Soluong"]*$s["SP_Gia"];
				}
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
								<td><?php echo number_format($total,0) ?> VNĐ</td>
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