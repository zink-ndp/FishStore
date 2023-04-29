<?php 
include "head.php"
?>
<?php
$title ="Shop Cá Kiểng";
$name ="Shop Cá Kiểng";
?>
<body>
	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://www.facebook.com/profile.php?id=100038198147357';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
				</div>
				<div class="col-xs-6">
					<ul class="top-link">
						<?php
							 // require "login.php";
							      if(!isset($_SESSION['id'])) // If session is not set then redirect to Login Page
							       {
							           printf(' <li><a href="account.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
										<li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Liên hệ</a></li>');
							       }
							       else{
							       	echo '<li><img src="assets/img/cus_img/'.$_SESSION["pic"].'"> Xin chào ' ; echo '<span style="color:Tomato;"><a href="ttkh.php"><b>' . $_SESSION['name'] . '</b></a></span></li>' ;
									echo '<li><span class="glyphicon glyphicon-log-out"></span><a href="dangxuat.php"> Đăng xuất!</a></li>';
							       }

							?>
					</ul>
				</div>
			</div>
		</div>
    </nav>
    </body>
</html>
