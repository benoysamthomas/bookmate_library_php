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
			
			$cat_stat_name="Book Category Settings Saved";
			$alert_name="alert-success";
		}		else if($this->session->userdata('alert_status') == 2){
			
			$cat_stat_name="Book Category Already Exists";
			$alert_name="alert-danger";
		}else if($this->session->userdata('alert_status') == 4){
			
			$cat_stat_name="Book Category  Updated";
			$alert_name="alert-success";
		}else if($this->session->userdata('alert_status') == 5){
			
			$cat_stat_name="No change in Book Category";
			$alert_name="alert-danger";
		}else if($this->session->userdata('alert_status') == 6){
			
			$cat_stat_name="Book Category Deleted";
			$alert_name="alert-success";
		}else if($this->session->userdata('alert_status') == 7){
			
			$cat_stat_name="Book Category Cannot be deleted as it has Books associated with it";
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
							<h4 class="text-blue">Book Category Settings Panel</h4>
							<p class="mb-30 font-14">Enter Details of the Book Category</p>
						</div>
					
					</div>
						<form method="post" id="book-cat-form" action="#"  enctype="multipart/form-data">
							
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Book Category Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="book_cat_name" id="book_cat_name" placeholder="">
							</div>
						</div>
					
					<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Priviledge</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="book_privilage_status" id="book_privilage_status">
									<option value="0">Select Category</option>
									<option value="1">General Category</option>
									<option value="2">Special Category</option>
								</select>
							</div>
						</div>
					
						<div class="form-group row">
						
						<div class="col-sm-12 col-md-10">
							<div class="col-md-6 pull-right">
							<a href="#" class="btn btn-primary btn-sm book_category" rel=""   role="button"><i class=""></i>Save Book Category</a>
						</div>
					</div>
					</div>
					</form>
					</div>
								<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Books Category</h5>
							<!--<p class="font-14">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>-->
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Book Category Name</th>
									<th>Book Privilege Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
						<?php foreach($book_categories as $bc){?>
								<tr>
									<td class="table-plus"><?php echo $bc["book_category_name"];?></td>
									<td><?php if ($bc["book_privilage_status"]==1){ echo "General Category";} else{ echo "Special Category";}?></td>
							
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												
												<a class="dropdown-item" href="<?php echo base_url(); ?>manage_books/book_categories_edit/<?php echo $bc["book_category_id"];?>"  rel="">  <i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item delete" href="#" rel="<?php echo $bc["book_category_id"];?>" >  <i class="fa fa-trash" ></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
						<?php }?>
							</tbody>
						</table>
					</div>
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
					 $(document).on("click", ".book_category", function(e){
				e.preventDefault();
				  $(".form-control").css("border","1px solid #c9c9c9");
				  
					//alert($.trim($("#book_name").val())); exit;
		if($.trim($("#book_cat_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#book_cat_name").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_cat_name").offset().top - 100},
                    'slow');
            return false;
        } else if($.trim($("#book_privilage_status").val()) == 0) {
				//	alert("we are here");  exit;
            $("#book_privilage_status").css("border","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_privilage_status").offset().top - 100},
                    'slow');
            return false;
        } else{
			
			$("form#book-cat-form").attr("action", "<?php echo base_url(); ?>manage_books/save_book_category");
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