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
		<!--//////////////////////////////////////////////////-->
		<!--///////////////////Account Page///////////////////-->
		<!--//////////////////////////////////////////////////-->
		<?php
	// if( isset($_POST['submit']) ){
	// 	require 'inc/myconnect.php';
	// 	$tk = mysqli_real_escape_string($conn, $_POST['txtus']) ;
	// 	$mk = mysqli_real_escape_string($conn, $_POST['txtem']) ;

	// 	$sql="select tk_id, tk_tendangnhap, tk_matkhau, tk_avartar, tk_vaitro from TAI_KHOAN  where tk_tendangnhap = '".strtolower($tk)."'  and tk_matkhau = '".$mk."'";
	// 	$result = $conn->query($sql);
	// 	if ($result->num_rows > 0) {

	// 		$row = $result->fetch_assoc();
	// 		$_SESSION["id"] = $row['tk_id'];
	// 		$_SESSION["pass"] = $row['tk_matkhau'];
	// 		$_SESSION["role"] = $row['tk_vaitro'];

	// 		$sql1 ="SELECT KH_ID, TK_ID, KH_HOTEN, KH_SDT, KH_EMAIL,KH_NGAYSINH,KH_DIACHI,KH_GIOITINH,KH_NGAYDK FROM KHACH_HANG where TK_ID = ".$_SESSION["id"]."";
	// 		$result1 = $conn->query($sql1);
	// 		if ($result1->num_rows > 0) {
	// 			$row1 = $result1->fetch_assoc();
	// 			$_SESSION["name"] = $row1['kh_hoten'];
	// 			$_SESSION["email"] = $row1['kh_email'];
	// 			$_SESSION["sdt"] = $row1['kh_sdt'];
	// 			$_SESSION["date"] =$row1['kh_ngaysinh'];
	// 			$_SESSION["location"] =$row1['kh_diachi'];
	// 			$_SESSION["sex"] =$row1['kh_gioitinh'];

	// 		}
	// 		if($_SESSION["role"]=='custommer'){
	// 			header('location: index.php');
	// 		}
	// 		else{
	// 			header('location: pages\dashboard.php');
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$message = "Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!.";
	// 		echo "<script type='text/javascript'>alert('$message');</script>";
	// 		header('Refresh: 0;url=account.php');
	// 		}
	// 	}

	// ?>
	<?php
	$name = "" ;
	$email = "" ;
	$dt= "";
	$mk= "";
	$kqdk ="";
	$repass ="";

	if(isset($_POST['dangky']))
	{
		require 'inc/myconnect.php';
		$name  = $_POST['fullname'] ;
		$email = $_POST['email'];
		$dt = $_POST['phone'];
		$mk = $_POST['password'];
		$repass = $_POST['repass'];
		if($repass != $mk  )
		{
			$kqdk = "Mật khẩu nhập lại không chính xác";
		}
		else
		{
			$sql="INSERT INTO  loginuser (email,matkhau,hoten,DienThoai) 
			VALUES ('$email','$mk' ,'$name','$dt') ";
			// echo  $mk;
			if (mysqli_query($conn, $sql)) {
				$name = "" ;
				$email = "" ;
				$dt= "";
				$mk= "";
				$repass ="";
				$kqdk = "Đăng ký thành công";
			} else {
				$kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
			}
		}

		
		mysqli_close($conn);
	}
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
								<input type="password" class="form-control" placeholder="Mật khẫu" name="txtem"required >
							</div>
							<button type="submit" name="submit" class="btn btn-1" name="login" id="login">Đăng nhập</button>
						<i>* Bạn chưa có tài khoản? Vui lòng đăng ký.</i>
						</form>
					</div>
					<div class="col-md-6">
						<div class="heading"><h2> Đăng ký tài khoản</h2></div>
						<form name="form2" id="ff2" method="post" action="#">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Họ Tên" name="fullname" id="firstname" value="<?php echo $name;?>" required >
							</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" id="email"  value="<?php echo $email;?>" required>
							</div>
							<div class="form-group">
							<input type="number" class="form-control" placeholder="Điện thoại" name="phone" id="phone" value="<?php echo $dt;?>" required >
							</div>
							<div class="form-group">
							<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password"  value="<?php echo $mk;?>"required >
							</div>
							<div class="form-group">
							<input type="password" class="form-control" placeholder="Mật khẩu nhập lại" name="repass" id="repass" value="<?php echo $repass;?>" required >
							</div>
							<button type="submit" name="dangky" class="btn btn-1">Đăng kí</button>
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
