<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/payments">'.$h_payment.'</a>';?>
			<small> <?php echo $t_list;?> </small>
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
					<div class="box-tools pull-right" style="float:right;">
						<form action="<?php echo $base_url;?>index.php/payments/index" method="post">
							<div class="input-group" style="width: 150px;">
								<input name="search" class="form-control input-sm pull-right" id="p_search" placeholder="<?php echo $h_search;?>..." unit="text" autofocus>
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div><br/><br/>
					<div class="row"><div class="col-sm-12">
					<?php //print_r($invoices_list);?>
					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr role="row">
												<th><?php echo $c_no;?></th>
												<th><?php echo $c_time;?></th>
												<th><?php echo $h_patient.' '.$c_code;?></th>
												<th><?php echo $h_patient.' '.$c_name;?></th>
												<th><?php echo $h_product;?></th>
												<th><?php echo $c_qty;?></th>
												<th><?php echo $c_price;?></th>
												<th><?php echo $c_amount;?></th>
												<th><?php echo $c_action;?></th>
											</tr>
										</thead>
										<tbody>
											<tr role="row" class="odd">
												<?php
													foreach($invoices_list as $rows){
														echo "<tr>";
	echo "<td>".$rows->invoices_id."</td>";
	echo "<td>".$rows->items_modified."</td>";
	echo "<td>".$rows->patient_code."</td>";
	echo "<td>".$rows->patient_kh_name." </td>";
	echo "<td>".$rows->products_name."</td>";
	echo "<td>".$rows->items_qty."</td>";
	echo "<td>".$rows->items_prices."$ </td>";
	echo "<td>".($rows->items_qty)*($rows->items_prices)."$ </td>";
	echo "<td class='align-center'>";
		echo " <a href='#'><i class='fa fa-edit action-btn primary'></i></a>";
		echo " <a href='#'><i class='fa fa-trash-o action-btn danger'></i></a>";
	echo "</td>";
														echo "</tr>";
													}

												?>
											</tr>
										</tbody>
									</table>
									<div class="pull-left"><strong><?php echo $h_total.' : '.$total;?></strong></div>
									<div class="pull-right pagination pagination-sm no-margin"><?php echo $pagination;?></div>
								</div>
							</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
