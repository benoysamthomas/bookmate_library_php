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
					<div class="inner">
							<h1>Registration Form</h1>
						</div>

						<br>
						<br>

						<div class="inner">
							<!-- About Us -->
							<section>
								<form method="post" id="registration-form" action="#"  enctype="multipart/form-data">
									<div class="fields">
										<div class="field half">
										<input type="text" class="form-field" name="first_name" id="first_name" placeholder="First Name" required>
										</div>

										<div class="field half">
										<input type="text" class="form-field" name="last_name" id="last_name" placeholder="Last Name" required>
										</div>

										<div class="field half">
											<input type="text" class="form-field" name="user_email" id="user_email" placeholder="Email" >
										</div>

										<div class="field half">
										<input type="text" class="form-field" name="user_name" id="user_name" placeholder="User Name" required autocomplete="false">
										</div>

										<div class="field half">
										<input type="password" class="form-field" name="password" id="password" placeholder="Password" required  autocomplete="false">
									</div>

										<div class="field half">
												<input type="text" class="form-field" name="user_contact" id="user_contact" placeholder="Phone Number">
										</div>
										<div class="field half">
										<textarea  name="user_address" class="form-field" id="user_address" placeholder="Address"></textarea>
											<!--<input type="text" name="user_address" id="user_address" placeholder="Address">-->
										</div>

							

										<div class="field">
					                        <!--<div>
												<input type="checkbox" id="checkbox-4"> 
												
												<label for="checkbox-4">
					                            	I agree with the <a href="terms.html" target="_blank">Terms &amp; Conditions</a>
					                        	</label>
											</div>-->
										</div>


										<div class="field half text-right">
											<ul class="actions">
												<li><input type="button"  value="Register" class="btn primary register"></li>
											</ul>
										</div>
									</div>
								</form>
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
			<script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>

	</body>
</html>