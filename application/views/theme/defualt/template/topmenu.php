<div class="navbar-custom-menu">
	<ul class="nav navbar-nav">
		<!-- User Account: style can be found in dropdown.less -->
		<li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user-secret" style="font-size:20px;"></i>
				<span class="hidden-xs">  <?php echo @$userName;?> </span>
			</a>
			<ul class="dropdown-menu">
				<!-- User image -->
				<li class="user-header">
				<i class="fa fa-user-secret" style="font-size:100px;"></i>
					<p>
						<?php echo @$userName;?>
						<!--<small>Member since Nov. 2012</small>-->
					</p>
				</li>
				<!-- Menu Footer-->
				<li class="user-footer">
					<div class="pull-left">
						<a href="<?php echo @$base_url;?>index.php/logins/reset_password" class="btn btn-default btn-flat"><?php echo @$reset_pwd;?></a>
					</div>
					<div class="pull-right">
						<a href="<?php echo @$base_url;?>index.php/logins/logout" class="btn btn-default btn-flat"><?php echo @$logout;?></a>
					</div>
				</li>
			</ul>
		</li>
	</ul>
          </div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<form action="<?php echo @$base_url;?>index.php/patients/index" method="POST" class="sidebar-form">
			<div class="input-group input-search">
				<input type="text" name="search"  id="p_search" class="form-control" placeholder="<?php echo @$h_search;?>...">
				<span class="input-group-btn">
					<button type="submit" name="btn_search" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
