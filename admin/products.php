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
    Sản phẩm
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
    $active = 'sp'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Sản phẩm</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Sản phẩm</h6>
        </nav>
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
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="row px-2">
              <form action="#" method="get">
                <div class="px-3 col-12 pb-2 d-flex align-items-center">
                  <div class="col-1 mt-2 font-weight-bold d-flex align-items-center">
                    Lọc danh sách: 
                  </div>
                  <div class="px-2 mt-n3 col-2 font-weight-bold">
                    <br>
                    <select class="form-control form-control-md" name="source" id="source">
                      <option value="" selected disabled hidden>- Nguồn hàng -</option>
                      <?php
                        $sql = "SELECT * FROM nguon_hang";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          $result = $conn->query($sql);
                          $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                          foreach ($result_all as $row) {
                            echo "<option value=" .$row["NH_ID"]. ">".$row["NH_TENNGUON"]. "</option>";
                          }                          
                        } else {
                          echo "<option value=''>Không có dữ liệu</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="px-2 mt-2 col-1 font-weight-bold">
                    <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-3">
                      Lọc
                    </button>
                  </div>
                  <div class="px-2 mt-n3 col-2"></div>
                  <div class="px-2 mt-n3 col-1 font-weight-bold"></div>
                  <div class="col-5 mt-2 d-flex align-items-center justify-content-end">
                    <div class="input-group w-75 me-3">
                      <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                      <input type="text" name="timkiem" class="form-control" placeholder="Nhập tên sản phẩm cần tìm..">
                    </div>
                    <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-3">
                      Tìm
                    </button>
                  </div>
                </div>
              </form>
              
            </div>
          </div>
        </div>
        <a href="products_add_form.php" class="btn btn-link text-white mt-n3">+ Thêm sản phẩm</a>
      </div>
        <!-- Nguyên đống này la mot danh muc -->
        <?php
          $sql = "SELECT * FROM loai_sp";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $result = $conn->query($sql);
            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($result_all as $rowlsp) {
              $lspid = $rowlsp["LSP_ID"];
              $sql = "SELECT * FROM san_pham where LSP_ID = {$lspid}";
                if(isset($_GET["timkiem"])){
                  $search = $_GET["timkiem"];
                  if ($search != null) {
                    $sql = "SELECT * FROM san_pham where LSP_ID = {$lspid} and SP_TEN LIKE '%".$search."%'";
                  }
                }
              ?>
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-2">
                      <?php
                        echo  "<h6>".$rowlsp["LSP_TEN"]."</h6>";
                      ?>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mã</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Đơn vị tính</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày nhập</th>
                              <th class="text-secondary opacity-7"></th>
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

                                  $soluong = $row["SP_SOLUONG"];
                                  $lsp = $rowlsp["LSP_TEN"];
                                  $mlsp = $rowlsp["LSP_ID"];

                                  $sql_nhap = "select * from chitiet_nhap where sp_id = {$row["SP_ID"]}";
                                  $rs = $conn->query($sql_nhap);
                                  $row1 = mysqli_fetch_assoc($rs);
                                  $nhid = $row1["NH_ID"];
                                  $ngaynhap = $row1["NH_NGAYNHAP"];

                                  $sql_nguon = "select NH_TENNGUON, NH_ID from nguon_hang where NH_ID = $nhid";
                                  $rs2 = $conn->query($sql_nguon);
                                  $row3 = mysqli_fetch_assoc($rs2);
                                  $tennh = $row3["NH_TENNGUON"];
                                  $manh = $row3["NH_ID"];

                                  ?>
                                  <tr class="height-100">
                                    <td class="w-30" >
                                      <div class="d-flex px-2 py-1">
                                          <!-- hinh anh san pham -->
                                        <div>
                                          <?php
                                            if($row["SP_HINHANH"]==null){
                                              $file = "default.jpg";
                                            } else {
                                              $file = $row["SP_HINHANH"];
                                            } 
                                            $avatar_url = "../assets/img/product_img/" . $file;
                                            echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='user1'>";
                                          ?> 
                                          
                                        </div>
                                        <!-- ten san pham -->
                                        <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-md"><?php echo $row["SP_TEN"]; ?></h6>
                                          <p class='text-xs text-secondary mb-0'><?php echo $tennh; ?></p>
                                        </div>
                                      </div>
                                    </td>
                                    <!-- ma sp -->
                                    <td>
                                      <p class="text-xs font-weight-bold mb-0"><?php echo $row["SP_ID"]; ?></p>
                                    </td>
                                    <!-- gia sp -->
                                    <td>
                                      <p class="text-s font-weight-bold mb-0"><?php echo number_format($row["SP_GIA"], 0) ; ?> VNĐ</p>
                                    </td>
                                    <!-- soluong sp -->
                                    <td>
                                      <p class="text-xs font-weight-bold mb-0"><?php echo $row["SP_SOLUONG"]; ?></p>
                                    </td>
                                    <!-- dvt -->
                                    <td>
                                      <p class="text-xs font-weight-bold mb-0"><?php echo $row["SP_DVT"]; ?></p>
                                    </td>
                                    <!-- ngay them -->
                                    <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0"><?php echo date('d/m/Y', strtotime($ngaynhap)); ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                      <div class="mt-3 d-flex col-sm-12">
                                            
                                        <div class="me-n3 align-middle col-4">
                                          <!-- <form method="get" action=""> -->
                                            <!-- <input type="hidden" name="pdid_add" value="<?php echo $row["SP_ID"]; ?>"> -->
                                            <button data-id="<?php echo $row["SP_ID"]; ?>" data-name="<?php echo $row["SP_TEN"]; ?>" data-img="<?php echo $avatar_url; ?>" class="addmore-button btn btn-link text-success text-secondary font-weight-bold text-sm">
                                              Nhập thêm
                                              <!-- onclick="showOverlay()" -->
                                            </button>
                                          <!-- </form> -->
                                        </div>
                                        <div class="me-n4 align-middle col-4">
                                          <form method="post" action="edit_product.php">
                                              <input type="hidden" name="pdid" value="<?php echo $row["SP_ID"]; ?>">
                                              <input type="hidden" name="anhsp" value="<?php echo $file; ?>">
                                              <input type="hidden" name="lsp" value="<?php echo $lsp; ?>">
                                              <input type="hidden" name="mlsp" value="<?php echo $mlsp; ?>">
                                              <input type="hidden" name="tensp" value="<?php echo $row["SP_TEN"]; ?>">
                                              <input type="hidden" name="giasp" value="<?php echo $row["SP_GIA"]; ?>">
                                              <input type="hidden" name="motasp" value="<?php echo $row["SP_MOTA"]; ?>">
                                              <input type="hidden" name="nguonsp" value="<?php echo $tennh; ?>">
                                              <input type="hidden" name="manguonsp" value="<?php echo $manh; ?>">
                                              <input type="hidden" name="dvtsp" value="<?php echo $row["SP_DVT"]; ?>">
                                              <input type="hidden" name="slsp" value="<?php echo $row["SP_SOLUONG"] ?>">
                                              <button onclick="this.form.submit()" class="btn btn-link text-primary font-weight-bold text-sm">
                                                Sửa
                                              </button>
                                            </form>
                                        </div>
                                        <div class=" align-middle col-4">
                                          <form method="post" action="del_product.php">
                                              <input type="hidden" name="pdid" value="<?php echo $row["SP_ID"]; ?>">
                                              <button onclick="this.form.submit()" class="addmore-button btn btn-link text-warning text-secondary font-weight-bold text-sm">
                                                Xoá
                                              </button>
                                            </form>
                                        </div>

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
              <?php
            }                          
          } else {
            echo "<option value=''>Không có dữ liệu</option>";
          }
        ?>

      </div>
      
      <div class="overlay" id="overlay">
        <div class="my-box">
          <h5 class="ms-3 mt-3 text-primary">Nhập thêm sản phẩm</h5>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                  <div class="row">
                    <div class="col-12">
                      <div class="product-image">
                        
                      </div>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="ms-2 product-name">
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <form action="update_quantity.php" method="post">
                    <div class="mb-3 mt-4 px-3">
                      Số lượng nhập thêm
                      <input type="hidden" name="temp_id" id="temp_id">
                      <input min="1" max="10000" step="1" type="number" name="quantity" class="form-control form-control-lg mt-3" placeholder="Nhập số lượng sản phẩm nhập thêm">
                      <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center" >
                            <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-4">
                              Cập nhật
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        
  <!--   Core JS Files   -->
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
      width: 40%;
      height: 30%;
      background-color: #fff;
      border-radius: 10px;
      position: absolute;
      padding: 15px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

  </style>
  <script>

    const productButtons = document.querySelectorAll('.addmore-button');

    productButtons.forEach(button => {
      button.addEventListener('click', showProductDetails);
    });

    function showProductDetails(event) {
      // Lấy ID của sản phẩm được click
      const productId = event.target.getAttribute('data-id');
      const product_img = event.target.getAttribute('data-img');
      const product_name = event.target.getAttribute('data-name');
      
      
      document.getElementById("temp_id").value = productId;

      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      // Hiển thị thông tin chi tiết của sản phẩm
      const productName = document.querySelector('.product-name');
      productName.innerHTML = '<h6>' + product_name + '</h6>';
      const productImg = document.querySelector('.product-image');
      productImg.innerHTML = '<img src="' + product_img + '" class="avatar avatar-xxl" alt="product">';
      
    }


    //Tắt overlay
    const overlay = document.getElementById("overlay");
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        overlay.style.display = "none";
      }
    });

  </script>
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