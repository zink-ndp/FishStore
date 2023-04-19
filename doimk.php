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
        <form action="xacnhandoimk.php" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-uppercase text-sm mt-2">Thay đổi mật khẩu</h1>
                </div>
                <div class="panel-body">
                    <label for="example-text-input" class="form-control-label">Mật khẩu cũ</label>
                    <input class="form-control" required type="password" name="oldpw">
                </div>
                <div class="panel-body">
                    <label for="example-text-input" class="form-control-label">Mật khẩu mới</label>
                    <input class="form-control" required type="password" name="newpw">
                </div>
                <div class="panel-body">
                    <label for="example-text-input" class="form-control-label">Nhập lại mật khẩu mới</label>
                    <input class="form-control" required type="password" name="renewpw">
                </div>
                <div class="panel-body">
                <button type="submit" class="btn btn-lg btn-outline-warning text-warning btn-lg w-100 mt-4 mb-0">Xác nhận thay đổi</button>
                </div>
            </div>
        </form>
	</div>
  <div>
                      
  </div>

<?php 
	include "footer.php"
	?>
<?php ob_end_flush(); ?>