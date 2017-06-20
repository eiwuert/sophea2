		<!-- BEGIN PAGE -->
		<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							<?php echo $this->lang->line('employee');?>
						</h3>
						<ul class="breadcrumb">
							<li><a href="<?php echo $this->config->base_url();?>index.php/homes"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
							<li><a href="<?php echo $this->config->base_url();?>index.php/employees""><?php echo $this->lang->line('employee');?></a><span class="divider-last">&nbsp;</span></li>
							<li><a href="#"><?php echo $this->lang->line('view');?></a><span class="divider-last">&nbsp;</span></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
     
					<!-- BEGIN SQUARE STATISTIC BLOCKS-->
                    <div class="square-state">
                        <div class="row-fluid">
				<div class="widget">
				        <div class="widget-title">
				            <h4><i class="icon-reorder"></i><?php echo $this->lang->line('employee');?></h4>
				            
				        </div>
					<div class="widget-body">
						
					<?php
							foreach($emp as $rows){

										echo '<div style="padding-left:30px;">';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('name').'  </b></span> : '.$rows->name.'<hr/>';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('input_username').'  </b></span> : '.$rows->username.'<hr/>';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('input_password').'  </b></span> : {*****************}<hr/>';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('address').'  </b></span> : '.$rows->address.'<hr/>';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('phone').'  </b></span> : '.$rows->phone.'<hr/>';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('email').'  </b></span> : '.$rows->email.'<hr/>';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('languages').'  </b></span> : '.$rows->lang.'<hr/>';
										echo '<span class="col-sm-3 col-md-3 col-lg-2 control-label "><b>'.$this->lang->line('note').'  </b></span> : '.$rows->note.'<hr/>';
										echo '<div>';

							}
						//print_r($permissions);
						//echo $items;
						echo '<b>'.$this->lang->line('permission').':</b>';
						echo form_open('employees/set_permission');
							echo form_checkbox('items', 'accept', $items).$this->lang->line('item').'<br>';
								echo '&emsp;<i>'.form_checkbox('items_add', 'accept', $items_add).$this->lang->line('item_add').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('items_edit', 'accept', $items_edit).$this->lang->line('item_edit').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('items_delete', 'accept', $items_delete).$this->lang->line('item_delete').'</i><br>';
							echo form_checkbox('customers', 'accept', $customers).$this->lang->line('customer').'<br>';
								echo '&emsp;<i>'.form_checkbox('customers_add', 'accept', $customers_add).$this->lang->line('customer_add').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('customers_edit', 'accept', $customers_edit).$this->lang->line('customer_edit').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('customers_delete', 'accept', $customers_delete).$this->lang->line('customer_delete').'</i><br>';
							echo form_checkbox('deliveries', 'accept', $deliveries).$this->lang->line('delivery').'<br>';
							echo form_checkbox('ows', 'accept', $ows).$this->lang->line('ow').'<br>';
								echo '&emsp;<i>'.form_checkbox('ow_pay', 'accept', $ow_pay).'សង<br>';
							echo form_checkbox('suppliers', 'accept', $suppliers).$this->lang->line('supplier').'<br>';
								echo '&emsp;<i>'.form_checkbox('suppliers_add', 'accept', $suppliers_add).$this->lang->line('supplier_add').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('suppliers_edit', 'accept', $suppliers_edit).$this->lang->line('supplier_edit').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('suppliers_delete', 'accept', $suppliers_delete).$this->lang->line('supplier_delete').'</i><br>';
							echo form_checkbox('sales', 'accept', $sales).$this->lang->line('sale').'<br>';
							echo form_checkbox('employees', 'accept', $employees).$this->lang->line('employee').'<br>';
								echo '&emsp;<i>'.form_checkbox('employees_add', 'accept', $employees_add).$this->lang->line('employee_add').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('employees_edit', 'accept', $employees_edit).$this->lang->line('employee_edit').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('employees_delete', 'accept', $employees_delete).$this->lang->line('employee_delete').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('employees_view', 'accept', $employees_view).$this->lang->line('employee_view').'</i><br>';
								echo '&emsp;<i>'.form_checkbox('employees_permissions', 'accept', $employees_permissions).$this->lang->line('employee_permission').'</i><br>';
							echo form_checkbox('reports', 'accept', $reports).$this->lang->line('report').'<br>';
								echo '&emsp;<i>'.form_checkbox('del_sales', 'accept', $del_sales).'លប់​វិក័យ​ប័ត្រ<br>';
							echo form_checkbox('settings', 'accept', $settings).$this->lang->line('setting').'<br><br>';
							echo form_submit(array(
										'name'=>'submit',
										'id'=>'submit',
										'value'=>$this->lang->line('add'),
										'class'=>' btn btn-primary')
									);	
						echo form_close();

					?>
				</div>
                        </div>

                    </div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->




