<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/reports">'.$h_report.'</a>';?>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row" id="form_table">
		    <div class="col-xs-3">
			
			<!-- Service Doctor Comission -->
			<div class="panel box box-warning"> 
			    <div class="box-header with-border"> 
				<h4 class="box-title"> 
				    <a id="comissionH" data-toggle="collapse" data-parent="#accordion" href="#service_doctor" class=""> My Comission </a> 
				</h4> 
			    </div> 
			    <div id="service_doctor" class="panel-collapse collapse" aria-expanded="true"> 
				<div class="box-body"> 
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> From </div> 
					    <input type="text" id="sdDate1" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> To </div> 
					    <input type="text" id="sdDate2" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> 
					    <input type="button" id="serviceDoctorComissionRep" class="form-control btn-primary" value="មើល" onclick="doctorServiceComission();"> 
					</div> 
				    </div> 
				</div> 
			    </div> 
			</div>
                        
                        <!-- Service Doctor Comission -->
			<div class="panel box box-warning"> 
			    <div class="box-header with-border"> 
				<h4 class="box-title"> 
				    <a id="IncomH" data-toggle="collapse" data-parent="#accordion" href="#income_all" class=""> Income </a> 
				</h4> 
			    </div> 
			    <div id="income_all" class="panel-collapse collapse" aria-expanded="true"> 
				<div class="box-body"> 
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> From </div> 
					    <input type="text" id="icDate1" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> To </div> 
					    <input type="text" id="icDate2" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> 
					    <input type="button" id="inComeRep" class="form-control btn-primary" value="មើល" onclick="incomeAll();"> 
					</div> 
				    </div> 
				</div> 
			    </div> 
			</div>
                        
                        <!-- Service Doctor -->
			<div class="panel box box-warning"> 
			    <div class="box-header with-border"> 
				<h4 class="box-title"> 
				    <a id="incomeH" data-toggle="collapse" data-parent="#accordion" href="#expense" class=""> Service Doctor </a> 
				</h4> 
			    </div> 
			    <div id="expense" class="panel-collapse collapse" aria-expanded="true"> 
				<div class="box-body"> 
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> Doctor </div> 
					    <input type="text" id="doctors" class="form-control" onclick="autoDoctor();"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> From </div> 
					    <input type="text" id="dsDate1" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> To </div> 
					    <input type="text" id="dsDate2" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> 
					    <input type="button" id="expenseRep" class="form-control btn-primary" value="មើល" onclick="doctorService();"> 
					</div> 
				    </div> 
				</div> 
			    </div> 
			</div>
                        
                        
			
			<!-- Ppatient Status -->
			<div class="panel box box-warning"> 
			    <div class="box-header with-border"> 
				<h4 class="box-title"> 
				    <a id="incomeH" data-toggle="collapse" data-parent="#accordion" href="#p_status" class=""> Patients </a> 
				</h4> 
			    </div> 
			    <div id="p_status" class="panel-collapse collapse" aria-expanded="true"> 
				<div class="box-body"> 
				    
				    <!--<div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> Patient Status </div> 
					    <input type="text" id="doctors" class="form-control" onclick="autoDoctor();"> 
					</div> 
				    </div>-->
				    
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> From </div> 
					    <input type="text" id="psDate1" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> To </div> 
					    <input type="text" id="psDate2" class="form-control"> 
					</div> 
				    </div>
				    
				    <div class="form-group">
					<div class="input-group"> <div class="input-group-addon"> <input type="checkbox" id="psOpd" value="psOpd"> </div> 
					    <input type="text" value="OPD" class="form-control" disabled="disable"> 
					</div>
				    </div>
				    
				    <div class="form-group">
					<div class="input-group"> <div class="input-group-addon"> <input type="checkbox" id="psIpd" value="psIpd"> </div> 
					    <input type="text" value="IPD" class="form-control" disabled="disable"> 
					</div>
				    </div>
				    
				    <div class="form-group">
					<div class="input-group"> <div class="input-group-addon"> <input type="checkbox" id="psPharm" value="psPharm"> </div> 
					    <input type="text" value="Pharmacy" class="form-control" disabled="disable"> 
					</div>
				    </div>
				    
				    <div class="form-group"> 
					<div class="input-group"> 
					    <input type="button" id="patientStatusRep" class="form-control btn-primary" value="មើល" onclick="patientStatus();"> 
					</div> 
				    </div> 
				</div> 
			    </div> 
			</div>

			<!-- Service Doctor Comission -->
			<div class="panel box box-warning"> 
			    <div class="box-header with-border"> 
				<h4 class="box-title"> 
				    <a id="DrugReportH" data-toggle="collapse" data-parent="#accordion" href="#dR" class=""> Drug Report </a> 
				</h4> 
			    </div> 
			    <div id="dR" class="panel-collapse collapse" aria-expanded="true"> 
				<div class="box-body"> 
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> From </div> 
					    <input type="text" id="drDate1" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> <div class="input-group-addon"> To </div> 
					    <input type="text" id="drDate2" class="form-control"> 
					</div> 
				    </div>
				    <div class="form-group"> 
					<div class="input-group"> 
					    <input type="button" id="drRep" class="form-control btn-primary" value="មើល" onclick="drAll();"> 
					</div> 
				    </div> 
				</div> 
			    </div> 
			</div>

		    </div>
		    <div class="col-xs-9">
			<div class="panel panel-danger"> 
			    <div class="panel-heading"> 
				<span class="tool" title="បោះពុម្ព" id="printRep"><i class="fa fa-print"></i></span> 
				<span class="tool" title="ទាញជាឯកសារ Excel" id="xlsRep"><i class="fa fa-file-excel-o"></i></span> 
				<span class="tool" title="មើលពេញកញ្ចក់" id="repFullScreen"><i class="fa fa-arrows-alt"></i></span>
			    </div> 
			    <div class="reportView" id="reportView"></div> 
			</div>
		    </div>
				
		</div><!-- /.row -->
	</section><!-- /.content -->
</div>

<style>
.pg-active{
	color: #23527c !important;
	background-color: #eee !important;
	border-color: #ddd !important;
}
.pg{
	cursor: pointer; 
	cursor: hand;
}
.reportView{
    padding: 10px !important;
}
</style>

<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
<script>
    $(document).ready(function(){
        $( "#sdDate1" ).datepicker();
	$( "#sdDate2" ).datepicker();
        $( "#dsDate1" ).datepicker();
	$( "#dsDate2" ).datepicker();
        $( "#psDate1" ).datepicker();
        $( "#psDate2" ).datepicker();
        $( "#icDate1" ).datepicker();
        $( "#icDate2" ).datepicker();
        $( "#drDate1" ).datepicker();
        $( "#drDate2" ).datepicker();
    });
    
    function autoDoctor(){
	var dinput = $( 'input:focus' ).val();
	var url = <?php echo '"'.$base_url.'index.php/diagnostics/doctor_auto_complete/"';?>;
	var soc = String(url+dinput);
	$( 'input:focus' ).autocomplete({source: soc});
	var res = $( 'input:focus' ).val();
    }
    
    function doctorService(){
        var docs = $('#sDoctor').val();
	var da1 = $('#dsDate1').val();
	var da2 = $('#dsDate2').val();
	$.post("<?php echo $base_url;?>index.php/reports/service_doctor",{date1: da1, date2: da2},function (data){
	    $('#reportView').html(data);
	});
	
    }
    
    function doctorServiceComission(){
	var da1 = $('#sdDate1').val();
	var da2 = $('#sdDate2').val();
	$.post("<?php echo $base_url;?>index.php/reports/comission_report",{date1: da1, date2: da2},function (data){
	    $('#reportView').html(data);
	});
	
    }
    
    function incomeAll(){
	var da1 = $('#icDate1').val();
	var da2 = $('#icDate2').val();
	$.post("<?php echo $base_url;?>index.php/reports/income_report",{date1: da1, date2: da2},function (data){
	    $('#reportView').html(data);
	});
	
    }
    
    function patientStatus(){
	var da1 = $('#dsDate1').val();
	var da2 = $('#dsDate2').val();
        var ps = '';
        
        if($('#psOpd:checked').val() == 'psOpd'){
            ps += 'psOpd';
        }else{
            ps += '';
        }
        
        if($('#psIpd:checked').val() == 'psIpd'){
            ps += '_psIpd';
        }else{
            ps += '_';
        }
        
        if($('#psPharm:checked').val() == 'psPharm'){
            ps += '_psPharm';
        }else{
            ps += '_';
        }
        
	$.post("<?php echo $base_url;?>index.php/reports/ipd_opd_report",{visit_status: ps,date1: da1, date2: da2},function (data){
	    $('#reportView').html(data);
	});
    }

    function drAll(){
	var da1 = $('#drDate1').val();
	var da2 = $('#drDate2').val();
	$.post("<?php echo $base_url;?>index.php/reports/dr_report",{date1: da1, date2: da2},function (data){
	    $('#reportView').html(data);
	});
	
    }

</script>
