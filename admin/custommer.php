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
  <title>
    Danh sách khách hàng
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
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://images.unsplash.com/photo-1514907283155-ea5f4094c70c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
<!-- Đoạn aside -->
  <?php
    $active = 'kh'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Danh sách khách hàng</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Danh sách khách hàng</h6>
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
    <div class="container-fluid py-4">
    <div class="row">
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
      ?>
        
        <!-- Nguyên đống này la mot danh muc -->
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <form action="#" method="get">
                    <div class="card-header pb-2 d-flex align-items-center">
                      <div class="col-3">
                        <h6 class="">Danh sách khách hàng</h6>
                      </div>
                      <!-- <div class="col-6"></div> -->
                      <div class="col-9 d-flex align-items-center  justify-content-end">
                        <div class="input-group w-30 me-3">
                          <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                          <input type="text" name="timkiem" class="form-control" placeholder="Nhập tên khách hàng cần tìm..">
                        </div>
                        <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-3">
                          Tìm
                        </button>
                      </div>
                    </div>
                    </form>

                    <?php
                      $sql = "SELECT * FROM khach_hang";
                      if(isset($_GET["timkiem"])){
                        $search = $_GET["timkiem"];
                        if ($search != null) {
                          $sql = "SELECT * FROM khach_hang WHERE kh_hoten LIKE '%".$search."%'";
                        }
                      }
                    ?>

                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khách hàng</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">địa chỉ</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SĐT</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đăng ký</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Liên hệ</th>
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
                                  $tkkhid = $row["TK_ID"];

                                  $sql1 = "SELECT * FROM tai_khoan WHERE TK_ID = {$tkkhid}";
                                  $result1 = $conn->query($sql1);
                                  if ($result1->num_rows > 0) {
                                    $result1 = $conn->query($sql1);
                                    $result_all1 = $result1 -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($result_all1 as $row1) {
                                  ?>
                                    <tr class="height-100">
                                      <td>
                                        <div class="d-flex px-1 py-1">
                                            <!-- hinh anh khach hang -->
                                          <div>
                                            <?php
                                              $avatar_url = "../assets/img/cus_img/" . $row1["TK_AVATAR"];
                                              echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='cus'>";
                                            ?> 
                                          </div>
                                          <!-- ten kh -->
                                          <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $row["KH_HOTEN"]; ?></h6>
                                            <p class='text-xs text-secondary mb-0'>Ngày sinh: <?php echo $row["KH_NGAYSINH"]; ?></p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                      <p class="text-sm font-weight-bold mb-0"><?php echo $row["KH_DIACHI"]; ?></p>
                                      </td>
                                      <!-- SDT-->
                                      <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["KH_SDT"]; ?></p>
                                      </td>
                                      <!-- email-->
                                      <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["KH_EMAIL"]; ?></p>
                                      </td>
                                      <!-- ngay them -->
                                      <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y', strtotime($row["KH_NGAYDK"])); ?></span>
                                      </td>
                                      <td class="align-middle">
                                      <form method="post" action="edit_staff.php">
                                          <input type="hidden" name="nvid" value="<?php echo $row["KH_ID"]; ?>">
                                          <button onclick="this.form.submit()" class="mt-3 btn btn-link text-primary font-weight-bold text-sm">
                                            Gửi email
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
              <?php
        ?>
        <!-- <a href="staff_add.php" class="btn btn-link mt-n3">+ Thêm nhân viên</a> -->
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  <!-- </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <!-- <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a> -->
        <!-- Navbar Fixed -->
        <!-- <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>  -->
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
  <?php 
    $conn->close();
  ?>
</body>

</html>