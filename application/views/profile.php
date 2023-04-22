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
							<h1>My Profile</h1>
						</div>
	<?php if($this->session->has_userdata('alert_status')){
		if($this->session->userdata('alert_status') == 1){
			
			$cat_stat_name="Profile Saved";
			$alert_name="alert-success";
		}		else if($this->session->userdata('alert_status') == 2){
			
			$cat_stat_name="Profile Already Exists";
			$alert_name="alert-danger";
		}else if($this->session->userdata('alert_status') == 4){
			
			$cat_stat_name="Profile  Updated";
			$alert_name="alert-success";
		}else if($this->session->userdata('alert_status') == 5){
			
			$cat_stat_name="No change in Book details";
			$alert_name="alert-danger";
		}else if($this->session->userdata('alert_status') == 6){
			
			$cat_stat_name="Book details Deleted";
			$alert_name="alert-success";
		}else if($this->session->userdata('alert_status') == 7){
			
			$cat_stat_name="Book details Cannot be deleted as it has reference associated with it";
			$alert_name="alert-danger";
		}else{
			
			$cat_stat_name="Some Error Occurred,Please try again";
			$alert_name="alert-danger";	
		}

		?>

						<br>
						<br>
<div class="alert <?php echo $alert_name;?> alert-dismissible fade show  " role="alert">
						<strong><center><?php echo $cat_stat_name;?></center>	</strong>	
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
<?php
$this->session->unset_userdata('alert_status');
 } ?>
						<div class="inner">

						<?php foreach($user_details as $u);?>
							<!-- About Us -->
							<section>
								<form method="post" id="registration-form" action="#"  enctype="multipart/form-data">
									<div class="fields">
										<div class="field half">
										<input type="hidden" class="form-field" name="user_id" id="" placeholder="" value="<?php echo $u["user_id"]?>" required>
										<input type="text" class="form-field" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $u["first_name"]?>" required>
										</div>

										<div class="field half">
										<input type="text" class="form-field" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $u["last_name"]?>" required>
										</div>

										<div class="field half">
											<input type="text" class="form-field" name="user_email" id="user_email" value="<?php echo $u["user_email"]?>" placeholder="Email" >
										</div>

										<div class="field half">
										<input type="text" class="form-field" name="user_name" id="user_name" placeholder="User Name"  value="<?php echo $u["user_name"]?>" required autocomplete="false">
										</div>

										<div class="field half">
										<input type="password" class="form-field" name="password" id="password" placeholder="Password" value="<?php echo $u["password"]?>" required  autocomplete="false">
									</div>

										<div class="field half">
												<input type="text" class="form-field" name="user_contact" id="user_contact" value="<?php echo $u["user_contact_number"]?>" placeholder="Phone Number">
										</div>
										<div class="field half">
										<textarea  name="user_address" class="form-field" id="user_address" placeholder="Address"  value="<?php echo $u["user_address"]?>" ><?php echo $u["user_address"]?></textarea>
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
												<li><input type="button"  value="Update Changes" rel="" class="btn primary profile_edit"></li>
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
			<script >
			 $(document).ready(
	function() { 

		   $(document).on("click", ".profile_edit", function(e){
				  // alert("ds");
				e.preventDefault();
				  $(".form-field").css("border-bottom","1px solid #c9c9c9");
					//alert($.trim($("#first_name").val())); 
				if ($.trim($("#first_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#first_name").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#first_name").offset().top - 100},
                    'slow');
            return false;
        }else if($.trim($("#last_name").val()) == "") {
            $("#last_name").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#last_name").offset().top - 100},
                    'slow');
            return false;
        }else if($.trim($("#user_email").val()) == "") {
				//	alert("we are here");  exit;
            $("#user_email").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#user_email").offset().top - 100},
                    'slow');
            return false;
        } else if($.trim($("#user_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#user_name").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#user_name").offset().top - 100},
                    'slow');
            return false;
        } else if ($.trim($("#password").val()) == "") {
				//	alert("we are here");  exit;
            $("#password").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#password").offset().top - 100},
                    'slow');
            return false;
        } else if ($.trim($("#password").val()) == "") {
				//	alert("we are here");  exit;
            $("#password").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#password").offset().top - 100},
                    'slow');
            return false;
        }else{
			
			$("form#registration-form").attr("action", "<?php echo base_url(); ?>home/update_user");
            $("form#registration-form").submit();
		}
			//alert("here");
		});
		
	});
			</script>

	</body>
</html>