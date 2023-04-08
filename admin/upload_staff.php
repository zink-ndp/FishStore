<?php


$nvname = $_POST["staff_name"];
$nvsdt = $_POST["staff_phone"];
$nvemail = $_POST["staff_mail"];
$nvus = $_POST["staff_usname"];
$nvpass = $_POST["staff_pass"];
$nvrepass = $_POST["staff_repass"];
$nvsex = $_POST["staff_sex"];
$nvvaitro = $_POST["staff_vaitro"];
$nvbirth = date_create($_POST["staff_birth"]);
$nvimg = basename($_FILES["staffImg"]["name"]);

if($nvpass != $nvrepass){
  $message = "Mật khẩu nhập lại không đúng!";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('Refresh: 0;url=staff_add.php'); 
} else {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

  $check = "select tk_tendangnhap from tai_khoan where tk_tendangnhap = '".$nvus."'";
  $rs_check = $conn->query($check);
  if ($rs_check->num_rows > 0) {
    $message = "Tên đăng nhập đã được sử dụng, vui long dùng tên khác!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Refresh: 0;url=staff_add.php');

  } else 
  {
      $target_dir = "C:/xampp/htdocs/qlck/assets/img/staff_img/";
      $target_file = $target_dir . basename($_FILES["staffImg"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $uploadOk = 1;
      
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["staffImg"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      
      // Check if file already exists
      $new_name = basename($_FILES["staffImg"]["name"]);
      if (file_exists($target_file)){
          $count=1;
          $name = strtolower(pathinfo($new_name,PATHINFO_FILENAME));
          while(file_exists($target_file)){
              $new_name = "";
              $new_name = $name."-".$count.".".$imageFileType;
              $target_file = $target_dir.$new_name; 
              $count++;
              echo $count;
          }
      }
      
      
      // Check file size
      if ($_FILES["staffImg"]["size"] > 500000) {
        echo "Dung lượng file quá lớn";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($nvimg != null){
        if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")) {
          echo "Chỉ chấp nhận file JPG, JPEG & PNG <br>".$target_file;
          $uploadOk = 0;
        }
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["staffImg"]["tmp_name"], $target_file)) {
          echo "OK";
        }
        else {
          echo "Sorry, there was an error uploading your file.";
        }
    }

      //Lấy id lớn nhất
      $sql = "select max(NV_ID) as max_id from nhan_vien";
      $result = $conn -> query($sql);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $nv_max_id = $row["max_id"];
      }
      $sql = "select max(TK_ID) as max_id from tai_khoan";
      $result = $conn -> query($sql);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $tk_max_id = $row["max_id"];
      }
      
      $tkid = $tk_max_id+1;
      $nvid = $nv_max_id+1;
      
      $sql = "insert into tai_khoan
              values ($tkid,'".$nvus."','".$nvpass."','".$nvimg."','".$nvvaitro."');";
      $sql1 = "insert into nhan_vien
              values ($nvid,$tkid,'".$nvname."','".$nvsdt."','".$nvemail."','".$nvbirth->format('y-m-d')."','".$nvsex."',sysdate())";
              
      
      if (($conn->query($sql) == TRUE)&&($conn->query($sql1) == TRUE)) {
          $message = "Thêm nhân viên thành công";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header('Refresh: 0;url=staff.php');
      } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error."<br>" . $sql1 . "<br>". $conn->error;
      }
       
      $conn->close();
    } 
  } 
?>
