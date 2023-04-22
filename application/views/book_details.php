<!DOCTYPE HTML>
<html>
<?php $this->load->view('bookmate_include/head');?>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

		<?php
		$this->load->view('bookmate_include/header');
		 $this->load->view('bookmate_include/menu');
	foreach($book_categories as $b);	
		?>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1><?php echo(ucfirst($b["book_category_name"]));?> </h1>
	<p class="text-left"><a href="<?php echo base_url(); ?>">Home &nbsp;</a>> Books</p>
							
		
							<div class="image main">
								<img src="<?php echo base_url(); ?>images/banner-image-6-1920x500.jpg" class="img-fluid" alt="" />
							</div>
		
							<!-- Products -->
							<section class="tiles">
							
								<?php	$book_count=0;					
foreach($book_all as $bs){
	$book_count++;
	if($book_count==7){
		$book_count=1;
	}
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
<?php }?>
							</section>
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