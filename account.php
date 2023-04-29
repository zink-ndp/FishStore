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
	include "top.php";
	
	include "header.php";
	
	include "navigation.php";
?>
<?php
$name = "" ;
$email = "" ;
$dt= "";
$mk= "";
$kqdk ="";
$repass ="";

?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="account.php">Account</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="heading"><h2>Đăng nhập</h2></div>
					<form name="form1" id="ff1" method="POST" action="login.php">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Tài khoản" name="txtus" required >
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mật khẩu" name="txtem"required >
						</div>
						<button type="submit" name="submit" class="btn btn-1" name="login" id="login" style="background-color: #1014f5;">Đăng nhập</button>
					<i style="color:Tomato">* Bạn chưa có tài khoản? Vui lòng đăng ký.</i>
					</form>
				</div>
				<div class="col-md-6">
					<div class="heading"><h2> Đăng ký tài khoản</h2></div>
					<form name="form2" id="ff2" method="post" action="dangky.php" enctype="multipart/form-data">
						<div class="form-group">
						Họ Tên
							<input type="text" class="form-control" placeholder="Họ Tên" name="fullname" id="firstname" value="<?php echo $name;?>" required >
						</div>
						<div class="form-group">
						Email
							<input type="email" class="form-control" placeholder="Email" name="email" id="email"  value="<?php echo $email;?>" required>
						</div>
						<div class="form-group">
						Điện thoại
						<input type="text" class="form-control" placeholder="Điện thoại" name="phone" id="phone" value="<?php echo $dt;?>" required >
						</div>
						<div class="form-group">
						Ngày sinh
							<input type="date" class="form-control" name="birthday" id="birthday" required>
						</div>
						<div class="form-group">
						Giới tính
						<select class="form-control" name="sex" id="sex" required>
							<option value="" selected disabled hidden>-Chọn-</option>
							<option value="m">Nam</option>
							<option value="m">Nữ</option>
						</select>
						</div>
						<div class="form-group">
						Địa chỉ
						<input type="text" class="form-control" placeholder="Địa chỉ liên hệ" name="position" id="position" required>
						</div>
						<div class="form-group">
						Tải ảnh đại diện:
						<br>
						<input class="mt-3" type="file" name="cusImg" id="input" accept="image/*" required>
						</div>
						<div class="mb-3 px-3 col-3">
                          <div id="preview"></div>
                          <script>
                            var input = document.getElementById("input");
                            var preview = document.getElementById("preview");

                            input.addEventListener("change", function() {
                              preview.innerHTML = ""; // clear previous preview
                              var files = this.files;
                              for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                if (!file.type.startsWith("image/")){ continue } // skip non-image files
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                  var img = document.createElement("img");
                                  img.src = e.target.result;
                                  img.width = 200; // set width for preview images
                                  img.className = "rounded-circle avatar avatar-xxl ms-4";
                                  preview.appendChild(img); // append image to preview div
                                };
                                reader.readAsDataURL(file); // read file as data url
                              }
                            });
                          </script>
                      </div>
					    <div class="form-group">
						Tên đăng nhập
						<input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="account" id="account">
						</div>
						<div class="form-group">
						Mật khẩu
						<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password"  value="<?php echo $mk;?>"required >
						</div>
						<div class="form-group">
						Mật khẩu nhập lại
						<input type="password" class="form-control" placeholder="Mật khẩu nhập lại" name="repass" id="repass" value="<?php echo $repass;?>" required >
						</div>
						<button type="submit" name="dangky" class="btn btn-1" style="background-color: #1014f5;">Đăng kí</button>
						<P style="color:red"><?php echo $kqdk; ?></p>
					</form>
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
