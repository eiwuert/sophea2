<?php
	$visitorId = '';
	$visitorName = '';
	$visitorCode = '';
	$visitorGender = '';
	$visitorDob = '';
	$visitorAge = date("Y") - date("Y", strtotime($visitorDob)); 
	$leaveStatus = '';
	
	$dia = '';
	$dia1 = '';
	$dia2 = '';
	$dia_id = '';
	$dia_id1 = '';
	$dia_id2 = '';
	$patientId = '';
	
	$cured = '';
	$notCured = '';
	$referedOut = '';
	$died = '';
	
	$statuss = '';
	
	$i = 0;
	foreach($visitor_info as $row){
		$patientId = $row->patient_id;
		$visitorId = $row->visitors_id;
		$visitorName = $row->patient_kh_name."(".$row->patient_en_name.")";
		$visitorCode = $row->patient_code;
		$visitorDob = $row->patient_dob;
		$status = $row->visitors_status;
		if($row->visitors_leave_status == '1'){
		    $cured = 'checked';
		}else if($row->visitors_leave_status == '2'){
		    $notCured = 'checked';
		}else if($row->visitors_leave_status == '3'){
		    $referedOut = 'checked';
		}else if($row->visitors_leave_status == '4'){
		    $died = 'checked';
		}
		
		if ($row->patient_gender != "m"){
			$visitorGender = "Male" ;
		}else{
			$visitorGender = "Female" ;
		}
	}
	
?>
<div class="col-sm-8">
    <div class="row">
	<div class=" box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default collapsed-box">
		<div class="box-header with-border bg-green align-center handOver" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		    <i class="fa fa-plus"></i>
		    <h3 class="align-center box-title">Print</h3>

		</div>
		  <div class="box-body">
		    <div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
				<li id="f1"><a href="#" id="p1" onclick="printRcp(2);"><i class="fa fa-print"></i> ប័ណ្ណ Laser </a></li>
			      <li id="f2"><a href="#" id="p2" onclick="printRcp(6);"><i class="fa fa-print"></i> ប័ណ្ណ Hydroimpact </a></li>
			      <li id="f3"><a href="#" id="p3" onclick="printRcp(5);"><i class="fa fa-print"></i> ប័ណ្ណបូមខ្លាញ់ </a></li>
			      <li id="f4"><a href="#" id="p4" onclick="printRcp(4);"><i class="fa fa-print"></i> ប័ណ្ណ Modern Facial </a></li>
			    </ul>
			  </div>
			  <!-- /.box-body -->
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
			      <li id="f5"><a href="#" id="p5" onclick="printRcp(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ </a></li>
			      <li id="f6"><a href="#" id="p6" onclick="printRcp(3);"><i class="fa fa-print"></i> Skin Care </a></li>
			      <li id="f7"><a href="#" id="p7" onclick="printFrm(2);"><i class="fa fa-print"></i> Diode Laser </a></li>
			      <li id="f8"><a href="#" id="p8" onclick="printFrm(5);"><i class="fa fa-print"></i> CPL Laser </a></li>
			    </ul>
			  </div>
			  <!-- /.box-body -->
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
			      <li id="f9"><a href="#" id="p9" onclick="printFrm(3);"><i class="fa fa-print"></i> Q-Switch Laser </a></li>
			      <li id="f10"><a href="#" id="p10" onclick="printFrm(6);"><i class="fa fa-print"></i> Erbium Yag Laser </a></li>
			      <li id="f11"><a href="#" id="p11" onclick="printFrm(7);"><i class="fa fa-print"></i> Facial Peeling </a></li>
			      <li><a href="#" id="p15" onclick="printFrm(9);"><i class="fa fa-print"></i> វេជ្ជបញ្ជា </a></li>
			    </ul>
			  </div>
			  <!-- /.box-body -->
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
				<li><a href="#" id="p12" onclick="printFrm(4);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ខ្លាញ់ </a></li>
				<li><a href="#" id="p13" onclick="printFrm(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ និងសេរ៉ូម</a></li>
				<li><a href="#" id="p14" onclick="printFrm(8);"><i class="fa fa-print"></i> Treatment </a></li>
			    </ul>
			  </div>
			  <!-- /.box-body -->
			</div>
		    </div>
		  </div>
	      </div>
	    </div>
	</div>
    </div>

    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Patient Information
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
		      <div class="col-sm-4">
			  <p> <?php echo @$name." : ".$visitorName;?><small class="label bg-red" id="visit_amount"></small></p>
		      </div>
		      <div class="col-sm-4">
			  <p> <?php echo @$code." : ".$visitorCode;?></p>
		      </div>
		      <div class="col-sm-2">
			  <p> <?php echo @$gender." : ".$visitorGender;?></p>
		      </div>
		      <div class="col-sm-2">
			  <p> <?php echo @$age." : ".$visitorAge;?></p>
		      </div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>

    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		    Diagnostic IN
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
		      
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic
				    </div>
				    <input type="text" name="diagnostic" id="diagnostic" class="form-control">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic Level
				    </div>
				    <input type="text" name="diagnostic_level" id="diagnostic_level" class="form-control">
				</div>
			    </div>
			    <!----- Desc 0 ------->
			    <div class="form-group">
				    <textarea name="desc_dia" id="desc_dia" class="form-control" rows="5"></textarea>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic1
				    </div>
				    <input type="text" name="diagnostic1" id="diagnostic1" class="form-control">
				</div>
			    </div>

			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic1 Level
				    </div>
				    <input type="text" name="diagnostic1_level" id="diagnostic1_level" class="form-control">
				</div>
			    </div>

			    <!----- Desc 1 ------->
			    <div class="form-group">
				<textarea name="desc_dia1" id="desc_dia1" class="form-control" rows="5"></textarea>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic2
				    </div>
				    <input type="text" name="diagnostic2" id="diagnostic2" class="form-control">
				</div>
			    </div>
			    <div class="form-group">
				<div class="input-group">
				    <div class="input-group-addon">
					  Diagnostic2 Level
				    </div>
				    <input type="text" name="diagnostic2_level" id="diagnostic2_level" class="form-control">
				</div>
			    </div>
			    <!----- Desc 2 ------->
			    <div class="form-group">
				<textarea name="desc_dia2" id="desc_dia2" class="form-control" rows="5"></textarea>
			    </div>
			</div>

			<div class="col-sm-4">
			    <div class="input-group-btn">
				    <button class="btn btn-sm btn-default" id="btn_save" onclick="saveDianostic();" style="background:#3c8dbc;font-size:15px;color:white; margin-bottom: 5px;"><i class="fa fa-save"></i> Save</button>
			    </div>
			</div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>

    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Medicine
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
		      
			<div class="col-sm-12 box-tools pull-left" style="margin-bottom:5px;">
			    <div class="input-group-btn">
				    <button class="btn btn-sm btn-default" id="btn_create" onclick="addMedicine();"><i class="fa fa-plus-circle primary"></i> Add Medicine </button>
			    </div>
			</div>
			<div class="col-sm-12">
			    <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				    <thead>
					    <tr role="row">
						    <th style="width: 5%;"><?php echo $no;?></th>
						    <th style="width: 14%"><?php echo $date;?></th>
						    <th style="width: 15%;"><?php echo $medicine;?></th>
						    <th style="width: 8%;"><?php echo $qty;?></th>
						    <th style="width: 8%;"><?php echo $price;?></th>
						    <th style="width: 8%;"><?php echo $discount;?></th>
						    <th style="width: 12%;"><?php echo $doctor;?></th>
						    <th style="width: 5%;"><?php echo $am;?></th>
						    <th style="width: 5%;"><?php echo $af;?></th>
						    <th style="width: 5%;"><?php echo $pm;?></th>
						    <th style="width: 5%;"><?php echo $nt;?></th>
						    <th style="width: 10%;"></th>
					    </tr>
				    </thead>
				    <tbody id="md_id"></tbody>
			    </table>
			</div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>


    <!-- Service-->
    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Service
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
		    <div class="col-sm-12 box-tools pull-left" style="margin-bottom:5px;">
			<div class="input-group-btn">
				<button class="btn btn-sm btn-default" id="btn_create" onclick="addService();"><i class="fa fa-plus-circle primary"></i> Add Service </button>
			</div>
		    </div>
		    <div class="col-sm-12">
			<table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
			    <thead>
				<tr role="row">
					<th colspan="1"><?php echo $no;?></th>
					<th colspan="2"><?php echo $date;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $service;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $qty;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $price;?></th>
					<th colspan="1" style="text-align:center;"><?php echo $discount;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $doctor;?></th>
					<th colspan="2"></th>
				</tr>
				<!--<tr role="row">
					<th>Fitzpatrik</th>	
					<th>Fluence</th>
					<th>Pulse Length</th>
					<th>Frequency</th>
					<th>Mode</th>
					<th>No Of Treal</th>
					<th>Lens</th>
					<th>Spot Size</th>
					<th>Cut Off Filter</th>
					<th>Pulse Train</th>
					<th>Pause Length</th>
					<th>Pulse With Us</th>
					<th>Energy Mj</th>
				</tr>-->
			    </thead>
			    <tbody  id="se_id"></tbody>
			</table>
		    </div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>

    <?php
	if($status == '2'){
    ?>
    <div class="row">
	<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Diagnostic OUT
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
		    <div class="col-sm-4">
			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				      Diagnostic
				</div>
				<input type="text" name="out_dia" id="out_dia" class="form-control">
			    </div>
			</div>
			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				      Diagnostic Level
				</div>
				<input type="text" name="out_dia_level" id="out_dia_level" class="form-control">
			    </div>
			</div>
			<!----- Desc 0 ------->
			<div class="form-group">
				<textarea  name="out_dia_des" id="out_dia_des" class="form-control" rows="5"></textarea>
			</div>
		    </div>
		    <div class="col-sm-4">
			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				      Diagnostic1
				</div>
				<input type="text" name="out_dia1" id="out_dia1" class="form-control">
			    </div>
			</div>
			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				      Diagnostic1 Level
				</div>
				<input type="text" name="out_dia1_level" id="out_dia1_level" class="form-control">
			    </div>
			</div>
			<!----- Desc 1 ------->
			<div class="form-group">
			    <textarea  name="out_dia1_des" id="out_dia1_des" class="form-control" rows="5"></textarea>
			</div>
		    </div>
		    <div class="col-sm-4">
			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				      Diagnostic2
				</div>
				<input type="text"  name="out_dia2" id="out_dia2" class="form-control">
			    </div>
			</div>
			<div class="form-group">
			    <div class="input-group">
				<div class="input-group-addon">
				      Diagnostic2 Level
				</div>
				<input type="text"  name="out_dia2_level" id="out_dia2_level" class="form-control">
			    </div>
			</div>
			<!----- Desc 2 ------->
			<div class="form-group">
			    <textarea  name="out_dia2_des" id="out_dia2_des" class="form-control" rows="5"></textarea>
			</div>
		    </div>

		    <!----- Desc 2 ------->
		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				    <input type="checkbox" id="cure" value="1" <?php echo $cured;?>>
				</span>
			    <input type="text" value="<?php echo @$cure;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				  <input type="checkbox" id="notCure" value="1" <?php echo $notCured;?>>
				</span>
			    <input type="text" value="<?php echo @$notCure;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				  <input type="checkbox" id="referOut" value="1" <?php echo $referedOut;?>>
				</span>
			    <input type="text" value="<?php echo @$referOut;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-3">
			<div class="form-group">
			    <div class="input-group">
				<span class="input-group-addon">
				    <input type="checkbox" id="death" value="1" <?php echo $died;?>>
				</span>
				<input type="text" value="<?php echo @$death;?>" class="form-control">
			  </div>
			</div>
		    </div>

		    <div class="col-sm-4">
			    <div class="input-group-btn">
				<button class="btn btn-sm btn-default" id="btn_out_save" onclick="saveOutDianostic();" style="background:#3c8dbc;font-size:15px;color:white; margin-bottom: 5px;"><i class="fa fa-save"></i> Save</button>
			    </div>
		    </div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>		
    <?php }?>
</div>
<div class="col-sm-4">
    <!-- Visit Times -->
	<!--<div class="box-body">
	    <div class="box-group" id="accordion">
	      <div class="panel box box-default">
		<div class="box-header with-border bg-green align-center">
		  <h3 class="align-center box-title">
		      Last Visit
		  </h3>
		</div>
		<div class="panel-collapse collapse in">
		  <div class="box-body">
			<div class="col-sm-12">
			    <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				    <thead>
					    <tr role="row">
						    <th><?php echo $no;?></th>
						    <th style="text-align:center;"><?php echo @$enrolDate;?></th>
						    <th style="text-align:center;"><?php echo @$leaveDate;?></th>
						    <th></th>
					    </tr>
				    </thead>
				    <tbody  id="v_id"></tbody>
			    </table>
			</div>
		  </div>
		</div>
	      </div>
	    </div>
	</div>-->
	
		<h3 class="align-center box-title">
		    Old Visit
		</h3>
		<hr/>
		<table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
			<thead>
				<tr role="row">
					<th><?php echo $no;?></th>
					<th style="text-align:center;"><?php echo @$enrolDate;?></th>
					<th style="text-align:center;">Description</th>
				</tr>
			</thead>
			<tbody  id="v_id"></tbody>
		</table>
	
</div>

<style>
    .bordered{
	border: solid 1px #d2d6de !important;	
    }
    .borderBottom{
	border-bottom: 1px solid #d2d6de;
	padding-bottom: 15px !important;
	color: #007fff !important;
    }
    .myExample > thead > tr > th{
	text-align: center !important;
	background: #f4f4f4 !important;
	border: solid 1px #FFF !important;
    }
    .bloom-row > td{
	background: #f4f4f4 !important;
	border: solid 1px #FFF !important;
	color: red;
    }
    .myExample > tbody > tr > td{
	text-align: center !important;
    }
    .myExample > tbody > tr:hover{
	background: #FFF !important;
    }
    .handOver {
	cursor: pointer; 
	cursor: hand;
    }
    #visit_amount{
	margin-left: 2px !important;
    }
</style>
<script>
	var vid = <?php echo $visitorId;?>;
	var dia = 0;
	var dia1 = 0;
	var dia2 = 0;
	var out_dia = 0;
	var out_dia1 = 0;
	var out_dia2 = 0;
	var pid = <?php echo $patientId;?>;
	var came = 1;
	$(document).ready(function(){
	    $( '#diagnostic' ).keyup(function(e){
		    var dinput = this.value;;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#diagnostic' ).autocomplete({source: soc});
	    });
	    $( '#diagnostic1' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#diagnostic1' ).autocomplete({source: soc});
	    });
	    $( '#diagnostic2' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#diagnostic2' ).autocomplete({source: soc});
	    });
	    $( '#out_dia' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#out_dia' ).autocomplete({source: soc});
	    });
	    $( '#out_dia1' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#out_dia1' ).autocomplete({source: soc});
	    });
	    $( '#out_dia2' ).keyup(function(e){
		    var dinput = this.value;
		    var url = <?php echo '"'.$base_url.'index.php/icd10s/get_icd10_by_name_json/"';?>;
		    var soc = String(url+dinput);
		    $( '#out_dia2' ).autocomplete({source: soc});
	    });
	    
	    getDia(vid);
	    getMedicine(vid);
	    getService(vid);
	    getVisitTime(pid);
	});
	
	function autoForm(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/diagnostics/form_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    
	    if(event.keyCode == 13){
		checkService();
	    }

	}
	
    
	function autoMedicine(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/products/product_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    var res = $( 'input:focus' ).val().split("-");
	    if(event.keyCode != 13){
		/*alert(res[1]);*/
		$( '#mQty' ).val('1');
		$( '#mPrice' ).val(res[3]);
	    }
	    

	}
	
	function autoDoctor(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/diagnostics/doctor_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    var res = $( 'input:focus' ).val();
	    

	}
	
	function autoService(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/products/service_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    var res = $( 'input:focus' ).val().split("-");
	    if(event.keyCode != 13){
		$( '#sQty' ).val('1');
		$( '#sPrice' ).val(res[3]);
	    }
	}

	function saveDianostic(){
		var visitorId = vid;
		var dianostic = $('#diagnostic').val();
		var dianostic_level = $('#diagnostic_level').val();
		var dianostic_de = $('#desc_dia').val();
		var dianostic1 = $('#diagnostic1').val();
		var dianostic1_level = $('#diagnostic1_level').val();
		var dianostic1_de = $('#desc_dia1').val();
		var dianostic2 = $('#diagnostic2').val();
		var dianostic2_level = $('#diagnostic2_level').val();
		var dianostic2_de = $('#desc_dia2').val();
		
		$.post("<?php echo $base_url;?>index.php/diagnostics/add_dia/"+visitorId,{
			dia: dianostic,
			dia_id: dia,
			dia_de: dianostic_de,
			dia_level: dianostic_level,
			dia1: dianostic1,
			dia1_id: dia1,
			dia1_de: dianostic1_de,
			dia1_level: dianostic1_level,
			dia2_id: dia2,
			dia2: dianostic2,
			dia2_de: dianostic2_de,
			dia2_level: dianostic2_level
		},function(){});
	}
	
	function saveOutDianostic(){
		var visitorId = vid;
		
		var myStatus = '';
		if(checkBoxSave($('#cure:checked').val()) == '0'){
		    myStatus = '1';
		}
		if(checkBoxSave($('#notCure:checked').val()) == '0'){
		    myStatus = '2';
		}
		if(checkBoxSave($('#referOut:checked').val()) == '0'){
		    myStatus = '3';
		}
		if(checkBoxSave($('#death:checked').val()) == '0'){
		    myStatus = '4';
		}
		
		$.post("<?php echo $base_url;?>index.php/visitors/visitor_leave_status/"+myStatus+"_"+visitorId,function (){});
		
		var dianostic = $('#out_dia').val();
		var dianostic_level = $('#out_dia_level').val();
		var dianostic_de = $('#out_dia_des').val();
		var dianostic1 = $('#out_dia1').val();
		var dianostic1_level = $('#out_dia1_level').val();
		var dianostic1_de = $('#out_dia1_des').val();
		var dianostic2 = $('#out_dia2').val();
		var dianostic2_level = $('#out_dia2_level').val();
		var dianostic2_de = $('#out_dia2_des').val();
		
		
		$.post("<?php echo $base_url;?>index.php/diagnostics/add_dia/"+visitorId,{
			dia: dianostic,
			dia_id: out_dia,
			dia_de: dianostic_de,
			dia_level: dianostic_level,
			dia1: dianostic1,
			dia1_id: out_dia1,
			dia1_de: dianostic1_de,
			dia1_level: dianostic1_level,
			dia2_id: out_dia2,
			dia2: dianostic2,
			dia2_de: dianostic2_de,
			dia2_level: dianostic2_level
		},function(){});
		
	}
	
	function getVisitTime(ids){
	    var i = 0;
	    $.post("<?php echo $base_url;?>index.php/visitors/get_visitor_list_by_patient_id/"+ids,function (data,status){
		var vid = 0;
		var vdate = '';
		var htmlView = '';
		var sr = '';
		var din = '';
		$.each(data, function(key,value) {
		    vid = parseInt(value.visitors_id);
		    if(din == ''){
			i = i + 1;
			din = value.visitors_in_date;
			sr = value.products_name;
		    }else if(din != value.visitors_in_date){
			    htmlView = '<tr><td class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vid+');">' + i +'</td>';
			    htmlView += '<td>'+ $.datepicker.formatDate('dd-mm-yy', new Date(din)) +'</td>';
			    htmlView += '<td>'+ sr +'</td></tr>';
			    $('#v_id').append(htmlView);

			    /*htmlView += '<span class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vid+');"><i class="fa fa-search action-btn primary"></i></span>&nbsp;&nbsp;';*/
			    /*startTrTd();
				setTd(1);
				setTd($.datepicker.formatDate('dd-mm-yy', new Date(value.visitors_in_date)));
				setTd(sr);
				setTd(htmlView);
			    stopTrTd();*/

			    htmlView = '';
			    i = i + 1;
			    vid = parseInt(value.visitors_id);
			    sr = value.products_name;
			    din = value.visitors_in_date;

			}else{
			    sr = sr + "," + value.products_name;
			}
		});
		/*viewRows('v_id');*/
		
		htmlView = '<tr><td class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vid+');">' + i +'</td>';
		htmlView += '<td>'+ $.datepicker.formatDate('dd-mm-yy', new Date(din)) +'</td>';
		if(isNaN(sr)){
		    htmlView += '<td></td></tr>';
		}else{
		    htmlView += '<td>'+ sr +'</td></tr>';
		}
		
		$('#v_id').append(htmlView);
		
		came = parseInt(came) + i;
		$("#visit_amount").text(" "+ i.toString());
	    });
	}
	
	function getMedicine(ids){
	    var i = 0;
	    var htmlView = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_medicine_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    
		    i = i + 1;

		    htmlView += '<tr>';
			htmlView += '<td  style="text-align:center !important;">'+i+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+$.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified))+'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')</td>';
			}else{
			    htmlView += '<td  style="text-align:center !important;">'+value.products_name+'('+value.products_code+')-['+value.forms_name+']</td>';
			}
			
			htmlView += '<td  style="text-align:center !important;">'+value.items_qty+' '+ value.units_name+'</td>';
			htmlView += '<td  style="text-align:center !important;">$'+value.items_prices+'</td>';
			htmlView += '<td  style="text-align:center !important;">$'+value.items_discount+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.name+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+checkChecked(value.mediacines_am)+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+checkChecked(value.mediacines_af)+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+checkChecked(value.mediacines_pm)+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+checkChecked(value.mediacines_nt)+'</td>';
			htmlView += '<td  style="text-align:center !important;">';
			    htmlView += '<span class="handOver" title="<?php echo @$edit;?>" onclick="deleteMedicine('+ value.service_items_id +');"><i class="fa fa-edit action-btn primary"></i></span>&nbsp;&nbsp;';
			    htmlView += '<span class="handOver" title="<?php echo @$delete;?>" onclick="deleteMedicine('+ value.service_items_id +');"><i class="fa fa-trash-o action-btn danger"></i></span>';
			htmlView += '</td>';
		    htmlView += '</tr>';
		    
		    if(value.items_time != '' || value.items_detail != ''){
			htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">ពេល៖</td>';
			    htmlView += '<td  colspan="4" style="text-align:center;">'+value.items_time+'</td>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">បរិយាយ៖</td>';
			    htmlView += '<td  colspan="4" style="text-align:center;">'+value.items_detail+'</td>';
			htmlView += '</tr>';
		    }
		    
		});
		
		$('#md_id').html(htmlView);
		addMedicine();
	    });
	}
	
	function getService(ids){
	    var i = 0;
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_service_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    
		    i = i + 1;
		    
		    var htmlView = '';
		    var hts = '';
		    htmlView += '<span class="handOver" title="<?php echo @$edit;?>" onclick="editService('+ value.service_items_id +');"><i class="fa fa-edit action-btn primary"></i></span>&nbsp;&nbsp;';
		    htmlView += '<span class="handOver" title="<?php echo @$delete;?>" onclick="deleteService('+ value.service_items_id +');"><i class="fa fa-trash-o action-btn danger"></i></span>';

		    
		    hts = "<tr>";
			hts += '<td colspan="1">'+ i +'</td>';
			hts += '<td colspan="2">'+ $.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified)) +'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    hts += '<td colspan="2">'+ value.products_name + '(' + value.products_code + ') </td>';
			}else{
			    hts += '<td colspan="2">'+ value.products_name + '(' + value.products_code + ')-[' + value.forms_name + '] </td>';
			}
			hts += '<td colspan="2">'+ value.items_qty+' '+value.units_name + ' </td>';
			hts += '<td colspan="2">$'+ value.items_prices +' </td>';
			hts += '<td colspan="1">$'+ value.items_discount +'</td>';
			hts += '<td colspan="2">'+ value.name +'</td>';
			hts += '<td colspan="2">'+ htmlView +' </td>';
		    hts += "</tr>";
		    
		    hts += "<tr><td colspan='5'>Descrition</td><td colspan='8'>"+ value.items_detail +"</td></tr>";
		    $('#se_id').append(hts);
		    
		    if(value.forms_name == 'Erbium Yag Laser'){
			hts = "<tr class='bloom-row'>";
			    hts += '<td colspan="6">Pulse With Us</td>';
			    hts += '<td colspan="7">Energy mj</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="6">' + value.pulse_with_us + '</td>';
			    hts += '<td colspan="7">' + value.energy_mj + '</td>';
			hts += "</tr>";
			
			
		    }else if(value.forms_name == 'Q-Switch Laser'){
			hts = "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Lens</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="3">Pulse Length</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Spot Size</td>';
			    hts += '<td colspan="2">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.lens + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="3">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.spot_size + '</td>';
			    hts += '<td colspan="2">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }else if(value.forms_name == 'CPL Laser'){
			hts = "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Cut Off Filter</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Pulse Train</td>';
			    hts += '<td colspan="2">Pause Length</td>';
			    hts += '<td colspan="3">Pulse Length</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="1">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.lens + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.pulse_train + '</td>';
			    hts += '<td colspan="2">' + value.pause_length + '</td>';
			    hts += '<td colspan="2">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="1">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }else if(value.forms_name == 'Diode Laser'){
			hts = "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Fitzpatrik</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="3">Pulse Length</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Mode</td>';
			    hts += '<td colspan="2">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="3">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.mode + '</td>';
			    hts += '<td colspan="2">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }else if(value.forms_name == 'Anti Aging Treatment'){
			hts = "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Fitzpartrik</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="3">Pulse Length</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Mode</td>';
			    hts += '<td colspan="2">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.fitzpatrik + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="3">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.mode + '</td>';
			    hts += '<td colspan="2">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }
		    
		    $('#se_id').append(hts);
		    
		    /*if(value.fitzpatrik != '' || value.fluence != '' || value.pulse_length != '' || value.frequency != '' || value.mode != '' || value.no_of_treal != '' || value.lens != '' || value.spot_size != '' || value.cut_off_filter != '' || value.pulse_train != '' || value.pause_length != '' || value.pulse_with_us != '' || value.energy_mj != ''){
			hts = "<tr class='bloom-row'>";
			    hts += '<td>' + value.fitzpatrik + '</td>';
			    hts += '<td>' + value.fluence + '</td>';
			    hts += '<td>' + value.pulse_length + '</td>';
			    hts += '<td>' + value.frequency + '</td>';
			    hts += '<td>' + value.mode + '</td>';
			    hts += '<td>' + value.no_of_treal + '</td>';
			    hts += '<td>' + value.lens + '</td>';
			    hts += '<td>' + value.spot_size + '</td>';
			    hts += '<td>' + value.cut_off_filter + '</td>';
			    hts += '<td>' + value.pulse_train + '</td>';
			    hts += '<td>' + value.pause_length + '</td>';
			    hts += '<td>' + value.pulse_with_us + '</td>';
			    hts += '<td>' + value.energy_mj + '</td>';
			hts += "</tr>";
			
			$('#se_id').append(hts);
		    }*/
		});
		
		addService();
		/*viewRows('se_id');*/
	    });
	}
	
	function getDia(ids){
	    var i = 0;
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_diagnostic_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    i = i + 1;
		    
		    if(i == 1){
			$("#diagnostic").val(value.icd10_code + '_' + value.icd10_desc);
			$("#diagnostic_level").val(value.diagnostics_level);
			$("#desc_dia").val(value.diagnostics_detail);
			dia = value.diagnostics_id;
		    }
		    if(i == 2){
			$("#diagnostic1").val(value.icd10_code + '_' + value.icd10_desc);
			$("#diagnostic1_level").val(value.diagnostics_level);
			$("#desc_dia1").val(value.diagnostics_detail);
			dia1 = value.diagnostics_id;
		    }
		    if(i == 3){
			$("#diagnostic2").val(value.icd10_code + '_' + value.icd10_desc);
			$("#diagnostic2_level").val(value.diagnostics_level);
			$("#desc_dia2").val(value.diagnostics_detail);
			dia2 = value.diagnostics_id;
		    }
		    if(i == 4){
			$("#out_dia").val(value.icd10_code + '_' + value.icd10_desc);
			$("#out_dia_level").val(value.diagnostics_level);
			$("#out_dia_des").val(value.diagnostics_detail);
			out_dia = value.diagnostics_id;
		    }
		    if(i == 5){
			$("#out_dia1").val(value.icd10_code + '_' + value.icd10_desc);
			$("#out_dia1_level").val(value.diagnostics_level);
			$("#out_dia1_des").val(value.diagnostics_detail);
			out_dia1 = value.diagnostics_id;
		    }
		    if(i == 6){
			$("#out_dia2").val(value.icd10_code + '_' + value.icd10_desc);
			$("#out_dia2_level").val(value.diagnostics_level);
			$("#out_dia2_des").val(value.diagnostics_detail);
			out_dia2 = value.diagnostics_id;
		    }
		    
		});
	    });
	}
	
	function addService(){
		var htmlView = '<tr>';
		    htmlView += '<td  colspan="1" style="text-align:center;"><input type="text" id="s_form" style="text-align:center;" class="form-control" placeholder="Form" onkeyup="autoForm();"></td>';
		    htmlView += '<td  colspan="4" style="text-align:center;"><input type="text" id="m_service" style="text-align:center;" class="form-control" placeholder="Service" onkeyup="autoService();"></td>';
		    htmlView += '<td  colspan="2" style="text-align:center;"><input type="text" id="sQty" value=""  style="text-align:center;" placeholder="Qty" class="form-control"></td>';
		    htmlView += '<td  colspan="2" style="text-align:center;"><input type="text" id="sPrice" value=""  style="text-align:center;" placeholder="Price" class="form-control"></td>';
		    htmlView += '<td  colspan="1" style="text-align:center;"><input type="text" id="sDiscount" value=""  style="text-align:center;" placeholder="Discount" class="form-control"></td>';
		    htmlView += '<td  colspan="2" style="text-align:center;"><input type="text" id="sDoctor" style="text-align:center;" class="form-control" placeholder="Doctor" onkeyup="autoDoctor();"></td>';
		    htmlView += '<td  colspan="1" style="text-align:center;">';
			    htmlView += '<span class="handOver" onclick="saveService();"><i class="fa fa-save action-btn primary"></i></span>';
		htmlView += '</td></tr>';
		
		/*htmlView += "<tr class='bloom-row'>";
		    htmlView +=  '<td><input type="text" id="sfitzpatrik" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="sfluence" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="spulse_length" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="sfrequency" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="smode" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="sno_of_treal" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="slens" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="sspot_size" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="scut_off_filter" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="spulse_train" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="spause_length" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="spulse_with_us" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="senergy_mj" value=""  style="text-align:center;" class="form-control"></td>';
		htmlView +=  "</tr>";*/
		
		htmlView += '<tr><td colspan="13"><input type="text" id="se_desc" value="" placeholder="Descrition" style="text-align:left;" class="form-control"></td></tr>';
		
		$('#se_id').append(htmlView);
	}
	
	function checkService(){
	    var htmlView = '';
	    if($('#s_form').val() == 'Erbium Yag Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="7"><input type="text" id="spulse_with_us" value="" placeholder="Pulse With Us" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="6"><input type="text" id="senergy_mj" value="" placeholder="Energy mj"  style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
	    }else if($('#s_form').val() == 'Q-Switch Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="slens" value="" placeholder="Lens" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence"  style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="3"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sspot_size" value="" placeholder="Spot Size" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
	    }else if($('#s_form').val() == 'CPL Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="scut_off_filter" value="" placeholder="Cut Off Filter" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="spulse_train" value="" placeholder="Pulse Train" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="spulse_delay" value="" placeholder="Pulse Delay" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
		
	    }else if($('#s_form').val() == 'Anti Aging Treatment'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="slens" value="" placeholder="Lens" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence"  style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="3"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sspot_size" value="" placeholder="Spot Size" style="text-align:center;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:center;" class="form-control"></td>';
		htmlView +=  "</tr>";
    
	    }else if($('#s_form').val() == 'Diode Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="2"><input type="text" id="sfitzpatrik" value="" placeholder="Fitzpartrik" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfluence" value="" placeholder="Fluence"  style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="3"><input type="text" id="spulse_length" value="" placeholder="Pulse Length" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sfrequency" value="" placeholder="Frequency" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="smode" value="" placeholder="Mode" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="2"><input type="text" id="sno_of_treal" value="" placeholder="Treat" style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
	    }
	    
	    $('#se_id').append(htmlView);
	}
	
	function addMedicine(){
		var htmlView = '<tr>';
			htmlView += '<td  colspan="2" style="text-align:center;"><input type="text" id="m_form" style="text-align:center;" class="form-control" placeholder="Form" onkeyup="autoForm();"></td>';
			htmlView += '<td  colspan="1" style="text-align:center;"><input type="text" id="m_medicine" style="text-align:center;" class="form-control" placeholder="Medicine" onkeyup="autoMedicine();"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" id="mQty" value=""  style="text-align:center;"  placeholder="Qty" class="form-control"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" id="mPrice" value=""  style="text-align:center;" placeholder="Price" class="form-control"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" id="mDiscount" value="0"  style="text-align:center;" placeholder="Discount" class="form-control"></td>';
			htmlView += '<td style="text-align:center;"><input type="text" id="mDoctor" style="text-align:center;" class="form-control" placeholder="Doctor" onkeyup="autoDoctor();"></td>';
			htmlView += '<td style="text-align:center;"><input type="checkbox" id="mAm" value="1"></td>';
			htmlView += '<td style="text-align:center;"><input type="checkbox" id="mAf" value="1"></td>';
			htmlView += '<td style="text-align:center;"><input type="checkbox" id="mPm" value="1"></td>';
			htmlView += '<td style="text-align:center;"><input type="checkbox" id="mNt" value="1"></td>';
			htmlView += '<td style="text-align:center;">';
				htmlView += '<span class="handOver" onclick="saveData();"><i class="fa fa-save action-btn primary"></i></span>';
		    htmlView += '</td></tr>';
		
		htmlView += '<tr>';
		    htmlView += '<td  colspan="2" style="text-align:center !important;">ពេល៖</td>';
		    htmlView += '<td  colspan="4" style="text-align:center;"><input type="text" id="mTime" value=""  style="text-align:center;" class="form-control"></td>';
		    htmlView += '<td  colspan="2" style="text-align:center !important;">បរិយាយ៖</td>';
		    htmlView += '<td  colspan="4" style="text-align:center;"><input type="text" id="mDetail" value=""  style="text-align:center;" class="form-control"></td>';
		htmlView += '</tr>';
		
		$('#md_id').append(htmlView);
	}
	
	function saveData(){
	    
		var v1 = $('#m_medicine').val();
		var v2 = $('#mQty').val();
		var v3 = $('#mPrice').val();
		var dic = $('#mDiscount').val();
		var doc = $('#mDoctor').val();
		var frm = $('#m_form').val();
		var usetime = $('#mTime').val();
		var usedetail = $('#mDetail').val();
		var ams = checkBoxSave($('#mAm:checked').val());
		var afs = checkBoxSave($('#mAf:checked').val());
		var pms = checkBoxSave($('#mPm:checked').val());
		var nts = checkBoxSave($('#mNt:checked').val());
		
		$.post("<?php echo $base_url;?>index.php/diagnostics/add_medicine/"+vid,{
		    medicines: v1,
		    qty: v2,
		    price: v3,
		    discount: dic,
		    doctor: doc,
		    usetime: usetime,
		    usedetail: usedetail,
		    frm: frm,
		    amm: ams,
		    afm: afs,
		    pmm: pms,
		    ntm: nts
		},function(data, status) {
		    $('#md_id').html('');
		    getMedicine(vid);
		});
		
	}
	
	function saveService(){
	    
		var v1 = $('#m_service').val();
		var v2 = $('#sQty').val();
		var v3 = $('#sPrice').val();
		var desc = $('#se_desc').val();
		var frm = $('#s_form').val();
		var doc = $('#sDoctor').val();
		var dis = $('#sDiscount').val();
		
		$.post("<?php echo $base_url;?>index.php/diagnostics/add_medicine/"+vid,{
		    medicines: v1,
		    qty: v2,
		    price: v3,
		    frm: frm,
		    doctor: doc,
		    discount: dis,
		    usedetail: desc,
		    fitzpatrik: $('#sfitzpatrik').val(),
		    fluence: $('#sfluence').val(),
		    pulse_length: $('#spulse_length').val(),
		    frequency: $('#sfrequency').val(),
		    mode: $('#smode').val(),
		    no_of_treal: $('#sno_of_treal').val(),
		    lens: $('#slens').val(),
		    spot_size: $('#sspot_size').val(),
		    cut_off_filter: $('#scut_off_filter').val(),
		    pulse_train: $('#spulse_train').val(),
		    pause_length: $('#spause_length').val(),
		    pulse_with_us: $('#spulse_with_us').val(),
		    energy_mj: $('#senergy_mj').val()
		},function() {
		    $('#se_id').html('');
		    getService(vid);
		});
		
	}
	
	function deleteService(ids){
		$.post("<?php echo $base_url;?>index.php/diagnostics/delete_service/"+ids,function() {
		    $('#se_id').html('');
		    getService(vid);
		});
	}
	
	function deleteMedicine(ids){
		$.post("<?php echo $base_url;?>index.php/diagnostics/delete_service/"+ids,function() {
		    $('#se_id').html('');
		    getMedicine(vid);
		});
	}
	
	function printFrm(ids){
	    $.post("<?php echo $base_url;?>index.php/prescriptions/view_form/"+ids+"_"+vid,function (data,status){
		viewWindow(data);
	    });
	}
	
	function printRcp(ids){
	    $.post("<?php echo $base_url;?>index.php/prescriptions/receipt_form/"+ids+"_"+vid,function (data,status){
		viewWindow(data);
	    });
	}
	
	function viewOldPrescription(ids){
	    $("#old_diagnostic_form").css('display','block');
	    $.post("<?php echo $base_url;?>index.php/diagnostics/view_pres/"+ids,function(data,status){
		$("#old_dia_form").html(data);
	    });
	    $("#diagnostic_form").css('display','none');
	}
	
	function viewWindow(htms){
            var myWindow = window.open("", "MsgWindow", "width=9000, height=7000");
            myWindow.document.open("text/html", "replace");
            myWindow.document.write(htms);
            myWindow.document.close();
	}
	
	/*function checkForm(formId = ''){
	    
	}*/
	
	function checkBox(values){
	    if(values != 1){
		return "checked";
	    }else{
		return "";
	    }
	}
	
	function checkBoxSave(values){
	    if(parseInt(values) != 1){
		return "1";
	    }else{
		return "0";
	    }
	}
	
	function checkChecked(values){
	    var str = checkBox(values);
	    if(str == "checked"){
		return "<i class='fa fa-check primary'></i>";
	    }else{
		return "<i class='fa fa-times danger'></i>";
	    }
	}
	
</script>



