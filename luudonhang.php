<?php 
session_start();
require 'inc/myconnect.php';
// if(isset($_POST['Dat'])) {
//     if(isset($_SESSION['cart'])) {

// 		foreach($_SESSION['cart'] as $key  => $value)
// 			{
// 				$item[]=$key;
// 			}
//         $str= implode(",",$item);
// 		$query = "SELECT s.SP_ID,s.SP_Ten,s.SP_Gia,s.SP_HinhAnh,s.SP_Mota, l.LSP_Ten as Tenloaisp,s.LSP_ID
// 		from san_pham s 
// 		LEFT JOIN loai_sp l on s.LSP_ID = l.LSP_ID
// 			 WHERE  s.SP_ID  in ($str)";

// 		$result = $conn->query($query);
//         $total= $_POST['total'];
//         $email =  $_SESSION['email'];
//         $ngaydat = $_POST['date'];
//         $tenkh = $_SESSION['HoTen'];

//         $sql = "select KH_ID from khach_hang";
//         $makh = $conn -> query($sql);
//         $row = mysqli_fetch_assoc($makh);
//         $kh_ma = $row["makh"];

//           

//         if( $total != 0) {
//             // $sql1="INSERT INTO hoa_don (KH_ID, PTTT_ID, HD_TONGTIEN, HD_NGAYDAT)
//             //  VALUES ('$email','$ngaygiao','$tenkh','$diachi','$dienthoai','$hinhthucthanhtoan','$total');";
//   //          if ($conn->query($sql1) === TRUE) {
//                 foreach($result as $s) {
//                     $masp= $s["SP_ID"];
//                     $dongia= $s["SP_Gia"];
//                     $sl= $_SESSION['cart'][$s["SP_ID"]];
//                     $thanhtien =  $sl* $dongia;
//                     //tao mang hd de lua sodh cua sql1
//                     $hd[] =  mysqli_insert_id($conn);
//                     //lua mang
//                     $str= implode(",",$hd);

//                     $sql1="INSERT INTO hoa_don (KH_ID, PTTT_ID, HD_TONGTIEN, HD_NGAYDAT)
//                      VALUES ('$kh_ma','$hinhthucthanhtoan','$total', '$ngaydat');";

//                     $sql2="INSERT INTO  chitiet_hd (SP_ID, HD_ID, SP_SOLUONG) 
//                     VALUES ('$masp','$str','$sl');";         
       
//                     if ($conn->query($sql2) === TRUE) {
//                         header('Location: xacnhandonhang.php');
//                         unset($_SESSION['cart']);
//                     } else {
//                         echo "Error: " . $sql2 . "<br>" . $conn->error;
//                     }
//              //   }
//             }

//         }      
//     }
// }
               
    $total= intval($_POST['total']);
    $email =  $_SESSION['email'];
    $khid = $_SESSION["khid"];
    $tenkh = $_SESSION['name'];
    $diachi = $_POST['diachi'];
    $dienthoai =  $_SESSION['sdt'];
    $hinhthucthanhtoan = $_POST['hinhthuctt']; 
    // $nhavanchuyen = $_POST['nhavanchuyen'];

    $sql = "select max(HD_ID)+1 as maxid from hoa_don";
    $rs = $conn->query($sql);
    $r = mysqli_fetch_assoc($rs);
    $new_id = $r["maxid"];

    $array = array();
    if(isset($_POST['sparray'])) {
        parse_str($_POST['sparray'], $array);
    }
    $array_sl = array();
    if(isset($_POST['slarray'])) {
        parse_str($_POST['slarray'], $array_sl);
    }

    $sql="insert into hoa_don values
            ($new_id, null, 1, null, null, $hinhthucthanhtoan, $khid, $total, sysdate(), null)";
    if ($conn->query($sql)==true){
        for ($i = 0; $i < count($array); $i++) {
            $spid = $array[$i];
            $slsp = $array_sl[$i];
            $sql_ct = "insert into chitiet_hd values ($spid, $new_id, $slsp)";
            if($conn->query($sql_ct)==true){
                $ok=1;
            } else {
                $ok=0;
                echo "Error: " . $sql_ct . "<br>" . $conn->error;
            }
         }
         if ($ok=1) {
            $message = "Đã đặt hàng thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Refresh: 0;url=index.php');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
