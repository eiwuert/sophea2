<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/roles">'.$h_role.'</a>';?>
			<small> <?php echo $t_list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
						<div class="col-sm-6"></div>
					</div>
					<div class="box-tools pull-right" style="float:right;">
						<form action="<?php echo $base_url;?>index.php/roles/index" method="post">
							<div class="input-group" style="width: 150px;">
								<input name="search" class="form-control input-sm pull-right" id="p_search" placeholder="<?php echo $h_search;?>..." type="text" autofocus>
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
					<div class="box-tools pull-left">
						<a href="<?php echo $base_url;?>index.php/roles/edit" style="color: black;">
							<div class="input-group" style="width: 150px;">
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> <?php echo $p_create;?></button>
								</div>
							</div>
						</a>
					</div><br/><br/>
					<div class="row"><div class="col-sm-12">
					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr role="row">
												<th><?php echo $c_name;?></th>
												<th><?php echo $c_desc;?></th>
												<th><?php echo $c_action;?></th>
											</tr>
										</thead>
										<tbody>
											<tr role="row" class="odd">
												<?php
													foreach($roles_list as $rows){
														echo "<tr>";
														echo "<td>".$rows->roles_name."</td>";
														echo "<td>".$rows->roles_desc."</td>";
														echo "<td class='align-center'>";
															echo " <a href='".$base_url."index.php/roles/edit/".$rows->roles_id."'><i class='fa fa-edit action-btn primary'></i></a>";
															echo " <a href='".$base_url."index.php/roles/delete/".$rows->roles_id."'><i class='fa fa-trash-o action-btn danger'></i></a>";
														echo "</td>";
														echo "</tr>";
													}

												?>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
