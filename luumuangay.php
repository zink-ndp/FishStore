<!-- Chức năng mua ngay đơn hàng -->
<?php 
require "inc/myconnect.php";
if(isset($_POST['muangay'])){
	// echo $item;
    $total="";
    $email =  $_POST['email']; 
    $ngaydat = $_POST['date'];
    $tenkh = $_POST['name'];
    $diachi = $_POST['txtdiachi'];
    $dienthoai =  $_POST['phone']; 
    $hinhthucthanhtoan = $_POST['hinhthuctt']; 
    $sql = "select KH_ID from khach_hang";
    $makh = $conn -> query($sql);
    $row = mysqli_fetch_assoc($makh);
    $kh_ma = $row["makh"];
    $sql1="INSERT INTO hoa_don (KH_ID, PTTT_ID, HD_TONGTIEN, HD_NGAYDAT)
     VALUES ('$kh_ma','$hinhthucthanhtoan','$total', '$ngaydat');";
    if ($conn->query($sql1) === TRUE) {
        $masp= $_POST['idsp']; 
        $dongia= $_POST['gia']; 
        $sl= $_POST['txtsoluong'];
        $thanhtien =  $sl* $dongia;
        //tao mang hd de lua sodh cua sql1
        $hd =  mysqli_insert_id($conn);
        //lua mang
        $sql2="INSERT INTO  chitiet_hd (SP_ID, HD_ID, SP_SOLUONG) 
         VALUES ('$masp','$str','$sl');";              
       
        if ($conn->query($sql2) === TRUE) {
        // destroy the session 
            session_destroy(); 
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }
}
			
?>
