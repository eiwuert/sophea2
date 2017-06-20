<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
					<?php 
					
							$data_rows = '';
							$patient_code = '';
							$ward = '';
							foreach($ipd_service_list as $rows){
									$data_rows .= '<tr role="row" class="odd">';
										$data_rows .= '<td>'.date('d-m-Y',strtotime(@$rows->services_time)).'</td>';
										$data_rows .= '<td>'.@$rows->patient_en_name.'</td>';
										$data_rows .= '<td>'.@$rows->products_name.' </td>';
										$data_rows .= '<td>'.@$rows->items_qty.'</td>';
										$data_rows .= '<td>'.@$rows->invoice_item_desc.'</td>';
										$data_rows .= '<td>';
											if ($rows->status_request == '0') {
												$data_rows .= "<a href='".$base_url."index.php/ipds/approve_service/".$rows->services_id."'>Approve</a>";
											}else{
												$data_rows .= '';
											}
											
										$data_rows .= '</td>';
									$data_rows .= '</tr>';
							
							
							}
					
					
							$data_row = '';
							$pcode = '';
							$pname = '';
							$vdate = '';
							$pdob = '';
							$pward = '';
							foreach($dia_lists as $rows){
									$data_row .= '<tr role="row" class="odd">';
										//$data_row .= '<td>'.$hospital_code.'-'.@$rows->patient_code.'</td>';
										$data_row .= '<td>'.@$rows->name.'</td>';
										$data_row .= '<td>'.@$rows->icd10_code.' ('.@$rows->icd10_desc.') </td>';
										$data_row .= '<td>'.@$rows->diagnostics_detail.'</td>';
										//$data_row .= '<td>';
										//	$data_row .= " <a href='".$base_url."index.php/patients/edit/".$rows->patient_id."'>".$b_edit."</a> &nbsp;&nbsp;";
										//$data_row .= '</td>';
									$data_row .= '</tr>';
									$pcode = $rows->patient_code;
									$pname = $rows->patient_kh_name.'('.$rows->patient_en_name.')';
									$vdate = $rows->visitors_in_date;
									$pdob = $rows->patient_dob;
									$pward = $rows->wards_code;
							}
						?>
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/diagnostics">'.$h_diagnostic.''.'</a>';?>
			<small> <?php //echo '('.$hospital_code.'-'.@$pcode.') '.@$vdate;?> </small>
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
							<form action="<?php echo $base_url;?>index.php/diagnostics/finish_diagnostic" method="POST">
								<div class="form-group">
			                    <div class="input-group">
			                      <input type="submit" class="form-control btn-primary" value="<?php echo @$v_save;?>">
			                    </div>
			                  </div>
                                        </form>
                                        <hr/>
                                        <?php 
                                                echo '<b>'.@$c_name.':</b> '.$hospital_code.'-'.@$pcode.' &nbsp;&nbsp; <b>'.@$v_in_date.':</b> '.@$vdate;
                                                echo '&nbsp;&nbsp; <b>'.@$c_dob.':</b> '.(date('Y') - date('Y',strtotime($pdob))).' '.@$c_year.@$vplural.' '.@$c_old;
                                                echo '&nbsp;&nbsp; <b>'.@$h_ward.':</b> '.$pward;
                                        ?>
                                        <hr/>
                               
							<?php 
								//echo '<b><h3 id="cl_pop">'.$v_service.'</h3></b>';
								echo '<b><h3>'.$v_service.'</h3><a href="'.$base_url.'index.php/ipds/add_service/'.@$visitor_id.'" class="btn btn-primary">'.@$v_add.' '.@$v_service.'</a></b>';
							?>
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th style="width:20%;"><?php echo @$v_time;?></th>
										<th style="width:20%;"><?php echo @$v_name;?></th>
										<th style="width:20%;"><?php echo @$h_product;?></th>
										<th style="width:20%;"><?php echo @$v_qty;?></th>
										<th style="width:20%;"><?php echo @$v_desc;?></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										echo $data_rows;
									?>
								</tbody>
							</table>
							
							<hr/>
							<?php 
								echo '<b><h3>'.$h_diagnostic.'</h3><a href="'.$base_url.'index.php/diagnostics/new_consolation/'.@$visitor_id.'" class="btn btn-primary">'.@$v_add.' '.@$h_diagnostic.'</a></b>';
							?>
							
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<!-- <th><?php echo @$v_code;?></th> -->
										<th style="width:10%;"><?php echo @$p_name;?></th>
										<th style="width:30%;"><?php echo @$h_icd10;?></th>
										<th style="width:60%;"><?php echo @$v_desc;?></th>
										<!-- <th><?php echo @$v_in_date;?></th> -->
									</tr>
								</thead>
								<tbody>
									<?php 
										echo $data_row;
									?>
								</tbody>
							</table>
							
							<script>
								$(document).ready(function(){
									var dinput = '';
									var url = '';
									var soc = '';
									$( "#dia_date" ).datepicker();
									$('#tags').keyup(function(){
										dinput = this.value;
										url = <?php echo '"'.$this->config->base_url().'index.php/icd10s/RESTData/"';?>;
										soc = String(url+dinput);
										$('#tags').autocomplete({source: soc});
									});
								});
							</script>
							
						</div></div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
