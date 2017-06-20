<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
					<?php 
							$data_row = '';
							$patient_code = '';
							$ward = '';
							foreach($ipd_service_list as $rows){
									$data_row .= '<tr role="row" class="odd">';
										$data_row .= '<td>'.date('d-m-Y',strtotime(@$rows->services_time)).'</td>';
										$data_row .= '<td>'.@$rows->patient_en_name.'</td>';
										$data_row .= '<td>'.@$rows->products_name.' </td>';
										$data_row .= '<td>'.@$rows->items_qty.'</td>';
										$data_row .= '<td>'.@$rows->invoice_item_desc.'</td>';
										$data_row .= '<td>';
											if ($rows->status_request == '0') {
												$data_row .= "<a href='".$base_url."index.php/ipds/approve_service/".$rows->services_id."'>Approve</a>";
											}else{
												$data_row .= '';
											}
											
										$data_row .= '</td>';
									$data_row .= '</tr>';
							
							
							}

							$data_rows = '';
							$pcode = '';
							$pname = '';
							$vdate = '';
							$pdob = '';
							$pward = '';
							$iward = '';
							$visitor_id = '';
							foreach($dia_lists as $rows){
									$data_rows .= '<tr role="row" class="odd">';
										$data_rows .= '<td>'.@$rows->diagnostics_date.'</td>';
										$data_rows .= '<td>'.@$rows->name.'</td>';
										$data_rows .= '<td>'.@$rows->icd10_code.' ('.@$rows->icd10_desc.') </td>';
										$data_rows .= '<td>'.@$rows->diagnostics_detail.'</td>';
									$data_rows .= '</tr>';
									$pcodes = $rows->patient_code;
									$pnames = $rows->patient_kh_name.'('.$rows->patient_en_name.')';
									$vdate = $rows->visitors_in_date;
									$visitor_id = $rows->visitors_id;
									$pdob = $rows->patient_dob;
									$pward = $rows->wards_code;
									$iward = $rows->wards_id;
							}
						?>
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/ipds">'.$h_ipd.''.'</a>';?>
			<small> 
				<?php 
					/*if($patient_code != '' || $patient_code != null){
						echo '('.$hospital_code.'-'.@$patient_code.') '.@$rows->visitors_in_date;
					}*/
				?> 
			</small>
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
						
							<?php 
								echo '<b>'.@$v_name.':</b> '.$hospital_code.'-'.@$patient_code.' &nbsp;&nbsp; <b>'.@$v_in_date.':</b> '.@$vdate;
								echo '&nbsp;&nbsp; <b>'.@$c_dob.':</b> '.(date('Y') - date('Y',strtotime($pdob))).' '.@$c_year.@$vplural.' '.@$c_old;
								echo '&nbsp;&nbsp; '.form_open('ipds/change_ward').'<b>'.@$h_ward.':</b> '.form_dropdown('ward_id',$cmbWard,$iward).form_submit('','Submit').form_close();
							?>
							
							
								<form action="<?php echo $base_url;?>index.php/ipds/add_ipd_service" method="POST" id="dialog_pop" style="display: none;">
									<div class="form-group">
				                    <label><?php echo @$h_product;?> :</label><br/>
				                    <div class="input-group">
				                      <div class="input-group-addon">
				                      </div>
				                      <?php 
				                      	echo form_dropdown('product_id',$cmbProduct,'','class="form-control"');
				                      ?>
				                    </div>
				                  </div><br/>
				                  <div class="form-group">
				                    <label><?php echo @$v_qty;?> :</label><br/>
				                    <div class="input-group">
				                      <div class="input-group-addon">
				                      </div>
				                      <input name='qty' type='text' class='form-control' style='width:100% !important;'>
			                    	</div>
			                  	</div><br/>
			                  	<div class="form-group">
				                    <label><?php echo @$v_desc;?> :</label><br/>
				                    <div class="input-group">
				                      <div class="input-group-addon">
				                      </div>
				                      <textarea name='invoice_item_desc' cols='150' rows='10' class='form-control'></textarea>
			                    	</div>
			                  	</div><br/><br/>
			                  
			                  <div class="form-group">
			                    <div class="input-group">
			                      <input type="submit" class="form-control btn-primary" value="<?php echo @$v_add;?>">
			                    </div>
			                  </div>
							</form>

							<!-- Show IPD Service List -->
							<hr>
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
										echo $data_row;
									?>
								</tbody>
							</table>

							<!-- Show Diagnostic List -->
							<hr>
							<?php 
								echo '<b><h3>'.$h_diagnostic.'</h3><a href="'.$base_url.'index.php/diagnostics/new_consolation/'.@$visitor_id.'" class="btn btn-primary">'.@$v_add.' '.@$h_diagnostic.'</a></b>';
							?>
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th style="width:20%;"><?php echo @$v_time;?></th>
										<th style="width:20%;"><?php echo @$v_name;?></th>
										<th style="width:30%;"><?php echo @$h_icd10;?></th>
										<th style="width:30%;"><?php echo @$v_desc;?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										echo $data_rows;
									?>
								</tbody>
							</table>

						</div></div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
<!--
<script>
    $(document).ready(function(){
        $('#cl_pop').click(function (){
            $( "#dialog_pop" ).dialog();
        });
    });
</script>            
-->
