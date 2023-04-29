<?php
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

session_start();
if(isset($_POST['dangky'])){
    $ten  = $_POST['fullname'];
    $tk = $_POST['account'];
    $email = $_POST['email'];
    $sdt = $_POST['phone'];
    $ngaysinh = date_create($_POST['birthday']);
    $gioitinh = $_POST['sex'];
    $diachi = $_POST['position'];
    $anh = basename($_FILES["cusImg"]["name"]);
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    $check = "select kh_tendangnhap from tai_khoan where kh_tendangnhap = '".$tk."'";
    $rs_check = $conn->query($check);        
    if($rs_check->num_rows >0){
        $message = "Tên đăng nhập đã được sử dụng, vui lòng dùng tên khác!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=account.php');    
    }
    else if( $repass != $mk){
        $kqdk = "Mật khẩu nhập lại không chính xác";
    }
    // if($repass != $mk  )
    // {
    //     $kqdk = "Mật khẩu nhập lại không chính xác";
    // }
    // else
    // {
    //     $sql="INSERT INTO  loginuser (email,matkhau,hoten,DienThoai) 
    //     VALUES ('$email','$mk' ,'$name','$dt') ";
    //     // echo  $mk;
    //     if (mysqli_query($conn, $sql)) {
    //         $name = "" ;
    //         $email = "" ;
    //         $dt= "";
    //         $mk= "";
    //         $repass ="";
    //         $kqdk = "Đăng ký thành công";
    //     } else {
    //         $kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
    //     }
    // }       
    //mysqli_close($conn);
    else 
    {
        $target_dir = "assets/img/cus_img/";
        $target_file = $target_dir . basename($_FILES["cusImg"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["cusImg"]["tmp_name"]);
            if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            } else {
            echo "File is not an image.";
            $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        $new_name = basename($_FILES["cusImg"]["name"]);
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
        if ($_FILES["cusImg"]["size"] > 50000000) {
            echo "Dung lượng file quá lớn";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($anh != null){
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
            if (move_uploaded_file($_FILES["cusImg"]["tmp_name"], $target_file)) {
            echo "OK";
            }
            else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
    
        //Lấy id lớn nhất
        $sql = "select max(KH_ID) as max_id from khach_hang";
        $result = $conn -> query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $kh_max_id = $row["max_id"];
        }
        // $sql = "select max(TK_ID) as max_id from tai_khoan";
        // $result = $conn -> query($sql);
        // if ($result->num_rows > 0) {
        //     $row = mysqli_fetch_assoc($result);
        //     $tk_max_id = $row["max_id"];
        // }
        
        // $tkid = $tk_max_id+1;
        $khid = $kh_max_id+1;
        // $vaitro= "custommer";
        // $sql = "insert into tai_khoan
        //         values ($tkid,'".$tk."','".$mk."','".$anh."','".$vaitro."');";
        $sql1 = "insert into khach_hang
                values ($khid,'".$ten."','".$sdt."','".$email."','".$ngaysinh->format('y-m-d')."','".$diachi."','".$gioitinh."',sysdate(),'".$tk."','".$mk."','".$anh."')";
                
        
        if (($conn->query($sql) == TRUE)&&($conn->query($sql1) == TRUE)) {
            $message = "Thêm khách hàng thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Refresh: 0;url=account.php');
        } else {
            echo "<br>Error: " . $sql . "<br>" . $conn->error."<br>" . $sql1 . "<br>". $conn->error;
        }
            
        $conn->close();
        } 
    }
?>