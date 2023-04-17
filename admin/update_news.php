<?php

session_start();

if (isset($_POST["old-img"])){
    $anh = $_POST["old-img"];
}
$nvid = $_SESSION["id"];
$id = $_POST["temp_id"];
$td = $_POST["name"];
$mt = $_POST["des"];
$url = $_POST["url"];
$td = $_POST["name"];
$ht = $_POST["hienthi"];


  require 'connect.php';

  if (isset($_FILES["newsImg"])){

      $file_name = basename($_FILES["newsImg"]["name"]);
      $target_dir = "../assets/img/news_img/";
      $target_file = $target_dir . $file_name;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $uploadOk = 1;
  
      
      
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["newsImg"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      
      // Check if file already exists
      $new_name = basename($file_name);
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
      if ($_FILES["newsImg"]["size"] > 50000000) {
        echo "Dung lượng file quá lớn";
        $uploadOk = 0;
      }
      
       // Allow certain file formats
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
        $message = "Sorry, your file was not uploaded.";
        echo "<br><script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=staff.php');
  
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["newsImg"]["tmp_name"], $target_file)) {
        }
        else {
          echo "Sorry, there was an error uploading your file.";
        }
  
        if ($new_name!="-1."){
          $anh = $new_name;
        }
      }
    }

    // echo $anh;
    // echo $_FILES["newsImg"];    


    $sql = "update tin_tuc set nv_id = $nvid, ttc_title = '".$td."', ttc_link = '".$url."', ttc_anh = '".$anh."', ttc_mota = '".$mt."', ttc_hienthi = $ht where ttc_id = $id";
      
      if (($conn->query($sql) == TRUE)) {
          
          $message = "Cập nhật tin thành công!";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header('Refresh: 0;url=news.php');
      } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error ."<br>";
      }
      
      $conn->close();
?>
