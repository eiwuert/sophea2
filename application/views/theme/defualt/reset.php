<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.@$base_url.'index.php/reset_password">'.@$reset_pwd.'</a>';?>
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
					<div class="row">
						<div class="col-sm-12">
							<?php //print_r($ipds_list);?>
							<!--<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th><?php echo @$v_code;?></th>
										<th><?php echo @$v_name;?></th>
										<th><?php echo @$v_in_date;?></th>
										<th class="text-center"><?php echo @$v_status;?></th>
										<th class="text-center"><?php echo @$v_action;?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($ipds_list as $rows){
											echo '<tr role="row" class="odd">';
												echo '<td>'.@$rows->patient_code.'</td>';
												echo '<td>'.@$rows->patient_kh_name.' ('.@$rows->patient_en_name.') </td>';
												echo '<td>'.@$rows->visitors_in_date.'</td>';
												if(@$rows->visitors_status == '1'){
													@$status = $v_enrol;
												}else if(@$rows->visitors_status == '2'){
													@$status = $v_stay;
												}else if(@$rows->visitors_status == '4'){
													@$status = $v_processing;
												}
												echo '<td class="text-center">'.@$status.'</td>';
												echo '<td width="150" class="align-center">';
													echo ' <a href="'.@$base_url.'index.php/visitors/update_status/'.@$rows->visitors_id.'-2""><i class="fa fa-hospital-o action-btn"></i></a> &nbsp;&nbsp;';
												echo'</td>';
											echo '</tr>';
										}
									?>
								</tbody>
							</table>-->
						</div></div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
