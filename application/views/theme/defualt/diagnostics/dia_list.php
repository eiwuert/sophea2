<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/diagnostics">'.@$h_diagnostic.'</a>';?>
			<small> <?php echo @$c_list;?> </small>
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
						<form action="<?php echo @$base_url;?>index.php/diagnostics/all_dia" method="post">
							<div class="input-group" style="width: 150px;">
								<input name="search" class="form-control input-sm pull-right" id="p_search" placeholder="<?php echo @$h_search;?>..." type="text" autofocus>
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div><br/><br/>
					<div class="row"><div class="col-sm-12">
					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr role="row">
												<th style="width:20%"><?php echo @$c_code;?></th>
												<th style="width:20%"><?php echo @$c_day;?></th>
												<th style="width:20%"><?php echo @$h_patient.' '.@$c_code;?></th>
												<th style="width:30%"><?php echo @$c_name;?></th>
												<th style="width:10%"><?php echo @$d_action;?></th>
											</tr>
										</thead>
										<tbody>
											<tr role="row" class="odd">
												<?php
													foreach($diagnostics_list as $rows){
														echo "<tr>";
	echo "<td>".@$rows->diagnostics_code."</td>";
	echo "<td>".@$rows->diagnostics_date."</td>";
	echo "<td>".@$rows->patient_code."</td>";
	echo "<td>".@$rows->patient_kh_name." (".@$rows->patient_en_name.") </td>";
	echo "<td class='align-center'>";
		echo " <a href='".@$base_url."index.php/patients/view/".@$rows->patient_id."'><i class='fa fa-user action-btn'></i></a>";
		echo " <a href='".@$base_url."index.php/diagnostics/view_diagnostic/".@$rows->diagnostics_id."'><i class='fa fa-search action-btn'></i></a>";
		echo " <a href='".@$base_url."index.php/diagnostics/delete_diagnostic/".@$rows->diagnostics_id."'><i class='fa fa-trash-o action-btn danger'></i></a>";
	echo "</td>";
														echo "</tr>";
													}

												?>
											</tr>
										</tbody>
									</table>
									<div class="pull-left"><strong><?php echo $h_total.' : '.$total;?></strong></div>
									<div class="pull-right pagination pagination-sm no-margin"><?php echo $pagination;?></div>
								</div>
							</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
