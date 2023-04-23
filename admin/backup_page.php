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
  require 'connect.php';
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Sao lưu và khôi phục
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
    $active = 'sl'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Sao lưu & Khôi phục</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Sao lưu & Khôi phục</h6>
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
        <div class="col-lg-1"></div>
        <div class="col-lg-5 mt-3">
          <div class="row ">
            <div class="col-lg-12">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Sao lưu</h6>
                    </div>
                    <div class="col-6 text-end">
                      <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                        <i class="fas fa-cloud-upload-alt text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-3">
                    <div class="col-12 align-items-center text-center">
                        <button data-type="backup" type="submit" class="check_log btn btn-primary mt-3">Tạo file Backup</button>
                    </div>
                    <div class="col-12 align-items-center text-center">                    
                        <?php 
                            $filename = 'FishStoreBAK';
                            date_default_timezone_set('Asia/Bangkok');
                            $date = date('d-m-Y_H-i-s');
                            $bk_file = $filename.'_'.$date.'.sql';
                            if (isset($_POST["type"]) && $_POST["type"]=="backup"){
                                if(isset($_POST['pw']) && isset($_POST['rpw'])){
                                    $pw = $_POST['pw'];
                                    $rpw = $_POST['rpw'];
                                    if ($pw !== $rpw){
                                        $message = "Mật khẩu nhập lại không đúng";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                    } else {
                                        if ($pw == $_SESSION['pw'] && !isset($_FILES["backup_file"])){
                                            require 'dumper.php';
                                            try {
                                                $dumper = Shuttle_Dumper::create(array(
                                                    'host' => 'localhost',
                                                    'username' => 'root',
                                                    'password' => '',
                                                    'db_name' => 'shop_db',
                                                ));
    
                                                // dump the database to plain text file
                                                $dumper->dump($bk_file);
    
                                                
                                                echo $bk_file;
                                                echo "<br><a href='$bk_file'>Tải xuống file backup</a>";
    
    
                                            } catch(Shuttle_Exception $e) {
                                                echo "Couldn't dump database: " . $e->getMessage();
                                            }
    
                                        } else {
                                            $message = "Mật khẩu không đúng!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                    }
                                }
                            }
                           
                            
                        ?>
                    </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-lg-5 mt-3">
          <div class="row ">
            <div class="col-lg-12">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Khôi phục</h6>
                    </div>
                    <div class="col-6 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                        <i class="fas fa-cloud-download-alt text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-3">
                    <div class="col-12 align-items-center text-center">
                        <div class="col-12 align-items-center text-center">
                            <button data-type="restore" type="submit" id="restoreBuntton" class="check_log btn btn-primary mt-3">Khôi phục</button> 
                        </div>   
                        <?php
                            if (isset($_POST["type"]) && $_POST["type"]=="restore"){
                                if(isset($_POST['pw']) && isset($_POST['rpw'])){
                                    $pw = $_POST['pw'];
                                    $rpw = $_POST['rpw'];
                                    if ($pw !== $rpw){
                                        $message = "Mật khẩu nhập lại không đúng";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                    } else {
                                        if ($pw == $_SESSION['pw']){                                            
                                            require 'restore.php';  
                                            // Kiểm tra xem người dùng đã upload file hay chưa
                                            if (isset($_FILES["backup_file"])) {
                                                // Kiểm tra lỗi khi upload file
                                                if ($_FILES["backup_file"]['error'] == UPLOAD_ERR_OK) {
                                                    // Lưu tên file backup vào biến
                                                    $backup_file = $_FILES["backup_file"]["name"];
                                                    
                                                    // Di chuyển file backup vào thư mục tạm
                                                    move_uploaded_file($_FILES["backup_file"]["tmp_name"], $backup_file);
                                                    
                                                    // Khôi phục cơ sở dữ liệu từ file backup
                                                    restoreDatabaseTables($host,$username,$password,$database,$backup_file);
                                                    
                                                    // Xóa file backup tạm sau khi khôi phục
                                                    unlink($backup_file);
                                                    
                                                    // Hiển thị thông báo thành công
                                                    echo "Khôi phục cơ sở dữ liệu thành công. Vui lòng đăng nhập lại";
                                                    header('Refresh: 0;url=sign-in.php');
                                                } else {
                                                    // Hiển thị thông báo lỗi khi upload file
                                                    echo "Lỗi khi upload file backup: " . $_FILES["backup_file"]['error'];
                                                }
                                            } else {
                                                echo "!isset";
                                            }                                             
                                        } else {
                                            $message = "Mật khẩu không đúng!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div>
       
    </div>
  </main>
  <style>
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background: rgba(0, 0, 0, 0.5);
      display: none;
    }

    .my-box {
      width: 30%;
      height: auto;
      background-color: #fff;
      border-radius: 10px;
      position: absolute;
      padding: 15px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

  </style>
  <div class="overlay" id="overlay">
    <div class="my-box">
      <h5 class="ms-3 mt-3 text-primary">Xác minh tài khoản</h5>
      <div class="row">
        <div class="col-12">
          <form action="backup_page.php" method="post">
            <div class="row" id="abc">
                <div class="col-12">
                    <div id="uploadFile" class="mb-2 px-3 mt-2">
                    </div>
                </div>
              <div class="col-12">
                <div class="mb-2 px-3 mt-2 name">
                    <input required type="password" name="pw" class="form-control form-control-lg mt-2" placeholder="Nhập mật khẩu">                  
                </div>
              </div>
              <div class="col-12">
                  <div class="mb-3 mt-2 px-3 des">
                    <input required type="password" name="rpw" class="form-control form-control-lg mt-2" placeholder="Nhập lại mật khẩu">                                      
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center" >  
                  <input type="hidden" name="type" id="type">
                  <button onclick="this.submit()" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-2">
                    Xác nhận
                  </button>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>

    const productButtons = document.querySelectorAll('.check_log');

    productButtons.forEach(button => {
      button.addEventListener('click', showProductDetails);
    });

    function showProductDetails(event) {
      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      const type = event.target.getAttribute('data-type');
      document.getElementById("type").value = type;  
      
      if(type=="restore"){
        document.getElementById("uploadFile").innerHTML = '<input type="file" name="backup_file" id="">';
      }

    }


    //Tắt overlay
    const overlay = document.getElementById("overlay");
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        overlay.style.display = "none";
      }
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

</html>