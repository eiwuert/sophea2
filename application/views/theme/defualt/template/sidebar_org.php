		<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				
			<?php
				//if(@$per_receptionist == '1'){
					echo '<li class="'.@$ac_patients.@$ac_viewall.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user"></i> <span> '.@$h_receptionist.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if(@$per_patients == '1' || @$per_visitors == '1'){
							echo '<ul class="treeview-menu">';
								//if($per_patients == '1'){
									echo '<li class="'.@$ac_patients.'">';
										echo '<a href="'.$base_url.'index.php/patients"><i class="fa fa-circle-o text-aqua"></i> '.@$h_patient.' </a>';
									echo '</li>';
								//}
								//if($per_visitors == '1'){
									echo '<li class="'.@$ac_viewall.'">';
										echo '<a href="'.$base_url.'index.php/patients/visited"><i class="fa fa-circle-o text-aqua"></i> View All </a>';
									echo '</li>';
								//}
							echo '</ul>';
						//}
					echo '</li>';
				//}
				//if(@$per_clinicals == '1'){
					echo '<li class="'.@$ac_diagnostics.@$ac_ipds.@$ac_visitors.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_clinical.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($per_visitors == '1' || $per_diagnostics == '1' || $per_ipds == '1'){
							echo '<ul class="treeview-menu">';
								echo '<li class="'.@$ac_visitors.'">';
									echo '<a href="'.$base_url.'index.php/visitors"><i class="fa fa-circle-o text-aqua"></i> '.@$h_visitor.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_diagnostics.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics"><i class="fa fa-circle-o text-aqua"></i> '.@$h_diagnostic.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_ipds.'">';
									echo '<a href="'.$base_url.'index.php/ipds"><i class="fa fa-circle-o text-aqua"></i> '.@$h_ipd.' </a>';
								echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}
				//if(@$per_products_and_services == '1'){
					echo '<li class=" '.@$ac_categories.@$ac_types.@$ac_products.@$ac_units.@$ac_icd10s.@$ac_wards.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-tags"></i> <span>'.@$h_product_and_service.'</span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						echo '<ul class="treeview-menu">';
							echo '<li class="'.@$ac_products.'">';
								echo '<a href="'.$base_url.'index.php/products"><i class="fa fa-circle-o text-aqua"></i> '.@$h_product.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_categories.'">';
								echo '<a href="'.$base_url.'index.php/categories"><i class="fa fa-circle-o text-aqua"></i> '.@$h_category.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_types.'">';
								echo '<a href="'.$base_url.'index.php/types"><i class="fa fa-circle-o text-aqua"></i> '.@$h_type.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_units.'">';
								echo '<a href="'.$base_url.'index.php/units"><i class="fa fa-circle-o text-aqua"></i> '.@$h_unit.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_icd10s.'">';
								echo '<a href="'.$base_url.'index.php/icd10s"><i class="fa fa-circle-o text-aqua"></i> '.@$h_icd10.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_wards.'">';
								echo '<a href="'.$base_url.'index.php/wards"><i class="fa fa-circle-o text-aqua"></i> '.@$h_ward.' </a>';
							echo '</li>';
						echo '</ul>';
					echo '</li>';
				//}
				//if(@$per_payments == '1'){
					echo '<li class=" '.@$ac_payments.' treeview">';
						echo '<a href="'.$base_url.'index.php/pharmacies">';
							echo '<i class="fa fa-opencart"></i> <span> '.@$h_payment.' </span>';
						echo '</a>';
					echo '</li>';
				//}
				//if($per_reports == 'true'){
					echo '<li class="'.@$ac_reports.' treeview">';
						echo '<a href="'.$base_url.'index.php/reports">';
							echo '<i class="fa fa-hospital-o"></i> <span>'.@$h_report.'</span>';
						echo '</a>';
					echo '</li>';
				//}
				//if(@$per_trashs == '1'){
					echo '<li class="'.@$ac_trashs.' treeview">';
						echo '<a href="'.$base_url.'index.php/trashs">';
							echo '<i class="fa fa-trash-o"></i> <span>'.@$h_trash.'</span>';
						echo '</a>';
					echo '</li>';
				//}
				//if(@$per_admins == '1'){
					echo '<li class="'.@$ac_users.@$ac_roles.@$ac_settings.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-cog"></i> <span>'.@$h_admin.'</span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						echo '<ul class="treeview-menu">';
							echo '<li class="'.@$ac_users.'">';
								echo '<a href="'.$base_url.'index.php/users"><i class="fa fa-circle-o text-aqua"></i> '.@$h_user.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_roles.'">';
								echo '<a href="'.$base_url.'index.php/roles"><i class="fa fa-circle-o text-aqua"></i> '.@$h_role.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_settings.'">';
								echo '<a href="'.$base_url.'index.php/settings"><i class="fa fa-circle-o text-red"></i> '.@$h_hospital_config.' </a>';
							echo '</li>';
						echo '</ul>';
					echo '</li>';
				//}
			?>
				<!--<li class="header">LABELS</li>
				<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
			  </ul>
			</section>
			<!-- /.sidebar -->
		  </aside>
