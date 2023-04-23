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
    if( isset($_POST['submit']) ){
    $tk = addslashes($_POST['txtus']) ;
    $mk = addslashes($_POST['txtem']) ;

    $sql="select tk_id, tk_tendangnhap, tk_matkhau, tk_avatar, tk_vaitro from TAI_KHOAN  where tk_tendangnhap = '".strtolower($tk)."'  and tk_matkhau = '".$mk."'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        require 'inc/myconnect.php';
        $row = $result->fetch_assoc();
        $_SESSION["pic"]=$row['tk_avatar'];
        $_SESSION["id"] = $row['tk_id'];
        $_SESSION["pass"] = $row['tk_matkhau'];
        $_SESSION["role"] = $row['tk_vaitro'];

        $sql1 ="SELECT KH_ID, TK_ID, KH_HOTEN, KH_SDT, KH_EMAIL,KH_NGAYSINH,KH_DIACHI,KH_GIOITINH,KH_NGAYDK FROM KHACH_HANG where TK_ID = ".$_SESSION["id"]."";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $_SESSION["name"] = $row1['KH_HOTEN'];
            $_SESSION["email"] = $row1['KH_EMAIL'];
            $_SESSION["sdt"] = $row1['KH_SDT'];
            $_SESSION["date"] =$row1['KH_NGAYSINH'];
            $_SESSION["location"] =$row1['KH_DIACHI'];
            $_SESSION["sex"] =$row1['KH_GIOITINH'];

          }
        if($_SESSION["role"]=='custommer'){
            header('location: index.php');
        }
        else{
            $message = "Tài khoản không tồn tại!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    else
    {
        $message = $_POST["txtus"] + $_POST["txtem"];
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=account.php');
        }
    }
?>