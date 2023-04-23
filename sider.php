
		<div id="page-content" class="home-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Carousel -->
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<!-- <ol class="carousel-indicators hidden-xs">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
							<li data-target="#carousel-example-generic" data-slide-to="4"></li>
							<li data-target="#carousel-example-generic" data-slide-to="5"></li>
							<li data-target="#carousel-example-generic" data-slide-to="6"></li>
						</ol> -->
						<!-- Wrapper for slides -->
						
						<div class="carousel-inner">
							<a class="item active" href="#">
							<div style="width: 100%; height: 400px">
								<img src="assets/img/slides/slide2.png" alt="First slide" style="width: 100%; height: 100%; object-fit: cover;">
								<div class="header-text hidden-xs">
									<div class="col-md-12 text-center">
										<h3>Chào mừng đến với Cửa hàng cá kiểng World Fish</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in elit vel nisi fermentum ultricies tempor nec odio. Donec dapibus elementum mauris, vel posuere massa auctor et. Ut quis lobortis ipsum, ac venenatis nibh. Duis sit amet bibendum lectus, ac sodales urna. Cras dapibus orci in turpis mollis, sed luctus.</p>
									</div>
								</div>
							</div>
							<?php
								$sql = "select * from tin_tuc where TTC_HIENTHI=1";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									$result = $conn->query($sql);
									$result_all = $result -> fetch_all(MYSQLI_ASSOC);
									foreach ($result_all as $row) {
									?>
										<a class="item" href="<?php echo $row["TTC_LINK"] ?>">
											<div style="width: 100%; height: 400px">
												<img src="assets/img/news_img/<?php echo $row["TTC_ANH"] ?>" alt="<?php echo $row["TTC_ANH"] ?>" style="width: 100%; height: 100%; object-fit: cover;">											
												<div class="header-text hidden-xs">
													<div class="col-md-12 text-center">
														<h3><?php echo $row["TTC_TITLE"] ?></h3>
														<p><?php echo $row["TTC_MOTA"] ?></p>
													</div>
												</div>
											</div>	
										</a>

									<?php
									}
								}
							?>
							<!-- <div class="item active">
								<img src="assets/img/slides/slide3.png" alt="First slide" width="1200" height="60">
								
								<div class="header-text hidden-xs">
									<div class="col-md-12 text-center">
									</div>
								</div>
							</div>
							<div class="item">
								<img src="assets/img/slides/slide4.png" alt="Second slide" width="1200" height="60">
								
								<div class="header-text hidden-xs">
									<div class="col-md-12 text-center">
									</div>
								</div>
							</div>
							<div class="item">
								<img src="assets/img/slides/slide5.png" alt="Third slide" width="1200" height="60">
								
								<div class="header-text hidden-xs">
									<div class="col-md-12 text-center">
									</div>
								</div>
							</div>
							<div class="item">
								<img src="assets/img/slides/slide6.png" alt="Third slide" width="1200" height="60">
								
								<div class="header-text hidden-xs">
									<div class="col-md-12 text-center">
									</div>
								</div>
							</div>
							<div class="item">
								<img src="assets/img/slides/slide7.png" alt="Third slide" width="1200" height="60">
								
								<div class="header-text hidden-xs">
									<div class="col-md-12 text-center">
									</div>
								</div>
							</div>
							<div class="item">
								<img src="assets/img/slides/slide8.png" alt="Third slide" width="1200" height="60">
								
								<div class="header-text hidden-xs">
									<div class="col-md-12 text-center">
									</div>
								</div>
							</div> -->
						</div>
						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div><!-- /carousel -->
				</div>
			</div>
			