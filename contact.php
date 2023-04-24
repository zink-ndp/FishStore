<?php
ob_start();
session_start();

?>

<?php 
	include "head.php"
	?>
<?php
$title ="Shop Cá Kiểng";
$name ="Shop Cá Kiểng";
?>
<?php 
	include "top.php"
    ?>
    <?php 
	include "Header.php"
	?>
	<?php 
	include "navigation.php"
	?>
	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Contact Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
<?php
$name="";
$diachi="";
$sdt="";
$email="";
$chude="";
$noidung="";
?>
<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="heading"><h1 style="text-align: center; color:#0000ff; font-size:35px;">Liên hệ với chúng tôi</h1></div>
					<h3 style="color:#0000ff">Cửa hàng cá kiểng online</h3>
					<p style="font-size: 18px;"><span class="glyphicon glyphicon-home" style="color:darkgreen;"></span> 3/2 Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ.</p>
					<p style="font-size: 18px;"><span class="glyphicon glyphicon-earphone" style="color:darkgreen;"></span> 0123456789</p>
					<p style="font-size: 18px;"><span class="glyphicon glyphicon-envelope" style="color:darkgreen;"></span> liemb2003790@student.ctu.edu.vn</p>
				</div>

				<form name="form7" id="ff7" method="post" action="contact" enctype="multipart/form-data">
					<div class="form-group">
						Họ và Tên:<input type="text" class="form-control" placeholder="Họ và Tên" name="fullname" id="firstname" value="<?php echo $name; ?>" required>
					</div>
					<div class="form-group">
						Địa chỉ:<input type="text" class="form-control" placeholder="Địa chỉ" name="position" id="position" value="<?php echo $diachi; ?>" required>
					</div>
					<div class="form-group">
						Email:<input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" required>
					</div>
					<div class="form-group">
						Chủ đề:<input type="text" class="form-control" placeholder="Chủ đề" name="chude" id="chude" value="<?php echo $chude; ?>" required>
					</div>
					<div class="form-group">
						Nội dung:<input type="text" class="form-control" placeholder="Nội dung" name="noidung" id="noidung" value="<?php echo $noidung; ?>" required style="height: 90px;">
					</div>
					<button type="submit" name="contact" class="btn btn-1" style="padding:8px; background-color:#1F82DB; margin-bottom:20px;">Gửi</button>
				</form>

				<div class="col-md-6">

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1436.8223934223308!2d105.76871541518592!3d10.030171088076532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883d2192b0f1%3A0x4c90a391d232ccce!2sFaculty%20of%20Information%20Technology%20%26%20Communications!5e1!3m2!1sen!2s!4v1680803435571!5m2!1sen!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>				</div>
			</div>
		</div>
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
<?php ob_end_flush(); ?>

