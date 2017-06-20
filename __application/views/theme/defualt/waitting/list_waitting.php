
    <link rel="stylesheet" href="http://localhost/emedirec_29/resources/theme/defualt/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/emedirec_29/resources/theme/defualt/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/emedirec_29/resources/theme/defualt/css/custom.css">
    <link rel="stylesheet" href="http://localhost/emedirec_29/resources/theme/defualt/css/font.css">
    <link rel="stylesheet" href="http://localhost/emedirec_29/resources/theme/defualt/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="http://localhost/emedirec_29/resources/theme/defualt/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="http://localhost/emedirec_29/resources/theme/defualt/css/jquery-ui.css">
    <script src="http://localhost/emedirec_29/resources/theme/defualt/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="http://localhost/emedirec_29/resources/theme/defualt/js/jquery-ui.min.js"></script>

<div class="content-wrapper" style="margin-left:0px">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>	
			<small id="title_name"><?php echo $list;?></small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">	    
		<div class="row">
			<div class="col-xs-12" id="form_row" style="display: none;">
				<div class="box" style="padding: 10px !important;">
						
						<br/>
							<!--Unit Name-->
						  	<div class="form-group">
								<div class="input-group">
								  <div class="input-group-addon">
									<?php echo $code;?>
								  </div>
								  <input type="text" name="waitting_code" id="waitting_code" class="form-control">
								  <input type="text" name="waitting_id" id="waitting_id" style="display:none;">
								</div>
						  	</div>
						  
						  	<!-- Desc -->
							<div class="form-group">
								<div class="input-group">
								  <div class="input-group-addon">
									<?php echo $examination;?>
								  </div>
								  <input type="text" name="waitting_examination" id="waitting_examination" class="form-control">
								</div>
							</div>

							<div class="form-group has-error">
							    <div class="input-group">
								  	<div class="input-group-addon">
								      	<?php echo @$visitor.' ID';?>
									</div>
										<?php echo form_dropdown('patient_id', @$drop_patient,'','class="form-control" id="patient_id"');?>
							    </div>
							</div>
							<div class="form-group has-error">
							      <div class="input-group">
										<div class="input-group-addon">
										      <?php echo $date;?>
										</div>
								  		<input type="text" name="waitting_date" id="waitting_date" class="form-control">
							      </div>
							</div>
						  						  
						  	<!-- Submit -->
							<div class="form-group">
								<div class="input-group">
								  <input type="submit" class="form-control btn-primary" id="submit_edit" value="<?php echo @$create;?>">
								</div>
							</div>
			</div><!-- /.box -->			  	
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<div class="row" id="form_table">
			<div class="col-xs-12">
				<div class="box">
						<div style="float:left;left: 210px;position: absolute;top: 20px;width:78px"/>
							<img style="width:100%" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/>
						</div>
							<center style="color:#2F3290 !important;font-size: 33px;position: relative;left: -30px;line-height: 3;">លេខរងចាំអនុញ្ញាតពិនិត្យជំងឺ</center>
						<div style="float:right;position: relative; color:#F17795 !important;font-size:18px"></div>
						<br/>							
						<div class="box-body">
							<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6"></div>
								</div>

										<div class="row">
											<div class="col-sm-12">
												<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
													<thead>
														<tr role="row">
															<th>លេខរងចាំ</th>
															<th>លេខកូដ អ្នកជំងឺ</th>
															<th>ឈ្មោះ</th>
															<th>ភេទ</th>
															<th>អាយុ</th>
															<th>ពិនិត្យផ្នែក</th>
															<th>ឈ្មោះ គ្រូពេទ្យ</th>
														</tr>
													</thead>
													<tbody id="typeList"></tbody>
												</table>
													
											</div>
										</div>
							</div>
						</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>

<script>

	$(function(){
		setInterval(function(){getTypeList();}, 10000);
	});

   	function getTypeList(){
        var htmlView = '';
        var i = 0;
        var stRow = '';
        $.post("<?php echo $base_url;?>index.php/waittings_list/get_waitting_screen_list",
			function(data,status){
            $.each(data, function(key,value) {    

            	var dob = new Date(value.patient_dob);
   				var year = dob.getFullYear();
   				var yearToday = <?php echo date("Y");?>;
   				var yearOld = (yearToday - year);

   				if(value.patient_gender == 'f'){
   					showGender = "ស្រី";
   				}else{
   					showGender = "ប្រុស";
   				}

                htmlView += '<tr ' + stRow + '>';
                    htmlView += '<td>' + value.waitting_code + '</td>';                   
                    htmlView += '<td>' + value.patient_code + '</td>';                   
                    htmlView += '<td>' + value.patient_kh_name + '</td>';                 
                    htmlView += '<td>' + showGender + '</td>';                  
                    htmlView += '<td>' + yearOld + '</td>';   
                    htmlView += '<td>' + value.wards_code + '</td>';                
                    htmlView += '<td>' + value.name + '</td>';                
                htmlView += '</tr>';
            });            
            $("#typeList").html(htmlView);
        });
    }
</script>
