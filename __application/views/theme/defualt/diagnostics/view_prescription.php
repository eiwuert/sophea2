<?php
	$visitorId = '';
	$visitorName = '';
	$visitorCode = '';
	$visitorGender = '';
	$visitorDob = '';
	$leaveStatus = '';
	$visitDate = '';
        
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
                $visitDate = date('d/m/Y', strtotime($row->visitors_in_date));
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
	$visitorAge = date("Y") - date("Y", strtotime($visitorDob)); 
	
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
                        <a href="#" id="p15" onclick="printFrm(9);"><i class="fa fa-print"></i> វេជ្ជបញ្ជា </a><br/>
                        <a href="#" id="p3" onclick="printFrm(4);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ខ្លាញ់ </a><br/>
                        <a href="#" id="p15" onclick="printFrm(7);"><i class="fa fa-print"></i> Facial Peeling </a><br/>
                        <a href="#" id="p5" onclick="printFrm(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ និងសេរ៉ូម </a><br/>
                        <a href="#" id="p14" onclick="printFrm(8);"><i class="fa fa-print"></i> Anti Aging Treatment </a><br/>
                        <a href="#" id="p9" onclick="printFrm(3);"><i class="fa fa-print"></i> Q-Switch Laser </a><br/>
                        <a href="#" id="p8" onclick="printFrm(5);"><i class="fa fa-print"></i> CPL Laser </a><br/>
                        <a href="#" id="p10" onclick="printFrm(6);"><i class="fa fa-print"></i> Erbium Yag Laser </a><br/>
                        <a href="#" id="p7" onclick="printFrm(2);"><i class="fa fa-print"></i> Diode Laser </a><br/>
                    
		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
				<li id="f1"><a href="#" id="p1" onclick="printRcp(2);"><i class="fa fa-print"></i> ប័ណ្ណ Laser </a></li>
			      <li id="f2"><a href="#" id="p2" onclick="printRcp(6);"><i class="fa fa-print"></i> ប័ណ្ណ Hydroimpact </a></li>
			      <li id="f3"><a href="#" id="p3" onclick="printRcp(5);"><i class="fa fa-print"></i> ប័ណ្ណបូមខ្លាញ់ </a></li>
			      <li id="f4"><a href="#" id="p4" onclick="printRcp(4);"><i class="fa fa-print"></i> ប័ណ្ណ Modern Facial </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->

		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
			      <li id="f5"><a href="#" id="p5" onclick="printRcp(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ </a></li>
			      <li id="f6"><a href="#" id="p6" onclick="printRcp(3);"><i class="fa fa-print"></i> Skin Care </a></li>
			      <li id="f7"><a href="#" id="p7" onclick="printFrm(2);"><i class="fa fa-print"></i> Diode Laser </a></li>
			      <li id="f8"><a href="#" id="p8" onclick="printFrm(5);"><i class="fa fa-print"></i> CPL Laser </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->

		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
			      <li id="f9"><a href="#" id="p9" onclick="printFrm(3);"><i class="fa fa-print"></i> Q-Switch Laser </a></li>
			      <li id="f10"><a href="#" id="p10" onclick="printFrm(6);"><i class="fa fa-print"></i> Erbium Yag Laser </a></li>
			      <li id="f11"><a href="#" id="p11" onclick="printFrm(7);"><i class="fa fa-print"></i> Facial Peeling </a></li>
			      <li><a href="#" id="p15" onclick="printFrm(9);"><i class="fa fa-print"></i> វេជ្ជបញ្ជា </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->

		    <!--<div class="col-sm-3">
			<div class="box box-solid">
			  <div class="box-body no-padding">
			    <ul class="nav nav-pills nav-stacked">
				<li><a href="#" id="p12" onclick="printFrm(4);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ខ្លាញ់ </a></li>
				<li><a href="#" id="p13" onclick="printFrm(1);"><i class="fa fa-print"></i> ប័ណ្ណចាក់ថ្នាំ និងសេរ៉ូម</a></li>
				<li><a href="#" id="p14" onclick="printFrm(8);"><i class="fa fa-print"></i> Treatment </a></li>
			    </ul>
			  </div>
			</div>
		    </div>-->
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
		      Patient Information (<?php echo $visitDate;?>)
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
                        <!--<div style="margin-bottom: 10px; font-size: 16px; font-weight: 600;" class="col-sm-12 alert alert-success alert-dismissible">
                                <a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title="Never show me this again!" style="color: rgb(255, 255, 255); font-size: 20px;">×</a>
                                        Save Sucessfull!
                                </a>
                        </div>-->
                        <table class="table table-bordered table-hover dataTable" style="margin-bottom: 5px !important;">
                            <thead>
                                <th>No</th>
                                <th>Diagnostic</th>
                                <th>Level</th>
                                <th>Detail</th>
                            </thead>
                            <tbody id="diags"></tbody>
                        </table>
                        
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
			<div class="col-sm-12">
			    <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				    <thead>
					    <tr role="row">
						    <th style="width: 25%"><?php echo $date;?></th>
						    <th style="width: 15%;"><?php echo $medicine;?></th>
						    <th style="width: 14%;"><?php echo $qty;?></th>
						    <th style="width: 14%;"><?php echo $price;?></th>
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
		    <div class="col-sm-12">
			<table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
			    <thead>
				<tr role="row">
					<th colspan="2"><?php echo $date;?></th>
					<th colspan="3" style="text-align:center;"><?php echo $service;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $qty;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $price;?></th>
                                        <th style="text-align:center;"><?php echo $discount;?></th>
					<th colspan="2" style="text-align:center;"><?php echo $doctor;?></th>
					<th colspan="3"></th>
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
                    
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" style="margin-bottom: 5px !important;">
                                <thead>
                                    <th>No</th>
                                    <th>Diagnostic</th>
                                    <th>Level</th>
                                    <th>Detail</th>
                                </thead>
                                <tbody id="diagOuts"></tbody>
                            </table>
                        </div>

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

		  </div>
		</div>
	      </div>
	    </div>
	</div>
    </div>		
    <?php }?>
    <div class="row">
        <div class="box-body">
            <div class="box-group" id="accordion">
              <div class="panel box box-default">
                <div class="box-header with-border bg-green align-center">
                  <h3 class="align-center box-title">
                      Clincal Note
                  </h3>
                </div>
                <div class="panel-collapse collapse in">
                  <div class="box-body">

                        <div class="col-sm-12">
                            <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                            <tr role="row">
                                                    <th style="width:20%;"><?php echo $date;?></th>
                                                    <th style="text-align:center;width:80%;"><?php echo @$desc;?></th>
                                            </tr>
                                    </thead>
                                    <tbody  id="clinic_id"></tbody>
                            </table>
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
                      Appoinment
                  </h3>
                </div>
              </div>
            </div>
            
            Appointment Date: <span id="appd"></span>
        </div>
    </div>
</div>

<div class="col-sm-4">
        <br/>
        <a href="<?php echo $base_url;?>index.php/patients/photo/<?php echo $patientId;?>" target="_blank"> <button class="btn btn-sm btn-default col-sm-12">View Patient Photo</button> </a>
        <br/>
        <table class="myExample table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
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
    .bloom-row-2 > td{
	background: #f4f4f4 !important;
	border: solid 1px #FFF !important;
	color: green;
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
    .textLeft{
        text-align: left !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo $resources;?>plugins/datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo $resources;?>plugins/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

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
            
            $('#appment').datetimepicker({format:'Y-m-d H:i'});
            
	    getDia(vid);
	    getMedicine(vid);
	    getService(vid);
	    getVisitTime(pid);
            getNote(vid);
            getAppoinment();
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
        
        function autoFormMedicine(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/diagnostics/form_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    
	    if(event.keyCode == 13){
		checkMedicine();
	    }

	}
	
    
	function autoMedicine(){
	    var dinput = $( 'input:focus' ).val();
	    var url = <?php echo '"'.$base_url.'index.php/products/product_auto_complete/"';?>;
	    var soc = String(url+dinput);
	    $( 'input:focus' ).autocomplete({source: soc});
	    var res = $( 'input:focus' ).val().split("-");
	    if(event.keyCode == 13){
				$( '#mQty' ).val('1');
				$( '#mPrice' ).val(res[3]);
                $( '#mTime' ).val(res[4]);
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
	
	function getVisitTime(ids){
	    var i = 0;
	    $.post("<?php echo $base_url;?>index.php/visitors/get_visitor_list_by_patient_id/"+ids,function (data,status){
		var vid = 0;
		var vdate = '';
		var htmlView = '';
		var sr = '';
                var pr = '';
		var din = '';
                var icd10Code = '';
                var icd10Desc = '';
                var detail = '';
                var diaLevel = '';
                var dis = 0;
                var amount = 0;
                var vsid = 0;
                $('#v_id').html('');
		$.each(data, function(key,value) {
		    vid = parseInt(value.visitors_id);
                    
		    if(din == ''){
			i = i + 1;
                        vsid = value.visitors_id;
			din = value.visitors_in_date;
                        dis = parseFloat(value.items_discount);
                        amount = parseFloat(value.items_qty) * parseFloat(value.items_prices);
                        
                        if(value.icd10_code != '' && value.icd10_desc != ''){
                            icd10Code =  '(' + value.icd10_code + ')-';
                            icd10Desc =  value.icd10_desc;
                            detail = ' [' + value.diagnostics_detail + ']';
                            diaLevel = '{' + value.diagnostics_level + '}';
                        }
                        
			if(value.types_id == '4'){
                            sr = value.products_name;
                        }else{
                            pr = value.products_name;
                        }
		    }else if(din != value.visitors_in_date){
                        
                        htmlView = '<tr class="bloom-row"><td colspan="2" class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vsid+');">' + $.datepicker.formatDate('dd-mm-yy', new Date(din)) +'</td></tr>';
                        htmlView += '<tr><td class="handOver"> D ' + diaLevel + ' </td>';
                        htmlView += '<td>' + icd10Code + icd10Desc + detail + '</td></tr>';
                        htmlView += '<tr><td class="handOver"> M </td>';
                        htmlView += '<td>'+ pr +'</td></tr>';
                        htmlView += '<tr><td class="handOver"> S </td>';
                        htmlView += '<td>'+ sr +'</td></tr>';
                        htmlView += '<tr><td class="handOver"> Dis </td>';
                        htmlView += '<td>' + dis + '$ </td></tr>';
                        htmlView += '<tr><td class="handOver"> Total </td>';
                        htmlView += '<td>' + (parseFloat(amount)-parseFloat(dis)) + '$ </td></tr>';

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
                        dis = parseFloat(value.items_discount);
                        amount = parseFloat(value.items_qty) * parseFloat(value.items_prices);
                        if(value.icd10_code != '' && value.icd10_desc != ''){
                            icd10Code =  '(' + value.icd10_code + ')-';
                            icd10Desc =  value.icd10_desc;
                            detail = ' [' + value.diagnostics_detail + ']';
                            diaLevel = '{' + value.diagnostics_level + '}';
                        }
                        
                        if(value.types_id == '4'){
                            sr = value.products_name;
                        }else{
                            pr = value.products_name;
                        }
                        
                        din = value.visitors_in_date;

                    }else{
                        if(value.types_id == '4'){
                            if(sr == ''){
                                sr = value.products_name;
                            }else{
                                sr = sr + "," + value.products_name;
                            }
                        }else{
                            if(pr == ""){
                                pr = value.products_name;
                            }else{
                                pr = pr + "," + value.products_name;
                            }
                        }
                        dis = parseFloat(dis) + parseFloat(value.items_discount);
                        amount = parseFloat(amount) + (parseFloat(value.items_qty) * parseFloat(value.items_prices));
                    }
		});
		
		htmlView = '<tr class="bloom-row"><td colspan="2" class="handOver" title="<?php echo @$view;?>" onclick="viewOldPrescription('+vsid+');">' + $.datepicker.formatDate('dd-mm-yy', new Date(din)) +'</td></tr>';
                htmlView += '<tr><td class="handOver"> D ' + diaLevel + ' </td>';
                htmlView += '<td>' + icd10Code + icd10Desc + detail + '</td></tr>';
                htmlView += '<tr><td class="handOver"> M </td>';
                htmlView += '<td>'+ pr +'</td></tr>';
                htmlView += '<tr><td class="handOver"> S</td>';
                htmlView += '<td>'+ sr +'</td></tr>';
                htmlView += '<tr><td class="handOver"> Dis </td>';
                htmlView += '<td>' + dis + '$ </td></tr>';
                htmlView += '<tr><td class="handOver"> Total </td>';
                htmlView += '<td>' + (parseFloat(amount)-parseFloat(dis)) + '$ </td></tr>';
                
		
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
			
			htmlView += '<td  style="text-align:center !important;">'+value.items_qty+' '+ value.units_name+'</td>';
			htmlView += '<td  style="text-align:center !important;">$'+value.items_prices+'</td>';
			/*htmlView += '<td  style="text-align:center !important;">$'+value.items_discount+'</td>';*/
			htmlView += '<td  style="text-align:center !important;">'+value.accept_by+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_am+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_af+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_pm+'</td>';
			htmlView += '<td  style="text-align:center !important;">'+value.mediacines_nt+'</td>';
			htmlView += '<td  style="text-align:center !important;">';
			htmlView += '</td>';
		    htmlView += '</tr>';
		    
		    if(value.items_time != '' || value.items_detail != ''){
			htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">ពេល៖</td>';
			    htmlView += '<td  colspan="8" style="text-align:center;">'+value.items_time+'</td>';
			htmlView += '</tr>';
                        htmlView += '<tr>';
			    htmlView += '<td  colspan="2" style="text-align:center !important;">បរិយាយ៖</td>';
			    htmlView += '<td  colspan="8" style="text-align:center;">'+value.items_detail+'</td>';
			htmlView += '</tr>';
		    }
                    
                    if(value.forms_name == 'Erbium Yag Laser'){
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="5">Pulse With Us</td>';
			    htmlView += '<td colspan="5">Energy mj</td>';
			htmlView += "</tr>";
			htmlView += "<tr class='bloom-row'>";
			    htmlView += '<td colspan="5">' + value.pulse_with_us + '</td>';
			    htmlView += '<td colspan="5">' + value.energy_mj + '</td>';
			htmlView += "</tr>";
			
		    }
		    
		});
		
		$('#md_id').html(htmlView);
	    });
	}
	
	function getService(ids){
            $('#se_id').html('');
	    var i = 0;
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_service_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    
		    i = i + 1;
		    
		    var htmlView = '';
		    var hts = '';
		    hts += '<tr class="bloom-row-2">';
                        hts += '<td  colspan="3" style="text-align:center !important;">Assign By</td>';
                        hts += '<td  colspan="4" style="text-align:center;">'+value.assign_from+'</td>';
                        hts += '<td  colspan="3" style="text-align:center !important;">Assign To</td>';
                        hts += '<td  colspan="4" style="text-align:center;">'+value.assign_to+'</td>';
                    hts += '</tr>';
                    
		    hts += "<tr>";
			hts += '<td colspan="2">'+ $.datepicker.formatDate('dd-mm-yy', new Date(value.items_modified)) +'</td>';
			if(value.forms_name == null || value.forms_name == ''){
			    hts += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ') </td>';
			}else{
			    hts += '<td colspan="3">'+ value.products_name + '(' + value.products_code + ')-[' + value.forms_name + '] </td>';
			}
			hts += '<td colspan="2">'+ value.units_name + ' </td>';
			hts += '<td colspan="2">$'+ value.items_prices +' </td>';
			hts += '<td>$'+ value.items_discount +'</td>';
			hts += '<td colspan="2">'+ value.accept_by +'</td>';
			hts += '<td colspan="2">'+ htmlView +' </td>';
		    hts += "</tr>";
		    
		    hts += "<tr><td colspan='5'>Descrition</td><td colspan='9'>"+ value.items_detail +"</td></tr>";
		    /*$('#se_id').append(hts);*/
		    
		    if(value.forms_name == 'Q-Switch Laser'){
			hts += "<tr class='bloom-row'>";
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
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">Cut Off Filter</td>';
			    hts += '<td colspan="2">Frequency</td>';
			    hts += '<td colspan="2">Pulse Train</td>';
			    hts += '<td colspan="2">Pause Length</td>';
			    hts += '<td colspan="2">Pulse Length</td>';
			    hts += '<td colspan="2">Fluence</td>';
			    hts += '<td colspan="1">Treat</td>';
			hts += "</tr>";
			hts += "<tr class='bloom-row'>";
			    hts += '<td colspan="2">' + value.cut_off_filter + '</td>';
			    hts += '<td colspan="2">' + value.frequency + '</td>';
			    hts += '<td colspan="2">' + value.pulse_train + '</td>';
			    hts += '<td colspan="2">' + value.pause_length + '</td>';
			    hts += '<td colspan="2">' + value.pulse_length + '</td>';
			    hts += '<td colspan="2">' + value.fluence + '</td>';
			    hts += '<td colspan="1">' + value.no_of_treal + '</td>';
			hts += "</tr>";
		    }else if(value.forms_name == 'Diode Laser'){
			hts += "<tr class='bloom-row'>";
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
			hts += "<tr class='bloom-row'>";
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
		});
		
		/*viewRows('se_id');*/
	    });
	}
	
	function getDia(ids){
	    var i = 0;
            var htms = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_diagnostic_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    i = i + 1;
		    
		    if(i == 1){
			$("#diagnostic").val(value.icd10_code + '_' + value.icd10_desc);
			$("#diagnostic_level").val(value.diagnostics_level);
			$("#desc_dia").val(value.diagnostics_detail);
			dia = value.diagnostics_id;
                        
                        htms += '<tr>';
                            htms += '<td class="textLeft">1</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
		    }
		    if(i == 2){
			$("#diagnostic1").val(value.icd10_code + '_' + value.icd10_desc);
			$("#diagnostic1_level").val(value.diagnostics_level);
			$("#desc_dia1").val(value.diagnostics_detail);
			dia1 = value.diagnostics_id;
                        
                        htms += '<tr>';
                            htms += '<td class="textLeft">2</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
		    }
		    if(i == 3){
			$("#diagnostic2").val(value.icd10_code + '_' + value.icd10_desc);
			$("#diagnostic2_level").val(value.diagnostics_level);
			$("#desc_dia2").val(value.diagnostics_detail);
			dia2 = value.diagnostics_id;
                        
                        htms += '<tr>';
                            htms += '<td class="textLeft">3</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
		    }
                    
                    $('#diags').html(htms);
                    
		    if(i == 4){
			$("#out_dia").val(value.icd10_code + '_' + value.icd10_desc);
			$("#out_dia_level").val(value.diagnostics_level);
			$("#out_dia_des").val(value.diagnostics_detail);
			out_dia = value.diagnostics_id;
                        
                        htms += '<tr>';
                            htms = '<td class="textLeft">1</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
		    }
		    if(i == 5){
			$("#out_dia1").val(value.icd10_code + '_' + value.icd10_desc);
			$("#out_dia1_level").val(value.diagnostics_level);
			$("#out_dia1_des").val(value.diagnostics_detail);
			out_dia1 = value.diagnostics_id;
                        
                        htms += '<tr>';
                            htms += '<td class="textLeft">2</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
		    }
		    if(i == 6){
			$("#out_dia2").val(value.icd10_code + '_' + value.icd10_desc);
			$("#out_dia2_level").val(value.diagnostics_level);
			$("#out_dia2_des").val(value.diagnostics_detail);
			out_dia2 = value.diagnostics_id;
                        
                        htms += '<tr>';
                            htms += '<td class="textLeft">3</td>';
                            htms += '<td class="textLeft">'+value.icd10_code + '_' + value.icd10_desc+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_level+'</td>';
                            htms += '<td class="textLeft">'+value.diagnostics_detail+'</td>';
                        htms += '</tr>';
		    }
                    
                    $('#diagOuts').html(htms);
		    
		});
	    });
	}
	
        function checkMedicine(){
            var htmlView = '';
            if($('#m_form').val() == 'Erbium Yag Laser'){
		htmlView += "<tr>";
		    htmlView +=  '<td colspan="4"><input type="text" id="spulse_with_us" value="" placeholder="Pulse With Us" style="text-align:left;" class="form-control"></td>';
		    htmlView +=  '<td colspan="6"><input type="text" id="senergy_mj" value="" placeholder="Energy mj"  style="text-align:left;" class="form-control"></td>';
		htmlView +=  "</tr>";
	    }
            
            $('#md_id').append(htmlView);
        }
	
	function checkService(){
	    var htmlView = '';
	    if($('#s_form').val() == 'Q-Switch Laser'){
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
		    htmlView +=  '<td colspan="2"><input type="text" id="spause_length" value="" placeholder="Pulse Delay" style="text-align:left;" class="form-control"></td>';
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
        
        function getAppoinment(){
        
            $.post("<?php echo $base_url;?>index.php/diagnostics/getAppoinmentByVisitorId/"+vid,function (data,status){
		$.each(data, function(key,value) {
                    $('#appment').val(value.appoitments_time);
                    $('#appd').text(value.appoitments_time);
		});
                
	    });
        }
        
        
        function getNote(ids){
	    var i = 0;
	    var htmlView = '';
	    $.post("<?php echo $base_url;?>index.php/diagnostics/get_note_list/"+ids,function (data,status){
		$.each(data, function(key,value) {
		    htmlView += '<tr>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_date+'</td>';
				htmlView += '<td  style="text-align:center !important;">'+value.notes_detail+'</td>';
		    htmlView += '</tr>';
		});
		$('#clinic_id').html(htmlView);
	    });
	}
	
	
</script>



