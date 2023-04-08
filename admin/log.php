
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

$username = mysqli_real_escape_string($conn, $_POST['usname']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = "select tk_id, tk_tendangnhap, tk_matkhau, tk_vaitro, tk_avatar from tai_khoan where tk_tendangnhap = '".strtolower($username)."' and tk_matkhau = '".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 
  
  $row = $result->fetch_assoc();
  $_SESSION["id"] = $row['tk_id'];
  $_SESSION["pw"] = $row['tk_matkhau'];
  $_SESSION["role"] = $row['tk_vaitro'];
  if($row['tk_avatar']==null){
    $_SESSION["avt"] = "macdinh.jpg";
  } else {
    $_SESSION["avt"] = $row['tk_avatar'];
  }
  
  $sql1 = "select nv_id, nv_hoten, nv_email from nhan_vien where tk_id = ".$row['tk_id']."";
  $result1 = $conn->query($sql1);
  if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $_SESSION["nvid"] = $row1['nv_id'];
    $_SESSION["name"] = $row1['nv_hoten'];
    $_SESSION["email"] = $row1['nv_email'];
  }

  if (($_SESSION["role"] == 'admin')||($_SESSION["role"] == 'staff')){
    header('Location: dashboard.php');
  } else {
    echo "Tài khoản không tồn tại!";
    header('Refresh: 2;url=sign-in.php');
  }

  
} else {
  $message = "Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('Refresh: 0;url=sign-in.php');

}

$conn->close();
?>
