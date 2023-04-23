
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
        <div class="col-lg-9">
          <div class="row ">
            <div class="col-lg-12">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Danh sách đơn vận chuyển</h6>
                    </div>
                    <div class="col-6 text-end">
                      <?php
                        $sql = "select * from don_van_chuyen";
                      ?>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                  <div class="table-responsive p-0">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr class="col-12">
                              <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã đơn</th>
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên Cty VC</th>                              
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Đến</th>
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đi</th> 
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đến</th>   
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>   
                              <th class="col-1 text-secondary opacity-7"></th>

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
                                  <tr class="height-100">
                                    <td class="align-middle text-center" >
                                      <!-- ma dt -->
                                      <?php echo $row["DVC_ID"] ?>
                                    </td>

                                    <td class="align-middle text-center">
                                      <!-- ten dt -->
                                      <?php 
                                        $sql_nvc = "select NVC_TEN from NHA_VAN_CHUYEN where NVC_ID = '".$row["NVC_ID"]."'";
                                        $result_nvc = $conn->query($sql_nvc);
                                        if ($result_nvc->num_rows > 0) {
                                            $result_nvc = $conn->query($sql_nvc);
                                            $row_nvc = mysqli_fetch_assoc($result_nvc);
                                            echo $row_nvc["NVC_TEN"];
                                        }
                                      ?>
                                    </td>

                                    <td class="align-middle text-center">
                                      <!-- dia diem -->
                                      <?php echo $row["DVC_DIACHI"] ?>
                                    </td>

                                    <td class="align-middle text-center">
                                      <!-- tg di -->
                                      <?php echo $row["DVC_TGBATDAU"] ?>
                                    </td>

                                    <td class="align-middle text-center">
                                      <!-- tg den -->
                                      <?php echo $row["DVC_TGHOANTHANH"] ?>
                                    </td>
                                    
                                    <td class="align-middle text-center">
                                        <?php
                                            $style="";
                                            $stt="";
                                            $currentDate = date('Y-m-d'); // Lấy ngày hiện tại
                                            $startDate = $row["DVC_TGBATDAU"];
                                            $finishDate = $row["DVC_TGHOANTHANH"];
                                            if (strtotime($currentDate) < strtotime($startDate)) {
                                                $stt="Chưa bắt đầu";
                                                $style = "btn-primary";
                                            } elseif((strtotime($currentDate) >= strtotime($startDate)) && (strtotime($currentDate) <= strtotime($finishDate))) {
                                                $stt="Đang vận chuyển";
                                                $style = "btn-warning";
                                            } else {
                                                $stt="Đã hoàn thành";
                                                $style = "btn-success";
                                            }
                                        ?>
                                        <button class="btn text-xs font-weight-bold mb-0 <?php echo $style; ?>"><?php echo $stt ?></button>
                                   </td>

                                    <td class="align-middle text-center">
                                      <div class="mt-3 d-flex col-sm-12">
                                        <button class="edit-btn btn btn-link text-primary font-weight-bold text-sm">
                                          Sửa
                                        </button>
                                      </div>
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
        <div class="col-lg-3">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-12 d-flex align-items-center">
                  <h6 class="mb-0">Thêm ĐVC mới</h6>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
            <form action="add_transbill.php" method="post">
              <div class="row">
                <div class="col-12 mt-4">
                  Tên công ty VC:
                  <select name="ctvc" class="form form-control form-control-lg" id="city" aria-label=".form-select-sm">
                    <option value="" selected hidden disabled>- Tên NVC -
                    <?php
                        $sql_nvc = "select * from NHA_VAN_CHUYEN";
                        $rs_nvc = $conn->query($sql_nvc);
                        if ($rs_nvc->num_rows > 0) {
                            $rs_nvc = $conn->query($sql_nvc);
                            $rsnvc_all = $rs_nvc -> fetch_all(MYSQLI_ASSOC);
                            foreach ($rsnvc_all as $r_nvc) {
                            ?>
                                <option value=<?php echo $r_nvc["NVC_ID"] ?>><?php echo $r_nvc["NVC_TEN"] ?>
                            <?php
                            }
                        }
                    ?>          
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3">
                  Giao đến:
                  <input required name="giaoden" class="form form-control form-control-lg" list="browsers" placeholder="- Tỉnh/Thành phố -" >
                  <?php require 'datalist_provine.php' ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3">
                  Ngày bắt đầu:
                  <input required class="form form-control form-control-lg" type="date" name="start_date" id="">
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3">
                  Ngày hoàn thành:
                  <input required class="form form-control form-control-lg" type="date" name="finish_date" id="">
                </div>
              </div>
              <div class="row">
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary mt-2">Thêm ĐVC</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
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
      height: 42%;
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
      <h5 class="ms-3 mt-3 text-primary">Cập nhật thông tin đối tác</h5>
      <div class="row">
        <div class="col-12">
          <form action="update_pdsource.php" method="post">
            <div class="row">
              <div class="col-12">
                <input type="hidden" name="temp_id" id="temp_id">
                <div class="mb-3 mt-4 px-3 name">
                  
                </div>
              </div>
              <div class="col-12">
                  <div class="mb-3 mt-4 px-3 des">
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center" >
                  <button onclick="this.submit()" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-4">
                    Cập nhật
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

    const productButtons = document.querySelectorAll('.edit-btn');

    productButtons.forEach(button => {
      button.addEventListener('click', showProductDetails);
    });

    function showProductDetails(event) {
      // Lấy ID của sản phẩm được click
      const id = event.target.getAttribute('data-id');
      const name = event.target.getAttribute('data-name');
      const des = event.target.getAttribute('data-des');
      
      
      document.getElementById("temp_id").value = id;

      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      // Hiển thị thông tin chi tiết của sản phẩm
      const productName = document.querySelector('.name');
      productName.innerHTML = 'Tên đối tác <input required value="' + name + '" type="text" name="name" class="form-control form-control-lg mt-3">';
      const productImg = document.querySelector('.des');
      productImg.innerHTML = 'Mô tả <textarea required id="myTextarea" name="des" class="form-control form-control-md mt-1">'+des+'</textarea>';
      
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