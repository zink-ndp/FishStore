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
    Thông tin cá nhân
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

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://images.unsplash.com/photo-1514907283155-ea5f4094c70c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  
  <?php
    $active = 'tttk'; 
    require 'aside.php';
  ?>

  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="dashboard.php">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tổng quan</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tổng quan</h6>
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
            <!-- <li class="nav-item d-flex align-items-center mb-4 me-4">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <img src="../assets/img/staff_img/<?php echo $_SESSION["avt"]; ?>" class="rounded-circle avatar avatar-xl" alt='user'>
              </div>
            </li> -->
            <!-- <li class="nav-item d-flex align-items-center mt-sm-1 ms-3">
             <nav class=" mt-sm-1" aria-label="breadcrumb">   
                <h7 class="text-white text mb-0">Xin chào,</h7>
                <h6 class="font-weight-bolder text-white mt-n1"><?php echo $_SESSION["name"]; ?></h6>      
                <a href="log_out.php" class="btn btn-outline-light text-white font-weight-bold px-2 mt-n1 py-1">
                  <span class="d-sm-inline d-none me-sm-1">Đăng xuất</span>
                  <i class="fas fa-sign-out-alt "></i>
                </a>
              </nav>
            </li>  -->
            
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
    <div style="margin-top: 0; !important" class="card shadow-lg mx-4 card-profile-bottom">
      <!-- <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Sayo Kravits
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Public Relations
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="ni ni-app"></i>
                    <span class="ms-2">App</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2">Messages</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-settings-gear-65"></i>
                    <span class="ms-2">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
     -->
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form action="update_profile.php" method="post">
              <?php

                $nvid = $_SESSION["nvid"];

                require 'connect.php';
        
                $sql = "select nv_id, tk_id, nv_hoten, nv_sdt, nv_email, nv_ngaysinh, nv_gioitinh, nv_ngaytuyen from nhan_vien where nv_id = ".$nvid."";
                $result = $conn->query($sql);
                if($result->num_rows >0 ){
                    $row = mysqli_fetch_assoc($result);
                    $nvid = $row["nv_id"];
                    $tkid = $row["tk_id"];
                    $nvhoten = $row["nv_hoten"];
                    $nvsdt = $row["nv_sdt"];
                    $nvemail = $row["nv_email"];
                    $nvgioitinh = $row["nv_gioitinh"];
                    $nvngaytuyen = $row["nv_ngaytuyen"];
                    $nvdate = date("Y-m-d", strtotime($row["nv_ngaysinh"]));
                }
        
                $sql1 = "select tk_tendangnhap, tk_matkhau, tk_avatar, tk_vaitro from tai_khoan where tk_id = ".$tkid."";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows >0 ){
                    $row1 = mysqli_fetch_assoc($result1);
                    $tkusn = $row1["tk_tendangnhap"];
                    $tkpw = $row1["tk_matkhau"];
                    $tkavt = $row1["tk_avatar"];
                    $tkvaitro = $row1["tk_vaitro"];
                }
      
              ?>
              <input type="hidden" name="tk_id" value="<?php echo $tkid; ?>">
              <input type="hidden" name="staff_id" value="<?php echo $nvid; ?>">
              <input type="hidden" name="old_staffImg" value="<?php echo $tkavt; ?>">
              <input type="hidden" name="staff_pass" value="<?php echo $tkpw; ?>">
              <input type="hidden" name="staff_repass" value="<?php echo $tkpw; ?>">
              <div class="card-body">
                <p class="text-uppercase text-sm mt-2">Thông tin cá nhân</p>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Họ và tên</label>
                      <input class="form-control" type="text" name="staff_name" value="<?php echo $nvhoten; ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Mã nhân viên</label>
                      <input class="form-control" disabled type="text" name="staff_id" value="<?php echo $nvid; ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Ngày vào làm</label>
                      <input class="form-control" disabled type="text" value="<?php echo date('d/m/Y', strtotime($nvngaytuyen)); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                      <input type="date" name="staff_birth" id="staff_birth" class="form-control form-control-lg" value="<?php echo $nvdate; ?>">
                    </div>
                  </div><div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Giới tính</label>
                      <select class="form-control form-control-lg" name="staff_sex" id="staff_sex">
                        <option value="<?php echo $nvgioitinh; ?>" selected hidden>
                          <?php
                              if($nvgioitinh=='m'){
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
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email</label>
                      <input class="form-control" type="email" name="staff_mail" value="<?php echo $nvemail; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                      <input class="form-control" type="text" name="staff_phone" value="<?php echo $nvsdt; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="col-md-9"></div>
                      <div class=" col-md-3 float-end align-items-center">
                        <input class="ms-4" type="checkbox" id="check" onchange="toggleButton()"> <span class="mb-0 ms-1">Xác nhận thông tin</span>
                        <div class="row">
                          <button id="button" disabled class="ms-n2 btn btn-primary btn-sm ms-auto">Cập nhật thông tin</button>
                        </div>
                      </div>
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
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Tài khoản</p>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Mã tài khoản</label>
                      <input class="form-control" type="text" disabled value="<?php echo $tkid; ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Chức vụ</label>
                      <?php
                        if($tkvaitro == 'staff'){
                          $tkvt = 'Nhân viên';
                        } else {
                          $tkvt = 'Quản lý';
                        } 
                      ?>
                      <input class="form-control" type="text" name="staff_vaitro" disabled value="<?php echo $tkvt; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Tên đăng nhập</label>
                      <input class="form-control" type="text" name="staff_usname" disabled value="<?php echo $tkusn; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Mật khẩu</label>
                      <!-- <input class="form-control btn btn-outline-warning text-warning" type="button" value="Đổi mật khẩu"> -->
                      <a href="change_password.php" class="form-control btn btn-outline-warning text-warning">Đổi mật khẩu</a>
                    </div>
                  </div>
                </div>
                <!-- <hr class="horizontal dark">
                <p class="text-uppercase text-sm">About me</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">About me</label>
                      <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                    </div>
                  </div>
                </div> -->
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="../assets/img/bgr-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="../assets/img/staff_img/<?php echo $tkavt; ?>" class="rounded-circle img-fluid border border-2 border-white">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 px-6 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-center">
                <a href="change_avatar.php" class="btn btn-sm btn-primary mb-0 d-none d-lg-block">Thay đổi ảnh đại diện</a>
              </div>
              <div class="d-flex justify-content-center mt-2">
                <a href="log_out.php" class="btn btn-sm btn-dark mb-0 d-none d-lg-block">Đăng xuất</a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">22</span>
                      <span class="text-sm opacity-8">Sản phẩm</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-lg font-weight-bolder">10</span>
                      <span class="text-sm opacity-8">Đơn hàng</span>
                    </div>
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">89</span>
                      <span class="text-sm opacity-8">Bình luận</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-3">
                <h5>
                  <?php echo $nvhoten; ?>
                </h5>
                <div class="h6 mt-3">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $tkvt; ?>
                </div>
                <div class="mt-n2">
                  <i class="ni education_hat mr-2"></i>Cửa hàng cá kiểng Forish
                </div>
              </div>
            </div>
          </div>
        </div>
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
  </div>
  
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