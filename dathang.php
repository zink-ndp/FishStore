<?php
ob_start();
session_start();
require "inc/myconnect.php";
?>

<?php 
	include "head.php"
	?>
<?php
$title ="Shop Cá Kiểng";
$name ="Shop Cá Kiểng";
?>
<?php 
	include "top.php"
    ?>
    <?php 
	// include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>
	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Cart Page//////////////////////-->
	<!--//////////////////////////////////////////////////-->

  <form name="form6" id="ff6" method="POST" action="luudonhang.php">
	<div id="page-content" class="single-page">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a style="text-align:center">Xác nhận đơn hàng</a></li>
					</ul>
				</div>
			</div>
			
			<div class="row">
		
			<div class="col-lg-6">
				    <div class="panel panel-default">
					<div class="panel-heading">Thông tin khách hàng</div>
             <div class="panel-body">	
			<div class="col-md-4" style="height:250px; width:150px">
				<img src="assets/img/cus_img/<?php echo $_SESSION["pic"] ?>" alt="" style="heigh:auto; width:auto; object-fit: cover;">
			</div>	 
			 <div class="col-md-8">
			 <label>Tên khách hàng : <?php echo  $_SESSION['name']?></label>
			 <label>Điện thoại: <?php echo  $_SESSION['sdt']?></label>
			 <label>Email:<?php echo    $_SESSION['email']?></label>     
			 <label><input type="text"  class="form-control" placeholder="Nhập địa chỉ giao hàng:" name="diachi"  required ></label>
			 <br/>
			<label>Ngày đặt hàng: <input type="text" readonly class="form-control" value="<?php echo date('Y-m-d'); ?>" name="date" id="datechoose"  required ></label>
			<!-- <label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
    										<option value="ATM">Trả thẻ</option>
    										<option value="Live">Trực tiếp</option>
  											</optgroup>
										</select>
				</label> -->
				<label>Hình thức thanh toán:
                    <select class="form-control select2" name="hinhthuctt">
						<?php
						require "inc/myconnect.php";
                        $sql="SELECT * from pt_thanhtoan ";
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) {
                          // xuat data cho moi dong
                          	while($row = $result->fetch_assoc()) {
                      			?>
                      			<option value="<?php echo $row["PTTT_ID"] ?>"><?php echo $row["PTTT_TEN"] ?></option>
									<?php
								}
						}
						?>
                    	</select>	
					</label>	
	
			 </div>
			 
				   </div>		
					 		 
			</div>				
			<!-- <label>Chọn nhà vận chuyển vận chuyển</label>
                    <select class="form-control select2" name="nhavanchuyen" id="nhavanchuyen" data-placeholder="Chọn nhà vận chuyển" >
										<?php
													require "inc/myconnect.php";
                         $sql="SELECT * from nha_van_chuyen ";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          // xuat data cho moi dong
                          while($row = $result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row["NVC_ID"] ?>"><?php echo $row["NVC_TEN"] ?></option>
											<?php
													}
												}
											?>
                    </select>						 -->
		</div>        
		<div class="col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">Thông tin đơn hàng</div>
             <div class="panel-body">		 
			 <div class="col-md-12">
			 <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
		<th>Tổng</th>
      </tr>
    </thead>
    <tbody>
	<?php	
			$sp_array = array();
			$slsp_array = array();
			$khid = $_SESSION["khid"];
			$sl = 0;
			$sql = "select SP_ID, SP_Soluong from chitiet_gh where KH_ID = {$khid}";
			$rs = $conn->query($sql);
			$total = 0;
			foreach ($rs as $sp) {
				$sl += 1;
				$spid = $sp["SP_ID"];
				$sp_array[] = $spid;
				$query = "SELECT s.SP_ID,s.SP_Ten,s.SP_Gia,s.SP_HinhAnh,s.SP_Mota, l.LSP_Ten as Tenloaisp,s.LSP_ID
					from san_pham s 
					LEFT JOIN loai_sp l on s.LSP_ID = l.LSP_ID
					 WHERE  s.SP_ID  = $spid";
				$result = $conn->query($query);
				foreach ($result as $s) {
					?>					
						<tr>
						<td><?php  echo $s["SP_Ten"]?></td>
						<td><?php echo $sp["SP_Soluong"]?></td>
						<td><?php  echo $s["SP_Gia"]?> </td>
						<td><?php echo $sp["SP_Soluong"]*$s["SP_Gia"]?></td>					
						<?php $slsp_array[] = $sp["SP_Soluong"] ?>
						</tr>
					<?php
					$total += $sp["SP_Soluong"]*$s["SP_Gia"];
				}
			}
			$queryString = http_build_query($sp_array);
			$queryString1 = http_build_query($slsp_array);
		?>
	
    </tbody>
  </table>
</div>
</div>            
</div>
</div>
</div> 
<h4><?php echo number_format($total,0);  ?> VNĐ</h4>
<input type="hidden" name="total" value="<?php echo $total ?>">
<input type="hidden" name="sparray" value="<?php echo $queryString; ?>">
<input type="hidden" name="slarray" value="<?php echo $queryString1; ?>">
<input style="margin-left:180px;" type="submit" name="Dat" value="Đặt hàng" class="btn btn-1" />	
</div> 
			<div class="row">
			<div class="panel panel-default">	
			</div>
			</div>	
				
			</div>
	</div>	
    </form>		
	<?php 
	include "footer.php"
	?>
</body>
</html>
<!-- Lấy ngày hiện tại -->
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>
  <script src="plugins/select2/select2.full.min.js"></script>
<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
</script>
<!-- dung ajax de tinh tong tien khi chon ma dich vu -->
<!-- str la  gia tri madv khi thay doi select 2 -->
<script>
function laygiatheoiddichvu(str) {
  var xhttp;
	var div = document.getElementById("result");
	var thannhtien = document.getElementById("thannhtien");
	//truong hop id khong co gia tri thi tra ve tong tien ban dau
  if (str.length == 0) { 
		div.innerHTML  = thannhtien.value ;
		//truyen du lieu de hien thi len html
		div.innerHTML = div.innerHTML +".000 VNĐ";
		document.getElementById("total").value = thannhtien.value;
			// gian bien madv = value cua select 2
	var madv = $('.select2').select2("val");
	//truyen madv ve html co id la madv
	document.getElementById("madv").value = madv;
	console.log(madv);
    return;
  }
	//truong hop co gia tri thi lay thanh tien + tong gia dich vu
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		//gia bien sum = giatritrave
			var sum = this.responseText;
		//ep thanh kieu float de tinh thanh tien
		div.innerHTML = parseFloat(sum) + parseFloat(thannhtien.value) ;
		//truyen du lieu de hien thi len html
		div.innerHTML = div.innerHTML + " VNĐ";
		//truyen madv ve html co id la total
		document.getElementById("total").value =   parseFloat(sum) + parseFloat(thannhtien.value);
		// console.log(sum);
    }
  };
	// gian bien madv = value cua select 2
	var madv = $('.select2').select2("val");
	//truyen madv ve html co id la madv
	document.getElementById("madv").value = madv;
	console.log(madv);
	//truyen madv ve file laygiadv.php de lay tonggia
  xhttp.open("GET", "laygiadv.php?madv="+madv, true);
  xhttp.send();   
}
</script>
<?php ob_end_flush(); ?>