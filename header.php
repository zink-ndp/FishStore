	
	<header class="container" >
		<div class="row">			
			<div class="col-md-6" style="margin-bottom:25px">
				<div id="logo"><h5>CỬA HÀNG CÁ KIỂNG ONLINE</h5></div>
			</div>
			<div class="col-md-4">
				<form class="form-search h-50" method="GET" action="timkiem.php">  
					<input type="text"  class="input-medium search-query" name="txttimkiem" placeholder="Nhập tên sản phẩm ..." required>  
					<button type="submit" name="tk" class="btn"><span class="glyphicon glyphicon-search"></span></button>  
				</form>
			</div>
			<div class="col-md-2">
				<div id="cart"><a class="btn btn-1 h-50" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>(<?php
			// $ok=1;
			//  if(isset($_SESSION['cart']))
			//  {
			// 	 foreach($_SESSION['cart'] as $key => $value)
			// 	 {
			// 		 if(isset($key))
			// 		 {
			// 			$ok=2;
			// 		 }
			// 	 }
			//  }
			
			//  if($ok == 2)
			//  {
			// 	echo count($_SESSION['cart']);
			//  }
			// else
			// {
			// 	echo   "0";
			// }			
				require 'soluonggh.php';
			
			?>)</a></div>
			</div>
		</div>
	</header>
	




