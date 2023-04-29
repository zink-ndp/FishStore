<?php
ob_start();
session_start();

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
<div id="page-content" class="single-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="ttkh.php">thong tin khach hang</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6" id="ff3">
        <div class="heading">
          <h1 class="text-uppercase text-sm mt-2">Thông tin cá nhân</h1>
          <input type="hidden" name="tkid" value="<?php echo $_SESSION['id']; ?>">
        </div>
        <form name="form1" action="capnhatttkh.php" method="post">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Họ và tên</label>
            <input class="form-control text-center" type="text" name="khname" value="<?php echo $_SESSION['name']; ?>">
          </div>
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Ngày sinh</label>
            <input type="date" name="khbirth" id="birth" class="form-control text-center" value="<?php echo $_SESSION['date']; ?>">
          </div>
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Giới tính</label>
              <select class="form-control text-center" name="khsex" id="sex">
                <option value="<?php echo $_SESSION['sex']; ?>" selected hidden>
                  <?php
                    if($_SESSION['sex']=='m'){
                     ?>Nam<?php
                    } else {
                     ?>Nữ<?php
                    } 
                  ?>
                </option>
                <option value="m">Nam</option>
                <option value="f">Nữ</option>
              </select>
          </div>
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Email</label>
            <input class="form-control text-center" type="email" name="khmail" value="<?php echo $_SESSION['email']; ?>">
          </div>
          <div>
            <label for="example-text-input" class="form-control-label">Số điện thoại</label>
            <input class="form-control text-center" type="text" name="khphone" value="<?php echo $_SESSION['sdt']; ?>">
          </div>
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Địa chỉ</label>
					  <input class="form-control text-center" type="text" name="khposition" value="<?php echo $_SESSION['location']; ?>">
          </div>
          <div class="form-group">
            <input type="checkbox" id="check" onchange="toggleButton()"> <span>Xác nhận thông tin</span>
          </div>
          <div class="form-group">
            <button type="submit" id="button" disabled class="ms-n2 btn btn-primary btn-sm ms-auto">Cập nhật thông tin</button>
          </div>
          <script>
            function toggleButton() {
              var checkbox = document.getElementById("check");
              var button = document.getElementById("button");
              if (checkbox.checked) {
                button.disabled = false;
              } else {
                button.disabled = true;
              }
             }
          </script>
          <div class="form-group">
            <a href="doimk.php" class="alert alert-danger">Đổi mật khẩu</a>
          </div>
        </form>
      </div>
      <div class="col-md-6" id="ff4">
        <div class="heading">
          <h1 class="text-uppercase text-sm mt-2">Lịch sử mua hàng</h1>
          <?php $sql = "select * from hoa_don where kh_id=".$_SESSION['id'].";"; ?>
        </div>
        <table class="table">
        <thead>
          <tr class="col-12">
            <th class="text-center">Ngày Mua Hàng</th>
            <th class="text-center">Số Lượng</th>
            <th class="text-center">PT Thanh toán</th>
            <th class="text-center">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $result = $conn->query($sql);
            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($result_all as $row) {

              ?>
              <tr class="h-50">
              <input type="hidden" name="hdid" value="<?php echo $row["HD_ID"] ?>">
                <td class="align-middle text-center">
                  <!-- ngayhoanthanh -->
                  <?php echo date('d/m/Y', strtotime($row["HD_NGAYDAT"])) ?>
                </td>
                <td class="align-middle text-center">
                  <!-- soluong -->
                  <?php
                    $sql_sl = "select count(*) as soluong from chitiet_hd where HD_ID = ".$row["HD_ID"]."";
                    $rssl = $conn->query($sql_sl);
                    $rowsl = mysqli_fetch_assoc($rssl);
                    echo $rowsl["soluong"]
                  ?>
                </td>

                <!-- phuong thuc thanh toan -->
                <td class="align-middle text-xs text-center">
                    <?php
                      $idpttt = $row["PTTT_ID"];
                      $sqlpt = "select PTTT_TEN from pt_thanhtoan where PTTT_ID = {$idpttt}";
                      $rspt = $conn->query($sqlpt);
                      $rowpt = mysqli_fetch_assoc($rspt);
                      echo $rowpt["PTTT_TEN"];
                    ?>
                </td>

                <td class="align-middle font-weight-bold text-success text-center">
                  <!-- tongtien -->
                  <?php echo number_format($row["HD_TONGTIEN"], 0) ?>đ
                </td>
                <td class="align-middle text-center">
                  <form action="" method="get">
                    <input type="hidden" name="hd_id" value="<?php echo $row["HD_ID"] ?>">
                    <button onclick="this.form.submit()" class="view-btn btn btn-outline-primary text-primary font-weight-bold text-xs mt-3 p-1">
                      Xem chi tiết >
                    </button>
                  </form>
                </td>
              </tr>
              <?php
            }
          }
        ?>
          </tbody>         
        </table>
      </div>
      <div class="col-md-6" id="ff4">
        <?php
          if(isset($_GET["hd_id"])){
            $hdid = $_GET["hd_id"];
            $sql = "select hd.HD_ID as mahd, hd.HD_NGAYDAT as ngay, kh.KH_ID as makh, kh.KH_HOTEN as tenkh, kh.KH_SDT as sdtkh, kh.KH_DIACHI as dckh, nv.NV_ID as manv, nv.NV_HOTEN as tennv
                    from hoa_don hd
                    inner join khach_hang kh on kh.KH_ID = hd.KH_ID
                    inner join nhan_vien nv on nv.NV_ID = hd.NV_ID
                    where hd.HD_ID={$hdid};";
            $rs = $conn->query($sql);
            $row = mysqli_fetch_assoc($rs);
        ?>
        <div class="row">
          <div class="heading">
            <h1>Chi tiết hoá đơn</h1>
          </div>
          <div>
            <label for="example-text-input" class="panel-heading">Hóa Đơn worldFish</label>
          </div>
          <div>
            Mã đơn: <?php echo $row["mahd"]; ; $mahd = $row["mahd"]; ?> - Ngày đặt: <?php echo date('d/m/Y', strtotime($row["ngay"])) ?>
          </div>
          <div>
          <label for="example-text-input text-uppercase" class="panel-heading">Thông tin khách hàng</label>
          <div >
            Tên khách hàng: <?php echo $row["tenkh"] ?>
          </div>
          <div>
            SDT: <?php echo $row["sdtkh"] ?>
          </div>
          <div>
            Địa chỉ: <?php echo $row["dckh"] ?>\
          </div>
          <div>
            <label for="example-text-input text-uppercase" class="panel-heading">Danh Sách Sản Phẩm</label>
          </div>
          <table class="table">
              <thead class="col-12">
                <th class="text-center">Tên sản phẩm</th>
                <th class="text-center">Số Lượng</th>
                <th class="text-center">Đơn Giá</th>
                <th class="text-center">Thành Tiền</th>
              </thead>
              <tbody>
                <?php
                  $sql = "select sp.SP_TEN as tensp, sp.SP_GIA as giasp , ct.SP_SOLUONG as slsp, (ct.SP_SOLUONG*sp.SP_GIA) as tongtien 
                          from chitiet_hd ct 
                          join hoa_don hd on hd.HD_ID = ct.HD_ID 
                          join san_pham sp on sp.SP_ID = ct.SP_ID 
                          where hd.HD_ID = {$row["mahd"]}; ";

                  $rs = $conn->query($sql);
                  $rs_all = $rs -> fetch_all(MYSQLI_ASSOC);
                  foreach($rs_all as $row){
                    ?>
                    <tr>
                      <td class="align-middle text-xs text-center">
                        <?php echo $row["tensp"] ?>
                      </td>
                      <td class="align-middle text-center">
                        <?php echo $row["slsp"] ?>
                      </td>
                      <td class="align-middle font-weight-bold text-success text-center">
                        <?php echo number_format($row["giasp"], 0) ?>
                      </td>
                      <td>
                        <?php echo number_format($row["tongtien"], 0) ?>
                      </td>
                    </tr>
                    <?php
                  }

                ?>
                <tr>
                  <td colspan="4">
                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                  </td>
                </tr>
                <tr>
                  <td colspan="4" class="text-end">
                    <?php
                      $sql = "select sum(ct.SP_SOLUONG*sp.SP_GIA) as tongtien 
                              from chitiet_hd ct 
                              join hoa_don hd on hd.HD_ID = ct.HD_ID 
                              join san_pham sp on sp.SP_ID = ct.SP_ID 
                              where hd.HD_ID = {$mahd}; ";
                      $rs = $conn->query($sql);
                      $row = mysqli_fetch_assoc($rs);
                    ?>
                    <h6>Tổng Tiền:</h6><?php echo number_format($row["tongtien"], 0)." đ" ?>
                  </td>
                </tr>                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php 
            } else {
          ?>
              <div class="card">
              <div class="card-header pb-0 p-3"></div>
              <div class="card-body p-3 pb-0">
                <div class="row">
                  <div class="col-12 pt-4 pb-5 text-center">
                    <h5>                      
                      Thông tin chi tiết sẽ xuất hiện ở đây
                    </h5>
                  </div>
                </div>
              </div>
          <?php
            }
          
          ?>  
    </div>
  </div>
</div>
</div>
<?php 
	include "footer.php"
?>
<?php ob_end_flush(); ?>
