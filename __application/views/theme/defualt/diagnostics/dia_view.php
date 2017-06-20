<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/diagnostics/all_dia">'.$h_diagnostic.''.'</a>';?>
			<small> <?php if(@$pa_code != null || @$pa_code != ''){$h_patient .= ' ('.@$pa_code.')';} echo $h_patient;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
				<div class="col-md-6">
	              <div class="box box-danger">
	                <div class="box-header">
	                  <h3 class="box-title"><?php echo @$c_general;?></h3>
	                </div>
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<!----- Diagnostic Code ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_code;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <input type="text" value="<?php echo @$dia_code;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient Visit Date ------->
	                  <div class="form-group">
	                    <label><?php echo @$h_diagnostic.' '.@$c_day;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input type="text" value="<?php echo @$dia_date;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Diagnostic Detail ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_detail;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <textarea value="" class="form-control" rows="5" disabled><?php echo @$dia_detail;?></textarea>
	                    </div>
	                  </div>

	                </div>
	              </div>
	
	            </div>
	            <div class="col-md-6">
	              <div class="box box-primary">
	                <div class="box-header">
	                  <h3 class="box-title"><?php echo @$p_info;?></h3>
	                </div>
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<!----- Patient Name ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_name;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <input type="text" name="b" value="<?php echo @$pa_kh_name.' ('.$pa_en_name.')';?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient Visit Date ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_register.' '.@$c_day;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input type="text" name="b" value="<?php echo @$visitor_date;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient DOB ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_dob;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input type="text" name="b" value="<?php echo @$pa_dob;?>" class="form-control" disabled>
	                    </div>
	                  </div>

			<!----- Patient phone ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_phone;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-phone"></i>
	                      </div>
	                      <input type="text" name="b" value="<?php echo @$pa_phone.' / '.@$pa_em_phone;?>" class="form-control" disabled>
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
