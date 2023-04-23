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
    Tin tức
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
  <div class="position-absolute w-100 min-height-200 top-0" style="background-image: url('https://images.unsplash.com/photo-1514907283155-ea5f4094c70c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-5"></span>
  </div>
  
  <?php
    $active = 'tt'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tin tức</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Tin tức</h6>
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
        <div class="col-lg-12">
          <div class="row ">
            <div class="col-lg-12">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Danh sách tin tức</h6>
                    </div>
                    <div class="col-6 text-end">
                      <button class="btn-add-news btn btn-primary text-white text-xs">Thêm tin mới</button>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                  <div class="table-responsive p-0">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr class="col-12">
                              <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã tin</th>
                              <th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiêu đề</th>                              
                              <th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>  
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>  
                              <th class="col-1"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- 1 hang -->
                            <?php
                              $sql = "select * from tin_tuc";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                $result = $conn->query($sql);
                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                foreach ($result_all as $row) {

                                  ?>
                                  <tr class="height-100">
                                    <td class="align-middle text-center" >
                                      <!-- ma tin -->
                                      <?php echo $row["TTC_ID"] ?>
                                    </td>

                                    <td class="align-middle ">
                                      <!-- tieu de -->
                                      <?php echo $row["TTC_TITLE"] ?>
                                    </td>

                                    <td class="align-middle ">
                                      <!-- mota -->
                                      <?php echo $row["TTC_MOTA"] ?>
                                    </td>
                                    <td class="align-middle text-center">
                                      <!-- status -->
                                      <?php 
                                        if ($row["TTC_HIENTHI"] == true){
                                          $style = "btn-success"
                                          ?>
                                            <button class="btn text-xs font-weight-bold mb-0 <?php echo $style; ?>">Đang hiện</button>
                                          <?php
                                        } else {
                                          $style = "btn-warning"
                                          ?>
                                            <button class="btn text-xs font-weight-bold mb-0 <?php echo $style; ?>">Đang ẩn</button>
                                          <?php
                                        }
                                      ?>
                                    </td>
                                    <!-- thao tac -->
                                    <td class="align-middle text-center">
                                      <div class="mt-3 d-flex col-sm-12">
                                        <div class="align-middle col-sm-6">    
                                          <button data-id=<?php echo $row["TTC_ID"];?> 
                                                  data-name="<?php echo $row["TTC_TITLE"];?>" 
                                                  data-des="<?php echo $row["TTC_MOTA"];?>" 
                                                  data-link="<?php echo $row["TTC_LINK"];?>"
                                                  data-anh="<?php echo $row["TTC_ANH"];?>"
                                                  data-hienthi=<?php echo $row["TTC_HIENTHI"];?> 
                                                  class="edit-btn btn btn-link text-primary font-weight-bold text-sm">
                                            Sửa
                                          </button>
                                        </div>
                                        <div class="align-middle col-sm-6">
                                          <form method="post" action="del_news.php">
                                              <input type="hidden" name="nid" value="<?php echo $row["TTC_ID"]; ?>">
                                              <button onclick="this.form.submit()" class="btn btn-link text-warning text-secondary font-weight-bold text-sm">
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
        </div>
      </div>
       
    </div>
  </main>
  <style>
    .overlay, .overlay1 {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background: rgba(0, 0, 0, 0.5);
      display: none;
    }

    .my-box, .my-box1 {
      width: auto;
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
  <div class="overlay1" id="overlay1">
    <div class="my-box1">
      <h5 class="ms-3 mt-3 text-primary">Thêm tin tức</h5>
      <div class="row">
        <div class="col-12">
          <form action="add_news.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-5 p-5 justify-content-center">
                <div class="row mt-5">
                  <div class="mb-3 px-3 col-12">
                    Tải ảnh mới:
                    <br>
                    <input class="mt-1" type="file" name="productImg" id="productImg" accept="image/*">
                  </div>
                </div>
                <div class="row mt-2">
                  <div id="preview_add" class="col-12">
                    <img style="height: auto; width: 100%;" src="../assets/img/news_img/default.jpeg" alt="">
                  </div>
                  <script>
                    var input = document.getElementById("productImg");
                    var preview_add = document.getElementById("preview_add");

                    input.addEventListener("change", function() {
                      preview_add.innerHTML = ""; // clear previous preview_add
                      var files = this.files;
                      for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        if (!file.type.startsWith("image/")){ continue } // skip non-image files
                        var reader = new FileReader();
                        reader.onload = function(e) {
                          var img = document.createElement("img");
                          img.src = e.target.result;
                          img.style = "width: 100%; height: auto;"
                          preview_add.appendChild(img); // append image to preview_add div
                        };
                        reader.readAsDataURL(file); // read file as data url
                      }
                    });
                  </script>
                </div>
              </div>
              <div class="col-7">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-3 mt-4 px-3 ">
                      Tiêu đề tin tức <input required placeholder="Nhập tiêu đề tin" type="text" name="name" class="form-control form-control-lg mt-2">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 mt-2 px-3 ">
                      Mô tả <textarea required id="myTextarea" name="des" class="form-control form-control-md mt-1">Mô tả</textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 mt-2 px-3 ">
                      URL <input required placeholder="Dán liên kết ở đây" type="text" name="url" class="form-control form-control-lg mt-2">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 mt-2 px-3 ">
                      Trạng thái 
                      <select name="hienthi" class="form-control form-control-lg mt-1">
                        <option selected hidden value="">Trạng thái</option>
                        <option value="true">Hiển thị</option>
                        <option value="false">Ẩn</option>
                      </select>
                    </div>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-12 d-flex justify-content-center align-items-center" >
                    <button onclick="this.submit()" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-4 ">
                      Thêm tin
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
  <div class="overlay" id="overlay">
    <div class="my-box">
      <h5 class="ms-3 mt-3 text-primary">Cập nhật tin tức</h5>
      <div class="row">
        <div class="col-12">
          <form action="update_news.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-5 p-5 justify-content-center">
              <div class="row mt-5">
                  <div class="mb-3 px-3 col-12">
                    Tải ảnh mới: 
                    <!-- <button class="btn btn-danger text-white font-weight-bold text-md">Chức năng đang bảo trì!</button> -->
                    <br>
                    <input class="mt-1" type="file" name="newsImg" id="newsImg" accept="image/*">
                  </div>
                </div>
                <div class="row mt-2">
                  <div id="preview-ed" class="col-12 img"></div>
                  <script>
                    var input = document.getElementById("newsImg");
                    var preview = document.getElementById("preview-ed");

                    input.addEventListener("change", function() {
                      preview.innerHTML = ""; // clear previous preview
                      var files = this.files;
                      for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        if (!file.type.startsWith("image/")){ continue } // skip non-image files
                        var reader = new FileReader();
                        reader.onload = function(e) {
                          var img = document.createElement("img");
                          img.src = e.target.result;
                          img.style = "width: 100%; height: auto;"
                          preview.appendChild(img); // append image to preview div
                        };
                        reader.readAsDataURL(file); // read file as data url
                      }
                    });
                  </script>
                </div>
              </div>
              <div class="col-7">
                <div class="row">
                  <div class="col-12">
                    <input type="hidden" name="temp_id" id="temp_id">
                    <div class="mb-3 mt-4 px-3 name">
                      
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 mt-2 px-3 des">
                      
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 mt-2 px-3 link">
                      
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 mt-2 px-3 hienthi">
                      
                    </div>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-12 d-flex justify-content-center align-items-center" >
                    <button onclick="this.submit()" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-4 ">
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
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script>

    const addNews = document.querySelectorAll('.btn-add-news');
    addNews.forEach(button => {
      button.addEventListener('click', function showNewsAdd(event) {
      // Hiển thị overlay
        const overlay1 = document.querySelector('.overlay1');
        overlay1.style.display = 'block';
      });
    });

    //Tắt overlay
    const overlay1 = document.getElementById("overlay1");
    overlay1.addEventListener("click", function(event) {
      if (event.target === overlay1) {
        overlay1.style.display = "none";
      }
    });
  </script>

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
      const link = event.target.getAttribute('data-link');
      const anh = event.target.getAttribute('data-anh');
      const hienthi = event.target.getAttribute('data-hienthi');
      let ht = 'Trạng thái';
      if(hienthi==1){
        ht = 'Đang hiển thị';
      } else {
        ht = 'Đang ẩn';
      }
      
      
      document.getElementById("temp_id").value = id;

      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      // Hiển thị thông tin chi tiết của sản phẩm
      const productName = document.querySelector('.name');
      productName.innerHTML = 'Tiêu đề tin tức <input required value="' + name + '" type="text" name="name" class="form-control form-control-lg mt-2">';
      const productDes = document.querySelector('.des');
      productDes.innerHTML = 'Mô tả <textarea required id="myTextarea" name="des" class="form-control form-control-md mt-1">'+des+'</textarea>';
      const productLink = document.querySelector('.link');
      productLink.innerHTML = 'URL <input required value="' + link + '" type="text" name="url" class="form-control form-control-lg mt-2">';
      const productHienthi = document.querySelector('.hienthi');
      productHienthi.innerHTML = 'Trạng thái <select name="hienthi" class="form-control form-control-lg mt-1"><option selected hidden value="'+hienthi+'">'+ht+'</option><option value=1>Hiển thị</option><option value=0>Ẩn</option></select>'
      const productImg = document.querySelector('.img');
      productImg.innerHTML = '<img style="height: auto; width: 100%;" src="../assets/img/news_img/'+anh+'" alt="">'
                            +'<input type="hidden" name="old-img" value="'+anh+'">';
      
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