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
		<form action="capnhatttkh.php" method="post">
		<input type="hidden" name="khid" value="<?php echo $_SESSION['id']; ?>">
		<div class="card-body">
                <h1 class="text-uppercase text-sm mt-2">Thông tin cá nhân</h1>
                <div class="row">
                  <div class="col-md-3">
                      <label for="example-text-input" class="form-control-label">Họ và tên</label>
                      <input class="form-control" type="text" name="khname" value="<?php echo $_SESSION['name']; ?>">
                    </div>
                  </div>
				  <div class="row">
                  <div class="col-md-3">
                      <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                      <input type="date" name="khbirth" id="birth" class="form-control" value="<?php echo $_SESSION['date']; ?>">
                    </div>
                	</div>
					<div class="row">
				  <div class="col-md-2">
                      <label for="example-text-input" class="form-control-label">Giới tính</label>
                      <select class="form-control" name="khsex" id="sex">
                        <option value="<?php echo $_SESSION['sex']; ?>" selected hidden>
                          <?php
                              if($_SESSION['sex']=='m'){
                                  ?>Nam<?php
                              } else {
                                  ?>Nữ<?php
                              } 
                          ?>
                        </option>
                        <option value="m">Nam</option>
                        <option value="f">Nữ</option>
                      </select>
                  </div>
				</div>
				<div class="row">
                  <div class="col-md-3">
                      <label for="example-text-input" class="form-control-label">Email</label>
                      <input class="form-control" type="email" name="khmail" value="<?php echo $_SESSION['email']; ?>">
                    </div>
				</div>
				<div class="row">
                  <div class="col-md-3">
                      <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                      <input class="form-control" type="text" name="khphone" value="<?php echo $_SESSION['sdt']; ?>">
                    </div>
                </div>
				<div class="row">
                  <div class="col-md-4">
                      <label for="example-text-input" class="form-control-label">Địa chỉ</label>
					  <input class="form-control" type="text" name="khposition" value="<?php echo $_SESSION['location']; ?>">
                    </div>
				</div>
			</div>
                <div class="row">
                  <div class="col-md-12">
                        <input type="checkbox" id="check" onchange="toggleButton()"> <span>Xác nhận thông tin</span>
                        <div class="row">
                          <button type="submit" id="button" disabled class="ms-n2 btn btn-primary btn-sm ms-auto">Cập nhật thông tin</button>
                        </div>
                  </div>
                  <script>
                      function toggleButton() {
                        var checkbox = document.getElementById("check");
                        var button = document.getElementById("button");
                        if (checkbox.checked) {
                          button.disabled = false;
                        } else {
                          button.disabled = true;
                        }
                      }
                    </script>
                  <div class="col-md-2">
                    <div class="form-group">
                    <!-- <input class="form-control btn btn-outline-warning text-warning" type="button" value="Đổi mật khẩu"> -->
                      <a href="doimk.php" class="form-control btn btn-outline-warning text-warning">Đổi mật khẩu</a>
                    </div>
                  </div>
              </div>
					</form>
	</div>
	<?php 
	include "footer.php"
	?>
<?php ob_end_flush(); ?>
