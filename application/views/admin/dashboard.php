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
						<!--<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
						
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
						<!--<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>-->
								<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Registered Users List</h5>
							<!--<p class="font-14">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>-->
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">First Name</th>
									<th>Last Name</th>
									<th>User Name</th>
									<th>Email</th>
									<th>Registered Date</th>
									<th>Contact Phone</th>
									<th>Address</th>
									<!--<th class="datatable-nosort">Action</th>-->
								</tr>
							</thead>
							<tbody>
						<?php foreach($user_list as $u){?>
								<tr>
									<td class="table-plus"><?php echo $u["first_name"];?></td>
									<td><?php echo $u["last_name"];?></td>
									<td><?php echo $u["user_name"];?></td>
									<td><?php echo $u["user_email"];?></td>
									<td><?php echo date("d-m-Y",strtotime($u["user_created_date"]));?></td>
										<td><?php echo $u["user_contact_number"];?></td>
									<td><?php echo $u["user_address"];?></td>
									<!--<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												
												<a class="dropdown-item" href="#"  rel="<?php echo $u["user_id"];?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" href="#" rel="<?php echo $u["user_id"];?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-trash" ></i> Delete</a>
											</div>
										</div>
									</td>-->
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
		});
	</script>
</body>
</html>