<div class="content-wrapper" style="min-height: 916px;">
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
							
								<form action="<?php echo $base_url;?>index.php/ipds/add_ipd_service" method="POST" id="dialog_pop" >
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
				                    <label><?php echo @$v_name;?> :</label><br/>
				                    <div class="input-group">
				                      <div class="input-group-addon">
				                      </div>
				                      <?php 
				                      	echo form_dropdown('request_id',@$cmbUser,'','class="form-control"');
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
			                  	</div><br/>
			                  	
			                  	<div class="form-group">
				                    <label><?php echo @$u_startus;?> :</label><br/>
				                    <div class="input-group">
				                      <div class="input-group-addon">
				                      </div>
				                      <?php 
				                      	echo form_dropdown('status',@$cmbStatus,'','class="form-control"');
				                      ?>
				                    </div>
				                  </div><br/><br/>
			                  
			                  <div class="form-group">
			                    <div class="input-group">
			                      <input type="submit" class="form-control btn-primary" value="<?php echo @$v_add;?>">
			                    </div>
			                  </div>
							</form>

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
