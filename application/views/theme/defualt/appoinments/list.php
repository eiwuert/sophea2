<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/appoinments">'.$h_appoinment.'</a>';?>
			<small id="title_name">/ <?php echo $list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
	    
		<div class="row" id="msgs" style="display: none;">
		    <div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Save Sucessfull!</h4>
		    </div>
		</div>		
		
		<div class="row" id="form_table">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
						<div class="col-sm-6"></div>
					</div>
					<!-- <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                  Doctor Name
                            </div>
                            <input type="text" name="doctor_name" id="doctorName" class="form-control">
                            <input type="text" name="doctor_id" id="doctorId" class="form-control">
                        </div>
                    </div> -->
                    <div class="box-tools pull-right" style="float:right;">
						<div class="input-group" style="width: 150px;">
							<input name="doctor_name" class="form-control input-sm pull-right" id="doctorName" placeholder="<?php echo $h_search;?>..." unit="text" autofocus>
                            <input type="hidden" name="doctor_id" id="doctorId" class="form-control">
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
					<!-- <div class="box-tools pull-right" style="float:right;">
						<div class="input-group" style="width: 150px;">
							<input name="search" class="form-control input-sm pull-right" id="p_search" onkeyup="getSearch();" placeholder="<?php echo $h_search;?>..." unit="text" autofocus>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div> -->
					<!-- <div class="box-tools pull-left">
						<a href="#" style="color: black;">
							<div class="input-group" style="width: 150px;">
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default" id="btn_create"><i class="fa fa-plus-circle"></i> <?php echo $create;?></button>
								</div>
							</div>
						</a>
					</div> --><br/><br/>
					<div class="row"><div class="col-sm-12">
					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr role="row">
												<th>No.</th>
												<th>Date</th>
												<th>Patient</th>
												<th>Phone</th>
												<th>Doctor</th>
												<th>Wards</th>
												<th></th>
											</tr>
										</thead>
										<tbody id="appoList"></tbody>
									</table>
									<div class="pull-left"><strong><?php echo @$c_total.' : '.@$totals;?></strong></div>
									
							
									<div id="wait" style="display:none;width:120px;height:120px;position:absolute;top:50%;left:50%;padding:0px;"><img src='<?php echo $resources?>img/demo_wait.gif' width="100" height="100" /><br><?php echo @$loading;?>... <br/></div>
								</div>
							</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>
<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
<script>   
    function getAppointmentList(idDoctor){
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });

        var htmlView = '';
        var i = 0;
        var stRow = '';

        $.post("<?php echo $base_url;?>index.php/appoinments/getappoinmentall",{idDoctor: idDoctor},
			function(data,status){
				i = 0;
            $.each(data, function(key,value) {
            	i++;
                htmlView += '<tr ' + stRow + '>';
                    htmlView += '<td>' + i + '</td>';
                    htmlView += '<td>' + value.appoitments_time + '</td>';
                    htmlView += '<td>' + value.patient_kh_name + '</td>';
                    htmlView += '<td>' + value.patient_phone + '</td>';
                    htmlView += '<td>' + value.name_user + '</td>';
                    htmlView += '<td>' + value.wards_desc + '</td>';
                    htmlView += '<td> ';
                    	htmlView += '<span title="Cancel"><i class="fa fa-external-link  action-btn danger" onclick="cancelApp('+value.appoitments_id+');"></i></span> &nbsp;&nbsp;';
                    	htmlView += '<span title="IPD"><i class="fa fa-info action-btn primary" onclick="goIpd('+value.visitors_id+');"></i></span> &nbsp;&nbsp;';
                    	htmlView += '<span title="OPD"><i class="fa fa-genderless action-btn primary" onclick="goOpd('+value.visitors_id+');"></i></span> &nbsp;&nbsp;';
  					htmlView += '</td> ';
                htmlView += '</tr>';
            });
                        
            $("#appoList").html(htmlView);
            
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }

    function cancelApp(wid){
    	$.post("<?php echo $base_url;?>index.php/appoinments/leaveAppo/"+wid,function(data,result){
    		getAppointmentList();
    	});
    }

    function goIpd(ipd){
    	$.post("<?php echo $base_url;?>index.php/appoinments/appIpd",function(data,result){
    		
    	});
    }
    function goOpd(opd){

    }

    $(document).ready(function(){
        getAppointmentList();	
        $( '#doctorName' ).keypress(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/appoinments/get_appoinment_by_name_json/"';?>;
		    var soc = String(url+dinput);		  
		    $( '#doctorName' ).autocomplete({source: soc});

		    if(event.keyCode == 13){	    	

			    if (dinput == ""){
	        		getAppointmentList();
			    }else{
				    $.post("<?php echo $base_url;?>index.php/appoinments/get_appoinment_json/"+dinput,function(data){
						$.each(data, function(key,value) {
							idDoctor = value.uid;
				    		$( '#doctorId' ).val(value.uid);
						});
						getAppointmentList(idDoctor);
				    });			    	
			    }
			}
	    });
    });
    
</script>