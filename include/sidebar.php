	<div class="left-side-bar">
		<!--<div class="brand-logo">
			<a href="index.php">
				<img src="<?php echo base_url(); ?>vendors/images/deskapp-logo.png" alt="">
			</a>
		</div>-->
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="">
						<a href="<?php echo base_url(); ?>dashboard" class="dropdown-toggle no-arrow <?php if($menu==1){ echo 'active'; }?>">
							<span class="fa fa-dashboard"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle  <?php if($menu==2){ echo 'active'; }?>" >
							<span class="fa fa-book"></span><span class="mtext">Manage Bookstore</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo base_url(); ?>manage_books" class="<?php if($submenu==21){ echo 'active'; }?>">Book Store</a></li>
							<li><a href="<?php echo base_url(); ?>manage_books/book_categories"  class="<?php if($submenu==22){ echo 'active'; }?>">Book Categories</a></li>
					
						</ul>
					</li>
					<?php if($this->session->userdata('uRole') == ROLE_MASTER_ADMIN){?>
				<li class="">
						<a href="<?php echo base_url(); ?>user_manage" class="dropdown-toggle no-arrow <?php if($menu==3){ echo 'active'; }?>">
							<span class="fa fa-user"></span><span class="mtext">Manage Admin Users</span>
						</a>
					</li>
					<?php }?>
					
				</ul>
			</div>
		</div>
	</div>