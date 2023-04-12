<?php

session_start();

$file_name = basename($_FILES["productImg"]["name"]);
$target_dir = "../assets/img/news_img/";
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
if ($_FILES["productImg"]["size"] > 30000000) {
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
	$sql = "select max(TTC_ID) as max_id from tin_tuc";
    $result = $conn -> query($sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $max_id = $row["max_id"];
    }

  $nvid = $_SESSION["nvid"];

  $ttid = $max_id+1;
  $tt_title = $_POST["name"];
  $tt_mota = $_POST["des"];
  $tt_link = $_POST["url"];
  $tt_hienthi = $_POST["hienthi"];
  $tt_img = $file_name;
  
  $sql = "insert into tin_tuc (TTC_ID, TTC_TITLE, TTC_MOTA, TTC_ANH, TTC_HIENTHI, NV_ID, TTC_LINK)
          values ($ttid, '$tt_title', '$tt_mota', '$tt_img', $tt_hienthi, $nvid, '$tt_link')";
  
	if ($conn->query($sql) == TRUE) {
      $message = "Thêm tin mới thành công";
      echo "<script type='text/javascript'>alert('$message');</script>";
      header('Refresh: 0;url=news.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  $conn->close();
}

?>
