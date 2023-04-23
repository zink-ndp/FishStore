<?php
require 'myconnect.php';
//lay danh sach san pham ban chay
$sql = "select sp.sp_id as id, sp.sp_ten as ten, sp.SP_HINHANH as hinhanh, sp.SP_GIA as gia, sum(ct.sp_soluong) as so_ban, count(distinct ct.hd_id) as so_hd
                      from san_pham sp
                      join chitiet_hd ct on sp.sp_id = ct.sp_id
                      group by sp.sp_id, sp.sp_ten
                      order by so_hd desc
                      limit 4;  ";
$result = $conn->query($sql);
//lay danh sach san pham ban chay
$conn->close();
?>