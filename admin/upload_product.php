<?php

session_start();

$file_name = basename($_FILES["productImg"]["name"]);
$target_dir = "../assets/img/product_img/";
$target_file = $target_dir . basename($_FILES["productImg"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["productImg"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
$new_name = basename($_FILES["productImg"]["name"]);
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
if ($_FILES["productImg"]["size"] > 500000) {
  echo "Dung lượng file quá lớn";
  $uploadOk = 0;
}

if($file_name != null){
  if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")) {
    echo "Chỉ chấp nhận file JPG, JPEG & PNG <br>".$file_name;
    $uploadOk = 0;
  }
} else {
  $target_file = $target_dir . "default.jpg";
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_file)) {
	
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

  //Lấy id lớn nhất
	$sql = "select max(SP_ID) as max_id from san_pham";
  $result = $conn -> query($sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $max_id = $row["max_id"];
  }

  $nvid = $_SESSION["nvid"];

  $pdid = $max_id+1;
  $pdn = $_POST["pd_name"];
  $lspid = $_POST["types"];
  $pdd = $_POST["pd_des"];
  $pdp = $_POST["pd_price"];
  $pdi = $file_name;

  $idnh = $_POST["source"];
  $dvt = $_POST["dvt"];
  $pdsl = $_POST["pd_quantity"];
  
  $sql = "insert into san_pham(sp_id, lsp_id, sp_ten, sp_mota, sp_gia, sp_hinhanh, sp_dvt, sp_soluong)
          values ($pdid,$lspid,'$pdn','$pdd','$pdp','$pdi','$dvt','$pdsl')";
  
	if ($conn->query($sql) == TRUE) {

    $sql1 = "insert into chitiet_nhap values ($idnh, $pdid, $nvid, sysdate(),$pdsl)";

    if ($conn->query($sql1) == TRUE){
      $message = "Thêm sản phẩm thành công";
      echo "<script type='text/javascript'>alert('$message');</script>";
      header('Refresh: 0;url=products.php');
    } else {
      echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  $conn->close();
}

?>
