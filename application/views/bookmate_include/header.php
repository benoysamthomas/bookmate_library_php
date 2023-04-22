		<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="<?php echo base_url(); ?>" class="logo">
									<span class="fa fa-book"></span> <span class="title">BookMate</span>
								</a>
<?php if($menu==1&&$submenu==0){?>
										<div class="form-group col-md-4 float-right">
										<form method="post" id="search_form" action="<?php echo base_url();?>home/book_search">
				                            <div class="input-group">
				                                <input type="text" class="form-control" placeholder="Search Book Name " name="book_name" id="book_name" aria-label="Search" aria-describedby="basic-addon2">

				                                <span class="input-group-addon"><a href="javascript:void();" class="submit-button"><i class="fa fa-search"></i></a></span>
				                            </div>
											</form>
				                        </div>
<?php }?>


							<!-- Nav -->
								<nav>
														<?php	if((($this->session->userdata('username') && (($this->session->userdata('uRole') == ROLE_REGUSER)) ))){
		?>
		<ul>
	<li ><a href="#menu">&nbsp;<span class="fa fa-user"> Hi, <?php echo $this->session->userdata('uf_name')?></a></li>

	</ul>
		
		<?php
	}else{
?>	
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
									
	<?php }?>
								</nav>

						</div>
					</header>