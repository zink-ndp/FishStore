<?php

session_start();

$idsp = $_POST["idsp"]; 
$lsp = $_POST["lsp"]; 
$tensp = $_POST["tensp"]; 
$giasp = $_POST["giasp"]; 
$motasp = $_POST["motasp"];
$nguonsp = $_POST["nguonsp"];
$dvtsp = $_POST["dvtsp"];
$slsp = $_POST["slsp"];
$anhsp = $_POST["old_productImg"];

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

$file_name = basename($_FILES["productImg"]["name"]);
$target_dir = "../assets/img/product_img/";
$target_file = $target_dir . $file_name;
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
    $message = "Loi dinh dang";
    echo "<br><script type='text/javascript'>alert('$message');</script>";
  }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  echo "<br><script type='text/javascript'>alert('$message');</script>";
      header('Refresh: 0;url=products.php');
// if everything is ok, try to upload file
} else {
  
  if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_file)) {

  } 

  if ($new_name!="-1."){
    $anhsp = $new_name;
  }

  $sql1 = "update chitiet_nhap set
            NH_ID = {$nguonsp},
            NV_ID = {$_SESSION["nvid"]},
            NH_NGAYNHAP = sysdate()
          where SP_ID = {$idsp};";

  $sql2 = "update san_pham set 
            LSP_ID = '{$lsp}',
            SP_TEN = '{$tensp}',
            SP_MOTA = '{$motasp}',
            SP_GIA = {$giasp},
            SP_HINHANH = '{$anhsp}',
            SP_SOLUONG = {$slsp},
            SP_DVT = '{$dvtsp}'
          where SP_ID = {$idsp};";

  if($conn->query($sql1) == true){
    if($conn->query($sql2) == true){
      $message = "Cập nhật sản phẩm ".$tensp." thành công!";
      echo "<script type='text/javascript'>alert('$message');</script>";
      header('Refresh: 0;url=products.php');
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "Error: " . $sql1 . "<br>" . $conn->error;
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

}
?>