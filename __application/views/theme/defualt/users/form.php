<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/users">'.$h_user.''.'</a>';?>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
	<form action="<?php echo $base_url;?>index.php/users/save_users" method="POST"> 
		<div class="row">
            	<div class="col-md-12">
	              <div class="box box-danger">
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<?php
				if($c_gender == 'F'){
					$c_gender= '1';
				}else{
					$c_gender= '0';
				}
			
			?>
			
			<!----- Name ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_name;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="name" value="<?php echo @$names;?>" class="form-control">
	                    </div>
	                  </div>

			<!----- Username ------->
				      <div class="form-group">
	                    <label><?php echo @$c_username;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="username" value="<?php echo @$username;?>" class="form-control">
	                    </div>
	                  </div>
	         <!------ Gender Combo -------->
	        		<div class="form-group">
	                    <label><?php echo @$u_gender;?> :</label>
	                    <div class="input-group">
	                      	<?php	
								echo form_dropdown('c_gender',$cmbgender,@$c_gender,'class="form-control"');
							?>
	                    </div>
	                  </div> 
	                  
	                  
	         <!----- Background ------->
				      <div class="form-group">
	                    <label><?php echo @$u_background;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="background" value="<?php echo @$background;?>" class="form-control">
	                    </div>
	                  </div>
	                  
	                  
	        <!----- Status ------->
				      <div class="form-group">
	                    <label><?php echo @$u_startus;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="status" value="<?php echo @$status;?>" class="form-control">
	                    </div>
	                  </div>
	                  
	        <!------ Role Name Combo -------->
	        		<div class="form-group">
	                    <label><?php echo @$h_role;?> :</label>
	                    <div class="input-group">
	                      	<?php 
								echo form_dropdown('role_id',$cmbRole,$roles_id,'class="form-control"');
							?>
	                    </div>
	                  </div>
	        
	        <!----- Phone ------->
				      <div class="form-group">
	                    <label><?php echo @$c_phone;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="phone" value="<?php echo @$phone;?>" class="form-control">
	                    </div>
	                  </div>
	                  
	        <!----- Phone ------->
				      <div class="form-group">
	                    <label><?php echo @$c_email;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="email" value="<?php echo @$email;?>" class="form-control">
	                    </div>
	                  </div>
	        
	        <!----- Address ------->
				      <div class="form-group">
	                    <label><?php echo @$c_address;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="address" value="<?php echo @$address;?>" class="form-control">
	                    </div>
	                  </div>
	        <!----- Language ------->
				      <div class="form-group">
	                    <label><?php echo @$c_lang;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="language" value="<?php echo @$lang;?>" class="form-control">
	                    </div>
	                  </div>
	         <!----- Work Place ------->
				      <div class="form-group">
	                    <label><?php echo @$c_work_place;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="workplace" value="<?php echo @$work_place;?>" class="form-control">
	                    </div>
	                  </div>
	                  
	          <!----- Start Date ------->
				      <div class="form-group">
	                    <label><?php echo @$u_start.@$u_date;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="start_date" id="startDate" value="<?php echo @$start_date;?>" class="form-control">
	                    </div>
	                  </div>
	          
	          <!----- Stop Date ------->
				      <div class="form-group">
	                    <label><?php echo @$u_stop.@$u_date;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="stop_date" id="stopDate" value="<?php echo @$stop_date;?>" class="form-control">
	                    </div>
	                  </div>
	                  
	          <!----- Note ------->
				      <div class="form-group">
	                    <label><?php echo @$c_note;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="note" value="<?php echo @$note;?>" class="form-control">
	                    </div>
	                  </div>
	        
			<!----- Submit ------->
	                  <div class="form-group">
	                    <div class="input-group">
	                      <input type="submit" class="form-control btn-primary" value="<?php echo @$c_create;?>">
	                    </div>
	                  </div>

	                </div>
	              </div>
	
	            </div>
	          </div>
		</div>
	</form>
	</section><!-- /.content -->
</div>
<script>

	$(document).ready(function(){
		$( "#startDate" ).datepicker({dateFormat: "dd-mm-yy"});
        $( "#stopDate" ).datepicker({dateFormat: "dd-mm-yy"});
	}); 

</script>
