<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/patients">'.$h_patient.'</a>';?>
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
			<div class="form-group has-error">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$enName;?>
				</div>
				<input type="text" name="patient_kh_name" id="patient_kh_name" class="form-control">
				<input type="text" name="patient_id" id="patient_id" style="display:none;">
			      </div>
			</div>

			<!-----Patient En Name------->
			<div class="form-group"  style="display:none;">
			      <div class="input-group has-error">
				<div class="input-group-addon">
				      <?php echo @$khName;?>
				</div>
				<input type="text" name="patient_en_name" id="patient_en_name" class="form-control">
			      </div>
			</div>

			<!-----Gender Combo------->
			<div class="form-group has-error">
			      <div class="input-group">
				  <div class="input-group-addon">
				      <?php echo @$gender;?>
				</div>
				<?php echo form_dropdown('gender_id', @$genderCambo, @$gender_id,'class="form-control" id="gender_id" onchange="genderCal();"');?>
			      </div>
			</div>

			<!-----Status Combo------->
			<div class="form-group has-error">
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
			      <input type="text" value="None-Pregnancy" class="form-control" disabled="disabled">
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
			      <input type="text" value="Pregnancy and Breastfeeding" class="form-control" disabled="disabled">
			  </div>
			</div>

			<!-----Date Of Birth------->
			<div class="form-group has-error">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$dob;?>
				</div>
				  <input type="text" name="patient_dob" id="patient_dob" class="form-control">
			      </div>
			</div>

			<!-----Age------->
			<div class="form-group has-error">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$age;?>
				</div>
				<input type="text" name="patient_age" id="patient_age" class="form-control" onchange="ageCal();">
			      </div>
			</div>

			 <!-----Date Of Birth------->
			<div class="form-group has-error">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$occupation;?>
				</div>
				<input type="text" name="patient_occupation" id="patient_occupation" class="form-control">
			      </div>
			</div>

			<!-----Patient Phone------->
			<div class="form-group has-error">
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
			<div class="form-group has-error">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo $province;?>
				</div>
				<input type="text" name="patient_province" id="patient_province" class="form-control">
				<input type="text" name="patient_province_id" id="patient_province_id" class="form-control" style="display: none;">
			      </div>
			</div>
			
			<!-----Patient District------->
			<div class="form-group has-error">
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
			<div class="form-group">
			      <div class="input-group">
						<div class="input-group-addon">
						      <?php echo @$date_in;?>
						</div>
				  		<input type="text" name="patient_date_in" id="patient_date_in" class="form-control">
			      </div>
			</div>
			<div class="form-group">
			      <div class="input-group">
				<div class="input-group-addon">
				      <?php echo @$refer_from;?>
				</div>
				<input type="text" name="patient_refer_from" id="patient_refer_from" class="form-control">
			      </div>
			</div>
			<div class="form-group">
			    <div class="input-group">
				  	<div class="input-group-addon">
				      	<?php echo @$workstation;?>
					</div>
						<?php echo form_dropdown('workstation', @$drop_workshop,'','class="form-control" id="workstation" onchange="genderCal();"');?>
			    </div>
			</div>
			
			<!-- waitting form -->
		    <div class="box-header">
				    <h3 class="box-title"><?php echo @$watiitingForm;?></h3>
			</div>

			<div class="form-group disPatientNew">
			    <div class="input-group">
				<div class="input-group-addon">
				    <input type="checkbox" value="1" id="waitting_new" onclick="newWaitting();">
				</div>
				<input type="text" value="New Waitting" class="form-control">  
			    </div>			      
			</div>

			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				    <input type="checkbox" value="1" id="waitting_open">
				</div>
				<input type="text" value="Waitting Open" class="form-control">  
			    </div>			      
			</div>

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-addon">
					<?php echo $h_waitting_number;?>
				  </div>
				  <input type="text" name="waitting_code" id="waitting_code" class="form-control">
				  <input type="hidden" name="waitting_id" id="waitting_id">
				  <input type="hidden" name="storage_waitting_id" id="storage_waitting_id">
				  <input type="hidden" name="new_waitting_code" id="new_waitting_code">
				  <input type="hidden" name="old_waitting_code" id="old_waitting_code">
				</div>
		  	</div>

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-addon">
					<?php echo $purpose;?>
				  </div>
				  <?php echo form_dropdown('waitting_examination', @$drop_wards,'','class="form-control" id="waitting_examination"');?>
				</div>
			</div>

			<div class="form-group">
			    <div class="input-group">
				  	<div class="input-group-addon">
				      	<?php echo @$room.' ID';?>
					</div>
						<?php echo form_dropdown('room_id', @$drop_room,'','class="form-control" id="room_id"');?>
			    </div>
			</div>

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-addon">
					<?php echo $doctor.' '.$name;?>
				  </div>
				  <?php echo form_dropdown('waitting_doctor', @$drop_user,'','class="form-control" id="waitting_doctor"');?>
				</div>
			</div>

			<!-- end watiiting from -->
						
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
			    <div id="disOpdIpd" sytle="display:none">
			    	<div class="form-group">
				      <div class="input-group">
					    <span class="input-group-addon">
					      <input type="checkbox" id="opd" value="1">
					    </span>
					  <input type="text" value="opd" class="form-control" disabled="disabled">
				      </div>
				    </div>

				    <!----- IPD ------->
				    <div class="form-group">
				      <div class="input-group">
					    <span class="input-group-addon">
					      <input type="checkbox" id="ipd" value="1" >
					    </span>
					  <input type="text" value="ipd" class="form-control" disabled="disabled">
				      </div>
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
								<p><?php echo @$lung;?> : <span id="v_lung"></span></p>
								<p><?php echo @$allergyAndPenicillin;?> : <span id="v_aap"></span></p>
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
    .textLeft{
        text-align: left !important;
    }
</style>
<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
<script>
    var pageStartTop = '0';
    var baseUrl = <?php echo '"'.$base_url.'index.php/"';?>;
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
	    $('#waitting_code').val("<?php echo $generate_num_waitting?>");
	    $('#disOpdIpd').css('display','block');
    });
	
	//insert Data
    $("#submit_edit").click(function(){
	    saveEdit();
    });
    
    function getPatientList(mySearch,pageStart,pageLimit){
        
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });
	var totalRecord = <?php echo @$totals;?>;
        var htmlView = '';
        var i = 0;
        var stRow = '';
	
        $.post("<?php echo $base_url;?>index.php/patients/get_patient_list",{
			search_data: mySearch/*,
			page_start: pageStart,
			page_limit: pageLimit*/},
			function(data){
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
	                    htmlView += '<td>' + value.patient_kh_name + ' </td>';
	                    htmlView += '<td>' + gen + '</td>';
	                    htmlView += '<td>' + value.patient_phone + '</td>';
	                    htmlView += '<td>';
                        htmlView +='<a href="#" class="handOver" title="<?php echo @$view;?>" onclick="viewVisitor(' + value.patient_id	 + ');"><i class="fa fa-user-md  action-btn"></i></a>&nbsp;&nbsp; ';
                        htmlView +='<a href="<?php echo @$base_url;?>index.php/patients/photo/P' + value.patient_id + '" target="_blank" title="Photo"><i class="fa fa-picture-o action-btn primary"></i></a>&nbsp;&nbsp; ';
                        htmlView +='<a href="#" title="<?php echo @$opd;?>" onclick="patientOpd(' + value.patient_id + ');"><i class="fa fa-genderless action-btn primary"></i></a>&nbsp;&nbsp; ';
                        htmlView +=' <a href="#" title="<?php echo @$ipd;?>" onclick="patientIpd(' + value.patient_id + ');"> <i class="fa fa-info action-btn primary"></i></a>&nbsp;&nbsp; ';
                        htmlView +=' <span title="<?php echo @$edit;?>"><i class="fa fa-edit action-btn primary" onclick="editPatient(' + value.patient_id + ');"></i></span>&nbsp;&nbsp; ';
                        htmlView +=' <span title="<?php echo @$delete;?>"><i class="fa fa-trash-o action-btn danger" onclick="deletePatient(' + value.patient_id + ');"></i></span>';
                    htmlView += '</td>';
                htmlView += '</tr>';
            });
                        
            /*$("#patientList").append(htmlView);*/
	    $("#patientList").html(htmlView);
            $("#total_record").html(totalRecord);
            
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }
    
    function patientOpd(ids){
		$.post("<?php echo $base_url;?>index.php/patients/patient_opd/"+ids,{patients_id: ids},function(data,status){
			window.location = "<?php echo $base_url;?>index.php/diagnostics";
		});
	}
	
	function patientIpd(ids){
		$.post("<?php echo $base_url;?>index.php/patients/patient_ipd/"+ids,{patients_id: ids},function(data,status){
			window.location = "<?php echo $base_url;?>index.php/ipds";
		});
	}
    
    function editPatient(ids){
		
		 genderCal();
		 
		 $('#msgs').css('display','none');
		 
		 $('#form_row').css('display','block');
		 $('#form_table').css('display','none');
		 $('#submit_edit').val('Update');
		 $('#title_name').html('/ Edit');
	    	 $('#disOpdIpd').css('display','none');
		 $.post("<?php echo $base_url;?>index.php/patients/get_patient_info_by_id_json/"+ids,
		 function(data,status){
			$.each(data, function(key,value) {
				$('#status_id').val(value.patient_status);
				if(value.patient_gender == "m"){
					$('#gender_id').val('1');
				}else{
					$('#gender_id').val('0');
				}
				
				$('#patient_id').val(ids);
				$('#patient_code').val(value.patient_code);
                                $('#p_code').text(value.patient_code);
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
			$.post("<?php echo $base_url;?>index.php/patients/get_patient_watting_byid/"+ids,
		 		function(dataWaitting,status){
		 			$.each(dataWaitting, function(key,waitValue) {			    
						$('#waitting_id').val(waitValue.waitting_id);
						$('#storage_waitting_id').val(waitValue.waitting_id);
						$('#waitting_code').val(waitValue.waitting_code);
						$('#waitting_examination').val(waitValue.waitting_examination);
						$('#room_id').val(waitValue.waitting_room);
						$('#waitting_doctor').val(waitValue.waitting_doctor);
						$('#new_waitting_code').val(<?php echo $generate_num_waitting?>);
	    					$('#old_waitting_code').val(waitValue.waitting_code);
						if(waitValue.waitting_open == 1){
				       		$('#waitting_open').prop('checked', true);
				       	}else{
				       		$('#waitting_open').prop('checked', false);
				       	}
					});
				    	$('#waitting_new').prop('checked', false);
				});
			
			genderCal();
		 });
    }
    
    function saveEdit(){
		var baseUrl = <?php echo "'".$base_url."'"?>;
		var redirects = "";
        var red = '';
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



		// waitting
		if($("#waitting_open").is(':checked')){
			var waitting_open = $("#waitting_open").val();
		}else{
			var waitting_open = '';
		}

		var waitting_code = $("#waitting_code").val();
		var waitting_examination = $("#waitting_examination").val();
		var room_id = $("#room_id").val();	
		var waitting_doctor = $("#waitting_doctor").val();	
		var waitting_id = $("#waitting_id").val();		
	
		if(ipds == '1'){
		    redirects = "ipd";
                    red = baseUrl+"index.php/ipds";
		}else if(opds == '1'){
		    redirects = "opd";
                    red = baseUrl+"index.php/diagnostics";
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
		    redi: redirects,

		    // waitting
			waitting_open : waitting_open,
			waitting_code : waitting_code,
			waitting_examination : waitting_examination,
			room_id : room_id,
			waitting_doctor : waitting_doctor,
			waitting_id: waitting_id

		},function(data){
		    $("#patientList").html('');
		    pageStartTop = '0';
		    $('#msgs').css('display','block');
                    
		    /*pagination();*/
		});
		
		$('#form_row').css('display','none');
		$('#form_table').css('display','block');
                
                window.location = red;
                
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
		
		/* Past Variable from Controller [totalRecord, Item Per Page] */
		/*var totalRecord = <?php echo @$totals;?>;
		var pageLimit = <?php echo @$item_per_page;?>;
		var totalPage = Math.ceil(parseInt(totalRecord)/parseInt(pageLimit));
		//alert(totalPage);
		if(parseInt(totalRecord) > parseInt(pageLimit)){
			var atId = '';
			if(ids == null || ids == ''){
				ids = 'pg1';
			}else if(ids == 'pg0'){
				atId = $('#pg1').text();
				$('#pg1').text(parseInt(atId)-1);
				$('#pg2').text(atId);
				$('#pg3').text(parseInt(atId)+1);
			}else if(ids == 'pg4'){
				atId = $('#pg1').text();
				$('#pg1').text(parseInt(atId)+1);
				$('#pg2').text(parseInt(atId)+2);
				$('#pg3').text(parseInt(atId)+3);
			}else{
				atId = $("#"+ids+"").text();
				
				if((parseInt(totalPage) - parseInt(atId)) <= 2){
					if((parseInt(totalPage) - parseInt(atId)) == 2){
						$('#pg2').removeClass('pg-active');
						$('#pg3').removeClass('pg-active');
						$('#pg1').addClass('pg-active');
					}else if((parseInt(totalPage) - parseInt(atId)) == 1){
						$('#pg1').removeClass('pg-active');
						$('#pg3').removeClass('pg-active');
						$('#pg2').addClass('pg-active');
					}else if((parseInt(totalPage) - parseInt(atId)) == 0){
						$('#pg1').removeClass('pg-active');
						$('#pg2').removeClass('pg-active');
						$('#pg3').addClass('pg-active');				
					}else{
						atId = $("#"+ids+"").text();
					}
					
					$('#pg1').text(parseInt(totalPage) - 2);
					$('#pg2').text(parseInt(totalPage) - 1);
					$('#pg3').text(totalPage);
				}else{
					$('#pg1').text(atId);
					$('#pg2').text(parseInt(atId)+1);
					$('#pg3').text(parseInt(atId)+2);
				}
			}
			
			var pdno = $('.pg-active').text();
			if(parseInt(pdno) == 1){
				$('#pg0').css('display','none');
			}else if(parseInt(pdno) > 1){
				$('#pg0').css('display','block');
				
				if((parseInt(totalPage) - parseInt(pdno)) <= 2){
					$('#pg4').css('display','none');			
				}else{
					$('#pg4').css('display','block');
				}
			}
			
			if(parseInt(pageStartTop) > 0){
				var pageStart = 0;
			}else{
				var pageStart = (parseInt(pdno) - 1) * parseInt(pageLimit);
				pageStartTop = pageStart;
			}
			
		}else{
			$('#pg0').css('display','none');
			$('#pg1').css('display','none');
			$('#pg2').css('display','none');
			$('#pg3').css('display','none');
			$('#pg4').css('display','none');
		}*/
		/*  Post 3 parameter [ strSearch, Start, Limit]*/
		var totalRecord = <?php echo @$totals;?>;
		var pageLimit = <?php echo @$item_per_page;?>;
		var mySearch = $(':focus').val();;
		
		$('#total_record').html(totalRecord);
		
		pageStartTop = parseInt(pageStartTop) + 1;
		var pageStart = pageStartTop;
		
		getPatientList(mySearch,pageStart,pageLimit);
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
		today = dd+'-'+("0" + (mm + 1)).slice(-2)+'-'+yyyy;
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
        
        function getFormateDateNoAge(date) {
            var dt = date.split("-")
            var day = dt[2].split(" ")[0];
            var month = dt[1];
            var year = dt[0];
            
            return day + '/' + month + '/' + year;
        }
        
        function ageCals(age){
	    var today = new Date();
	    var yyyy = today.getFullYear() - parseInt(age);
            
            return yyyy;
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
            var htms = '<table id="tbl4" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="4" style="background: yellow;"> Diagnostic </td><tr style="background: #b9b9b5;"><td>Type</td><td>Diagnostic</td><td>Level</td><td>Description</td></tr></tr>';
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
            var htmlView = '<table id="tbl5" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="8" style="background: yellow;"> Medicine </td><tr style="background: #b9b9b5;"><td>កាលបរិច្ឆេទ</td><td>ឈ្មោះថ្នាំ</td><td>ចំនួន</td><td>តំលៃ</td><td>ព្រឹក</td><td>ថ្ងៃ</td><td>ល្ងាច</td><td>យប់</td></tr></tr>';
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
			
			htmlView += '<td  style="text-align:center !important;">'+ value.units_name+'</td>';
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
                        htmlView += '<td colspan="3">'+ value.items_qty +' '+ value.units_name + ' </td>';
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
	function newWaitting(){
		if ($('#waitting_new').is(':checked')) {
	            $('#waitting_id').val('');
	            $('#waitting_code').val($('#new_waitting_code').val());
		}else{
	            $('#waitting_id').val($('#storage_waitting_id').val());
	            $('#waitting_code').val($('#old_waitting_id').val());
		}
	}
</script>
