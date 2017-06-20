<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/users">'.$h_user.''.'</a>';?>
			<small> <?php echo $c_list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
	<form action="<?php echo $base_url;?>index.php/types/save_types" method="POST"> 
		<div class="row">
            	<div class="col-md-12">
	              <div class="box box-danger">
	                <div class="box-header">
	                  <h3 class="box-title"><?php echo @$c_general;?></h3>
	                </div>
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<!----- Patient Name KH ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_name;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <input type="text" name="type_name" value="<?php echo @$type_name;?>" class="form-control" placeholder="តូតូ">
	                    </div>
	                  </div>

			<!----- Patient Name Eng ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_desc;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <textarea name="type_desc" class="form-control" rows="10" placeholder="Descriptioin..."><?php echo @$type_desc;?></textarea>
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
