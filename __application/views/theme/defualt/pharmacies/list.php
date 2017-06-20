<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/pharmacies">'.$h_payment.'</a>';?>
			<small id="title_name">/ <?php echo $list;?> </small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		
	    <div class="row" id="pharm_row">
		<div class="box-body">
		    <div class="box-group" id="accordion">
		      <div class="panel box box-default">
			<div class="box-header with-border bg-green align-center">
			  <h3 class="align-center box-title">
			      Pharmacy
			  </h3>
			</div>
			<div class="panel-collapse collapse in">
			  <div class="box-body">
				<div class="form-group has-error" id="searchPatient">
				    <label class="control-label" id="errMsg" for="inputError"><i class="fa fa-times-circle-o"></i> No Patient </label>
				    <div class="input-group">
				      <div class="input-group-addon">
					    <?php echo @$h_visitor;?>
				      </div>
					<input type="text" name="pharm_patient" id="pharm_patient" class="form-control" onkeyup="autoPatient();">
				    </div>
				</div>
				<table class="table">
				    <thead>
					<tr>
					    <th width="15%"></th>
					    <th width="10%">លេខ</th>
					    <th width="20%">ថ្នាំ</th>
					    <th width="10%">ចំនួន</th>
					    <th width="15%">តម្លៃ</th>
					    <th width="15%">បញ្ចុះតម្លៃ</th>
					    <th width="15%">សរុប</th>

					</tr>
				    </thead>
				    <tbody id="pharm_his"></tbody>
				</table>
			  </div>
			</div>
		      </div>
		    </div>
		</div>
	    </div>
	    
	    <div class="row" id="form_row">
		<div class="box-body">
		    <div class="box-group" id="accordion">
		      <div class="panel box box-default">
			<div class="box-header with-border bg-green align-center">
			  <h3 class="align-center box-title">
			      Payment Form
			  </h3>
			</div>
			<div class="panel-collapse collapse in">
			  <div class="box-body">
				<!--Payment Discount-->
				<div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon">
					    Total
				      </div>
					<input type="text" id="totalAmount" class="form-control" disabled="disabled">
				    </div>
				</div>

				<!--Payment Amoount-->
				<div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon">
					    Discount
				      </div>
					<input type="text" name="discount_amount" id="discount_amount" value="0" class="form-control" onkeyup="totalCal();">
				    </div>
				</div>
                                
                                <!--Payment Amoount-->
				<div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon">
					    Amount
				      </div>
					<input type="text" name="payment_amount" id="payment_amount" value="0" class="form-control" onkeyup="totalCal();">
				    </div>
				</div>

				<!--Payment Amoount-->
				<div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon">
					    Remain
				      </div>
				      <input type="text" name="remain_amount" id="remain_amount" value="0" class="form-control" disabled="disabled">
				    </div>
				</div>

				<!-- Payment Description -->
				<div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon">
					    Description
				      </div>
				      <textarea name="payment_desc" id="payment_desc" class="form-control" rows="7"></textarea>
				    </div>
				</div>

				<!-- Submit -->
				<div class="form-group">
				    <div class="input-group">
					<input type="submit" class="form-control btn-primary" id="submit_edit" value="<?php echo @$create;?>" onclick="paid();">
				    </div>
				</div>
			  </div>
			</div>
		      </div>
		    </div>
		</div>
	    
		<div class="box-body">
		    <div class="box-group" id="accordion">
		      <div class="panel box box-default">
			<div class="box-header with-border bg-green align-center">
			  <h3 class="align-center box-title">
			      Payment History
			  </h3>
			</div>
			<div class="panel-collapse collapse in">
			  <div class="box-body">
				<table class="table">
				    <thead>
					<tr>
					    <th width="15%">លេខ</th>
					    <th width="25%">ថ្ងៃបង់</th>
                                            <th width="10%">បញ្ចុះ($)</th>
					    <th width="20%">ចំនួនបង់($)</th>
					    <th width="30%">ពណ៌នា</th>

					</tr>
				    </thead>
				    <tbody id="pay_his"></tbody>
				</table>
			  </div>
			</div>
		      </div>
		    </div>
		</div>
		
		<div class="box-body">
		    <div class="box-group" id="accordion">
		      <div class="panel box box-default">
			<div class="box-header with-border bg-green align-center">
			  <h3 class="align-center box-title">
			      Medicine List
			  </h3>
			</div>
			<div class="panel-collapse collapse in">
			  <div class="box-body">
				<table class="table">
				    <thead>
					<tr>
					    <th width="10%"></th>
					    <th width="5%">លេខ</th>
					    <th width="25%">ឈ្មោះថ្មាំ</th>
					    <th width="27%">ពណ៌នា</th>
					    <th width="10%">ចំនួន</th>
                                            <th width="10%">បញ្ចុះ</th>
					    <th width="15%">តម្លៃ</th>
					</tr>
				    </thead>
				    <tbody id="m_med"></tbody>
				</table>
			  </div>
			</div>
		      </div>
		    </div>
		</div>
		
		<div class="box-body">
		    <div class="box-group" id="accordion">
		      <div class="panel box box-default">
			<div class="box-header with-border bg-green align-center">
			  <h3 class="align-center box-title">
			      Service List
			  </h3>
			</div>
			<div class="panel-collapse collapse in">
			  <div class="box-body">
                                <button  class="form-control btn-primary btn-primary" id="inButtonPrint" style="width: 30%;"> <i class="fa fa-print"></i> Print </button>
				<table class="table">
				    <thead>
					<tr>
					    <th width="10%"></th>
					    <th width="5%">លេខ</th>
					    <th width="25%">សេវា</th>
					    <th width="37%">ពណ៌នា</th>
                                            <th width="10%">បញ្ចុះ</th>
					    <th width="13%">តម្លៃ</th>
					</tr>
				    </thead>
				    <tbody id="m_ser"></tbody>
				</table>
			  </div>
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
								    <button class="btn btn-sm btn-default" id="btn_create"><i class="fa fa-plus-circle"></i> Pharmacy</button>
							    </div>
						    </div>
					    </a>
				    </div><br/><br/>
				    <div class="row"><div class="col-sm-12">
				    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
					    <thead>
						    <tr role="row">
							<th style="width: 20%;"><?php echo $code;?></th>
							<th style="width: 30%;"><?php echo $name;?></th>
							<th style="width: 20%;"><?php echo $enrolDate;?></th>
							<th style="width: 10%;"><?php echo $visitorStatus;?></th>
							<th style="width: 20%;"></th>
						    </tr>
					    </thead>
					    <tbody id="icd10List"></tbody>
				    </table>
								    <!--<div class="pull-left"><strong><?php echo @$c_total.' : '.@$total;?></strong></div>

								    <div id="wait" style="display:none;width:120px;height:120px;position:absolute;top:50%;left:50%;padding:0px;"><img src='<?php echo $resources?>img/demo_wait.gif' width="100" height="100" /><br><?php echo @$loading;?>... <br/></div>
							    </div>
						    </div>
				    </div><!-- /.box-body -->
			    </div><!-- /.box -->

		    </div><!-- /.col -->			

	    </div><!-- /.row -->
	</section><!-- /.content -->
</div>

<style type="text/css">
    .myTopBorder{
	border-top: solid 3px #000 !important;
    }
    .myBold{
	font-weight: bold !important;
    }
    .myCenter{
	text-align: center !important;
    }
    .myRight{
	text-align: right !important;
    }
    .myLeft{
	text-align: left !important;
    }

    .fleft{
	float: left !important;
    }
    .fright{
	float: right !important;
    }
    
    body{
	font-family: 'Kantumruy' !important;
	color: black !important;
    }
    .handOver {
	cursor: pointer; 
	cursor: hand;
    }
    
</style>
	
<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
<script>
    var pageStartTop = '0';
    var visitId = '';
    var mainTotal = 0;
    var mainPaid = 0;
    var patientId = "";
    var discount = 0;
    $(document).ready(function(){
	$('#searchPatient').removeClass("has-error");
	$('#errMsg').css("display","none");
	$('#pharm_row').css('display','none');
	$('#form_row').css('display','none');
	$('#form_table').css('display','block');
        getVisitorList();
        
        $('#inButtonPrint').click(function() {
            printInvoice(visitId);
        });
    });
    
     function getSearch(){
        var e = event.keyCode;
        if(e == 13){
            var ids = "";
            var vals = $(':focus').val();
            addPatient(vals.split("=")[0]);
        }
    }
    
    $("#btn_create").click(function(){
	    $('#pharm_row').css('display','block');
	    $('#form_row').css('display','none');
	    $('#form_table').css('display','none');
    });

    function autoMedicine(){
	var dinput = $( 'input:focus' ).val();
	var url = <?php echo '"'.$base_url.'index.php/products/product_auto_complete/"';?>;
	var soc = String(url+dinput);
	$( 'input:focus' ).autocomplete({source: soc});
	var res = $( 'input:focus' ).val().split("-");
	if(event.keyCode == 13){
	    /*alert(res[1]);*/
	    $( '#mQty' ).val('1');
	    $( '#mPrice' ).val(res[3]);
	}
    }
    
    function autoPatient(){
	var dinput = $( 'input:focus' ).val();
	var url = <?php echo '"'.$base_url.'index.php/patients/patient_auto_complete/"';?>;
	var soc = String(url+dinput);
	$( 'input:focus' ).autocomplete({source: soc});
	var res = $( 'input:focus' ).val().split("=");
	if(event.keyCode == 13){
	    var ids = '';
	    $.post("<?php echo $base_url;?>index.php/patients/get_patient_id_by_code/" + res[0],function (data){
		if(parseInt(data) > 0){
		    patientId = data.toString();
		    $.post("<?php echo $base_url;?>index.php/patients/patient_pharm/" + data);
		    addPatient(data);
		    addMedicine();
		    $('#searchPatient').removeClass("has-error");
		    $('#errMsg').css("display","none");
		}else{
		    $('#searchPatient').addClass("has-error");
		    $('#errMsg').css("display","block");
		}
	    });
	}
    }
    
    function addPatient(code){
	$.post("<?php echo $base_url;?>index.php/visitors/get_visitor_id_by_patient_json/" + code,function (data){
	    visitId = data.toString();
	    $.post("<?php echo $base_url;?>index.php/visitors/visitor_leave/" + data);
	});
    }

    function getMedicine(vid){
	var i = 0;
	var htmlView = '';
	$.post("<?php echo $base_url;?>index.php/diagnostics/get_medicine_list/"+vid,function (data,status){
	    $.each(data, function(key,value) {
		i = i + 1;
		htmlView = '<span class="handOver" title="<?php echo @$delete;?>" onclick="deleteMedicine('+ value.service_items_id +');"><i class="fa fa-trash action-btn danger"></i></span>';
		var totalss =(parseFloat(value.items_qty)*parseFloat(value.items_prices)) - parseFloat(value.items_discount);
		startTrTd();
		    setTd(htmlView);
		    setTd(i);
		    setTd(value.products_name);
		    setTd(value.items_qty);
		    setTd(value.items_prices);
		    setTd(value.items_discount);
		    setTd(totalss);
		stopTrTd();
	    });
	    viewRows("pharm_his");
	    addMedicine();
	});
    }

    function addMedicine(){
	    var htmlView = '<tr>';
		htmlView += '<td  colspan="3" style="text-align:center;"><input type="text" id="m_medicine" style="text-align:center;" class="form-control" onkeyup="autoMedicine();"></td>';
		htmlView += '<td style="text-align:center;"><input type="text" id="mQty" value=""  style="text-align:center;" class="form-control"></td>';
		htmlView += '<td style="text-align:center;"><input type="text" id="mPrice" value=""  style="text-align:center;" class="form-control"></td>';
		htmlView += '<td style="text-align:center;"><input type="text" id="mDiscount" value="0"  style="text-align:center;" class="form-control"></td>';
		htmlView += '<td style="text-align:center;">';
			htmlView += '<span class="handOver" onclick="saveData();"><i class="fa fa-save action-btn primary"></i></span>';
		htmlView += '</td></tr>';

	    $('#pharm_his').append(htmlView);
    }
    
    function saveData(){
	    var v1 = $('#m_medicine').val();
	    var v2 = $('#mQty').val();
	    var v3 = $('#mPrice').val();
	    var dic = $('#mDiscount').val();

	    $.post("<?php echo $base_url;?>index.php/diagnostics/add_medicine/" + visitId,{
		medicines: v1,
		qty: v2,
		price: v3,
		discount: dic,
                amm: '1',
                afm: '1',
                pmm: '1',
                ntm: '1',
                order_no: '1'
	    },function(data, status) {
		$('#md_id').html('');
		getMedicine(visitId);
	    });

    }

    function getVisitorList(mySearch){
        
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });
	var status = '';
        var htmlView = '';
        var i = 0;
        var stRow = '';
        $.post("<?php echo $base_url;?>index.php/visitors/pharmacy_get_visitor_list",{
	    search_data: mySearch
	    },function(data,status){
		$.each(data, function(key,value) {
		    htmlView += '<tr ' + stRow + '>';
			htmlView += '<td>' + value.patient_code + '</td>';
			htmlView += '<td>' + value.patient_kh_name + '</td>';
			htmlView += '<td>' + value.register_date + '</td>';
			if(value.visitors_status == '1'){
				status = "Enrol";
			}else if(value.visitors_status == '2'){
				status = "Stay";
			}else{
				status = "Leave";
			}
			htmlView += '<td>' + status + '</td>';
			htmlView += '<td style="text-align:center;">';
			    htmlView +='<span class="handOver" onclick="payInvoice(' + value.visitors_id + ');"><i class="fa fa-money action-btn primary"></i></span>&nbsp;&nbsp;&nbsp;';
			    htmlView +='<span class="handOver" onclick="printInvoice(' + value.visitors_id + ');"><i class="fa fa-print action-btn primary"></i></span>&nbsp;&nbsp;&nbsp;';
			    htmlView +='<span class="handOver" title="<?php echo @$view;?>" onclick="viewVisitor(' + value.patient_id	 + ');"><i class="fa fa-user-md  action-btn"></i></span>&nbsp;&nbsp;&nbsp;';
                            htmlView +='<span class="handOver" title="<?php echo @$leave;?>" onclick="visitorLeave(' + value.visitors_id + ');"><i class="fa fa-external-link  action-btn danger"></i></span>';
			htmlView += '</td>';
		    htmlView += '</tr>';
		});
    
		$("#icd10List").html(htmlView);
		
		$(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }
    
    //visitor Leave
    function visitorLeave(ids){
	$.post("<?php echo $base_url;?>index.php/visitors/visitor_leave/"+ids,{visitor_id: ids},function(data,status){getVisitorList();}); 
		             
    }
    
    function loadPayHis(){
	var htmlView = '';
	var i = 0;
	var hpaid = 0;
	$.post("<?php echo $base_url;?>index.php/pharmacies/get_visitor_payment_history/"+visitId,function(data){
		$.each(data, function(key,value) {
                    var paidAmount = 0;
                    if(!isNaN(value.payments_amount)){
                        paidAmount = value.payments_amount;
                    }
                    
                    discount = parseFloat(discount) + parseFloat(value.payments_discount);
                    
		    hpaid = parseFloat(hpaid) + (parseFloat(paidAmount)- parseFloat(value.payments_discount));
		    i = i + 1;
		    htmlView += '<tr>';
			htmlView += '<td>' + i + '</td>';
			htmlView += '<td>' + value.payments_date + '</td>';
                        htmlView += '<td>' + value.payments_discount + '</td>';
			htmlView += '<td>' + value.payments_amount + '</td>';
			htmlView += '<td>' + value.payments_note + '</td>';
		    htmlView += '</tr>';
		});
    
		mainPaid = hpaid;
		$("#pay_his").html(htmlView);
        });
    }
    
    function printInvoice(vid){
	$.post("<?php echo $base_url;?>index.php/prescriptions/view_form/10_"+vid,function (data){
	    viewWindow(data);
	});
    }
    
    function editMedicine(ids){
        var hts1 = '';
        $.post("<?php echo $base_url;?>index.php/diagnostics/get_medicine_info_by_id/"+ids,function (data,status){
            $.each(data, function(key,value) {
                hts1 += '<tr>';
                    hts1 += '<td class="myCenter handOver"><span title="<?php echo @$save;?>" onclick="saveMedicine('+ value.service_items_id +');"><i class="fa fa-save primary"></i></span></td>';
                    hts1 += '<td class="myCenter"></td>';
                    hts1 += '<td class="myLeft">'+value.products_name+'</td>';
                    hts1 += '<td class="myLeft">'+value.items_detail+'</td>';
                    hts1 += '<td class="myLeft"><input type="text" id="pQty" value="'+value.items_qty+'"/></td>';
                    hts1 += '<td class="myLeft"><input type="text" id="pDiscount" value="'+value.items_discount+'"/></td>';
                    hts1 += '<td class="myLeft"><input type="text" id="pPrice" value="'+value.items_prices+'"/></td>';
                hts1 += '</tr>';
            });
            $('#m_med').html(hts1);
        });
    }
    
    function saveMedicine(ids){
            var v2 = $('#pQty').val();
            var v3 = $('#pPrice').val();
            var dic = $('#pDiscount').val();

            $.post("<?php echo $base_url;?>index.php/diagnostics/update_medicine/"+visitId,{
                service_item_id: ids,
                qty: v2,
                price: v3,
                discount: dic
            },function(data) {
                payInvoice(visitId);
            });

    }
    
    function frm_data(vid){
	
	loadPayHis();
	
	$('#totalAmount').val("");
	$('#payment_amount').val("");
	$('#remain_amount').val("");
	$('#payment_desc').val("");
	
	var total = 0;
	var discounts = 0;
	var hts1 = '';
	var hts2 = '';
	var i = 0;
	var j = 0;
	visitId = vid;
	
	$('#visitor_id').val(vid);
	
	
	$.post("<?php echo $base_url;?>index.php/prescriptions/get_form_pay_data/10_"+vid,function (data){
	    $.each(data, function(key,value) {
		total += (parseFloat(value.items_qty) * parseFloat(value.items_prices));
		discounts += parseFloat(value.items_discount);
		if(value.types_id == '2'){
		    i = i + 1;
		    hts1 += '<tr>';
			hts1 += '<td class="myCenter handOver"><span title="<?php echo @$delete;?>" onclick="deleteItem('+ value.service_items_id +');"><i class="fa fa-trash danger"></i></span>&nbsp;&nbsp;&nbsp;<span title="<?php echo @$edit;?>" onclick="editMedicine('+ value.service_items_id +');"><i class="fa fa-edit primary"></i></span></td>';
                        /*hts1 += '<td class="myCenter handOver"><span title="<?php echo @$delete;?>" onclick="deleteItem('+ value.service_items_id +');"><i class="fa fa-trash danger"></i></span></td>';*/
			hts1 += '<td class="myCenter">'+i+'</td>';
			hts1 += '<td class="myLeft">'+value.products_name+'</td>';
			hts1 += '<td class="myLeft">'+value.items_detail+'</td>';
			hts1 += '<td class="myLeft"><span id="lblMQty">'+value.items_qty+'</span><input type="text" id="mQty" style="text-align:center; display: none;" class="form-control"></td>';
			hts1 += '<td class="myLeft">'+value.items_discount+'$</td>';
                        hts1 += '<td class="myLeft">'+(parseFloat(value.items_qty) * parseFloat(value.items_prices)).toFixed(2)+'$</td>';
		    hts1 += '</tr>';
		}else{
		    j = j + 1;
		    hts2 += '<tr>';
                        hts2 += '<td class="myCenter handOver"><span title="<?php echo @$delete;?>" onclick="editMedicine('+ value.service_items_id +');"><i class="fa fa-trash danger"></i></span>&nbsp;&nbsp;&nbsp;<span title="<?php echo @$edit;?>" onclick="editMedicine('+ value.service_items_id +');"><i class="fa fa-edit primary"></i></span></td>';
			/*hts2 += '<td class="myCenter handOver"><span title="<?php echo @$delete;?>" onclick="deleteItem('+ value.service_items_id +');"><i class="fa fa-trash danger"></i></span></td>';*/
			hts2 += '<td class="myCenter">'+j+'</td>';
			hts2 += '<td class="myLeft">'+value.products_name+'</td>';
			hts2 += '<td class="myLeft">'+value.items_detail+'</td>';
                        hts2 += '<td class="myLeft">'+value.items_discount+'$</td>';
			hts2 += '<td class="myLeft">'+(parseFloat(value.items_qty) * parseFloat(value.items_prices))+'$</td>';
		    hts2 += '</tr>';
		}
		
	    });
            
	    hts2 += '<tr class="myTopBorder">';
		hts2 += '<td colspan="5" class="myRight myBold">សរុប: </td>';
		hts2 += '<td class="myLeft myBold">'+(parseFloat(total)).toFixed(2)+'$</td>';
	    hts2 += '</tr>';
	    
	    hts2 += '<tr>';
		hts2 += '<td colspan="5" class="myRight myBold">បញ្ចុះតម្លៃ: </td>';
		hts2 += '<td class="myLeft myBold">'+(parseFloat(discounts) + parseFloat(discount)).toFixed(2)+'$</td>';
	    hts2 += '</tr>';
	    
	    hts2 += '<tr>';
		hts2 += '<td colspan="5" class="myRight myBold">សរុប: </td>';
		hts2 += '<td class="myLeft myBold">'+(parseFloat(total) - (parseFloat(discounts) + parseFloat(discount))).toFixed(2)+'$</td>';
	    hts2 += '</tr>';
	    
	    mainTotal = parseFloat(total) - (parseFloat(mainPaid) + (parseFloat(discounts) + parseFloat(discount)));
	    
	    $('#m_med').html(hts1);
	    $('#m_ser').html(hts2);
	    $('#totalAmount').val(mainTotal.toFixed(2)+'$');
	});
    }
    
    function payInvoice(ids){
	$('#pharm_row').css('display','none');
	$('#form_row').css('display','block');
	$('#form_table').css('display','none');
	
        visitId = ids;
	frm_data(ids);
    }
    
    function deleteItem(ids){
	$.post("<?php echo $base_url;?>index.php/diagnostics/cancel_medicine/"+ids,function(data) {
	    frm_data(visitId);
	});
    }
    
    function viewWindow(htms){
	var myWindow = window.open("", "MsgWindow", "width=9000, height=7000");
	myWindow.document.open("text/html", "replace");
	myWindow.document.write(htms);
	myWindow.document.close();
    }

	
    function totalCal(){
	var total = $('#totalAmount').val();
        var discount = $('#discount_amount').val();
	var paids = $('#payment_amount').val();
	
	var remain = (parseFloat(paids) + parseFloat(discount)) - parseFloat(total);

	$('#remain_amount').val(remain.toFixed(2));
    }

    function paid(){
	var paidAmount = $('#payment_amount').val();
        var discountAmount = $('#discount_amount').val();
	var paidDesc = $('#payment_desc').val();

	/*alert(paidAmount+":"+paidDesc+":"+visitId);*/
	$.post("<?php echo $base_url;?>index.php/pharmacies/paid_service/"+visitId,{amount: paidAmount, discount: discountAmount, desc: paidDesc},function(data) {
	    if(mainTotal == 0){
		$('#form_row').css('display','block');
		$('#pharm_row').css('display','none');
		$('#form_table').css('display','none');
	    }else{
		$('#form_row').css('display','none');
		$('#pharm_row').css('display','none');
		$('#form_table').css('display','block');
	    }
	    
	    /*getVisitorList();*/
            payInvoice(visitId);
	});
    }
    
</script>
