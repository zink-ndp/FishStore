<div id="sidebar" class="col-md-3">
					<div class="widget wid-categories">
						<div class="heading"><h4>Danh mục loại sản phẩm</h4></div>
						<div class="content">
							<ul>
							<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $layidrandom="SELECT LSP_ID,LSP_Ten  from loai_sp" ;
   $kq = $conn->query($layidrandom);
   if ($kq ->num_rows > 0) {
	// output data of each row
	while($d = $kq ->fetch_assoc()) {

?>
								<li><a href="category.php?maloaisp=<?php echo $d["LSP_ID"] ?>"><?php echo $d["LSP_Ten"] ?></a></li>
								<?php
	}
}
								 ?>
							</ul>
						</div>
					</div>
					<div class="widget wid-product">
						<div class="heading"><h4>Danh mục cá kiểng</h4></div>
						<div class="content">
						<?php
require 'inc/myconnect.php';
$query="SELECT * from san_pham ORDER BY SP_GIA DESC limit 3;";
$rs = $conn->query($query);
if ($rs->num_rows > 0) {
   // output data of each row
   while($row = $rs->fetch_assoc()) {

?>
							<div class="product">
								<a href="product.php?spid=<?php echo $row["SP_ID"]?>">
									<div style="width:150px;height:100px;">
										<img style="width: 100%; height: 100%; object-fit: cover;" src="assets/img/product_img/<?php echo $row["SP_HINHANH"]?>" />
									</div>
								</a>

								<div class="wrapper" style="margin-top: -5px">
									<h5><a href="product.php?spid=<?php echo $row["SP_ID"]?>"><?php echo $row["SP_TEN"]?></a></h5>
									<div style="margin-top: -10px" class="price"><?php echo $row["SP_GIA"] ?> VNĐ</div>
								</div>
							</div>
						    <hr style="margin-top: -7px" class="horizontal dark">

							<?php
	} 
}
							?>
						</div>
					</div>
				</div>