<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/patients">'.$p_patient.''.'</a>';?>
			<small> <?php if(@$code != null || @$code != ''){$p_list .= ' ('.$hospital_code.'-'.@$code.')';} echo $p_list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
            	<div class="col-md-6">
	              <div class="box box-danger">
	                <div class="box-header">
	                  <h3 class="box-title"><?php echo @$p_general;?></h3>
	                </div>
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<!----- Patient Name KH ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_kh_name;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <input type="text" name="kh_name" value="<?php echo @$kh_name;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient Name Eng ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_en_name;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <input type="text" name="en_name" value="<?php echo @$en_name;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient Sex ------->
	                  <div class="form-group">
	                    <label>Gender :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-tags"></i>
	                      </div>
				<select name="gender" class="form-control select2 select2-hidden-accessible" style="width: 100%;" disabled>
					<option <?php if(@$gender == 'm'){echo 'selected="selected"';}?> value='m'><?php echo $p_male;?></option>
					<option <?php if(@$gender == 'f'){echo 'selected="selected"';}?> value='f'><?php echo $p_female;?></option>
				 </select>
	                    </div>
	                  </div>

			<!----- Patient DOB ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_dob;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input type="text" name="dob" value="<?php echo @$dob;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient Address ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_address;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <input type="text" name="address" value="<?php echo @$address;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient Phone ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_phone;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-phone"></i>
	                      </div>
	                      <input type="text" name="phone" value="<?php echo @$phone;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient Emergency phone ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_em_phone;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-phone"></i>
	                      </div>
	                      <input type="text" name="em_phone" value="<?php echo @$em_phone;?>" class="form-control" disabled>
	                    </div>
	                  </div>

	                </div>
	              </div>
	
	            </div>

	            <div class="col-md-6">
	              <div class="box box-primary">
	                <div class="box-header">
	                  <h3 class="box-title"><?php echo @$p_contact;?></h3>
	                </div>
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<!----- Patient ID Card ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_id_card;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        C
	                      </div>
	                      <input type="text" name="id_card" value="<?php echo @$id_card;?>" class="form-control" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Assurance Card ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_assurance_card;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        A
	                      </div>
	                      <input type="text" name="assurance_card" value="<?php echo @$assurance_card;?>" class="form-control" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Assurance Company ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_assurance_company;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        A
	                      </div>
	                      <input type="text" name="assurance_company" value="<?php echo @$assurance_company;?>" class="form-control" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Motor Card ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_motor_card;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        M
	                      </div>
	                      <input type="text" name="motor_card" value="<?php echo @$motor_card;?>" class="form-control" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Car Card ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_car_card;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        C
	                      </div>
	                      <input type="text" name="car_card" value="<?php echo @$car_card;?>" class="form-control" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Bank Card1 ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_bank_card1;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        B
	                      </div>
	                      <input type="text" name="bank_card1" value="<?php echo @$bank_card1;?>" class="form-control" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Bank Card2 ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_bank_card2;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        B
	                      </div>
	                      <input type="text" name="bank_card2" value="<?php echo @$bank_card2;?>" class="form-control" placeholder="741541231224" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Student Card ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_student_card;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        S
	                      </div>
	                      <input type="text" name="student_card" value="<?php echo @$student_card;?>" class="form-control" placeholder="741541231224" disabled>
	                    </div>
	                  </div>

	        <!----- Patient Student School ------->
	                  <div class="form-group">
	                    <label><?php echo @$p_student_school;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        S
	                      </div>
	                      <input type="text" name="student_school" value="<?php echo @$student_school;?>" class="form-control" placeholder="School" disabled>
	                    </div>
	                  </div>

	                </div>
	              </div>
	              </div>
	            </div>
	          </div>

		</div>

	</section><!-- /.content -->
</div>
