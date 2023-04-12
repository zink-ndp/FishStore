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

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo-ck.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <title>
    Trang quản lý Forish
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
<body class="g-sidenav-show  bg-gray-100">
  <!-- Nguyên đoạn này -->
  
  <div class="position-absolute w-100 min-height-400 top-0" style="background-image: url('https://images.unsplash.com/photo-1514907283155-ea5f4094c70c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-5"></span>
  </div>
  
  <!-- dark sidebar -->
  <!-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps ps--active-y bg-default " id="sidenav-main">  -->
  
  <!-- white sidebar -->
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logo-ck.png" class=" h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Quản lý Forish</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" style="height: 100vh; !important" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Tổng quan</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../admin/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tổng quan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../admin/billing.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Hoá đơn</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../admin/products_wait.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-copy text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Đơn hàng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../admin/custommer.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-user-tie text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Khách hàng</span>
          </a>
        </li>
        
        <?php
          if($_SESSION["role"] == 'admin'){
            ?>
            <li class="nav-item">
              <a class="nav-link " href="../admin/backup_page.php">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-database text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Sao lưu và Khôi phục</span>
              </a>
            </li>
            <?php
          }
        ?>
        <?php
          if($_SESSION["role"] == 'admin')
            {
              echo "<li class=\"nav-item mt-3\">\n"; 
              echo " <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Quản lý nhân viên</h6>\n"; 
              echo "</li>\n"; echo "<li class=\"nav-item\">\n"; 
              echo " <a class=\"nav-link \" href=\"../admin/staff.php\">\n"; 
              echo " <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">\n"; 
              echo " <i class=\"ni ni-single-copy-04 text-warning text-sm opacity-10\"></i>\n"; 
              echo " </div>\n"; 
              echo " <span class=\"nav-link-text ms-1\">Danh sách nhân viên</span>\n"; 
              echo " </a>\n"; 
              echo "</li>\n"; 
              echo "<li class=\"nav-item\">\n"; 
              echo " <a class=\"nav-link \" href=\"../admin/staff_add.php\">\n"; 
              echo " <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">\n"; 
              echo " <i class=\"fas fa-user-plus text-primary text-sm opacity-10\"></i>\n"; 
              echo " </div>\n"; echo " <span class=\"nav-link-text ms-1\">Thêm nhân viên</span>\n"; 
              echo " </a>\n"; 
              echo "</li>";
              echo '<li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Quản lý đối tác</h6>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="../admin/pdsource.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-building text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Nguồn hàng</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="../admin/transporter.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-truck text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Đơn vị vận chuyển</span>
                    </a>
                    </li>';
            }
        ?>


        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Quản lý sản phẩm</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../admin/trans_bill.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-truck-loading text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Đơn vận chuyển</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../admin/products.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-fish text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sản phẩm</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="../admin/products_add_form.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-cart-plus text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Nhập sản phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../admin/rating.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-star-half-alt text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Đánh giá</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../admin/news.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="far fa-newspaper text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tin tức</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Quản lý tài khoản</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-user-tag text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Thông tin tài khoản</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="dashboard.php">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tổng quan</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tổng quan</h6>
        </nav> -->
        <!-- <div class="position-absolute mt-5 z-index-2" style="left: 30%; font-family: 'Montserrat', sans-serif; text-shadow: 0px 0px 7px #000000;"> -->
        <div class="mt-5 text-center" style="font-family: 'Montserrat', sans-serif; text-shadow: 5px 5px 10px #000000;">
          <h3  class="text-white">
            TRANG QUẢN LÝ CỬA HÀNG CÁ KIỂNG
          </h3>
        </div>  
        <!-- </div> -->
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
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $thang = date('m');
                      $nam = date('Y');
                      $sql = "select 
                                  sum(case 
                                          when month(hd_ngaydat) = month(now()) and year(hd_ngaydat) = year(now()) and (tt_id = 3) then hd_tongtien 
                                          else 0 
                                      end) as doanh_thu_thang_hien_tai, 
                                  sum(case 
                                          when month(hd_ngaydat) = month(date_sub(now(), interval 1 month)) and year(hd_ngaydat) = year(now()) and (tt_id = 3) then hd_tongtien 
                                          else 0 
                                      end) as doanh_thu_thang_truoc
                              from hoa_don;
                              ";
                      $rs = $conn->query($sql);
                      $row = mysqli_fetch_assoc($rs);
                      if ($row["doanh_thu_thang_hien_tai"] != null){
                        $message = "1";
                        $tongdoanhthu = $row["doanh_thu_thang_hien_tai"];
                        $dt_thangtruoc = $row["doanh_thu_thang_truoc"];
                      }else {
                        $tongdoanhthu = 0;
                        $dt_thangtruoc = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Doanh thu tháng <?php echo $thang ."/". $nam ?></p>
                    <h4 class="font-weight-bolder">
                      <?php echo number_format($tongdoanhthu); ?> VNĐ
                    </h5>
                    <?php
                      if($dt_thangtruoc<$tongdoanhthu){
                        $perc = round(($dt_thangtruoc / $tongdoanhthu)*100, 2);
                        ?>                        
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+<?php echo $perc ?>% </span>so với tháng trước
                        </p>
                        <?php
                      } else {
                        $perc = round(($tongdoanhthu / $dt_thangtruoc)*100, 2);
                        ?>                        
                        <p class="mb-0">
                          <span class="text-danger text-sm font-weight-bolder">-<?php echo $perc ?>% </span>so với tháng trước
                        </p>
                        <?php
                      }
                    ?>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/money-bag.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $sql = "select count(*) as sohd, count(case when month(HD_NGAYDAT) = month(sysdate()) then 1 end) as trongthang from hoa_don";
                      $rs = $conn->query($sql);
                      $row = mysqli_fetch_assoc($rs);
                      if ($row["sohd"] != null){
                        $message = "1";
                        $tongsohd = $row["sohd"];
                        $dat_trong_thang = $row["trongthang"];
                      }else {
                        $tongsohd = 0;
                        $dat_trong_thang = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng đơn hàng</p>
                    <h4 class="font-weight-bolder">
                      <?php echo $tongsohd ?>
                    </h4>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+<?php echo $dat_trong_thang ?></span>
                      trong tháng
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fas fa-file-invoice-dollar text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/bill.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $sql_kh = "select count(KH_ID) as countkh, count(case when month(KH_NGAYDK) = month(sysdate()) then 1 end) as trongthang from khach_hang";
                      $rs_kh = $conn->query($sql_kh);
                      if ($rs_kh->num_rows > 0){
                        $row_kh = mysqli_fetch_assoc($rs_kh);
                        $countkh = $row_kh["countkh"];
                        $dk_trong_thang = $row_kh["trongthang"];
                      } else {
                        $countkh = 0;
                        $dk_trong_thang = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng số khách hàng</p>
                    <h4 class="font-weight-bolder">
                      <?php echo $countkh ?>
                    </h4>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+<?php echo $dk_trong_thang ?></span>
                      trong tháng
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/businessman.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $sql_nv = "select count(NV_ID) as countnv, count(case when month(NV_NGAYTUYEN) = month(sysdate()) then 1 end) as trongthang from nhan_vien";
                      $rs_nv = $conn->query($sql_nv);
                      if ($rs_nv->num_rows > 0){
                        $row_nv = mysqli_fetch_assoc($rs_nv);
                        $countnv = $row_nv["countnv"];
                        $tuyen_trong_thang = $row_nv["trongthang"];
                      } else {
                        $countnv = 0;
                        $tuyen_trong_thang = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng số nhân viên</p>
                    <h4 class="font-weight-bolder">
                      <?php echo $countnv ?>
                    </h4>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+<?php echo $tuyen_trong_thang ?></span> trong tháng
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="fas fa-users text-lg opacity-10"></i>
                  </div>
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/manager.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header col-12 pb-0 pt-3 bg-transparent">
                <?php
                  // Đoạn này tính doanh thu 12 tháng
                  if(isset($_GET["year"])){
                    $y = $_GET["year"];
                    $sql = "SELECT MONTH(HD_NGAYDAT) AS THANG, SUM(HD_TONGTIEN) AS DOANH_THU 
                            FROM HOA_DON 
                            WHERE TT_ID = 3 AND YEAR(HD_NGAYDAT)={$y}
                            GROUP BY THANG";
                    $result = mysqli_query($conn, $sql);
                    // Lấy dữ liệu từ kết quả truy vấn
                    $data = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    } 
                    // Khởi tạo mảng các biến tháng
                      $thang_1 = 0;
                      $thang_2 = 0;
                      $thang_3 = 0;
                      $thang_4 = 0;
                      $thang_5 = 0;
                      $thang_6 = 0;
                      $thang_7 = 0;
                      $thang_8 = 0;
                      $thang_9 = 0;
                      $thang_10 = 0;
                      $thang_11 = 0;
                      $thang_12 = 0;

                      $tongdt=0;
                      // Duyệt qua các phần tử của mảng kết quả
                      foreach ($data as $row) {
                          // Lấy giá trị của cột THANG
                          $thang = $row['THANG'];

                          // Lấy giá trị của cột DOANH_THU
                          $doanh_thu = $row['DOANH_THU'];

                          //Tính tổng doanh thu năm
                          $tongdt += $doanh_thu;

                          // Gán giá trị của cột DOANH_THU vào biến tháng tương ứng
                          switch ($thang) {
                              case 1:
                                  $thang_1 = $doanh_thu;
                                  break;
                              case 2:
                                  $thang_2 = $doanh_thu;
                                  break;
                              case 3:
                                  $thang_3 = $doanh_thu;
                                  break;
                              case 4:
                                  $thang_4 = $doanh_thu;
                                  break;
                              case 5:
                                  $thang_5 = $doanh_thu;
                                  break;
                              case 6:
                                  $thang_6 = $doanh_thu;
                                  break;
                              case 7:
                                  $thang_7 = $doanh_thu;
                                  break;
                              case 8:
                                  $thang_8 = $doanh_thu;
                                  break;
                              case 9:
                                  $thang_9 = $doanh_thu;
                                  break;
                              case 10:
                                  $thang_10 = $doanh_thu;
                                  break;
                              case 11:
                                  $thang_11 = $doanh_thu;
                                  break;
                              case 12:
                                  $thang_12 = $doanh_thu;
                                  break;
                          }
                      }

                      // Tạo mảng chứa các giá trị của các biến
                      $data_month = array(
                        'thang_1' => $thang_1,
                        'thang_2' => $thang_2,
                        'thang_3' => $thang_3,
                        'thang_4' => $thang_4,
                        'thang_5' => $thang_5,
                        'thang_6' => $thang_6,
                        'thang_7' => $thang_7,
                        'thang_8' => $thang_8,
                        'thang_9' => $thang_9,
                        'thang_10' => $thang_10,
                        'thang_11' => $thang_11,
                        'thang_12' => $thang_12
                      );
                      // Chuyển đổi mảng thành đối tượng JSON
                      $json_data = json_encode($data_month);
                    ?>
                      <div id="myDataMonth" data-json='<?php echo $json_data; ?>'></div>
                      <script>
                        var div = document.querySelector(".chart-here");
                        var dtnam = document.querySelector(".doanhthunam")
                        div.innerHTML = "<canvas id=\"myChart-y\" height=\"80%\" class=\"chart-canvas\"></canvas>";
                      </script>
                    <?php
                  } else {
                    $sql = "SELECT MONTH(HD_NGAYDAT) AS THANG, SUM(HD_TONGTIEN) AS DOANH_THU 
                            FROM HOA_DON 
                            WHERE TT_ID = 3 AND YEAR(HD_NGAYDAT)=2022
                            GROUP BY THANG";
                    $result = mysqli_query($conn, $sql);
                    // Lấy dữ liệu từ kết quả truy vấn
                    $data = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    } 
                    // Khởi tạo mảng các biến tháng
                      $thang_1 = 0;
                      $thang_2 = 0;
                      $thang_3 = 0;
                      $thang_4 = 0;
                      $thang_5 = 0;
                      $thang_6 = 0;
                      $thang_7 = 0;
                      $thang_8 = 0;
                      $thang_9 = 0;
                      $thang_10 = 0;
                      $thang_11 = 0;
                      $thang_12 = 0;

                      // Duyệt qua các phần tử của mảng kết quả
                      $tongdt = 0;
                      foreach ($data as $row) {
                        // Lấy giá trị của cột THANG
                        $thang = $row['THANG'];
                        
                        // Lấy giá trị của cột DOANH_THU
                        $doanh_thu = $row['DOANH_THU'];
                        
                        //Tính tổng doanh thu năm
                        $tongdt += $doanh_thu;

                          // Gán giá trị của cột DOANH_THU vào biến tháng tương ứng
                          switch ($thang) {
                              case 1:
                                  $thang_1 = $doanh_thu;
                                  break;
                              case 2:
                                  $thang_2 = $doanh_thu;
                                  break;
                              case 3:
                                  $thang_3 = $doanh_thu;
                                  break;
                              case 4:
                                  $thang_4 = $doanh_thu;
                                  break;
                              case 5:
                                  $thang_5 = $doanh_thu;
                                  break;
                              case 6:
                                  $thang_6 = $doanh_thu;
                                  break;
                              case 7:
                                  $thang_7 = $doanh_thu;
                                  break;
                              case 8:
                                  $thang_8 = $doanh_thu;
                                  break;
                              case 9:
                                  $thang_9 = $doanh_thu;
                                  break;
                              case 10:
                                  $thang_10 = $doanh_thu;
                                  break;
                              case 11:
                                  $thang_11 = $doanh_thu;
                                  break;
                              case 12:
                                  $thang_12 = $doanh_thu;
                                  break;
                          }
                      }

                      // Tạo mảng chứa các giá trị của các biến
                      $data_month = array(
                        'thang_1' => $thang_1,
                        'thang_2' => $thang_2,
                        'thang_3' => $thang_3,
                        'thang_4' => $thang_4,
                        'thang_5' => $thang_5,
                        'thang_6' => $thang_6,
                        'thang_7' => $thang_7,
                        'thang_8' => $thang_8,
                        'thang_9' => $thang_9,
                        'thang_10' => $thang_10,
                        'thang_11' => $thang_11,
                        'thang_12' => $thang_12
                      );
                      // Chuyển đổi mảng thành đối tượng JSON
                      $json_data = json_encode($data_month);
                    ?>
                      <div id="myDataMonth" data-json='<?php echo $json_data; ?>'></div>
                      <script>
                        var div = document.querySelector(".chart-here");
                        div.innerHTML = "<canvas id=\"myChart-y\" height=\"80%\" class=\"chart-canvas\"></canvas>";
                      </script>
                    <?php
                  }
                ?>
              <div class="row">
                <div class="col-lg-2">
                  <div class="doanhthunam mt-1">
                    <h5 class="text-capitalize">Doanh thu</h5>
                  </div>
                  <!-- <p class="text-sm mb-0">
                    <i class="fa fa-arrow-up text-success"></i>
                    <span class="font-weight-bold">4% more</span> in 2021
                  </p> -->
                </div>
                <div class="col-lg-4">
                  <form action="#" method="get">
                    <?php
                      if (isset($_GET["year"])){
                        $year = $_GET["year"];
                      } else {
                        $year = "- Năm -";
                      }
                    ?>
                    <div class="row">
                      <div class="col-10">
                        <select class="form-control form-control-md" name="year" id="year">
                          <option value="" selected disabled hidden><?php echo $year; ?></option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                        </select>
                      </div>
                      <div class="col-1">
                        <button type="submit" class="btn btn-primary text-white font-weight-bold text-md">
                          Lọc
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-lg-6 d-flex text-end align-items-center justify-content-end mt-n4 ">
                  <span>Tổng doanh thu: </span><h5 class="text-success ms-2 mt-1"><?php echo number_format($tongdt, 0) ?> VNĐ</h5>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="chart mt-n2"> 
                <style>
                  canvas {
                    -moz-user-select: none;
                    -webkit-user-select: none;
                    -ms-user-select: none;
                  }

                  canvas .bar{
                    width: 50px;
                  }

                </style>
                <div class="chart_here">
                  <canvas id="myChart-y" height="80%" class="chart-canvas"></canvas>
                  <!-- <canvas id="chart-line" class="chart-canvas" height="300"></canvas> -->
                </div>
                <!-- <div class="d-flex text-center align-items-center justify-content-center mt-3">
                  <span>Tổng doanh thu: </span><h4 class="text-success ms-2 mt-1"><?php echo number_format($tongdt, 0) ?> VNĐ</h4>
                </div> -->
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <style>
                  .carousel-item::before {
                    content: "";
                    display: block;
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.2); /* hoặc giá trị màu tối ưa thích */
                  }

                  .carousel-caption {
                    z-index: 1;
                  }

                </style>
                <!-- Top1 -->
                <div class="carousel-item h-100 active" style="background-image: url('../assets/img/c1.jpg'); background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-4">
                      <h4 class="text-white">"Aquatic elegance for your home!" </h4> 
                    <h5 class="text-white"> A simple, elegant way to describe ornamental fish.</h5>
                  </div>
                </div>
                <!-- Top2 -->
                <div class="carousel-item h-100" style="background-image: url('../assets/img/c2.jpg'); background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-4">
                    <h4 class="text-white">"Colorful companions for your space!"</h4>      
                    <h5 class="text-white">A catchy way to highlight the vibrant hues of ornamental fish.</h5>
                  </div>
                </div>
                <!-- Top3 -->
                <div class="carousel-item h-100" style="background-image: url('../assets/img/c3.jpg'); background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-4">
                    <h4 class="text-white">"Underwater serenity in your own home!"</h4>  
                    <h5 class="text-white">A concise way to describe the peaceful ambiance of ornamental fish.</h5>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Đơn theo loại hàng</h6>
              </div>
            </div>
            <?php
              $sql_ck="select count(*) as tongsp
                      from chitiet_hd ct
                      inner join san_pham sp on sp.SP_ID = ct.SP_ID
                      inner join loai_sp l on l.LSP_ID = sp.LSP_ID
                      where l.LSP_ID=1;";
              $rs = $conn->query($sql_ck);
              $row = mysqli_fetch_assoc($rs);
              $tongsp_ck = $row["tongsp"];

              $sql_ta="select count(*) as tongsp
                      from chitiet_hd ct
                      inner join san_pham sp on sp.SP_ID = ct.SP_ID
                      inner join loai_sp l on l.LSP_ID = sp.LSP_ID
                      where l.LSP_ID=2;";
              $rs = $conn->query($sql_ta);
              $row = mysqli_fetch_assoc($rs);
              $tongsp_ta = $row["tongsp"];

              $sql_tt="select count(*) as tongsp
                      from chitiet_hd ct
                      inner join san_pham sp on sp.SP_ID = ct.SP_ID
                      inner join loai_sp l on l.LSP_ID = sp.LSP_ID
                      where l.LSP_ID=3;";
              $rs = $conn->query($sql_tt);
              $row = mysqli_fetch_assoc($rs);
              $tongsp_tt = $row["tongsp"];

              $sql_k="select count(*) as tongsp
                      from chitiet_hd ct
                      inner join san_pham sp on sp.SP_ID = ct.SP_ID
                      inner join loai_sp l on l.LSP_ID = sp.LSP_ID
                      where l.LSP_ID=4;";
              $rs = $conn->query($sql_k);
              $row = mysqli_fetch_assoc($rs);
              $tongsp_k = $row["tongsp"];

             $sql = "SELECT SUM(SAN_PHAM.SP_GIA * CHITIET_HD.SP_SOLUONG) AS TONG_TIEN
                                    FROM SAN_PHAM
                                    JOIN LOAI_SP ON SAN_PHAM.LSP_ID = LOAI_SP.LSP_ID
                                    JOIN CHITIET_HD ON SAN_PHAM.SP_ID = CHITIET_HD.SP_ID
                                    GROUP BY LOAI_SP.LSP_TEN";

              $result = $conn->query($sql);
              
              $row1 = $result->fetch_assoc();
              if ($row1) {
                  $tt_ck = $row1['TONG_TIEN'];
              } else {
                  $tt_ck = 0;
              }

              $row2 = $result->fetch_assoc();
              if ($row2) {
                  $tt_ta = $row2['TONG_TIEN'];
              } else {
                  $tt_ta = 0;
              }

              $row3 = $result->fetch_assoc();
              if ($row3) {
                  $tt_tt = $row3['TONG_TIEN'];
              } else {
                  $tt_tt = 0;
              }

              $row4 = $result->fetch_assoc();
              if ($row4) {
                  $tt_k = $row4['TONG_TIEN'];
              } else {
                  $tt_k = 0;
              }


            ?>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle">
                          <i class="fas fa-fish text-lg opacity-10"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">Cá kiểng</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                        <h6 class="text-sm mb-0"><?php echo $tongsp_ck; ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                        <h6 class="text-sm mb-0"><?php echo number_format($tt_ck, 0) ; ?>đ</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="icon icon-shape bg-gradient-success shadow-warning text-center rounded-circle">
                        <i class="fas fa-archive text-lg opacity-10"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">Thức ăn</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                        <h6 class="text-sm mb-0"><?php echo $tongsp_ta; ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                        <h6 class="text-sm mb-0"><?php echo number_format($tt_ta, 0); ?>đ</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                        <i class="fas fa-holly-berry text-lg opacity-10"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">Trang trí</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                        <h6 class="text-sm mb-0"><?php echo $tongsp_tt; ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                        <h6 class="text-sm mb-0"><?php echo number_format($tt_tt, 0); ?>đ</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="icon icon-shape bg-gradient-danger shadow-warning text-center rounded-circle">
                          <i class="fas fa-tree-decorated "></i>
                          <i class="fas fa-ellipsis-h text-lg opacity-10"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">Khác</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                        <h6 class="text-sm mb-0"><?php echo $tongsp_k; ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                        <h6 class="text-sm mb-0"><?php echo number_format($tt_k, 0); ?>đ</h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <?php
              $sql = "select sp.sp_id as id, sp.sp_ten as ten, sp.SP_HINHANH as anh, sum(ct.sp_soluong) as so_ban, count(distinct ct.hd_id) as so_hd
                      from san_pham sp
                      join chitiet_hd ct on sp.sp_id = ct.sp_id
                      group by sp.sp_id, sp.sp_ten
                      order by so_hd desc
                      limit 4;  ";

              $result = $conn->query($sql);
              $row1 = $result->fetch_assoc();
              $row2 = $result->fetch_assoc();
              $row3 = $result->fetch_assoc();
              $row4 = $result->fetch_assoc();

              $top1_id = $row1["id"];
              $top1_ten = $row1["ten"];
              $top1_soban = $row1["so_ban"];
              $top1_anh = $row1["anh"];
              $top1_hd = $row1["so_hd"];

              $top2_id = $row2["id"];
              $top2_ten = $row2["ten"];
              $top2_soban = $row2["so_ban"];
              $top2_anh = $row2["anh"];
              $top2_hd = $row2["so_hd"];

              $top3_id = $row3["id"];
              $top3_ten = $row3["ten"];
              $top3_soban = $row3["so_ban"];
              $top3_anh = $row3["anh"];
              $top3_hd = $row3["so_hd"];

              $top4_id = $row4["id"];
              $top4_ten = $row4["ten"];
              $top4_soban = $row4["so_ban"];
              $top4_anh = $row4["anh"];
              $top4_hd = $row4["so_hd"];

            ?>
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Sản phẩm bán chạy</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top1_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top1_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top1_hd ?> - Sản phẩm đã bán: <?php echo $top1_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/gold_cup.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../product.php?id=<?php echo $top1_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top2_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top2_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top2_hd ?> - Sản phẩm đã bán: <?php echo $top2_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/silver_cup.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../product.php?id=<?php echo $top2_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top3_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top3_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top3_hd ?> - Sản phẩm đã bán: <?php echo $top3_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/copper_cup.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../product.php?id=<?php echo $top3_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top4_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top4_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top4_hd ?> - Sản phẩm đã bán: <?php echo $top4_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/medal4.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../product.php?id=<?php echo $top4_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
              </ul>
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
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- chart by month -->
  <script>
    var ctx = document.getElementById('myChart-m').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        let labels = [];
        for (let month = 1; month <= 12; month++) {
          let daysInMonth = new Date(2023, month, 0).getDate();
          for (let day = 1; day <= daysInMonth; day++) {
            labels.push(`${day}/${month}`);
          }
        }
        datasets: [{
          label: 'Doanh thu',
          // data: [2500000, 1950000, 2500000, 1800000, 2000000, 2900000, 3100000, 1800000, 2600000, 2155000 ,2200000, 1500000],
          let data = [];
          for (let i = 0; i < daysInMonth; i++) {
            data.push(Math.floor(Math.random() * 1000000));
          }
          backgroundColor: 'rgba(0, 128, 255, 0.6)',
          borderColor: 'rgba(0, 128, 255, 0.6)',
          borderWidth: 3,
          borderRadius: 5,
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  <!-- chart by year -->
  <script>
    // Lấy đối tượng JSON từ thuộc tính dữ liệu của phần tử div
    var data = JSON.parse(document.getElementById("myDataMonth").getAttribute("data-json"));
    var thang_1 = data.thang_1;
    var thang_2 = data.thang_2;
    var thang_3 = data.thang_3;
    var thang_4 = data.thang_4;
    var thang_5 = data.thang_5;
    var thang_6 = data.thang_6;
    var thang_7 = data.thang_7;
    var thang_8 = data.thang_8;
    var thang_9 = data.thang_9;
    var thang_10 = data.thang_10;
    var thang_11 = data.thang_11;
    var thang_12 = data.thang_12;
    var year = document.getElementById('slyear')
    var ctx = document.getElementById('myChart-y').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
          label: 'Doanh thu',
          data: [thang_1, thang_2, thang_3, thang_4, thang_5, thang_6, thang_7, thang_8, thang_9, thang_10 ,thang_11, thang_12],
          
          backgroundColor: 'rgba(0, 128, 255, 0.6)',
          borderColor: 'rgba(0, 128, 255, 0.6)',
          borderWidth: 3,
          borderRadius: 5,
          lineTension: 0.4, //độ cong
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
    
  </script>
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