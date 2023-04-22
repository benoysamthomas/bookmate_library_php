<!-- Menu -->	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
			
				<nav id="menu">			
						
						<?php	if((($this->session->userdata('username') && (($this->session->userdata('uRole') == ROLE_REGUSER)) ))){
		?>
			<ul>
	<h2><span class="fa fa-user"> Hi, <?php echo $this->session->userdata('uf_name').' '.$this->session->userdata('ul_name')?></?></h2>
	</span></li>
	<li><a href="<?php echo base_url(); ?>home/profile" <?php if($menu==2){?> class="active" <?php }?>>Profile</a></li>
	<li><a href="<?php echo base_url(); ?>logout/home_logout">Logout</a></li>
	</ul>
		<?php
	}else{
?>		
<h2>Menu</h2>
						<ul>
	<li><a href="<?php echo base_url(); ?>" <?php if($menu==1){?> class="active" <?php }?>>Home</a></li>
							
<li><a href="<?php echo base_url(); ?>registration" <?php if($menu==2){?> class="active" <?php }?>>Register</a></li>
						
<li><a href="<?php echo base_url(); ?>login">Login</a></li>
</ul>

	<?php }?>				
					</nav>