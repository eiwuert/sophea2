<div class="content-wrapper" style="min-height: 916px;">
	
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
							<form action="<?php echo $base_url;?>index.php/diagnostics/add_diagnostic" method="POST">
                                                <div class="form-group">
				                    <label></label>
				                    <div class="input-group">
				                      <div class="input-group-addon">
                                                          <?php echo @$h_icd10;?>
				                      </div>
				                      <input type='text' id='tags' name='dia_icd10' class='form-control'>
				                    </div>
				                  </div><br/><br/>   
				                  <div class="form-group">
				                    <label></label>
				                    <div class="input-group">
				                      <div class="input-group-addon">
                                                          <?php echo @$c_date;?>
				                      </div>
				                      <input type='text' id='dia_date' name='dia_date' class='form-control'>
			                    </div>
			                  </div><br/>
			                  <div class="form-group">
                                                <label></label><br/>
                                                <div class="input-group">
                                                  <div class="input-group-addon">
                                                      <?php echo @$v_desc;?>
                                                  </div>
                                                  <textarea id='desc' name='dia_detail' cols='50' rows='5' 'class='form-control'></textarea>
                                        </div>
			                  </div><br/><br/>
			                  
			                  <div class="form-group">
			                    <div class="input-group">
			                      <input type="submit" class="form-control btn-primary" value="<?php echo @$v_add;?>">
			                    </div>
			                  </div>
								
							</form>	
							
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
