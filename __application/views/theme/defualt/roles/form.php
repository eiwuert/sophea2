<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/roles">'.$h_role.''.'</a>';?>
			<small> <?php echo $c_list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
	<form action="<?php echo $base_url;?>index.php/roles/save_roles" method="POST"> 
		<div class="row">
            	<div class="col-md-12">
	              <div class="box box-danger">
	                <div class="box-header">
	                  <h3 class="box-title"><?php echo @$c_general;?></h3>
	                </div>
	                <div class="box-body">
			<!------------------------ Form Group ------------------------->
			<!----- Role Name ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_name;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <input type="text" name="roles_name" value="<?php echo @$roles_name;?>" class="form-control" placeholder="តូតូ">
	                    </div>
	                  </div>

			<!----- Role Desciption ------->
	                  <div class="form-group">
	                    <label><?php echo @$c_desc;?> :</label>
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        @
	                      </div>
	                      <textarea name="roles_desc" class="form-control" rows="10" placeholder="Descriptioin..."><?php echo @$roles_desc;?></textarea>
	                    </div>
	                  </div>

			<!----- Role Permission ------->
			<?php
				if(@$is_update == 'true'){
					echo '<div class="form-group">';
						echo '<label>'.@$c_permission.' :</label><hr>';
						echo '<div class="input-group">';
							echo '<input type="checkbox" '.@$d_permissions["homes"].' name="homes"><b> '.@$h_home.' </b></input><br/>';
							echo '<input type="checkbox" '.@$d_permissions["receptionist"].' name="receptionist"><b> '.@$h_receptionist.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["visitors"].' name="visitors"><b> '.@$h_visitor.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["patients"].' name="patients"><b> '.@$h_patient.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["patients_add"].' name="patients_add"><i> '.@$p_create.' '.@$h_patient.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["patients_edit"].' name="patients_edit"><i> '.@$p_update.' '.@$h_patient.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["patients_delete"].' name="patients_delete"><i> '.@$p_delete.' '.@$h_patient.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["patients_view_patient_name"].' name="patients_view_patient_name"><i> '.@$p_view.' '.@$h_patient.' '.@$c_name.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["patients_detail"].' name="patients_detail"><i> '.@$p_view.' '.@$h_patient.' '.@$p_detail.' </i></input><br/>';
							echo '<input type="checkbox" '.@$d_permissions["clinicals"].' name="clinicals"><b> '.@$h_clinical.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["diagnostics"].' name="diagnostics"><b> '.@$h_diagnostic.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["diagnostics_add"].' name="diagnostics_add"><i> '.@$p_create.' '.@$h_diagnostic.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["diagnostics_edit"].' name="diagnostics_edit"><i> '.@$p_update.' '.@$h_diagnostic.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["diagnostics_delete"].' name="diagnostics_delete"><i> '.@$p_delete.' '.@$h_diagnostic.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["diagnostics_view_old"].' name="diagnostics_view_old"><i> '.@$p_view.' '.@$p_old.' '.@$h_diagnostic.' </i></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["ipds"].' name="ipds"><b> '.@$h_ipd.' </b></input><br/>';
							echo '<input type="checkbox" '.@$d_permissions["products_and_services"].' name="products_and_services"><b> '.@$h_product_and_service.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["products"].' name="products"><b> '.@$h_product.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["products_add"].' name="products_add"><i> '.@$p_create.' '.@$h_product.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["products_edit"].'  name="products_edit"><i> '.@$p_update.' '.@$h_product.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["products_delete"].' name="products_delete"><i> '.@$p_delete.' '.@$h_product.' </i></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["categories"].' name="categories"><b> '.@$h_category.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["categories_add"].' name="categories_add"><i> '.@$p_create.' '.@$h_category.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["categories_edit"].' name="categories_edit"><i> '.@$p_update.' '.@$h_category.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["categories_delete"].' name="categories_delete"><i> '.@$p_delete.' '.@$h_category.' </i></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["types"].' name="types"><b> '.@$h_type.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["types_add"].' name="types_add"><i> '.@$p_create.' '.@$h_type.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["types_edit"].' name="types_edit"><i> '.@$p_update.' '.@$h_type.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["types_delete"].' name="types_delete"><i> '.@$p_delete.' '.@$h_type.' </i></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["units"].' name="units"><b> '.@$h_unit.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["units_add"].' name="units_add"><i> '.@$p_create.' '.@$h_unit.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["units_edit"].' name="units_edit"><i> '.@$p_update.' '.@$h_unit.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["units_delete"].' name="units_delete"><i> '.@$p_delete.' '.@$h_unit.' </i></input><br/>';
							echo '<input type="checkbox" '.@$d_permissions["payments"].' name="payments"><b> '.@$h_payment.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["payments_edit"].' name="payments_edit"><b> '.@$p_update.' '.@$h_payment.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["payments_invoice"].' name="payments_invoice"><b> '.@$p_invoice.' '.@$h_payment.' </b></input><br/>';
							echo '<input type="checkbox" '.@$d_permissions["trashs"].' name="trashs"><b> '.@$h_trash.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["trashs_recover"].' name="trashes_recover"><b> '.@$p_recover.' '.@$h_trash.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["trashs_clean"].' name="trashes_clean"><b> '.@$p_clean.' '.@$h_trash.' </b></input><br/>';
							echo '<input type="checkbox" '.@$d_permissions["admins"].' name="admins"><b> '.@$h_admin.' </b></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["users"].' name="users"><b> '.@$h_user.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["users_add"].' name="users_add"><i> '.@$p_create.' '.@$h_user.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["users_edit"].' name="users_edit"><i> '.@$p_update.' '.@$h_user.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["users_delete"].' name="users_delete"><i> '.@$p_delete.' '.@$h_user.' </i></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["roles"].' name="roles"><b> '.@$h_role.' </b></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["roles_add"].' name="roles_add"><i> '.@$p_create.' '.@$h_role.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["roles_edit"].' name="roles_edit"><i> '.@$p_update.' '.@$h_role.' </i></input><br/>';
									echo '&emsp;&emsp;<input type="checkbox" '.@$d_permissions["roles_delete"].' name="roles_delete"><i> '.@$p_delete.' '.@$h_role.' </i></input><br/>';
								echo '&emsp;<input type="checkbox" '.@$d_permissions["hospital_configs"].'  name="hospital_configs"><b> '.@$h_hospital_config.' </b></input><br/>';
						echo '</div>';
					echo '</div>';
				}
			?>

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
