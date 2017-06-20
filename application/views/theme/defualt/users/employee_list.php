<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Users
			<!--<small> Patients List </small>-->
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
					<div class="row"><div class="col-sm-12">
					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr role="row">
												<th><?php echo $c_username;?></th>
												<th><?php echo $c_name;?></th>
												<th><?php echo $h_role;?></th>
												<th><?php echo $c_phone;?></th>
												<th><?php echo $c_lang;?></th>
												<th><?php echo $c_action;?></th>
											</tr>
										</thead>
										<tbody>
											<tr role="row" class="odd">
												<?php
													foreach($emp_list as $rows){
														echo "<tr>";
	echo "<td>".$rows->username."</td>";
	echo "<td>".$rows->name."</td>";
	echo "<td>".$rows->roles_name."</td>";
	echo "<td>".$rows->phone."</td>";
	echo "<td>".$rows->address."</td>";
	echo "<td class='align-center'>";
		echo " <a href='".$base_url."index.php/users/view/".$rows->uid."'><i class='fa fa-user action-btn primary'></i></a>&nbsp;&nbsp;";
		echo " <a href='".$base_url."index.php/users/edit/".$rows->uid."'><i class='fa fa-edit action-btn primary'></i></a>&nbsp;&nbsp;";
		echo " <a href='#'><i class='fa fa-trash-o action-btn danger'></i></a>";
	echo "</td>";
														echo "</tr>";
													}

												?>
											</tr>
										</tbody>
									</table></div></div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
