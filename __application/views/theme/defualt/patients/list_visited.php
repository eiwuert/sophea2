<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/patients/visited">'.$h_patient.'</a>';?>
			<small id="title_name">/ <?php echo $list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
	    <div class="row" id="msgs" style="display: none;">
		<div class="alert alert-success alert-dismissible">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		    <h4><i class="icon fa fa-check"></i> Save Sucessfull!</h4>
		</div>
	    </div>
		
	    <div class="row" id="form_row" style="display: none;">
		<!-- General -->
           <div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title"><?php echo @$general;?></h3>
				</div>
	            <div class="box-body">
					
	                <!-----Patient Code--
					  <div class="form-group">
						<div class="input-group">
						  <div class="input-group-addon">
							<?php echo $code;?>
						  </div>
						  <input type="text" name="patient_code" id="patient_code" class="form-control">
						</div>
					  </div>
					  ----->
					  <!-----Patient Kh Name------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$khName;?>
				</div>
				<input type="text" name="patient_kh_name" id="patient_kh_name" class="form-control">
				<input type="text" name="patient_id" id="patient_id" style="display:none;">
			      </div>
			</div>

			<!-----Patient En Name------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$enName;?>
				</div>
				<input type="text" name="patient_en_name" id="patient_en_name" class="form-control">
			      </div>
			</div>

			<!-----Gender Combo------->
			<div class="form-group">
			      <div class="input-group">
				  <div class="input-group-addon">
				      <?php echo @$gender;?>
				</div>
				<?php echo form_dropdown('gender_id', @$genderCambo, @$gender_id,'class="form-control" id="gender_id" onchange="genderCal();"');?>
			      </div>
			</div>

			<!-----Status Combo------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$status;?>
				</div>
				<?php echo form_dropdown('status_id', @$statusCambo, @$status_id,'class="form-control" id="status_id" onchange="genderCal();"');?>
			      </div>
			</div>

			<!----- Pregnancy ------->
			<div class="form-group" id="pre_preg">
			  <div class="input-group">
				<span class="input-group-addon">
				    <input type="checkbox" id="my_pregnancy" value="1">
				</span>
			      <input type="text" value="Pregnancy" class="form-control" disabled="disabled">
			  </div>
			</div>

			<!----- Pre-Pregnancy ------->
			<div class="form-group" id="pre_preg1">
			  <div class="input-group">
				<span class="input-group-addon">
				  <input type="checkbox" id="my_pre_pregnancy" value="1">
				</span>
			      <input type="text" value="Pre-Pregnancy" class="form-control" disabled="disabled">
			  </div>
			</div>

			<!----- Breastfeeding ------->
			<div class="form-group" id="pre_preg2">
			  <div class="input-group">
				<span class="input-group-addon">
				  <input type="checkbox" id="my_breastfeeding" value="1">
				</span>
			      <input type="text" value="Breastfeeding" class="form-control" disabled="disabled">
			  </div>
			</div>

			<!-----Date Of Birth------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$dob;?>
				</div>
				  <input type="text" name="patient_dob" id="patient_dob" class="form-control">
			      </div>
			</div>

			<!-----Age------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$age;?>
				</div>
				<input type="text" name="patient_age" id="patient_age" class="form-control" onchange="ageCal();">
			      </div>
			</div>

			 <!-----Date Of Birth------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$occupation;?>
				</div>
				<input type="text" name="patient_occupation" id="patient_occupation" class="form-control">
			      </div>
			</div>

			<!-----Patient Phone------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $phone;?>
				</div>
				<input type="text" name="patient_phone" id="patient_phone" class="form-control">
			      </div>
			</div>

			<!----- Emergency Phone------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$emergencyPhone;?>
				</div>
				<input type="text" name="emegency_phone" id="emegency_phone" class="form-control">
			      </div>
			</div>
			
			<!-----Patient Province------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $province;?>
				</div>
				<input type="text" name="patient_province" id="patient_province" class="form-control">
				<input type="text" name="patient_province_id" id="patient_province_id" class="form-control" style="display: none;">
			      </div>
			</div>
			
			<!-----Patient District------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $district;?>
				</div>
				<input type="text" name="patient_district" id="patient_district" class="form-control">
				<input type="text" name="patient_district_id" id="patient_district_id" class="form-control" style="display: none;">
			      </div>
			</div>

			<!----- Address ------->
			<!--<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$address;?>
				</div>
				<textarea name="patient_address" id="patient_address" class="form-control" rows="3"></textarea>
			      </div>
			</div>-->

			<!----- Address ------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php //echo @$address;?>
				      History
				</div>
				<textarea name="patient_history" id="patient_history" class="form-control" rows="3"></textarea>
			      </div>
			</div>
						
		    </div>
		   </div>
		  </div>
	     <!-- End General side-->
	     
	    <!-- Contact side-->
           <div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo @$contact;?></h3>
			</div>
	            <div class="box-body">
	                <!-----Patient Id Card------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $idCard;?>
				</div>
				<input type="text" name="id_card" id="id_card" class="form-control">
			      </div>
			</div>
			
			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				    <input type="checkbox" value="Insurance" id="insurance">
				</div>
				<input type="text" value="Insurance" class="form-control" disabled="disable">  
			    </div>			      
			</div>
			
			<div class="form-group">
			    <div class="input-group">
				    <div class="input-group-addon">
					<input type="checkbox" value="ID Poor" id="id_poor">
				    </div>
				    <input type="text" value="ID Poor" class="form-control" disabled="disable">
			    </div>			      
			</div>

			<!-----Assurrance Card------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $assuranceCard;?>
				</div>
				<input type="text" name="assurance_card" id="assurance_card" class="form-control">
			      </div>
			</div>

			<!-----Assurrance company------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $assuranceCompany;?>
				</div>
				<input type="text" name="assurance_company" id="assurance_company" class="form-control">
			      </div>
			</div>

			<!-----motor Card------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $motorCard;?>
				</div>
				<input type="text" name="motor_card" id="motor_card" class="form-control">
			      </div>
			</div>

			<!-----Car Card------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $carCard;?>
				</div>
				<input type="text" name="car_card" id="car_card" class="form-control">
			      </div>
			</div>

			<!-----bank Card 1------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $bankCard1;?>
				</div>
				<input type="text" name="bank_card1" id="bank_card1" class="form-control">
			      </div>
			</div>

			<!-----bank Card 2------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $bankCard2;?>
				</div>
				<input type="text" name="bank_card2" id="bank_card2" class="form-control">
			      </div>
			</div>

			<!-----bank Card 2------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $studentCard;?>
				</div>
				<input type="text" name="student_card" id="student_card" class="form-control">
			      </div>
			</div>
		    </div>
		    
		    <div class="box-header">
			    <h3 class="box-title"><?php echo @$vitalSign;?></h3>
		    </div>
		    <div class="box-body">
			<!-----Pulse Rate------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$pulseRate;?>
				</div>
				<input type="text" name="pulse_rate" id="pulse_rate" class="form-control">
			      </div>
			</div>
			
			<!-----Blood Pressure------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$bloodPressure;?>
				</div>
				<input type="text" name="blood_pressure" id="blood_pressure" class="form-control">
			      </div>
			</div>
			
			<!-----Heart Rate------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$heartRate;?>
				</div>
				<input type="text" name="heart_rate" id="heart_rate" class="form-control">
			      </div>
			</div>
			
			<!-----Heart Rate------->
			<!--<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$heartRate;?>
				</div>
				<input type="text" name="heart_rate" id="heart_rate" class="form-control">
			      </div>
			</div>-->
			
			<!-----Respiratory Rate------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$respiratoryRate;?>
				</div>
				<input type="text" name="respiratory_rate" id="respiratory_rate" class="form-control">
			      </div>
			</div>
			
			<!-----Temperature------->
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$temperature;?>
				</div>
				<input type="text" name="temperature" id="temperature" class="form-control">
			      </div>
			</div>
			
		    </div>
		    
		   </div>
		  </div>
	<!-- End Contact side-->
	
	<!-- General -->
           <div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title"><?php echo @$disease;?></h3>
				</div>
	            <div class="box-body" style="width: 100% !important;">				  
					  
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_heart" value="1">
					</div>
					<input type="text" value="<?php echo @$heart;?>" class="form-control" disabled="disable">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_respiratory" value="1">
					</div>
					<input type="text" value="<?php echo @$respiratory;?>" class="form-control" disabled="disable">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_diabetes" value="1">
					</div>
					<input type="text" value="<?php echo @$diabetes;?>" class="form-control" disabled="disable">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_digestive" value="1">
					</div>
					<input type="text" value="<?php echo @$digestive;?>" class="form-control" disabled="disable">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_aap" value="1">
					</div>
					<input type="text" value="<?php echo @$allergyAndPenicillin;?>" class="form-control" disabled="disable">
				</div>	
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_kidney" value="1">
					</div>
					<input type="text" value="<?php echo @$kidney;?>" class="form-control" disabled="disable">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox"  id="is_endocrine" value="1">
					</div>
					<input type="text" value="<?php echo @$endocrine;?>" class="form-control" disabled="disable">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_neuro_sys" value="1">
					</div>
					<input type="text" value="<?php echo @$neuro_sys;?>" class="form-control" disabled="disable">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<input type="checkbox" id="is_lung" value="1">
					</div>
					<input type="text" value="Cancer Disease" class="form-control" disabled="disable">
				</div>			      
			    </div>
			
			    <div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
					    Other
					</div>
					<input type="text" value="<?php echo @$others;?>" id="other_disease" class="form-control">
				</div>			      
			    </div>
			    <hr/>
			    <!----- OPD ------->
			    <div class="form-group">
			      <div class="input-group">
				    <span class="input-group-addon">
				      <input type="checkbox" id="my_opd">
				    </span>
				  <input type="text" value="opd" value="1" class="form-control" disabled="disabled">
			      </div>
			    </div>

			    <!----- IPD ------->
			    <div class="form-group">
			      <div class="input-group">
				    <span class="input-group-addon">
				      <input type="checkbox" id="my_ipd">
				    </span>
				  <input type="text" value="ipd" value="1" class="form-control" disabled="disabled">
			      </div>
			    </div>

			    <!----- Submit ------->
			    <div class="form-group">
				  <div class="input-group">
				    <input type="submit" class="form-control btn-primary" id="submit_edit" value="<?php echo @$create;?>">
				  </div>
			    </div>
					  						
			</div>
		   </div>
		  </div>
	     <!-- End Desise-->
		</div><!-- /.row -->
                
                <div class="row" id="visitor_view_form" style="display:none;">
			<div class="col-xs-12">
				<div class="box" style="padding:10px !important;">
					<div class="box-body">
						<div class="col-sm-12" style="text-align:center;"><h4><b> <?php echo @$h_visitor;?> : (<span id="p_code"></span>) </b></h4></div>
					</div>
					
					<div class="box box-primary" style="padding:10px !important;">
						<div class="box-body">
							<div class="col-sm-4">
								<div class="box-header">
									<h3 class="box-title"><?php echo @$general;?></h3>
								</div>
								<p> <?php echo @$khName;?> : <span id="kh_name"></span></p>
								<p> <?php echo @$enName;?> : <span id="en_name"></span></p>
								<p> <?php echo @$gender;?> : <span id="v_gender"></span></p>
								<p> <?php echo @$status;?> : <span id="v_status"></span></p>
								<p> <?php echo @$dob;?> : <span id="v_dob"></span></p>
								<p> <?php echo @$occupation;?> : <span id="v_occupation"></span></p>
								<p> <?php echo @$phone;?> : <span id="v_phone"></span></p>
								<p> <?php echo @$emergencyPhone;?> : <span id="v_emergencyPhone"></span></p>
								<p> <?php echo @$address;?> : <span id="v_address"></span></p>
							</div>
							
							<div class="col-sm-6" style="padding-left:70px;">
								<div class="box-header">
									<h3 class="box-title"><?php echo @$contact;?></h3>
								</div>
								<p> <?php echo @$idCard;?> : <span id="v_idCard"></span></p>
								<p> <?php echo @$assuranceCard;?> : <span id="v_assuranceCard"></span></p>
								<p> <?php echo @$assuranceCompany;?> : <span id="v_assuranceCompany"></span></p>
								<p> <?php echo @$motorCard;?> : <span id="v_motorCard"></span></p>
								<p> <?php echo @$carCard;?> : <span id="v_carCard"></span></p>
								<p> <?php echo @$bankCard1;?> : <span id="v_bankCard1"></span></p>
								<p> <?php echo @$bankCard2;?> : <span id="v_bankCard2"></span></p>
								<p> <?php echo @$studentCard;?> : <span id="v_studentCard"></span></p>
							</div>
							
							<div class="col-sm-2">
								<div class="box-header">
									<h3 class="box-title"><?php echo @$disease;?></h3>
								</div>
								<p><?php echo @$heart;?> : <span id="v_heart"></span></p>
								<p><?php echo @$respiratory;?> : <span id="v_respiratory"></span></p>
								<p><?php echo @$diabetes;?> : <span id="v_diabetes"></span></p>
								<p><?php echo @$digestive;?> : <span id="v_digestive"></span></p>
								<p><?php echo @$kidney;?> : <span id="v_kidney"></span></p>
								<p><?php echo @$endocrine;?> : <span id="v_endocrine"></span></p>
								<p><?php echo @$neuro_sys;?> : <span id="v_neuro_sys"></span></p>
							</div>
							
						</div>
					</div>
                                    
                                        <div class="box box-primary" style="padding:10px !important;">
						<div class="box-body" id="bhistory">
                                                    
                                                </div>
                                        </div>
				</div>
			</div>
                    
		</div>
                
		
		<div class="row" id="form_table">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
						<div class="col-sm-6"></div>
					</div>
					<div class="box-tools pull-right" style="float:right;">
                                            
                                                <div class="input-group" style="width: 150px;">
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" value="opd" id="consultation">
                                                    </div>
                                                    <input type="text" value="Consultation" class="form-control" disabled="disable">  
                                                </div>
                                            
                                                <div class="input-group" style="width: 150px;">
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" value="ipd" id="in_patient">
                                                    </div>
                                                    <input type="text" value="In Patient" class="form-control" disabled="disable">  
                                                </div>
                                            
                                                <div class="input-group" style="width: 150px;">
                                                    <div class="input-group-addon">
                                                        <input type="checkbox" value="pharmacy" id="pharmacy">
                                                    </div>
                                                    <input type="text" value="Pharmacy" class="form-control" disabled="disable">  
                                                </div>
                                            
						<div class="input-group" style="width: 150px;">
							<input name="search" class="form-control input-sm pull-right" id="p_search" onkeyup="getSearch();" placeholder="<?php echo $h_search;?>..." unit="text" autofocus>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
					<div class="box-tools pull-left">
						<a href="#" style="color: black;">
							<div class="input-group" style="width: 150px;">
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default" id="btn_create"><i class="fa fa-plus-circle"></i> <?php echo $create;?></button>
								</div>
							</div>
						</a>
					</div><br/><br/>
					<div class="row"><div class="col-sm-12">
					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr role="row">
												<th><?php echo $date;?></th>
												<th><?php echo $code;?></th>
												<th><?php echo $name;?></th>
												<th><?php echo $gender;?></th>
												<th><?php echo $phone;?></th>
												<th></th>
											</tr>
										</thead>
										<tbody id="patientList"></tbody>
									</table>
									<div class="pull-left"><strong><?php echo @$c_total.' : ';?><span id="total_record"></span></strong></div>
									<div class="pull-right"><strong><i class="fa fa-refresh" onclick="pagination();"></i></strong></div>
									
									<!-- Start Ppagination -->
									<!--<ul class="pagination pagination-sm no-margin pull-right">
										<li><span class="pg" id="pg0" onclick="pagination(`pg0`);">«</span></li>
										<li><span class="pg pg-active" id="pg1" onclick="pagination(`pg1`);">1</span></li>
										<li><span class="pg" id="pg2" onclick="pagination(`pg2`);">2</span></li>
										<li><span class="pg" id="pg3" onclick="pagination(`pg3`);">3</span></li>
										<li><span class="pg" id="pg4" onclick="pagination(`pg4`);">»</span></li>
									</ul>-->
									<!-- Stop Ppagination -->
									<div id="wait" style="display:none;width:120px;height:120px;position:absolute;top:50%;left:50%;padding:0px;"><img src='<?php echo $resources?>img/demo_wait.gif' width="100" height="100" /><br><?php echo @$loading;?>... <br/></div>
								</div>
							</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
<style>
    table > tbody > tr > td{
	text-align: center !important;
    }
    table > thead > tr > th{
	text-align: center !important;
    }
</style>
<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
<script>
    var pageStartTop = '0';
    $(document).ready(function(){
	    pagination();
	    $( "#patient_dob" ).datepicker({dateFormat: "dd-mm-yy",changeYear:true,changeMonth:true,yearRange: "1965:2030"});

	    $( "#patient_occupation" ).keypress(function(){
		var dinput = this.value;
		var url = <?php echo '"'.$base_url.'index.php/patients/occupation_auto_complete/"';?>;
		var soc = String(url+dinput);
		$( '#patient_occupation' ).autocomplete({source: soc});
	    });
	    
	    $( "#patient_district" ).keypress(function(){
		var dinput = this.value;
		var prId = $( '#patient_province_id' ).val();
		var url = <?php echo '"'.$base_url.'index.php/patients/district_auto_complete/"';?>;
		var soc = String(url+dinput+'_'+prId);
		$( '#patient_district' ).autocomplete({source: soc});
		
		if(event.keyCode == 13){
		    $.post("<?php echo $base_url;?>index.php/patients/get_district_json/"+dinput,function(data){
			$.each(data, function(key,value) {
			    $( '#patient_district' ).val(value.districts_name);
			    $( '#patient_district_id' ).val(value.districts_id);
			});
		    });
		}
	    });
	    
	    $( "#patient_province" ).keypress(function(){
		var dinput = this.value;
		var url = <?php echo '"'.$base_url.'index.php/patients/province_auto_complete/"';?>;
		var soc = String(url+dinput);
		$( '#patient_province' ).autocomplete({source: soc});
		if(event.keyCode == 13){
		    $.post("<?php echo $base_url;?>index.php/patients/get_province_json/"+dinput,function(data){
			$.each(data, function(key,value) {
			    $( '#patient_province' ).val(value.provinces_name);
			    $( '#patient_province_id' ).val(value.provinces_id);
			});
		    });
		}
	    });
    });
    
     function getSearch(){
        var e = event.keyCode;
        if(e == 13){
	    var ids = "";
	    $('#msgs').css('display','none');
            pagination(ids);
        }
    }
    $("#btn_create").click(function(){
	    genderCal();
	    $('#msgs').css('display','none');
	    $('#form_row').css('display','block');
	    $('#form_table').css('display','none');
	    $('#title_name').html('/ Create');
    });
	
	//insert Data
    $("#submit_edit").click(function(){
	    saveEdit();
    });
    
    function getPatientList(mySearch){
        
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });
        var htmlView = '';
        var i = 0;
        var stRow = '';
        var chIpd= '';
        var chOpd= '';
        var chPharm= ''
	
        if($('#consultation:checked').val() == 'opd'){
            chOpd = '1';
        }else{
            chOpd = '0';
        }
        
        if($('#in_patient:checked').val() == 'ipd'){
            chIpd = '2';
        }else{
            chIpd = '0';
        }
        
        if($('#pharmacy:checked').val() == 'pharmacy'){
            chPharm = '4';
        }else{
            chPharm = '0';
        }
        
        /*alert(chIpd+'/'+chOpd+'/'+chPharm);*/
        
        $.post("<?php echo $base_url;?>index.php/patients/get_patient_visited_list",{
	search_data: mySearch,ipd: chIpd, opd: chOpd, pharm: chPharm},function(data){
            $.each(data, function(key,value) {
		var gen = "";
		if(value.patient_gender == "m"){
		    gen = "Male";
		}else{
		    gen = "Female";
		}
		
                htmlView += '<tr ' + stRow + '>';
                    htmlView += '<td>' + value.register_date + '</td>';
                    htmlView += '<td>' + value.patient_code + '</td>';
                    htmlView += '<td>' + value.patient_kh_name + ' (' + value.patient_en_name + ') </td>';
                    htmlView += '<td>' + gen + '</td>';
                    htmlView += '<td>' + value.patient_phone + '</td>';
                    htmlView += '<td>';
                        htmlView +='<a href="#" title="<?php echo @$opd;?>" onclick="patientOpd(' + value.patient_id + ');"><i class="fa fa-genderless action-btn primary"></i></a>&nbsp;&nbsp; ';
                        htmlView +=' <a href="#" title="<?php echo @$ipd;?>" onclick="patientIpd(' + value.patient_id + ');"> <i class="fa fa-info action-btn primary"></i></a>&nbsp;&nbsp; ';
                        htmlView +=' <span title="<?php echo @$edit;?>"><i class="fa fa-edit action-btn primary" onclick="editPatient(' + value.patient_id + ');"></i></span>&nbsp;&nbsp; ';
                        htmlView +='<a href="#" title="<?php echo @$view;?>" onclick="viewVisitor(' + value.patient_id	 + ');"><i class="fa fa-user-md  action-btn"></i></a>';
                        /*htmlView +=' <span title="<?php echo @$delete;?>"><i class="fa fa-trash-o action-btn danger" onclick="deletePatient(' + value.patient_id + ');"></i></span>';*/
                    htmlView += '</td>';
                htmlView += '</tr>';
            });
                        
            /*$("#patientList").append(htmlView);*/
	    $("#patientList").html(htmlView);
            
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }
    
    function patientOpd(ids){
		$.post("<?php echo $base_url;?>index.php/patients/patient_opd/"+ids,{patients_id: ids},function(data,status){
			window.location = "<?php echo $base_url;?>index.php/visitors";
		});
	}
	
	function patientIpd(ids){
		$.post("<?php echo $base_url;?>index.php/patients/patient_ipd/"+ids,{patients_id: ids},function(data,status){
			window.location = "<?php echo $base_url;?>index.php/visitors";
		});
	}
    
    function editPatient(ids){
		
		 genderCal();
		 
		 $('#msgs').css('display','none');
		 
		 $('#form_row').css('display','block');
		 $('#form_table').css('display','none');
		 $('#submit_edit').val('Update');
		 $('#title_name').html('/ Edit');
		 $.post("<?php echo $base_url;?>index.php/patients/get_patient_info_by_id_json/"+ids,
		 function(data,status){
			$.each(data, function(key,value) {
			    
				$('#status_id').val(value.patient_status);
				if(value.patient_gender == "m"){
					$('#gender_id').val('1');
				}else{
					$('#gender_id').val('0');
				}
				
				$('#patient_id').val(value.patient_id);
				$('#patient_code').val(value.patient_code);
				$('#patient_kh_name').val(value.patient_kh_name);
				$('#patient_en_name').val(value.patient_en_name);
				
				
				$('#patient_dob').val($.datepicker.formatDate('dd-mm-yy', new Date(value.patient_dob)));
				$( "#patient_dob" ).datepicker({dateFormat: "dd-mm-yy",changeYear:true,changeMonth:true,yearRange: "1965:2030"});
				
				$('#patient_phone').val(value.patient_phone);
				$('#emegency_phone').val(value.patient_emergency_phone);
				$('#patient_occupation').val(value.patient_occupation);
				$('#patient_district').val(value.districts_name);
				$('#patient_district_id').val(value.patient_district);
				$('#patient_province').val(value.provinces_name);
				$('#patient_province_id').val(value.patient_province);
				/*$('#patient_address').val(value.patient_address);*/
				$('#id_card').val(value.patient_id_card);
				$('#assurance_card').val(value.patient_assurance_card);
				$('#assurance_company').val(value.patient_assurance_company);
				$('#motor_card').val(value.patient_motor_card);
				$('#car_card').val(value.patient_car_card);
				$('#bank_card1').val(value.patient_bank_card1);
				$('#bank_card2').val(value.patient_bank_card2);
				$('#student_card').val(value.patient_student_card);
				
				if(value.is_heart == '1'){
					$('#is_heart').prop('checked', true);
				}else{
					$('#is_heart').prop('checked', false);
				}
				
				if(value.is_respiratory == '1'){
					$('#is_respiratory').prop('checked', true);
				}else{
					$('#is_respiratory').prop('checked', false);
				}
				if(value.is_diabetes == '1'){
					$('#is_diabetes').prop('checked', true);
				}else{
					$('#is_diabetes').prop('checked', false);
				}
				
				if(value.is_digestive == '1'){
					$('#is_digestive').prop('checked', true);
				}else{
					$('#is_digestive').prop('checked', false);
				}
				
				if(value.is_kidney == '1'){
					$('#is_kidney').prop('checked', true);
				}else{
					$('#is_kidney').prop('checked', false);
				}
				
				if(value.is_endocrine == '1'){
					$('#is_endocrine').prop('checked', true);
				}else{
					$('#is_endocrine').prop('checked', false);
				}
				if(value.is_neuro_sys == '1'){
					$('#is_neuro_sys').prop('checked', true);
				}else{
					$('#is_neuro_sys').prop('checked', false);
				}
				if(value.is_lung == '1'){
					$('#is_lung').prop('checked', true);
				}else{
					$('#is_lung').prop('checked', false);
				}
				if(value.is_allergy == '1'){
					$('#is_aap').prop('checked', true);
				}else{
					$('#is_aap').prop('checked', false);
				}
				
				if(value.patient_pregnancy == '1'){
					$('#my_pregnancy').prop('checked', true);
				}else{
					$('#my_pregnancy').prop('checked', false);
				}
				
				if(value.patient_pre_pregnancy == '1'){
					$('#my_pre_pregnancy').prop('checked', true);
				}else{
					$('#my_pre_pregnancy').prop('checked', false);
				}
				
				if(value.patient_breastfeeding == '1'){
					$('#my_breastfeeding').prop('checked', true);
				}else{
					$('#my_breastfeeding').prop('checked', false);
				}
				
				$('#other_disease').val(value.patient_disease);
				$('#patient_history').val(value.patient_desc);
				$('#pulse_rate').val(value.pulse_mm);
				$('#blood_pressure').val(value.blood_pressure_mm);
				$('#heart_rate').val(value.heart_rate_mm);
				$('#respiratory_rate').val(value.respirateory_rate_mm);
				$('#temperature').val(value.temperature_mm);
				
			});
			
			genderCal();
		 });
    }
    
    function saveEdit(){
		
		var redirects = "";
	
		var patientId = $('#patient_id').val();
		var patientKhName = $('#patient_kh_name').val();
		var patientEnName = $('#patient_en_name').val();
		var patientDob = $('#patient_dob').val();
		var patientPhone = $('#patient_phone').val();
		var emergencyPhone = $('#emegency_phone').val();
		var patientOccupation = $('#patient_occupation').val();
		var patientDistrict = $('#patient_district').val();
		var patientProvince = $('#patient_province').val();
		/*var patientAddress = $('#patient_address').val();*/
		var idCard = $('#id_card').val();
		var assuranceCard = $('#assurance_card').val();
		var assuranceCompany = $('#assurance_company').val();
		var motorCard = $('#motor_card').val();
		var carCard = $('#car_card').val();
		var bankCard1 = $('#bank_card1').val();
		var bankCard2 = $('#bank_card2').val();
		var studentCard = $('#student_card').val();
		var genderId = $('#gender_id').val();
		var statusId = $('#status_id').val();
		
		var isHeart = $('#is_heart:checked').val();
		var isRespiratory = $('#is_respiratory:checked').val();
		var isDiabetes = $('#is_diabetes:checked').val();
		var isDigestive = $('#is_digestive:checked').val();
		var isKidney = $('#is_kidney:checked').val();
		var isEndocrine = $('#is_endocrine:checked').val();
		var isNeuroSys = $('#is_neuro_sys:checked').val();
		var isLung = $('#is_lung:checked').val();
		var isAap = $('#is_aap:checked').val();
		var pulse = $('#pulse_rate').val();
		var blood_pressure = $('#blood_pressure').val();
		var heart_rate = $('#heart_rate').val();
		var respiratory = $('#respiratory_rate').val();
		var temperature = $('#temperature').val();
		
		var otherDisease = $('#other_disease').val();
		var myPregnancy = $('#my_pregnancy:checked').val();
		var prePregnancy = $('#my_pre_pregnancy:checked').val();
		var breastFeeding = $('#my_breastfeeding:checked').val();
		
		var myHistory = $('#patient_history').val();
		
		var district = $('#patient_district_id').val();
		var province = $('#patient_province_id').val();
		
		var ipds = $('#ipd:checked').val();
		var opds = $('#opd:checked').val();
		
		var id_poor = $('#id_poor:checked').val();
		var insurance = $('#insurance:checked').val();
		
		if(ipds == '1'){
		    redirects = "ipd";
		}else if(opds == '1'){
		    redirects = "opd";
		}else{
		    redirects = "no";
		}
		
		$.post("<?php echo $base_url;?>index.php/patients/save_patient",{
		    patient_id: patientId,
		    patient_kh_name: patientKhName,
		    patient_en_name: patientEnName,
		    patient_dob: patientDob,
		    patient_phone: patientPhone,
		    emegency_phone: emergencyPhone,
		    patient_occupation: patientOccupation,
		    /*patient_address: patientAddress,*/
		    patient_district: district,
		    patient_province: province,
		    id_card: idCard,
		    id_poor: id_poor,
		    insurance: insurance,
		    assurance_card: assuranceCard,
		    assurance_company: assuranceCompany,
		    motor_card: motorCard,
		    car_card: carCard,
		    bank_card1: bankCard1,
		    bank_card2: bankCard2,
		    student_card: studentCard,
		    gender_id: genderId,
		    status_id: statusId,
		    is_heart: isHeart,
		    is_diabetes: isDiabetes,
		    is_respiratory: isRespiratory,
		    is_digestive: isDigestive,
		    is_kidney: isKidney,
		    is_endocrine: isEndocrine,
		    is_neuro_sys: isNeuroSys,
		    is_lung: isLung,
		    is_aap: isAap,
		    pulse: pulse,
		    heart: heart_rate,
		    blood_pressure: blood_pressure,
		    respiratory: respiratory,
		    temperature: temperature,
		    other_disease: otherDisease,
		    pregnancy: myPregnancy,
		    pre_pregnancy: prePregnancy,
		    breast_feeding: breastFeeding,
		    history: myHistory,
		    redi: redirects
		},function(data){
		    $("#patientList").html('');
		    pageStartTop = '0';
		    $('#msgs').css('display','block');
		    pagination();
		});
		
		$('#form_row').css('display','none');
		$('#form_table').css('display','block');
	}
    
	function deletePatient(ids){
		     $.post("<?php echo $base_url;?>index.php/patients/delete_patient/"+ids,{patients_id: ids},function(data,status){}); 
		     pagination();            
	}

	function viewWindow(htms){
		var myWindow = window.open("", "MsgWindow", "width=9000, height=7000");
		myWindow.document.open("text/html", "replace");
		myWindow.document.write(htms);
		myWindow.document.close();
	}
       /* Jquery Pagination */
	function pagination(){
		var mySearch = $(':focus').val();
		
		getPatientList(mySearch);
	}
	
	function genderCal(){
	    if($('#gender_id').val() == '0' && $('#status_id').val() == '1'){
		$('#pre_preg').css('display','block');
		$('#pre_preg1').css('display','block');
		$('#pre_preg2').css('display','block');
	    }else{
		$('#pre_preg').css('display','none');
		$('#pre_preg1').css('display','none');
		$('#pre_preg2').css('display','none');
	    }
	}
        
	function ageCal(){
	    var dob = $('#patient_dob').val();
	    var age = $('#patient_age').val();
	    var today = new Date();
	    var dd = today.getDate();
	    var mm = today.getMonth();
	    var yyyy = today.getFullYear() - parseInt(age);
	    
	    if(dob == ''){
		today = dd+'-'+mm+'-'+yyyy;
		$('#patient_dob').val(today);
	    }
	}
        
        function getFormateDate(date) {
            var dt = date.split("-")
            var day = dt[2];
            var month = dt[1];
            var year = dt[0];
            
            
            var ages = ageCals(year);
            return day + '/' + month + '/' + year + '   (' + ages + ')';
        }
        
        function ageCals(age){
	    var today = new Date();
	    var yyyy = today.getFullYear() - parseInt(age);
            
            return yyyy;
	}
        
        function getFormateDateNoAge(date) {
            var dt = date.split("-")
            var day = dt[2].split(" ")[0];
            var month = dt[1];
            var year = dt[0];
            
            return day + '/' + month + '/' + year;
        }
        
        /* *********************   Function History *********************** */
        function viewVisitor(ids){
		 $.post("<?php echo $base_url;?>index.php/visitors/get_visitor_info_by_id_json/"+ids,
		 function(data,status){
			$.each(data, function(key,value) {
                                
				$('#p_code').html(value.patient_code);
				$('#kh_name').html(value.patient_kh_name);
				$('#en_name').html(value.patient_en_name);
				$('#v_address').html(value.patient_address);
				$('#v_phone').html(value.patient_phone);
				$('#v_emergencyPhone').html(value.patient_emergency_phone);
				$('#v_occupation').html(value.patient_occupation);
				$('#v_dob').html(getFormateDate(value.patient_dob));
				$('#v_idCard').html(value.patient_id_card);
				$('#v_assuranceCard').html(value.patient_assurance_card);
				$('#v_assuranceCompany').html(value.patient_assurance_company);
				$('#v_motorCard').html(value.patient_motor_card);
				$('#v_carCard').html(value.patient_car_card);
				
				$('#v_bankCard1').html(value.patient_bank_card1);
				$('#v_bankCard2').html(value.patient_bank_card2);
				$('#v_studentCard').html(value.patient_student_card);
				$('#v_assuranceCompany').html(value.patient_assurance_company);
				if(value.patient_gender == 'm'){
					$('#v_gender').html('Male');
				}else{
					$('#v_gender').html('Female');
				}
				
				if(value.patient_status == '1'){
					$('#v_status').html('Single');
				}else{
					$('#v_status').html('Married');
				}
				if(value.is_heart == '0'){
					$('#v_heart').html('No');
				}else{
					$('#v_heart').html('Yes');
				}
				if(value.is_respiratory == '0'){
					$('#v_respiratory').html('No');
				}else{
					$('#v_respiratory').html('Yes');
				}
				if(value.is_diabetes == '0'){
					$('#v_diabetes').html('No');
				}else{
					$('#v_diabetes').html('Yes');
				}
				if(value.is_digestive == '0'){
					$('#v_digestive').html('No');
				}else{
					$('#v_digestive').html('Yes');
				}
				if(value.is_kedney == '0'){
					$('#v_kidney').html('No');
				}else{
					$('#v_kidney').html('Yes');
				}
				if(value.is_endocrine == '0'){
					$('#v_endocrine').html('No');
				}else{
					$('#v_endocrine').html('Yes');
				}
				if(value.is_neuro_sys == '0'){
					$('#v_neuro_sys').html('No');
				}else{
					$('#v_neuro_sys').html('Yes');
				}
                                
                                var inDate = getFormateDateNoAge(value.visitors_in_date);
                                $('#bhistory').append(inDate+'<hr/>');
                                getDia(value.visitors_id);
                                getMedicine(value.visitors_id);
                                getService(value.visitors_id);
                                getNote(value.visitors_id)
			});
		 });
		 $('#visitor_view_form').css('display','block');
		 $('#form_table').css('display','none');
                 $('#form_row').css('display','none');
                 
        }
        
        
        function getDia(ids){
	    var i = 0;
            var htms = '<table id="tbl4" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="4" style="background: yellow;"> Diagnostic </td></tr><tr style="background: #b9b9b5;"><td>Type</td><td>Diagnostic</td><td>Level</td><td>Description</td></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_diagnostic_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    i = i + 1;

                    /******************* Diagnostic *******************/
                    if( i < 4){
                        htms += '<tr>';
                            htms += '<td class="textLeft">Diagnostic In ('+ i +')</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
                    }else{
                        htms += '<tr>';
                            htms += '<td class="textLeft">Diagnostic Out ('+ i +')</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
                    }
		});
                
                htms += '</table>';
                $('#bhistory').append(htms);
	    });
	}
        
        function getMedicine(ids){
	    var i = 0;
            var htmlView = '<table id="tbl5" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="8" style="background: yellow;"> Medicine </td></tr><tr style="background: #b9b9b5;"><td>កាលបរិច្ឆេទ</td><td>ឈ្មោះថ្នាំ</td><td>ចំនួន</td><td>តំលៃ</td><td>ព្រឹក</td><td>ថ្ងៃ</td><td>ល្ងាច</td><td>យប់</td></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_medicine_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    
		    i = i + 1;
                    
                    htmlView += '<tr class="bloom-row-2">';
                        htmlView += '<td  colspan="2" style="text-align:center !important;">Assign By</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_from+'</td>';
                        htmlView += '<td  colspan="2" style="text-align:center !important;">Assign To</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_to+'</td>';
                    htmlView += '</tr>';
                    
		    htmlView += '<tr>';
			htmlView += '<td  style="text-align:center !important;">'+$.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified))+'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')</td>';
			}else{
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')-['+value.forms_name+']</td>';
			}
			
			htmlView += '<td  style="text-align:center !important;">'+value.items_qty+' '+ value.units_name+'</td>';
			htmlView += '<td  style="text-align:center !important;">$'+value.items_prices+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_am+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_af+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_pm+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_nt+'</td>';
		    htmlView += '</tr>';
		    
		    if(value.items_time != '' || value.items_detail != ''){
			htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">ពេល៖</td>';
			    htmlView += '<td  colspan="6" style="text-align:center;">'+value.items_time+'</td>';
			htmlView += '</tr>';
                        htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">បរិយាយ៖</td>';
			    htmlView += '<td  colspan="6" style="text-align:center;">'+value.items_detail+'</td>';
			htmlView += '</tr>';
		    }
                    
                    if(value.forms_name == 'Erbium Yag Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="4">Pulse With Us</td>';
			    htmlView += '<td colspan="4">Energy mj</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="4">' + value.pulse_with_us + '</td>';
			    htmlView += '<td colspan="4">' + value.energy_mj + '</td>';
			htmlView += "</tr>";
		    }
		    
		});
		
                htmlView += "</table>";
		$('#bhistory').append(htmlView);
	    });
	}
        
        function getService(ids){
	    var i = 0;
            var htmlView = '<table id="tbl6" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="13" style="background: yellow;"> Service </td></tr><tr style="background: #b9b9b5;"><td colspan="2">កាលបរិច្ឆេទ</td><td colspan="3">ឈ្មោះសេវាកម្ម</td><td colspan="2">តំលៃ</td><td colspan="2">បញ្ចុះ</td><td colspan="2">ចំនួន</td><td colspan="2">សរុប</td></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_service_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    
		    i = i + 1;

		    htmlView += '<tr class="bloom-row-2">';
                        htmlView += '<td  colspan="3" style="text-align:center !important;">Assign By</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_from+'</td>';
                        htmlView += '<td  colspan="3" style="text-align:center !important;">Assign To</td>';
                        htmlView += '<td  colspan="4" style="text-align:center;">'+value.assign_to+'</td>';
                    htmlView += '</tr>';
                    
		    htmlView += "<tr>";
			htmlView += '<td colspan="2">'+ $.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified)) +'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    htmlView += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ') </td>';
			}else{
			    htmlView += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ')-[' + value.forms_name + '] </td>';
			}
			htmlView += '<td colspan="2">$'+ value.items_prices +' </td>';
			htmlView += '<td>$'+ value.items_discount +'</td>';
                        htmlView += '<td colspan="3">'+ value.units_name + ' </td>';
                        var amountPrice = (parseFloat(value.items_qty) * parseFloat(value.items_prices)) - parseFloat(value.items_discount);
			htmlView += '<td colspan="2">$'+ amountPrice.toFixed(2) +'</td>';
		    htmlView += "</tr>";
		    
		    htmlView += "<tr><td colspan='5'>Descrition</td><td colspan='9'>"+ value.items_detail +"</td></tr>";
		    
		    if(value.forms_name == 'Q-Switch Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Lens</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="3">Pulse Length</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Spot Size</td>';
			    htmlView += '<td colspan="2">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.lens + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="3">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.spot_size + '</td>';
			    htmlView += '<td colspan="2">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }else if(value.forms_name == 'CPL Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Cut Off Filter</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Pulse Train</td>';
			    htmlView += '<td colspan="2">Pause Length</td>';
			    htmlView += '<td colspan="2">Pulse Length</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="1">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.cut_off_filter + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.pulse_train + '</td>';
			    htmlView += '<td colspan="2">' + value.pause_length + '</td>';
			    htmlView += '<td colspan="2">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="1">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }else if(value.forms_name == 'Diode Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Fitzpatrik</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="3">Pulse Length</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Mode</td>';
			    htmlView += '<td colspan="2">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="3">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.mode + '</td>';
			    htmlView += '<td colspan="2">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }else if(value.forms_name == 'Anti Aging Treatment'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Fitzpartrik</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="3">Pulse Length</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Mode</td>';
			    htmlView += '<td colspan="2">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="3">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.mode + '</td>';
			    htmlView += '<td colspan="2">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }
		});
                
                htmlView += "</table>";
                $('#bhistory').append(htmlView);
	    });
	}
        
        function getNote(ids){
	    var i = 0;
	    var htmlView = '<table id="tbl7" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="2" style="background: yellow;"> Note </td></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_note_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    htmlView += '<tr>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_date+'</td>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_detail+'</td>';
		    htmlView += '</tr>';
		});
		
                htmlView += "</table>";
                $('#bhistory').append(htmlView);
	    });
	}
        
</script>
