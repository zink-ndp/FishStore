
<div class="product-related">
						<div class="heading"><h2>Gợi ý loại cá khác</h2></div>
						<div class="products">
						<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $maloaisp = $row["LSP_ID"];
   $truyvan="SELECT SP_ID,SP_Ten,SP_Gia,SP_HinhAnh
   from san_pham 
	WHERE  LSP_ID = '$maloaisp'  limit 5 " ;
   $re = $conn->query($truyvan);
   if ($re ->num_rows > 0) {
	// output data of each row
	while($dong = $re ->fetch_assoc()) {

?>

							<div class="col-lg-4 col-md-4 col-xs-12">
								<div class="product">
									<div class="image"><a href="product.php?id=<?php echo $dong["SP_ID"]?>"><img src="assets/img/product_img/<?php echo $dong["SP_HinhAnh"]?>" style="width:300px;height:300px"/></a></div>
									<div class="caption">
										<div class="price"><?php echo $row["SP_Gia"]?>.000 VNĐ<span></span></div>
										<div class="name"><h3><a href="product.php?id=<?php echo $dong["SP_ID"]?>"><?php echo $dong["SP_Ten"]?></a></h3></div>										
									</div>
									
								</div>
							</div>
							<?php 
	}
}
							?>
						</div>