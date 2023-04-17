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
	include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>
<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="ttkh.php">thong tin khach hang</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="heading"><h2>thong tin khach hang</h2></div>
                    <?php
                    echo '<h3>ho va ten :'.$_SESSION['name'].'</h3>';
                    echo '<h3>Email:'.$_SESSION['email'].'</h3>';
                    echo '<h3>So dien thoai:'.$_SESSION['sdt'].'</h3>';
                    echo '<h3>Ngay sinh:'.$_SESSION['date'].'</h3>';
                    echo '<h3>Dia chi:'.$_SESSION['location'].'</h3>';
                    if($_SESSION['sex']='m') echo '<h3>Gioi tinh: Nam</h3>';
                    else echo '<h3>Gioi tinh: Nu</h3>';
                    ?>
			</div>
		</div>
	</div>
	<?php 
	include "footer.php"
	?>
<?php ob_end_flush(); ?>
