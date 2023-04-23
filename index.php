<?php
include "login.php"
?>
<?php
include "head.php"	//xong
?>
<?php
include "top.php"
?>
<?php
include "header.php"	//xong
?>
<?php
include "navigation.php"
?>
<?php
include "sider.php"
?>
<div class="row">
	<div class="col-lg-12">
		<div class="heading">
			<h2>Sản phẩm bán chạy</h2>
		</div>

		<div class="products">
			<?php
			require 'inc/truyvan.php';

			$row1 = $result->fetch_assoc();
			$row2 = $result->fetch_assoc();
			$row3 = $result->fetch_assoc();
			$row4 = $result->fetch_assoc();

			$top1_id = $row1["id"];
			$top1_ten = $row1["ten"];
			$top1_hinhanh = $row1["hinhanh"];
			$top1_gia = $row1["gia"];

			$top2_id = $row2["id"];
			$top2_ten = $row2["ten"];
			$top2_hinhanh = $row2["hinhanh"];
			$top2_gia = $row2["gia"];

			$top3_id = $row3["id"];
			$top3_ten = $row3["ten"];
			$top3_hinhanh = $row3["hinhanh"];
			$top3_gia = $row3["gia"];

			$top4_id = $row4["id"];
			$top4_ten = $row4["ten"];
			$top4_hinhanh = $row4["hinhanh"];
			$top4_gia = $row4["gia"];
			?>
			<!-- San pham top 1 -->
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="product.php?id=<?php echo $top1_id ?>">
					<div class="product">
						<div class="image" style="width:230px;height:250px"><img src="assets/img/product_img/<?php echo $top1_hinhanh ?>" style="width:100%;height:100%;object-fit:cover;" /></a></div>
						<div class="caption">
							<div class="name">
								<h3><?php echo $top1_ten ?></h3>
							</div>
							<div class="price"><?php echo $top1_gia ?> VNĐ</div>
						</div>
					</div>
				</a>
			</div>

			<!-- San pham top 2 -->
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="product.php?id=<?php echo $top2_id ?>">
					<div class="product">
						<div class="image" style="width:230px;height:250px"><img src="assets/img/product_img/<?php echo $top2_hinhanh ?>" style="width:100%;height:100%;object-fit:cover;" /></a></div>
						<div class="caption">
							<div class="name">
								<h3><?php echo $top2_ten ?></h3>
							</div>
							<div class="price"><?php echo $top2_gia ?> VNĐ</div>
						</div>
					</div>
				</a>
			</div>

			<!-- San pham top 3 -->
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="product.php?id=<?php echo $top3_id ?>">
					<div class="product">
						<div class="image" style="width:230px;height:250px"><img src="assets/img/product_img/<?php echo $top3_hinhanh ?>" style="width:100%;height:100%;object-fit:cover;" /></a></div>
						<div class="caption">
							<div class="name">
								<h3><?php echo $top3_ten ?></h3>
							</div>
							<div class="price"><?php echo $top3_gia ?> VNĐ</div>
						</div>
					</div>
				</a>
			</div>

			<!-- San pham top 4 -->
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="product.php?id=<?php echo $top4_id ?>">
					<div class="product">
						<div class="image" style="width:230px;height:250px"><img src="assets/img/product_img/<?php echo $top4_hinhanh ?>" style="width:100%;height:100%;object-fit:cover;" /></a></div>
						<div class="caption">
							<div class="name">
								<h3><a href="product.php?id=<?php echo $top4_id ?>"><?php echo $top4_ten ?></a></h3>
							</div>
							<div class="price"><?php echo $top4_gia ?> VNĐ</div>
						</div>
					</div>
				</a>
			</div>


		</div>
	</div>
</div>
<?php
include "sanphamoinhat.php"
?>

</div>

</div>
</div>
</div>
<?php
include "footer.php"
?>


</body>

</html>