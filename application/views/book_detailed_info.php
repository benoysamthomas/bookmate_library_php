<!DOCTYPE HTML>
<html>
<?php $this->load->view('bookmate_include/head');?>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

		<?php
		$this->load->view('bookmate_include/header');
		 $this->load->view('bookmate_include/menu');
		foreach($book_info as $b);
		?>

				

				<!-- Main -->
							<div id="main">
						<div class="inner">
							<h1><?php echo $b["book_name"];?> <span class="pull-right"></span></h1>
								<p class="text-left"><a href="<?php echo base_url(); ?>">Home &nbsp;</a>> Book Details</p>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-5">
										<img src="<?php echo base_url(); ?>images/<?php echo $b["book_store_image"];?>" class="img-fluid" alt="">
									</div>

									<div class="col-md-7">
									
										<h3>Category: <?php echo $b["book_category_name"];?></h3>
                                         <h3>Author: <?php echo $b["book_author"];?></h3>
                                     <h3>Published Date: <?php echo date("d M Y",strtotime($b["book_publish_date"]));?></h3>
											<p><?php echo $b["book_description"];?></p>

									
							                </div>
							            </div>
									</div>
								</div>
							</div>

							<br>
							<br>

							<!--<div class="container-fluid">
								<h2 class="h2">Similar Products</h2>


								<section class="tiles">
									<article class="style1">
										<span class="image">
											<img src="images/product-1-720x480.jpg" alt="" />
										</span>
										<a href="product-details.html">
											<h2>Lorem ipsum dolor sit amet, consectetur</h2>
											
											<p><del>$19.00</del> <strong>$19.00</strong></p>

											<p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
										</a>
									</article>

									<article class="style2">
										<span class="image">
											<img src="images/product-2-720x480.jpg" alt="" />
										</span>
										<a href="product-details.html">
											<h2>Lorem ipsum dolor sit amet, consectetur</h2>
											
											<p><del>$19.00</del> <strong>$19.00</strong></p>

											<p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
										</a>
									</article>

									<article class="style3">
										<span class="image">
											<img src="images/product-6-720x480.jpg" alt="" />
										</span>
										<a href="product-details.html">
											<h2>Lorem ipsum dolor sit amet, consectetur</h2>
											
											<p><del>$19.00</del> <strong>$19.00</strong></p>

											<p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
										</a>
									</article>
								</section>
							</div>-->
						</div>
					</div>

				<?php $this->load->view('bookmate_include/footer');?>

			</div>

		<!-- Scripts -->
			<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/jquery.scrolly.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/jquery.scrollex.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

	</body>
</html>