<!DOCTYPE HTML>
<html>
<?php $this->load->view('bookmate_include/head');?>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

		<?php 
		 $this->load->view('bookmate_include/header');
		 $this->load->view('bookmate_include/menu');
		 ?>


				<!-- Main -->
					<div id="main">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="<?php echo base_url(); ?>images/slider-image-1-1920x700.jpg" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="<?php echo base_url(); ?>images/slider-image-2-1920x700.jpg" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="<?php echo base_url(); ?>images/slider-image-3-1920x700.jpg" alt="Third slide">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>

						<br>
						<br>

						<div class="inner">
							<!-- About Us -->
							<header id="inner">
										
						<?php	if((($this->session->userdata('username') && (($this->session->userdata('uRole') == ROLE_REGUSER)) ))){
		?>				<h1>Welcome Dear  <?php echo $this->session->userdata('uf_name')?> to our Library</h1>
								<p> Enjoy accessing our special categories and new features!</p>
								
						
		
						<?php } else{?>
								<h1>Register to access Special categories!</h1>
								<p> Registered users can access More Books and special categories and unlock new features!</p>
								
						<?php }?>
								</header>

							<br>
<?php $cat_count=0;

foreach($book_categories as $b){ 
$book_details= $this->home_model->get_book_details($b["book_category_id"]);
//print_r($book_details);
if(isset($book_details)){
	if(count($book_details) != 0){
?>
							<h2 class="h2"><?php echo $b["book_category_name"];?></h2>

							<!-- Products -->
							<section class="tiles">
	<?php	$book_count=0;					
foreach($book_details as $bs){
	$book_count++;
if($book_count<=6){
?>
								<article class="style<?php echo $book_count;?>">
									<span class="image">
										<img src="<?php echo base_url(); ?>images/<?php echo $bs["book_store_image"];?>" alt="" />
									</span>
									<a href="<?php echo base_url(); ?>home/book_detailed_info/<?php echo  $bs["book_id"];?>">
										<h2><?php echo $bs["book_name"]?></h2>
										
										<p></p>

										<p>By <br/><?php echo $bs["book_author"]?></p>
									</a>
								</article>
<?php }
}
?>		
								
							</section>
                     <?php if($book_count>6 ){?>
							<p class="text-center"><a href="<?php echo base_url(); ?>home/book_details/<?php echo  $b["book_category_id"];?>">More Books &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>
							
			
					 <?php } else{ ?>
						 	<p class="text-center"></p>
							
						 <?php
					   }
					 }
  }
}?>
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
			<script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
	</body>
</html>