<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/types">'.$h_hospital_config.''.'</a>';?>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
	<form action="<?php echo $base_url;?>index.php/settings/save_config" method="POST"> 
		<div class="row">
            	<div class="col-md-12">
	              <div class="box box-danger">
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<?php 
			foreach($config_list as $rows){
			?>
			<!----- Code ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_code;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="hos_code" value="<?php echo @$rows->hospital_code;?>" class="form-control">
	                    </div>
	                  </div>
	                  
			<!----- Name ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_name;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="hos_name" value="<?php echo @$rows->hospital_name;?>" class="form-control">
	                    </div>
	                  </div>

			<!----- Address ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_address;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <textarea name="hos_address" class="form-control" rows="5"><?php echo $rows->hospital_address;?></textarea>
	                    </div>
	                  </div>

			<!----- Contact ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_contact;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="hos_contact" value="<?php echo @$rows->hospital_contact;?>" class="form-control">
	                    </div>
	                  </div>

			<!----- Contact ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_item_per_page;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                      </div>
	                      <input type="text" name="hos_item_per_page" value="<?php echo @$rows->item_per_page;?>" class="form-control">
	                    </div>
	                  </div>
	                  
			<!----- Submit ------->
	                  <div class="form-group">
	                    <div class="input-group">
	                      <input type="submit" class="form-control btn-primary" value="<?php echo @$c_update;?>">
	                    </div>
	                  </div>
			<?php }?>
	                </div>
	              </div>
	
	            </div>
	          </div>
		</div>
	</form>
	</section><!-- /.content -->
</div>
