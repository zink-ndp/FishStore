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
        </div>
        <form name="form1" action="capnhatttkh.php" method="post">
        <input type="hidden" name="tkid" value="<?php echo $_SESSION['id']; ?>">
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
        <form action="chitiethd.php" method="get">
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
                    <button type="submit" class="view-btn btn btn-outline-primary text-primary font-weight-bold text-xs mt-3 p-1">
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
      </form>
      </div>
    </div>
  </div>
</div>
<?php 
	include "footer.php"
?>
<?php ob_end_flush(); ?>
