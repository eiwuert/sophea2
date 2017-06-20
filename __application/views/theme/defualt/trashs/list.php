<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/patients">'.@$p_patient.''.'</a>';?>
			<small> <?php if(@$code != null || @$code != ''){@$p_list .= ' ('.@$code.')';} echo @$p_list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
				<div class="col-md-6">
					<div class="box box-danger">
						<div class="box-header">
							<div class="pull-left">
								<span class="box-title"><?php echo @$h_patient;?></span>
							</div>
							<div class="pull-right">
								<span  class="box-title">
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_clean_all;?>
										</button>
									</a>
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_recover_all;?>
										</button>
									</a>
								</span>
							</div>
						</div>
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th><?php echo @$c_code;?></th>
										<th><?php echo @$c_name;?></th>
										<th><?php echo @$c_action;?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($patientss as $rows){
											echo '<tr role="row" class="odd">';
												echo '<td>'.$rows->patient_code.'</td>';
												echo '<td>'.$rows->patient_name.'</td>';
												echo '<td width="150">';
													echo '<button class="btn btn-sm btn-warning pull-right">'.$d_clean.'</button> ';
													echo ' <button class="btn btn-sm btn-primary pull-right">'.$d_recover.'</button>';
												echo'</td>';
											echo '</tr>';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="box box-primary">
						<div class="box-header">
							<div class="pull-left">
								<span class="box-title"><?php echo @$h_product;?></span>
							</div>
							<div class="pull-right">
								<span  class="box-title">
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_clean_all;?>
										</button>
									</a>
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_recover_all;?>
										</button>
									</a>
								</span>
							</div>
						</div>
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th><?php echo @$c_code;?></th>
										<th><?php echo @$c_name;?></th>
										<th><?php echo @$c_action;?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($productss as $rows){
											echo '<tr role="row" class="odd">';
												echo '<td>'.$rows->product_code.'</td>';
												echo '<td>'.$rows->product_name.'</td>';
												echo '<td width="150">';
													echo '<button class="btn btn-sm btn-warning pull-right">'.$d_clean.'</button> ';
													echo ' <button class="btn btn-sm btn-primary pull-right">'.$d_recover.'</button>';
												echo'</td>';
											echo '</tr>';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header">
							<div class="pull-left">
								<span class="box-title"><?php echo @$h_category;?></span>
							</div>
							<div class="pull-right">
								<span  class="box-title">
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_clean_all;?>
										</button>
									</a>
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_recover_all;?>
										</button>
									</a>
								</span>
							</div>
						</div>
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th><?php echo @$c_name;?></th>
										<th><?php echo @$c_action;?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($categoriess as $rows){
											echo '<tr role="row" class="odd">';
												echo '<td>'.$rows->categories_name.'</td>';
												echo '<td width="150">';
													echo '<button class="btn btn-sm btn-warning pull-right">'.$d_clean.'</button> ';
													echo ' <button class="btn btn-sm btn-primary pull-right">'.$d_recover.'</button>';
												echo'</td>';
											echo '</tr>';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="box box-warning">
						<div class="box-header">
							<div class="pull-left">
								<span class="box-title"><?php echo @$h_type;?></span>
							</div>
							<div class="pull-right">
								<span  class="box-title">
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_clean_all;?>
										</button>
									</a>
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_recover_all;?>
										</button>
									</a>
								</span>
							</div>
						</div>
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th><?php echo @$c_name;?></th>
										<th><?php echo @$c_action;?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($typess as $rows){
											echo '<tr role="row" class="odd">';
												echo '<td>'.$rows->types_name.'</td>';
												echo '<td width="150">';
													echo '<button class="btn btn-sm btn-warning pull-right">'.$d_clean.'</button> ';
													echo ' <button class="btn btn-sm btn-primary pull-right">'.$d_recover.'</button>';
												echo'</td>';
											echo '</tr>';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="box box-info">
						<div class="box-header">
							<div class="pull-left">
								<span class="box-title"><?php echo @$h_unit;?></span>
							</div>
							<div class="pull-right">
								<span  class="box-title">
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_clean_all;?>
										</button>
									</a>
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_recover_all;?>
										</button>
									</a>
								</span>
							</div>
						</div>
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th><?php echo @$c_name;?></th>
										<th><?php echo @$c_action;?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($unitss as $rows){
											echo '<tr role="row" class="odd">';
												echo '<td>'.$rows->units_name.'</td>';
												echo '<td width="150">';
													echo '<button class="btn btn-sm btn-warning pull-right">'.$d_clean.'</button> ';
													echo ' <button class="btn btn-sm btn-primary pull-right">'.$d_recover.'</button>';
												echo'</td>';
											echo '</tr>';
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="box box-primary">
						<div class="box-header">
							<div class="pull-left">
								<span class="box-title"><?php echo @$h_user;?></span>
							</div>
							<div class="pull-right">
								<span  class="box-title">
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_clean_all;?>
										</button>
									</a>
									<a href="#">
										<button class="btn btn-sm btn-default">
											<i class="fa fa-plus-circle"></i> <?php echo $d_recover_all;?>
										</button>
									</a>
								</span>
							</div>
						</div>
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th><?php echo @$c_name;?></th>
										<th><?php echo @$c_action;?></th>
									</tr>
								</thead>
								<tbody>
									<tr role="row" class="odd">
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

		</div>
	</div>
	</div>
	</section><!-- /.content -->
</div>
