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
			
			$cat_stat_name="Book Details Settings Saved";
			$alert_name="alert-success";
		}		else if($this->session->userdata('alert_status') == 2){
			
			$cat_stat_name="Book details Already Exists";
			$alert_name="alert-danger";
		}else if($this->session->userdata('alert_status') == 4){
			
			$cat_stat_name="Book details  Updated";
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
<div class="alert <?php echo $alert_name;?> alert-dismissible fade show " role="alert">
						<strong><center><?php echo $cat_stat_name;?></center>	</strong>	
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
<?php
$this->session->unset_userdata('alert_status');
 }
	 foreach($book_store as $b);
 ?>
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit Bookstore Manage Panel</h4>
							<p class="mb-30 font-14">Enter Details of the Book to Publish</p>
						</div>
					
					</div>
						<form method="post" id="book-store-form" action="#"  enctype="multipart/form-data">
							
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Book Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="book_name" id="book_name" value="<?php echo $b["book_name"];?>" placeholder="">
								<input class="form-control" type="hidden" name="book_id" id="book_id" value="<?php echo $b["book_id"];?>" placeholder="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Book Author</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder=""  name="book_author" id="book_author"  value="<?php echo $b["book_author"];?>" type="text">
							</div>
						</div>
					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Book Category</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="book_category" id="book_category">
									<option value="0">Select Category...</option>
									<?php foreach($book_categories as $bc){?>
									<option value="<?php echo $bc["book_category_id"]?>" <?php if($b["book_category_id"]==$bc["book_category_id"]) { echo "selected";}?>><?php echo $bc["book_category_name"]?></option>
									<?php }?>
								
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Book Image(jpg,png only)</label>
							<div class="col-sm-12 col-md-10">
								<input type="file" class="form-control-file form-control height-auto" name="book_store_image" id="book_store_image" accept="image/x-png,image/jpeg"  value="<?php echo $b["book_store_image"];?>" >
								<a class="form-control" href="<?php echo base_url(); ?>images/<?php echo $b["book_store_image"];?>" target="_blank"><?php echo $b["book_store_image"];?></a>
							</div>
						</div>
							<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Publish Date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" value="<?php echo date("d M Y",strtotime($b["book_publish_date"]));?>" name="book_publish_date" id="book_publish_date"  type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Book Description</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="book_description" id="book_description" value="<?php echo $b["book_description"];?>"><?php echo $b["book_description"];?></textarea>
							</div>
						</div>
						<div class="form-group row">
						
						<div class="col-sm-12 col-md-10">
							<div class="col-md-6 pull-right">
							<a href="#" class="btn btn-primary btn-sm book_publish" rel=""   role="button"><i class=""></i> Update Book Details</a>
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
					 $(document).on("click", ".book_publish", function(e){
				e.preventDefault();
				  $(".form-control").css("border","1px solid #c9c9c9");
				  
					//alert($.trim($("#book_name").val())); exit;
				if ($.trim($("#book_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#book_name").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_name").offset().top - 100},
                    'slow');
            return false;
        }else if($.trim($("#book_author").val()) == "") {
            $("#book_author").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_author").offset().top - 100},
                    'slow');
            return false;
        }else if($.trim($("#book_category").val()) == 0) {
				//	alert("we are here");  exit;
            $("#book_category").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_category").offset().top - 100},
                    'slow');
            return false;
        }  else if($.trim($("#book_publish_date").val()) == "") {
				//	alert("we are here");  exit;
            $("#book_publish_date").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_publish_date").offset().top - 100},
                    'slow');
            return false;
        } else if ($.trim($("#book_description").val()) == "") {
				//	alert("we are here");  exit;
            $("#book_description").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_description").offset().top - 100},
                    'slow');
            return false;
        }else{
			
			$("form#book-store-form").attr("action", "<?php echo base_url(); ?>manage_books/update_book_details");
            $("form#book-store-form").submit();
		}
			//alert("here");
		});
		});
	</script>
</body>
</html>