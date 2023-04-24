
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
  <title>
    Đơn vận chuyển
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
    $active = 'dvc'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Đơn vận chuyển</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Đơn vận chuyển</h6>
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
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="row ">
            <div class="col-lg-12">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Chi tiết ĐVC</h6>
                    </div>
                    <div class="col-6 text-end">
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                    <div class="row px-5 mt-3">
                        <div class="col-6">
                            <?php
                                $id = $_POST["dvcid"];
                                $nvc = $_POST["nvc"];
                                $des = $_POST["des"];
                                $start = $_POST["start"];
                                $finish = $_POST["finish"];

                                echo "Mã đơn: ".$id."</br>";
                                echo "Cty vận chuyển: ".$nvc."</br>";
                                echo "Giao đến: ".$des."</br>";
                                echo "Bắt đầu: ".date('d/m/Y', strtotime($start))." - Hoàn thành: ".date('d/m/Y', strtotime($finish));

                                $sql = "select * from hoa_don where DVC_ID = {$id}";

                            ?>
                        </div>
                        <div class="col-6 text-end">
                            <?php
                                $style="";
                                $stt="";
                                $currentDate = date('Y-m-d'); // Lấy ngày hiện tại
                                $startDate = $start;
                                $finishDate = $finish;
                                if (strtotime($currentDate) < strtotime($startDate)) {
                                    $stt="Chưa bắt đầu";
                                    $style = "btn-outline-primary text-primary";
                                } elseif((strtotime($currentDate) >= strtotime($startDate)) && (strtotime($currentDate) <= strtotime($finishDate))) {
                                    $stt="Đang vận chuyển";
                                    $style = "btn-outline-warning text-warning";
                                } else {
                                    $stt="Đã hoàn thành";
                                    $style = "btn-outline-success text-success";
                                }
                            ?>
                            <button class="btn text-md font-weight-bold mb-0 <?php echo $style; ?>"><?php echo $stt ?></button>
                        </div>
                    </div>
                  <div class="table-responsive p-0 mt-3">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr class="col-12">
                              <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã đơn</th>
                              <th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Khách hàng</th>                              
                              <th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đặt hàng</th> 
                              <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá trị đơn hàng</th> 

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
                                  <tr class="height-50">
                                    <td class="align-middle text-center" >
                                      <!-- ma dt -->
                                      <?php echo $row["HD_ID"] ?>
                                    </td>

                                    <td class="align-middle text-center">
                                      <!-- ten dt -->
                                      <?php 
                                        $s_kh = "select KH_HOTEN from khach_hang where KH_ID = {$row["KH_ID"] }";
                                        $rs_kh = $conn->query($s_kh);
                                        $r_kh = mysqli_fetch_assoc($rs_kh);
                                        echo $r_kh["KH_HOTEN"];
                                      ?>
                                    </td>

                                    <td class="align-middle text-center">
                                      <!-- ngay dat -->
                                      <?php echo date('d/m/Y', strtotime($row["HD_NGAYDAT"])) ?>
                                    </td>

                                    <td class="align-middle text-center">
                                      <!-- gia tri -->
                                      <?php echo number_format($row["HD_TONGTIEN"],0) ?>đ
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
        <div class="col-lg-2"></div>
        
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