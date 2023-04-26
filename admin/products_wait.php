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
<!DOCTYPE php>
<php lang="en">

<?php
  session_start();
  require 'connect.php';
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo-ck.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>
    Đơn hàng
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
    <span class="mask bg-primary opacity-6"></span>
  </div>
  
  <?php
    $active = 'dh'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="dashboard.php">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Đơn hàng</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Đơn hàng</h6>
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
    
    


<!-- 
    <button class="btn btn-outline-light text-white collapsible">Mở rộng</button>
    <div class="content">
        <div id="myDIV">
            ây là nội dung của bảng
        </div>
    </div> 
-->

    

    <div class="row">
        <div class="col-12  px-4">
              <div class="card mb-4">
                <form action="#" method="get">
                  <div class="card-header pb-2 d-flex align-items-center">
                    <div class="col-3">
                      <h5>Danh sách đơn hàng</h5>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2 me-2">
                      <select class="form-control form-control-md" name="status" id="status">
                        <option value="" selected disabled hidden>- Trạng thái -</option>
                        <?php
                          $sql = "SELECT * FROM trangthai_hd WHERE TT_ID BETWEEN 0 and 2";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            $result = $conn->query($sql);
                            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                            foreach ($result_all as $row) {
                              echo "<option value=" .$row["TT_ID"]. ">".$row["TT_TEN"]. "</option>";
                            }                          
                          } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-2">
                      <select class="form-control form-control-md" name="method" id="method">
                        <option value="" selected disabled hidden>- Phương thức thanh toán -</option>
                        <?php
                          $sql = "SELECT * FROM pt_thanhtoan";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            $result = $conn->query($sql);
                            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                            foreach ($result_all as $row) {
                              echo "<option value=" .$row["PTTT_ID"]. ">".$row["PTTT_TEN"]. "</option>";
                            }                          
                          } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="px-2 col-1 font-weight-bold">
                      <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-3">
                        Lọc
                      </button>
                    </div>
                  </div>
                </form>
                

                <?php
                  $sql = "select * from hoa_don where TT_ID BETWEEN 0 AND 2";
                  if(isset($_GET["status"]) && isset($_GET["method"])){
                    $sql = "select * from hoa_don where TT_ID = {$_GET["status"]} and PTTT_ID = {$_GET["method"]}";
                  } elseif (isset($_GET["status"]) && !isset($_GET["method"])){
                    $sql = "select * from hoa_don where TT_ID = {$_GET["status"]}";
                  } elseif (!isset($_GET["status"]) && isset($_GET["method"])){
                    $sql = "select * from hoa_don where TT_ID BETWEEN 0 AND 2 and PTTT_ID = {$_GET["method"]}";
                  } else {
                    $sql = "select * from hoa_don where TT_ID BETWEEN 0 AND 2";
                  }
                  $sql .= " order by HD_Ngaydat desc";
                ?>            
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                  <!-- table 5 cot -->
                  <table class="table align-items-center mb-0">
                      <thead>
                      <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã đơn</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khách hàng</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nhân viên tiếp nhận</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phương thức</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đặt hàng</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
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
                              
                              $nvid = $row["NV_ID"];
                              $lidohuy = $row["HD_LIDOHUY"];

                              $sql_kh = "SELECT * FROM khach_hang WHERE KH_ID = {$row["KH_ID"]}";
                              $result1 = $conn->query($sql_kh);
                              if ($result1->num_rows > 0) {
                              $result1 = $conn->query($sql_kh);
                              $result_all1 = $result1 -> fetch_all(MYSQLI_ASSOC);
                              foreach ($result_all1 as $row1) {

                                  $sql_tk = "select * from tai_khoan where TK_ID = {$row1["TK_ID"]}";
                                  $result2 = $conn->query($sql_tk);
                                  $row2 = mysqli_fetch_assoc($result2);

                                  $sql_tt = "select * from trangthai_hd where TT_ID = {$row["TT_ID"]}" ;
                                  $result3 = $conn->query($sql_tt);
                                  $row3 = mysqli_fetch_assoc($result3);


                              ?>
                              <tr class="height-100">
                                  <!-- Ma hoa don -->
                                  <td class="align-middle text-center">
                                      <p class="text-sm font-weight-bold mb-0"><?php echo $row["HD_ID"]; ?></p>
                                  </td>
                                  <td>
                                  <div class="d-flex px-1 py-1">
                                      <!-- hinh anh khach hang -->
                                      <div>
                                      <?php
                                          $avatar_url = "../assets/img/cus_img/" . $row2["TK_AVATAR"];
                                          echo "<img src='{$avatar_url}' class='avatar avatar-md me-3 mt-3' alt='cus'>";
                                      ?> 
                                      </div>
                                      <!-- ten kh -->
                                      <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm"><?php echo $row1["KH_HOTEN"]; ?></h6>
                                      <p class='text-xs text-secondary mb-0'>Ngày sinh: <?php echo $row1["KH_NGAYSINH"]; ?></p>
                                      <p class="text-xs text-secondary mb-0">Địa chỉ: <?php echo $row1["KH_DIACHI"]; ?></p>
                                      </div>
                                  </div>
                                  </td>

                                  <!-- Nhan vien tiep nhan -->
                                  <td>
                                      <?php
                                      if ($nvid != null){
                                          $sqlnv = "select NV_HOTEN from nhan_vien where NV_ID = {$nvid}";
                                          $rsnv = $conn->query($sqlnv);
                                          $rownv = mysqli_fetch_assoc($rsnv);
                                          $tennv = $rownv["NV_HOTEN"];
                                      } else {
                                          $tennv = "Chưa được duyệt!";
                                      }
                                      ?>
                                  <p class="text-xs font-weight-bold mb-0"><?php echo $tennv; ?></p>
                                  </td>
                                  <!-- Tong tien-->
                                  <td>
                                  <p class="text-s text-success font-weight-bold mb-0"><?php echo number_format($row["HD_TONGTIEN"], 0)  ?> VNĐ</p>
                                  </td>
                                  <!-- Phuong thuc-->
                                  <td class="align-middle text-center">
                                    <?php
                                      $idpttt = $row["PTTT_ID"];
                                      $sqlpt = "select PTTT_TEN from pt_thanhtoan where PTTT_ID = {$idpttt}";
                                      $rspt = $conn->query($sqlpt);
                                      $rowpt = mysqli_fetch_assoc($rspt);
                                    ?>
                                  <p class="text-xs text-secondary mb-0"><?php echo $rowpt["PTTT_TEN"];  ?></p>
                                  </td>
                                  <!-- ngay them -->
                                  <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y',strtotime($row["HD_NGAYDAT"])); ?></span>
                                  </td>
                                  <!-- status-->
                                  <td class="align-middle text-center">
                                    <?php
                                          if ($row3["TT_ID"]==1) $style = "btn-warning";
                                          elseif ($row3["TT_ID"]==2) $style = "btn-primary";
                                          elseif ($row3["TT_ID"]==0) $style = "btn-danger";
                                          else $style = "text-success";
                                      ?>
                                    <button class="btn text-xs font-weight-bold mb-0 <?php echo $style; ?>"><?php echo $row3["TT_TEN"]; ?></button>
                                  </td>
                                  <td class="align-middle">
                                      <form action="detail-pdwait.php" method="post">
                                          <input type="hidden" name="mahd" value="<?php echo $row["HD_ID"]; ?>">
                                          <input type="hidden" name="madvc" value="<?php echo $row["DVC_ID"]; ?>">
                                          <input type="hidden" name="avtkh" value="<?php echo $row2["TK_AVATAR"]; ?>">
                                          <input type="hidden" name="tenkh" value="<?php echo $row1["KH_HOTEN"]; ?>">
                                          <input type="hidden" name="ngaysinh" value="<?php echo $row1["KH_NGAYSINH"]; ?>">
                                          <input type="hidden" name="diachikh" value="<?php echo $row1["KH_DIACHI"]; ?>">
                                          <input type="hidden" name="sdtkh" value="<?php echo $row1["KH_SDT"]; ?>">
                                          <input type="hidden" name="emailkh" value="<?php echo $row1["KH_EMAIL"]; ?>">
                                          <input type="hidden" name="tongtien" value="<?php echo $row["HD_TONGTIEN"]; ?>">
                                          <input type="hidden" name="ngaydat" value="<?php echo $row["HD_NGAYDAT"]; ?>">
                                          <input type="hidden" name="trangthai" value="<?php echo $row3["TT_ID"]; ?>">
                                          <input type="hidden" name="phuongthuc" value="<?php echo $rowpt["PTTT_TEN"]; ?>">
                                          <input type="hidden" name="tentrangthai" value="<?php echo $row3["TT_TEN"]; ?>">
                                          <input type="hidden" name="lidohuy" value="<?php echo $lidohuy; ?>">
                                          

                                          <button type="submit" class="mt-4 btn btn-link text-primary font-weight-bold text-xs">
                                              Xem chi tiết ->
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                              <?php
                              }
                              }
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
</main>

  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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

</php>