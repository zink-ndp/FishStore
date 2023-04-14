<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>
  <style>
    #myTable tbody tr:nth-child(odd) {
      background-color: #ffffff;
    }
    #myTable tbody tr {
      height: 10px;
    }
  </style>
  <title>
    Hoá đơn
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <!-- Nguyên đoạn này -->
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://images.unsplash.com/photo-1514907283155-ea5f4094c70c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-5"></span>
  </div>
  
  <?php
    $active = 'hd'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Hoá đơn</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Hoá đơn</h6>
        </nav>
        <!-- Đoạn này -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <!-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here..."> -->
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center mb-4 me-4">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <img src="../assets/img/staff_img/<?php echo $_SESSION["avt"]; ?>" class="rounded-circle avatar avatar-xl" alt='user'>
              </div>
            </li>
            <li class="nav-item d-flex align-items-center mt-sm-1 ms-3">
             <nav class=" mt-sm-1" aria-label="breadcrumb">   
                <h7 class="text-white text mb-0">Xin chào,</h7>
                <h6 class="font-weight-bolder text-white mt-n1"><?php echo $_SESSION["name"]; ?></h6>      
                <a href="log_out.php" class="btn btn-outline-light text-white font-weight-bold px-2 mt-n1 py-1">
                  <span class="d-sm-inline d-none me-sm-1">Đăng xuất</span>
                  <i class="fas fa-sign-out-alt "></i>
                </a>
              </nav>
            </li> 
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <?php
      require 'connect.php';
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-4">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <!-- <div class="icon icon-shape icon-md bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-money-bill-wave opacity-10"></i>
                  </div> -->
                  <img src="https://img.icons8.com/3d-fluency/94/null/cash-in-hand.png"/>
                </div>
                <div class="card-body pt-0 p-1 text-center">
                  <?php
                    $sql = "select sum(HD_TONGTIEN) as tongtien from hoa_don where TT_ID = 3 and PTTT_ID = 1";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    $tong_tm = number_format($row["tongtien"], 0);
                  ?>
                  <h6 class="text-center mb-0">Tiền mặt</h6>                  
                  <hr class="horizontal dark my-2">
                  <h5 class="mb-0">+ <?php echo $tong_tm ?>đ</h5>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <!-- <div class="icon icon-shape icon-md bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-landmark opacity-10"></i>
                  </div> -->
                  <img src="https://img.icons8.com/3d-fluency/94/null/money-transfer.png"/>
                </div>
                <div class="card-body pt-0 p-1 text-center">
                <?php
                    $sql = "select sum(HD_TONGTIEN) as tongtien from hoa_don where TT_ID = 3 and PTTT_ID = 2";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    $tong_ck = number_format($row["tongtien"], 0);
                  ?>
                  <h6 class="text-center mb-0">Chuyển khoản ngân hàng</h6>                  
                  <hr class="horizontal dark my-2">
                  <h5 class="mb-0">+ <?php echo $tong_ck ?>đ</h5>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <!-- <div class="icon icon-shape icon-md bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fab fa-cc-visa opacity-10"></i>
                  </div> -->
                  <img src="https://img.icons8.com/3d-fluency/94/null/bank-cards.png"/>
                </div>
                <div class="card-body pt-0 p-1 text-center">
                <?php
                    $sql = "select sum(HD_TONGTIEN) as tongtien from hoa_don where TT_ID = 3 and PTTT_ID = 3";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    $tong_vm = number_format($row["tongtien"], 0);
                  ?>
                  <h6 class="text-center mb-0">Visa/Mastercard</h6>                  
                  <hr class="horizontal dark my-2">
                  <h5 class="mb-0">+ <?php echo $tong_vm ?>đ</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4 ">
            <div class="col-lg-12">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Danh sách hoá đơn</h6>
                    </div>
                    <div class="col-6 text-end">
                      <?php
                        $sql = "select * from hoa_don where TT_ID = 3;";
                      ?>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                  <div class="table-responsive p-0">
                        <!-- table 5 cot -->
                        <table id="myTable" class="display" class="table align-items-center mb-0">
                          <thead>
                            <tr class="col-12">
                              <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã hoá đơn</th>
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày hoàn thành</th>
                              <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng SP</th>
                              <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PT Thanh toán</th>
                              <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                              <th class="col-2 text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- 1 hang -->
                            <?php
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                $result = $conn->query($sql);
                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                foreach ($result_all as $row) {

                                  ?>
                                  <tr class="h-50">
                                    <td class="align-middle text-center" >
                                      <!-- ma hd -->
                                      <?php echo $row["HD_ID"] ?>
                                    </td>
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
                            
                            <!-- het 1 hang -->
                          </tbody>
                        </table>
                      </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-lg-4">
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
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Chi tiết hoá đơn</h6>
                </div>
                <div class="col-3 text-end me-n3">
                  <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-5"><i class="fas fa-print text-sm me-1"></i> In</button>
                </div>
                <div class="col-3 text-end">
                  <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-1"><i class="fas fa-file-pdf text-sm me-1"></i> Xuất PDF</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-3">
              <div class="row">
                <div class="col-12"  id="printable-content">
                  <!-- title -->
                  <div class="row text-center fs-5 font-weight-bold">
                    <div class="col-12">
                      HOÁ ĐƠN FORISH
                    </div>
                  </div>
                  <!-- ngay -->
                  <div class="row text-center fs- font-weight-bold"> 
                    <div class="col-12">
                      Mã đơn: <?php echo $row["mahd"]; ; $mahd = $row["mahd"]; ?> - Ngày đặt: <?php echo date('d/m/Y', strtotime($row["ngay"])) ?>
                    </div>
                  </div>
                  <!-- thongtin khachhang -->
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <h6>Thông tin khách hàng:</h6>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-2">
                        <div class="col-4">
                          <h6>Mã khách hàng: </h6>
                        </div>
                        <div class="col-8">
                          <p><?php echo $row["makh"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-4">
                          <h6>Tên khách hàng: </h6>
                        </div>
                        <div class="col-8">
                          <p><?php echo $row["tenkh"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-4">
                          <h6>SĐT: </h6>
                        </div>
                        <div class="col-8">
                          <p><?php echo $row["sdtkh"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-4">
                          <h6>Địa chỉ: </h6>
                        </div>
                        <div class="col-8">
                          <p><?php echo $row["dckh"] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- thongtin nhanvien -->
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <h6>Thông tin nhân viên:</h6>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-2">
                        <div class="col-4">
                          <h6>Mã nhân viên: </h6>
                        </div>
                        <div class="col-8">
                          <p><?php echo $row["manv"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-4">
                          <h6>Tên nhân viên: </h6>
                        </div>
                        <div class="col-8">
                          <p><?php echo $row["tennv"] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <h6>Danh sách sản phẩm:</h6>
                      <table>
                        <thead>
                          <tr class="col-12">
                            <th class="col-7 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ten SP</th>
                            <th class="col-2 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL</th>
                            <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ĐG</th>
                            <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">T.Tiền</th>
                          </tr>
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
                                <td colspan="4">
                                  <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <?php echo $row["tensp"] ?>
                                </td>
                                <td>
                                  <?php echo $row["slsp"] ?>
                                </td>
                                <td>
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
                              <h7>Thành tiền:</h7>
                              <h6 class="fs-4 mt-n2">
                                <?php echo number_format($row["tongtien"], 0)." đ" ?>
                              </h6> 
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
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
  </main>
   <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>