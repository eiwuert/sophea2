<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>

<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/diagnostics">'.$h_diagnostic.'</a>';?>
			<small id="title_name">/ <?php echo $list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row" id="old_diagnostic_form" style="display:none;">
			<div class="col-xs-12">
				<div class="box" style="padding:10px !important;">
					<div class="box-body" id="old_dia_form">
						
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="diagnostic_form" style="display:none;">
			<div class="col-xs-12">
				<div class="box" style="padding:10px !important;">
					<div class="box-body" id="dia_form">
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" id="visitor_view_form" style="display:none;">
			<div class="col-xs-12">
				<div class="box" style="padding:10px !important;">
					<div class="box-body">
						<div class="col-sm-12" style="text-align:center;"><h4><b> <?php echo @$h_visitor;?> : (<span id="p_code"></span>) </b></h4></div>
					</div>
					
					<div class="box box-primary" style="padding:10px !important;">
						<div class="box-body">
							<div class="col-sm-4">
								<div class="box-header">
									<h3 class="box-title"><?php echo @$general;?></h3>
								</div>
								<p> <?php echo @$khName;?> : <span id="kh_name"></span></p>
								<p> <?php echo @$enName;?> : <span id="en_name"></span></p>
								<p> <?php echo @$gender;?> : <span id="v_gender"></span></p>
								<p> <?php echo @$status;?> : <span id="v_status"></span></p>
								<p> <?php echo @$dob;?> : <span id="v_dob"></span></p>
								<p> <?php echo @$occupation;?> : <span id="v_occupation"></span></p>
								<p> <?php echo @$phone;?> : <span id="v_phone"></span></p>
								<p> <?php echo @$emergencyPhone;?> : <span id="v_emergencyPhone"></span></p>
								<p> <?php echo @$address;?> : <span id="v_address"></span></p>
							</div>
							
							<div class="col-sm-6" style="padding-left:70px;">
								<div class="box-header">
									<h3 class="box-title"><?php echo @$contact;?></h3>
								</div>
								<p> <?php echo @$idCard;?> : <span id="v_idCard"></span></p>
								<p> <?php echo @$assuranceCard;?> : <span id="v_assuranceCard"></span></p>
								<p> <?php echo @$assuranceCompany;?> : <span id="v_assuranceCompany"></span></p>
								<p> <?php echo @$motorCard;?> : <span id="v_motorCard"></span></p>
								<p> <?php echo @$carCard;?> : <span id="v_carCard"></span></p>
								<p> <?php echo @$bankCard1;?> : <span id="v_bankCard1"></span></p>
								<p> <?php echo @$bankCard2;?> : <span id="v_bankCard2"></span></p>
								<p> <?php echo @$studentCard;?> : <span id="v_studentCard"></span></p>
							</div>
							
							<div class="col-sm-2">
								<div class="box-header">
									<h3 class="box-title"><?php echo @$disease;?></h3>
								</div>
								<p><?php echo @$heart;?> : <span id="v_heart"></span></p>
								<p><?php echo @$respiratory;?> : <span id="v_respiratory"></span></p>
								<p><?php echo @$diabetes;?> : <span id="v_diabetes"></span></p>
								<p><?php echo @$digestive;?> : <span id="v_digestive"></span></p>
								<p><?php echo @$kidney;?> : <span id="v_kidney"></span></p>
								<p><?php echo @$endocrine;?> : <span id="v_endocrine"></span></p>
								<p><?php echo @$neuro_sys;?> : <span id="v_neuro_sys"></span></p>
								<p><?php echo @$lung;?> : <span id="v_lung"></span></p>
								<p><?php echo @$allergyAndPenicillin;?> : <span id="v_aap"></span></p>
							</div>
							
						</div>
					</div>
                                    
                                        <div class="box box-primary" style="padding:10px !important;">
						<div class="box-body" id="bhistory">
                                                    
                                                </div>
                                        </div>
					
				</div>
			</div>
		</div>
		
		
		
		<div class="row" id="form_table">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
						<div class="col-sm-6"></div>
					</div>
					<div class="box-tools pull-right" style="float:right;">
						<div class="input-group" style="width: 150px;">
							<input name="search" class="form-control input-sm pull-right" id="p_search" onkeyup="getSearch();" placeholder="<?php echo $h_search;?>..." unit="text" autofocus>
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
					<div class="box-tools pull-left">
						<a href="#" style="color: black;">
							<div class="input-group" style="width: 150px;">
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default" id="btn_create"><i class="fa fa-plus-circle"></i> <?php echo $create;?></button>
								</div>
							</div>
						</a>
					</div><br/><br/>
					<div class="row"><div class="col-sm-12">
					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr role="row">
												<th><?php echo $code;?></th>
												<th><?php echo $name;?></th>
												<th><?php echo $enrolDate;?></th>
												<th><?php echo $visitorStatus;?></th>
												<th></th>
											</tr>
										</thead>
										<tbody id="opdList"></tbody>
									</table>
									<!--<div class="pull-left"><strong><?php echo @$c_total.' : '.@$totals;?></strong></div>
									<!-- Start Ppagination -->
									<!--<ul class="pagination pagination-sm no-margin pull-right">
										<li><span class="pg" id="pg0" onclick="pagination(`pg0`);">«</span></li>
										<li><span class="pg pg-active" id="pg1" onclick="pagination(`pg1`);">1</span></li>
										<li><span class="pg" id="pg2" onclick="pagination(`pg2`);">2</span></li>
										<li><span class="pg" id="pg3" onclick="pagination(`pg3`);">3</span></li>
										<li><span class="pg" id="pg4" onclick="pagination(`pg4`);">»</span></li>
									</ul>-->
									<!-- Stop Ppagination -->
                                                                        
                                                                        <div id="wait" style="display:none;width:120px;height:120px;position:absolute;top:50%;left:50%;padding:0px;"><img src='<?php echo $resources?>img/demo_wait.gif' width="100" height="100" /><br><?php echo @$loading;?>... <br/></div>
									
								</div>
							</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col -->			
			
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>

<style>
    .handOver {
	cursor: pointer; 
	cursor: hand;
    }
</style>
<script>
    var pageStartTop = '0';
    $(document).ready(function(){
        pagination();
    });
    
     function getSearch(){
        var e = event.keyCode;
        if(e == 13){
			var ids = "";
            //var vals = $(':focus').val();
            pageStart = 0;
            pagination(ids);
        }
    }
    
    $("#btn_create").click(function(){
		$('#form_row').css('display','block');
		$('#form_table').css('display','none');
		$('#title_name').html('/ Create');
	});
	
	//insert Data
    $("#submit_edit").click(function(){
		saveEdit();
	});
    
    function getOpdList(mySearch,pageStart,pageLimit){
        
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });
		var status = '';
        var htmlView = '';
        var i = 0;
        var stRow = '';
        $.post("<?php echo $base_url;?>index.php/diagnostics/get_opd_list",{
			search_data: mySearch,
			page_start: pageStart,
			page_limit: pageLimit
			},function(data,status){
            $.each(data, function(key,value) {
                htmlView += '<tr ' + stRow + '>';
                    htmlView += '<td>' + value.patient_code + '</td>';
                    htmlView += '<td>' + value.patient_kh_name + '</td>';
                    htmlView += '<td>' + value.visitors_in_date + '</td>';
                    if(value.visitors_status == '1'){
                            status = "Enrol";
                    }else{
                            status = "Stay";
                    }
                    htmlView += '<td>' + status + '</td>';
                    htmlView += '<td style="text-align:center;">';
                        htmlView +='<a href="<?php echo @$base_url;?>index.php/patients/photo/P' + value.patient_id + '" title="Photo" target="_blank"><i class="fa fa-picture-o action-btn primary"></i></a>&nbsp;&nbsp; ';
                        htmlView +='<span class="handOver" title="<?php echo @$leave;?>" onclick="addPrescription(' + value.visitors_id + ');"><i class="fa fa-stethoscope action-btn primary"></i></span>&nbsp;&nbsp; ';
                        htmlView +='<span class="handOver" title="<?php echo @$view;?>" onclick="viewVisitor(' + value.visitors_id	 + ');"><i class="fa fa-user-md  action-btn"></i></span>&nbsp;&nbsp; ';
                        htmlView +='<span class="handOver" title="<?php echo @$leave;?>" onclick="visitorLeave(' + value.visitors_id + ');"><i class="fa fa-external-link  action-btn danger"></i></span>';
                    htmlView += '</td>';
                htmlView += '</tr>';
            });
    
            $("#opdList").html(htmlView);
            
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }
    
    function saveEdit(){
		var icd10Id = $('#icd10_id').val();
		var icd10Code = $('#icd10_code').val();
		var icd10Desc = $('#icd10_desc').val();		
		$.post("<?php echo $base_url;?>index.php/icd10s/save_icd10",{
				icd10_id: icd10Id,
				icd10_code: icd10Code,
				icd10_desc: icd10Desc
			},function(data,status){
		
		});
		pagination();
		$('#form_row').css('display','none');
		$('#form_table').css('display','block');
	}
    //visitor Leave
    function visitorLeave(ids){
	$.post("<?php echo $base_url;?>index.php/visitors/visitor_leave/"+ids,{visitor_id: ids},function(data,status){pagination();}); 
		             
    }
    
    
    function viewWindow(htms){
            var myWindow = window.open("", "MsgWindow", "width=9000, height=7000");
            myWindow.document.open("text/html", "replace");
            myWindow.document.write(htms);
            myWindow.document.close();
    }
    
      
    /* Jquery Pagination */
    function pagination(ids){
		
		/* Past Variable from Controller [totalRecord, Item Per Page] */
		var totalRecord = <?php echo $totals;?>;
		var pageLimit = <?php echo $item_per_page;?>;
		
		var totalPage = Math.ceil(parseInt(totalRecord)/parseInt(pageLimit));
		
		//alert(totalPage);
		if(parseInt(totalRecord) > parseInt(pageLimit)){
			var atId = '';
			if(ids == null || ids == ''){
				ids = 'pg1';
			}else if(ids == 'pg0'){
				atId = $('#pg1').text();
				$('#pg1').text(parseInt(atId)-1);
				$('#pg2').text(atId);
				$('#pg3').text(parseInt(atId)+1);
			}else if(ids == 'pg4'){
				atId = $('#pg1').text();
				$('#pg1').text(parseInt(atId)+1);
				$('#pg2').text(parseInt(atId)+2);
				$('#pg3').text(parseInt(atId)+3);
			}else{
				atId = $("#"+ids+"").text();
				
				if((parseInt(totalPage) - parseInt(atId)) <= 2){
					if((parseInt(totalPage) - parseInt(atId)) == 2){
						$('#pg2').removeClass('pg-active');
						$('#pg3').removeClass('pg-active');
						$('#pg1').addClass('pg-active');
					}else if((parseInt(totalPage) - parseInt(atId)) == 1){
						$('#pg1').removeClass('pg-active');
						$('#pg3').removeClass('pg-active');
						$('#pg2').addClass('pg-active');
					}else if((parseInt(totalPage) - parseInt(atId)) == 0){
						$('#pg1').removeClass('pg-active');
						$('#pg2').removeClass('pg-active');
						$('#pg3').addClass('pg-active');				
					}else{
						atId = $("#"+ids+"").text();
					}
					
					$('#pg1').text(parseInt(totalPage) - 2);
					$('#pg2').text(parseInt(totalPage) - 1);
					$('#pg3').text(totalPage);
				}else{
					$('#pg1').text(atId);
					$('#pg2').text(parseInt(atId)+1);
					$('#pg3').text(parseInt(atId)+2);
				}
			}
			
			var pdno = $('.pg-active').text();
			if(parseInt(pdno) == 1){
				$('#pg0').css('display','none');
			}else if(parseInt(pdno) > 1){
				$('#pg0').css('display','block');
				
				if((parseInt(totalPage) - parseInt(pdno)) <= 2){
					$('#pg4').css('display','none');			
				}else{
					$('#pg4').css('display','block');
				}
			}
			if(parseInt(pageStartTop) > 0){
				var pageStart = 0;
			}else{
				var pageStart = (parseInt(pdno) - 1) * parseInt(pageLimit);
				pageStartTop = pageStart;
			}
			
		}else{
			$('#pg0').css('display','none');
			$('#pg1').css('display','none');
			$('#pg2').css('display','none');
			$('#pg3').css('display','none');
			$('#pg4').css('display','none');
		}
		var mySearch = $(':focus').val();;
		/*  Post 3 parameter [ strSearch, Start, Limit]*/
		getOpdList(mySearch,pageStart,pageLimit);
	}
	function addPrescription(ids){
		$.post("<?php echo $base_url;?>index.php/diagnostics/add/"+ids,function(data,status){
			$("#dia_form").html(data);
		});
		$("#form_table").css('display','none');
		$("#diagnostic_form").css('display','block');
		 
	}
        
        function getFormateDate(date) {
            var dt = date.split("-")
            var day = dt[2];
            var month = dt[1];
            var year = dt[0];
            
            
            var ages = ageCal(year);
            return day + '/' + month + '/' + year + '   (' + ages + ')';
        }
        
        function getFormateDateNoAge(date) {
            var dt = date.split("-")
            var day = dt[2].split(" ")[0];
            var month = dt[1];
            var year = dt[0];
            
            return day + '/' + month + '/' + year;
        }
        
        function ageCal(age){
	    var today = new Date();
	    var yyyy = today.getFullYear() - parseInt(age);
            
            return yyyy;
	}
        
        /* *********************   Function History *********************** */
        function viewVisitor(ids){
		 $.post("<?php echo $base_url;?>index.php/visitors/get_visitor_info_by_id_json/"+ids,
		 function(data,status){
			$.each(data, function(key,value) {
                                
				$('#p_code').html(value.patient_code);
				$('#kh_name').html(value.patient_kh_name);
				$('#en_name').html(value.patient_en_name);
				$('#v_address').html(value.patient_address);
				$('#v_phone').html(value.patient_phone);
				$('#v_emergencyPhone').html(value.patient_emergency_phone);
				$('#v_occupation').html(value.patient_occupation);
				$('#v_dob').html(getFormateDate(value.patient_dob));
				$('#v_idCard').html(value.patient_id_card);
				$('#v_assuranceCard').html(value.patient_assurance_card);
				$('#v_assuranceCompany').html(value.patient_assurance_company);
				$('#v_motorCard').html(value.patient_motor_card);
				$('#v_carCard').html(value.patient_car_card);
				
				$('#v_bankCard1').html(value.patient_bank_card1);
				$('#v_bankCard2').html(value.patient_bank_card2);
				$('#v_studentCard').html(value.patient_student_card);
				$('#v_assuranceCompany').html(value.patient_assurance_company);
				if(value.patient_gender == 'm'){
					$('#v_gender').html('Male');
				}else{
					$('#v_gender').html('Female');
				}
				
				if(value.patient_status == '1'){
					$('#v_status').html('Single');
				}else{
					$('#v_status').html('Married');
				}
				if(value.is_heart == '0'){
					$('#v_heart').html('No');
				}else{
					$('#v_heart').html('Yes');
				}
				if(value.is_respiratory == '0'){
					$('#v_respiratory').html('No');
				}else{
					$('#v_respiratory').html('Yes');
				}
				if(value.is_diabetes == '0'){
					$('#v_diabetes').html('No');
				}else{
					$('#v_diabetes').html('Yes');
				}
				if(value.is_digestive == '0'){
					$('#v_digestive').html('No');
				}else{
					$('#v_digestive').html('Yes');
				}
				if(value.is_kedney == '0'){
					$('#v_kidney').html('No');
				}else{
					$('#v_kidney').html('Yes');
				}
				if(value.is_endocrine == '0'){
					$('#v_endocrine').html('No');
				}else{
					$('#v_endocrine').html('Yes');
				}
				if(value.is_neuro_sys == '0'){
					$('#v_neuro_sys').html('No');
				}else{
					$('#v_neuro_sys').html('Yes');
				}
                                
                                var inDate = getFormateDateNoAge(value.visitors_in_date);
                                $('#bhistory').append(inDate+'<hr/>');
                                getDia(value.visitors_id);
                                getMedicine(value.visitors_id);
                                getService(value.visitors_id);
                                getNote(value.visitors_id)
			});
		 });
		 $('#visitor_view_form').css('display','block');
		 $('#form_table').css('display','none');
                 $('#form_row').css('display','none');
                 
        }
        
        
        function getDia(ids){
	    var i = 0;
            var htms = '<table id="tbl4" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="4" style="background: yellow;"> Diagnostic </td><tr style="background: #b9b9b5;"><td>Type</td><td>Diagnostic</td><td>Level</td><td>Description</td></tr></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_diagnostic_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    i = i + 1;

                    /******************* Diagnostic *******************/
                    if( i < 4){
                        htms += '<tr>';
                            htms += '<td class="textLeft">Diagnostic In ('+ i +')</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
                    }else{
                        htms += '<tr>';
                            htms += '<td class="textLeft">Diagnostic Out ('+ i +')</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
                    }
		});
                
                htms += '</table>';
                $('#bhistory').append(htms);
	    });
	}
        
        function getMedicine(ids){
	    var i = 0;
            var htmlView = '<table id="tbl5" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="8" style="background: yellow;"> Medicine </td><tr style="background: #b9b9b5;"><td>កាលបរិច្ឆេទ</td><td>ឈ្មោះថ្នាំ</td><td>ចំនួន</td><td>តំលៃ</td><td>ព្រឹក</td><td>ថ្ងៃ</td><td>ល្ងាច</td><td>យប់</td></tr></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_medicine_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    
		    i = i + 1;
                    
                    htmlView += '<tr class="bloom-row-2">';
                        htmlView += '<td  colspan="2" style="text-align:center !important;">Assign By</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_from+'</td>';
                        htmlView += '<td  colspan="2" style="text-align:center !important;">Assign To</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_to+'</td>';
                    htmlView += '</tr>';
                    
		    htmlView += '<tr>';
			htmlView += '<td  style="text-align:center !important;">'+$.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified))+'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')</td>';
			}else{
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')-['+value.forms_name+']</td>';
			}
			
			htmlView += '<td  style="text-align:center !important;">'+ value.units_name+'</td>';
			htmlView += '<td  style="text-align:center !important;">$'+value.items_prices+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_am+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_af+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_pm+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_nt+'</td>';
		    htmlView += '</tr>';
		    
		    if(value.items_time != '' || value.items_detail != ''){
			htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">ពេល៖</td>';
			    htmlView += '<td  colspan="6" style="text-align:center;">'+value.items_time+'</td>';
			htmlView += '</tr>';
                        htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">បរិយាយ៖</td>';
			    htmlView += '<td  colspan="6" style="text-align:center;">'+value.items_detail+'</td>';
			htmlView += '</tr>';
		    }
                    
                    if(value.forms_name == 'Erbium Yag Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="4">Pulse With Us</td>';
			    htmlView += '<td colspan="4">Energy mj</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="4">' + value.pulse_with_us + '</td>';
			    htmlView += '<td colspan="4">' + value.energy_mj + '</td>';
			htmlView += "</tr>";
		    }
		    
		});
		
                htmlView += "</table>";
		$('#bhistory').append(htmlView);
	    });
	}
        
        function getService(ids){
	    var i = 0;
            var htmlView = '<table id="tbl6" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="13" style="background: yellow;"> Service </td></tr><tr style="background: #b9b9b5;"><td colspan="2">កាលបរិច្ឆេទ</td><td colspan="3">ឈ្មោះសេវាកម្ម</td><td colspan="2">តំលៃ</td><td colspan="2">បញ្ចុះ</td><td colspan="2">ចំនួន</td><td colspan="2">សរុប</td></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_service_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    
		    i = i + 1;

		    htmlView += '<tr class="bloom-row-2">';
                        htmlView += '<td  colspan="3" style="text-align:center !important;">Assign By</td>';
                        htmlView += '<td  colspan="3" style="text-align:center;">'+value.assign_from+'</td>';
                        htmlView += '<td  colspan="3" style="text-align:center !important;">Assign To</td>';
                        htmlView += '<td  colspan="4" style="text-align:center;">'+value.assign_to+'</td>';
                    htmlView += '</tr>';
                    
		    htmlView += "<tr>";
			htmlView += '<td colspan="2">'+ $.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified)) +'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    htmlView += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ') </td>';
			}else{
			    htmlView += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ')-[' + value.forms_name + '] </td>';
			}
			htmlView += '<td colspan="2">$'+ value.items_prices +' </td>';
			htmlView += '<td>$'+ value.items_discount +'</td>';
                        htmlView += '<td colspan="3">'+ value.items_qty +' '+ value.units_name + ' </td>';
                        var amountPrice = (parseFloat(value.items_qty) * parseFloat(value.items_prices)) - parseFloat(value.items_discount);
			htmlView += '<td colspan="2">$'+ amountPrice.toFixed(2) +'</td>';
		    htmlView += "</tr>";
		    
		    htmlView += "<tr><td colspan='5'>Descrition</td><td colspan='9'>"+ value.items_detail +"</td></tr>";
		    
		    if(value.forms_name == 'Q-Switch Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Lens</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="3">Pulse Length</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Spot Size</td>';
			    htmlView += '<td colspan="2">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.lens + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="3">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.spot_size + '</td>';
			    htmlView += '<td colspan="2">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }else if(value.forms_name == 'CPL Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Cut Off Filter</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Pulse Train</td>';
			    htmlView += '<td colspan="2">Pause Length</td>';
			    htmlView += '<td colspan="2">Pulse Length</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="1">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.cut_off_filter + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.pulse_train + '</td>';
			    htmlView += '<td colspan="2">' + value.pause_length + '</td>';
			    htmlView += '<td colspan="2">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="1">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }else if(value.forms_name == 'Diode Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Fitzpatrik</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="3">Pulse Length</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Mode</td>';
			    htmlView += '<td colspan="2">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="3">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.mode + '</td>';
			    htmlView += '<td colspan="2">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }else if(value.forms_name == 'Anti Aging Treatment'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">Fitzpartrik</td>';
			    htmlView += '<td colspan="2">Fluence</td>';
			    htmlView += '<td colspan="3">Pulse Length</td>';
			    htmlView += '<td colspan="2">Frequency</td>';
			    htmlView += '<td colspan="2">Mode</td>';
			    htmlView += '<td colspan="2">Treat</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    htmlView += '<td colspan="2">' + value.fluence + '</td>';
			    htmlView += '<td colspan="3">' + value.pulse_length + '</td>';
			    htmlView += '<td colspan="2">' + value.frequency + '</td>';
			    htmlView += '<td colspan="2">' + value.mode + '</td>';
			    htmlView += '<td colspan="2">' + value.no_of_treal + '</td>';
			htmlView += "</tr>";
		    }
		});
                
                htmlView += "</table>";
                $('#bhistory').append(htmlView);
	    });
	}
        
        function getNote(ids){
	    var i = 0;
	    var htmlView = '<table id="tbl7" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info"><tr><td colspan="2" style="background: yellow;"> Note </td></tr>';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_note_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    htmlView += '<tr>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_date+'</td>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_detail+'</td>';
		    htmlView += '</tr>';
		});
		
                htmlView += "</table>";
                $('#bhistory').append(htmlView);
	    });
	}
    
</script>
