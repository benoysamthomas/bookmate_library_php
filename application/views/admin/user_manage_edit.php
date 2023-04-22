<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
					<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
							<?php if($this->session->has_userdata('alert_status')){
		if($this->session->userdata('alert_status') == 1){
			
			$cat_stat_name="Admin User Settings Saved";
			$alert_name="alert-success";
		}		else if($this->session->userdata('alert_status') == 2){
			
			$cat_stat_name="Admin User Already Exists";
			$alert_name="alert-danger";
		}else if($this->session->userdata('alert_status') == 4){
			
			$cat_stat_name="Admin User Setting  Updated";
			$alert_name="alert-success";
		}else if($this->session->userdata('alert_status') == 5){
			
			$cat_stat_name="No change in User Settings";
			$alert_name="alert-danger";
		}else if($this->session->userdata('alert_status') == 6){
			
			$cat_stat_name="Admin User Deleted";
			$alert_name="alert-success";
		}else if($this->session->userdata('alert_status') == 7){
			
			$cat_stat_name="Admin User Cannot be deleted as it has other User associated with it";
			$alert_name="alert-danger";
		}else{
			
			$cat_stat_name="Some Error Occurred,Please try again";
			$alert_name="alert-danger";	
		}

		?>
<div class="alert <?php echo $alert_name;?> alert-dismissible fade show " role="alert">
						<strong><center><?php echo $cat_stat_name;?></center>	</strong>	
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
<?php
$this->session->unset_userdata('alert_status');
 } ?>
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Admin User Setting Panel Edit</h4>
							<p class="mb-30 font-14">Update Details of the Admin Users</p>
						</div>
					
					</div>
							<?php foreach($user_list as $u);?>
						<form method="post" id="book-cat-form" action="#"  enctype="multipart/form-data">
							
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">First Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $u["first_name"];?>" placeholder="">
								<input class="form-control" type="hidden" name="user_id" id="user_id" value="<?php echo $u["user_id"];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $u["last_name"];?>" placeholder="">
							</div>
						</div>
							<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">User Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="user_name" id="user_name" value="<?php echo $u["user_name"];?>" placeholder="">
							</div>
						</div>
							<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="password" name="password" id="password" value="<?php echo $u["password"];?>" placeholder="">
							</div>
						</div>
					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">User Role</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="user_role_id" id="user_role_id">
									<option value="0">Select Role</option>
									<option value="1" <?php if($u["user_role_id"]==1){ echo "selected";}?> >Admin</option>
									<option value="2"<?php if($u["user_role_id"]==2){ echo "selected";}?>>Staff</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">User Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="user_email" id="user_email" value="<?php echo $u["user_email"];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
						
						<div class="col-sm-12 col-md-10">
							<div class="col-md-6 pull-right">
							<a href="#" class="btn btn-primary btn-sm user_manage" rel=""   role="button"><i class=""></i>Update User Details</a>
						</div>
					</div>
					</div>
					</form>
					</div>
					
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
					 $(document).on("click", ".user_manage", function(e){
				e.preventDefault();
				  $(".form-control").css("border","1px solid #c9c9c9");
				  
					//alert($.trim($("#book_name").val())); exit;
		if($.trim($("#first_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#first_name").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#first_name").offset().top - 100},
                    'slow');
            return false;
        }else 	if($.trim($("#last_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#last_name").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#last_name").offset().top - 100},
                    'slow');
            return false;
        }else 	if($.trim($("#user_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#user_name").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#user_name").offset().top - 100},
                    'slow');
            return false;
        } else 	if($.trim($("#password").val()) == "") {
				//	alert("we are here");  exit;
            $("#password").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#password").offset().top - 100},
                    'slow');
            return false;
        }  else if($.trim($("#user_role_id").val()) == 0) {
				//	alert("we are here");  exit;
            $("#user_role_id").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#user_role_id").offset().top - 100},
                    'slow');
            return false;
        } else 	if($.trim($("#user_email").val()) == "") {
				//	alert("we are here");  exit;
            $("#user_email").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#user_email").offset().top - 100},
                    'slow');
            return false;
        } else{
			
			$("form#book-cat-form").attr("action", "<?php echo base_url(); ?>user_manage/update_admin_user");
            $("form#book-cat-form").submit();
		}
			//alert("here");
		});
					$(document).on("click", ".delete", function(e){
				e.preventDefault();
				//alert("Are You Sure You want to delete?");
				if (confirm("Are you sure You want to delete?")) {
       	var id= $(this).attr("rel");
				$("form#book-cat-form").attr("action", "<?=base_url()?>manage_books/delete_book_category/"+id);
            $("form#book-cat-form").submit();
    }
	});
		});
	</script>
</body>
</html>