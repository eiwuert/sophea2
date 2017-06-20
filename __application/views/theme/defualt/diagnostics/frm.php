<html>
    <head>
	<link rel="stylesheet" href="<?php echo $resources;?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $resources;?>css/font.css">
    </head>
    <?php 
	$tblRow = '';
	$i = 0;
	$total = 0;
	$discount = 0;
	$pcode = '';
	$pname = '';
	$pgender = '';
	$pdob = '';
	$pphone = '';
	$pgender = '';
	$ppage = date("Y") - date("Y", strtotime($pdob));
        $diag = '';
        $diagLevel = '';
        $diagDetail = '';
        $appDetail = '';
        $phones = '';
        
        $j = 0;
        foreach ($diaData as $rows) {
            $j = $j + 1;
            if($j == 1 || $j == 4){
                $diag = $rows->icd10_desc;
                $diagLevel = $rows->diagnostics_level;
                $diagDetail = $rows->diagnostics_detail;
            }
        }

        foreach ($appData as $rows2) {
            $appDetail = $rows2->appoitments_time;
        }
	
	if($frmId == '1'){
    ?>
    
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
		<div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">ប័ណ្ណចាក់ថ្នាំ និងសេរ៉ូម</center>
		<div style="float:right;position: relative; color:#F17795 !important;font-size:18px"></div>
		<br/><br/>
		<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:358px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:200px !important;">ទូរស័ព្ទ៖ <?php echo $pphone;?></div>
		    	<div style="text-align:left;float:left;width:80px !important;">អាយុ៖  <?php echo $ppage;?></div>
		    </center>
	    </div>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
		    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
		    </center>
	    </div>
	    <table class="table">
		<thead>
		    <tr>
			<th style="color:#F17795 !important" width="5%">លេខ</th>
			<th style="color:#F17795 !important" width="15%">ថ្ងៃខែឆ្នាំ</th>
			<th style="color:#F17795 !important" width="30%">ឈ្មោះថ្មាំ</th>
			<th style="color:#F17795 !important" width="20%">បរិយាយ</th>
			<th style="color:#F17795 !important" width="15%">វេជ្ជបណ្ឌិត</th>
			<th style="color:#F17795 !important" width="15%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <br/><br/><span style="color:#F17795 !important"><?php echo @$uids;?></span></h4>
	</body>
    <?php 
	}elseif($frmId == '2'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->fitzpatrik."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->fluence."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->pulse_length."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->frequency."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->mode."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->no_of_treal."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>$".($row->items_qty * $row->items_prices)."</td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
		<div style="float:left"><img style="width:50px !important" src="<?php echo $resources?>img/logoPrint.png"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">Diode Laser</center>
		<div style="float:right;position: relative; color:#F17795 !important">&nbsp;</div>
		<br/><br/>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:160px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:160px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:160px !important;">ទូរស័ព្ទ៖ <?php echo $pphone;?></div>
		    </center>
	    </div>
	    <table class="table">
		<thead>
		    <tr>
			<th style="color:#F17795 !important" width="5%">No</th>
			<th style="color:#F17795 !important" width="10%">Date</th>
			<th style="color:#F17795 !important" width="7%">Fitz-<br/>patrik</th>
			<th style="color:#F17795 !important" width="10%">Fluence</th>
			<th style="color:#F17795 !important" width="10%">Pulse<br/>Length</th>
			<th style="color:#F17795 !important" width="10%">Freq-<br/>uency</th>
			<th style="color:#F17795 !important" width="15%">Mode</th>
			<th style="color:#F17795 !important" width="5%">Treat</th>
			<th style="color:#F17795 !important" width="13%">Dr</th>
			<th style="color:#F17795 !important" width="10%">Price</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="9" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="9" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="9" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <span style="color:#F17795 !important"><?php echo @$uids;?></span></h4>
	</body>
    <?php 
	}elseif($frmId == '3'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->lens."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->fluence."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->pulse_length."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->frequency."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->spot_size."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->no_of_treal."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>$".round(($row->items_qty * $row->items_prices),2)."</td>";
		$tblRow .= "</tr>";
	    }
	?>
	
	<body>
		<div style="float:left"><img style="width:50px !important" src="<?php echo $resources?>img/logoPrint.png"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">Q-Switch Laser</center>
		<div style="float:right;position: relative; color:#F17795 !important">&nbsp;</div>
		<br/><br/>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:160px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:160px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:160px !important;">ទូរស័ព្ទ៖ <?php echo $pphone;?></div>
		    </center>
	    </div>
	    <table class="table">
		<thead>
		    <tr>
			<th style="color:#F17795 !important" width="5%">No</th>
			<th style="color:#F17795 !important" width="10%">Date</th>
			<th style="color:#F17795 !important" width="7%">Lens</th>
			<th style="color:#F17795 !important" width="10%">Fluence</th>
			<th style="color:#F17795 !important" width="10%">Pulse<br/>Length</th>
			<th style="color:#F17795 !important" width="10%">Freq-<br/>uency</th>
			<th style="color:#F17795 !important" width="10%">Spot<br/>Size</th>
			<th style="color:#F17795 !important" width="5%">Treat</th>
			<th style="color:#F17795 !important" width="18%">Dr</th>
			<th style="color:#F17795 !important" width="10%">Price</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="9" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="9" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="9" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <span style="color:#F17795 !important"><?php echo @$uids;?></span></h4>
	</body>
    <?php 
	}elseif($frmId == '4'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
	    
	    <div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">ប័ណ្ណចាក់ខ្លាញ់</center>
		<div style="float:right;position: relative; color:#F17795 !important;font-size:18px"></div>
		<br/><br/>
		<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:206px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:218px !important;">ទូរស័ព្ទ៖ <?php echo $pphone;?></div>
		    	<div style="text-align:left;float:left;width:56px !important;">អាយុ៖  <?php echo $ppage;?></div>
		    </center>
	    </div>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:272px !important;">Diagnostic: <?php echo @$diag;?></div>
		    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
		    </center>
	    </div>
	    <table class="table">
		<thead>
		    <tr>
			<th style="color:#F17795 !important" width="5%">លេខ</th>
			<th style="color:#F17795 !important" width="20%">ថ្ងៃខែឆ្នាំ</th>
			<th style="color:#F17795 !important" width="30%">ឈ្មោះថ្មាំ</th>
			<th style="color:#F17795 !important" width="10%">ពេល</th>
			<th style="color:#F17795 !important" width="25%">វេជ្ជបណ្ឌិត</th>
			<th style="color:#F17795 !important" width="10%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <span style="color:#F17795 !important"><?php echo @$uids;?></span></h4>
	</body>
    <?php 
	}elseif($frmId == '5'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->cut_off_filter."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->frequency."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->pulse_train."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->pulse_delay."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->pause_length."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->fluence."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->no_of_treal."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".round(($row->items_qty * $row->items_prices),2)."$</td>";
		$tblRow .= "</tr>";
	    }
	?>
	
	<body>
	    <div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">CPL Laser</center>
		<div style="float:right;position: relative; color:#F17795 !important">&nbsp;</div>
		<br/><br/>
		<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:358px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:200px !important;">ទូរស័ព្ទ៖ <?php echo $pphone;?></div>
		    	<div style="text-align:left;float:left;width:80px !important;">អាយុ៖  <?php echo $ppage;?></div>
		    </center>
	    </div>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
		    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
		    </center>
	    </div>
	    <table class="table">
		<thead>
		    <tr>
			<th style="color:#F17795 !important" width="5%">No</th>
			<th style="color:#F17795 !important" width="10%">Date</th>
			<th style="color:#F17795 !important" width="20%">Cut Off<br/>Filter</th>
			<th style="color:#F17795 !important" width="10%">Freq-<br/>uency</th>
			<th style="color:#F17795 !important" width="5%">Pulse<br/>Train</th>
			<th style="color:#F17795 !important" width="5%">Pulse<br/>Delay</th>
			<th style="color:#F17795 !important" width="5%">Pause<br/>Length</th>
			<th style="color:#F17795 !important" width="5%">Fluence</th>
			<th style="color:#F17795 !important" width="5%">Treat</th>
			<th style="color:#F17795 !important" width="15%">Dr</th>
			<th style="color:#F17795 !important" width="10%">Price</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="10" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="10" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="10" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <span style="color:#F17795 !important"><?php echo @$uids;?></span></h4>
	</body>
    <?php 
	}elseif($frmId == '6'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->pulse_with_us."</td>";
		    $tblRow .= "<td>".$row->energy_mj."</td>";
		    $tblRow .= "<td>".$row->medication."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	
	<body>
	    <div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">Erbium Vag Laser</center>
		<div style="float:right;position: relative;color:#F17795 !important ">&nbsp;</div>
		<br/><br/>
		<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:358px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:200px !important;">ទូរស័ព្ទ៖ <?php echo $pphone;?></div>
		    	<div style="text-align:left;float:left;width:80px !important;">អាយុ៖  <?php echo $ppage;?></div>
		    </center>
	    </div>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
		    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
		    </center>
	    </div>
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">No</th>
			<th width="10%">Date</th>
			<th width="15%">Pulse<br/>Width Us</th>
			<th width="15%">Energy mj</th>
			<th width="30%">Medication</th>
			<th width="15%">Dr</th>
			<th width="10%">Price</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="6" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="6" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="6" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <span style="color:#F17795 !important"><?php echo @$uids;?></span></h4>
	</body>
    <?php 
	}elseif($frmId == '7'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
		<div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">ប័ណ្ណភៀសមុខ (Facial Peeling)</center>
		<div style="float:right;position: relative; color:#F17795 !important;font-size:18px"></div>
		<br/><br/>
		<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:206px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:216px !important;">ទូរស័ព្ទ៖ <?php echo $pphone;?></div>
		    	<div style="text-align:left;float:left;width:56px !important;">អាយុ៖  <?php echo $ppage;?></div>
		    </center>
	    </div>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
		    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
		    </center>
	    </div>
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">លេខ</th>
			<th width="20%">ថ្ងៃខែឆ្នាំ</th>
			<th width="30%">ឈ្មោះថ្មាំ</th>
			<th width="10%">ពេល</th>
			<th width="25%">វេជ្ជបណ្ឌិត</th>
			<th width="10%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myCenter"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <span style="color:#F17795 !important"><?php echo @$uids;?></span></h4>
	</body>
    <?php 
	}elseif($frmId == '8'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;
		if( $i % 2 != 0){
		    $tblRow .= "<tr>";
			$tblRow .= '<td width="15%"><img src="'.$resources.'img/face.png" style="width:100%; height:auto;"/></td>';
			$tblRow .= '<td width="35%">';
			    $tblRow .= " Date: ".$row->items_modified."<br/>";
			    $tblRow .= " Treatment: ".$row->products_name."<br/>";
			    $tblRow .= " Qty: ".$row->items_qty."<br/>";
			    $tblRow .= " Price: ".round(($row->items_qty * $row->items_prices),2)."$<br/>";
			    $tblRow .= " Doctor: ".$row->name."<br/>";
			$tblRow .= "</td>";
		}else{
			$tblRow .= '<td width="15%"><img src="'.$resources.'img/face.png" style="width:100%; height:auto;"/></td>';
			$tblRow .= '<td width="35%">';
				$tblRow .= " Date: ".$row->items_modified."<br/>";
				$tblRow .= " Treatment: ".$row->products_name."<br/>";
				$tblRow .= " Qty: ".$row->items_qty."<br/>";
				$tblRow .= " Price: ".round(($row->items_qty * $row->items_prices),2)."$<br/>";
				$tblRow .= " Doctor: ".$row->name."<br/>";
			$tblRow .= "</td>";
		    $tblRow .= "</tr>";
		}
	    }
	    if($i % 2 != 0 ){
		$tblRow .= '<td width="15%"><img src="'.$resources.'img/face.png" style="width:100%; height:auto;"/></td>';
		    $tblRow .= '<td width="35%"></td>';
		$tblRow .= '</tr>';
	    } 
	?>
	
	<body>
	    <div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">Anti Aging Treatment</center>
		<div style="float:right;position: relative; color:#F17795 !important;font-size:18px"></div>
		<br/><br/>
		<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:358px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
		    	<div style="text-align:left;float:left;width:60px !important;">អាយុ៖  <?php echo @$ppage;?></div>
		    	<div style="text-align:left;float:left;width:64px !important;">ភេទ៖ <?php echo @$pgender;?></div>
		    </center>
	    </div>
	    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
		   	<center>
		    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo $pcode;?></div>
		    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
		    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
		    </center>
	    </div>
	    <table class="table">
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="3" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myRight"><?php echo round(@$total,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="3" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
			<td class="myRight"><?php echo round(@$discount,2);?>$</td>
		    </tr>
		    <tr>
			<td colspan="3" class="myRight" style="color:#F17795 !important">សរុប</td>
			<td class="myRight"><?php echo round(($total - $discount),2);?>$</td>
		    </tr>
		</tbody>
	    </table>
	</body>
    <?php 
	}elseif($frmId == '9' || $frmId == '12' || $frmId == '13'){
   
	    $mamount = 0;
	    $tbl1 = '';
            $i = 0;
            $j = 0;
            //$acceptUser = '';
	    foreach($frmData as $row){
		$am ='';
		$af ='';
		$pm = '';
		$nt = '';

		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;
        $phones = $row->phone;
		
		if($row->patient_gender == 'm'){
		    $pgender = "ប្រុស";
		}else{
		    $pgender = "ស្រី";
		}
		
		if($row->types_id == '2'){
			$total +=  $row->items_qty * $row->items_prices;
			$discount += $row->items_discount;
            $i = $i + 1;
		    $tblRow .= "<tr>";
			$tblRow .= "<td>". $i ."</td>";
			$tblRow .= "<td class='myLeft'>".$row->products_name."</td>";
			$tblRow .= "<td class='myLeft'>".$row->items_time."</td>";
			$tblRow .= "<td class='myCenter'>".$row->items_qty."</td>";
			$tblRow .= "<td class='myCenter'>".$row->mediacines_am."</td>";
			$tblRow .= "<td class='myCenter'>".$row->mediacines_af."</td>";
			$tblRow .= "<td class='myCenter'>".$row->mediacines_pm."</td>";
			$tblRow .= "<td class='myCenter'>".$row->mediacines_nt."</td>";
			$tblRow .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
		    $tblRow .= "</tr>";
		    $tblRow .= "<tr><td colspan='9'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
		}
		// close print 2 medicine and service
		// else{
		//                   $j = $j + 1;
		//     $tbl1.= "<tr>";
		// 	$tbl1 .= "<td>". $j ."</td>";
		// 	$tbl1 .= "<td class='myLeft'>".$row->products_name."</td>";
		// 	$tbl1 .= "<td class='myLeft'>".$row->items_time."</td>";
		//           $tbl1 .= "<td class='myLeft'>".$row->name."</td>";
		// 	$tbl1 .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
		//     $tbl1 .= "</tr>";
		//     $tbl1 .= "<tr><td colspan='5'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
		// }
		
		
	    }
	?>
	
	<body>
		<div style="min-height:690px; padding-top:2px">
			<div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">គ្លីនិកឯកទេសសើស្បែក នឹង ឡេសឺរ រស្មីសោភា<br>Reaksmey Sorphea Skin and Laser Clinic</center>
			<div style="float:right;position: relative;top:-44px; color:#F17795 !important;font-size:15px">វេជ្ជបញ្ជា</div>
			<div style="float:left;width:100% !important padding:0px !important; margin:0px !important; background-color:yellow">
			   	<center>
			    	<div style="text-align:left;float:left;width:358px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
			    	<div style="text-align:left;float:left;width:60px !important;">អាយុ៖  <?php echo @$ppage;?></div>
			    	<div style="text-align:left;float:left;width:64px !important;">ភេទ៖ <?php echo @$pgender;?></div>
			    </center>
		    </div>
		    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
			   	<center>
			    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo @$pcode;?></div>
			    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
			    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
			    </center>
		    </div>
		    <table class="table">
			<thead>
			    <tr>
				<th style="color:#F17795 !important" width="2%">No.</th>
				<th style="color:#F17795 !important" width="35%">Medicine</th>
				<th style="color:#F17795 !important" width="48%">Description</th>
				<th style="color:#F17795 !important" width="5%" style="font-size: 7px !important; padding-left: 0px !important; padding-right: 0px !important;">QTY</th>
	            <th style="color:#F17795 !important" width="0.5%" style="font-size: 7px !important; padding-left: 0px !important; padding-right: 0px !important;">ព្រឹក</th>
				<th style="color:#F17795 !important" width="0.5%" style="font-size: 7px !important; padding-left: 0px !important; padding-right: 0px !important;">ថ្ងៃ</th>
				<th style="color:#F17795 !important" width="0.5%" style="font-size: 7px !important; padding-left: 0px !important; padding-right: 0px !important;">ល្ងាច</th>
				<th style="color:#F17795 !important" width="0.5%" style="font-size: 7px !important; padding-left: 0px !important; padding-right: 0px !important;">យប់</th>
				<th style="color:#F17795 !important" width="8%" style="padding-left: 0px !important; padding-right: 0px !important;">Price</th>
			    </tr>
			</thead>
			<tbody>
			    <?php 
				echo $tblRow;
			    ?>
			    <tr>
				<td colspan="8" class="myRight" style="color:#F17795 !important">សរុប</td>
				<td class="myRight"><?php echo round(@$total,2);?>$</td>
			    </tr>
			    <tr>
				<td colspan="8" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
				<td class="myRight"><?php echo round(@$discount,2);?>$</td>
			    </tr>
			    <tr>
				<td colspan="8" class="myRight" style="color:#F17795 !important">សរុប</td>
				<td class="myRight"><?php echo round(($total - $discount),2);?>$</td>
			    </tr>
			</tbody>
		    </table>
		    <div style="line-height: 1">
		    <h4><span class="fleft">សូមយកវេជ្ជបញ្ជាមកជាមួយ​</span><span class="fright">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></span></h4>
		    <br>
		    <h4><span class="fleft">ថ្ងៃណាត់ជួបលើកក្រោយ</span><span class="fright" style="margin-right:50px">ហត្ថលេខា</span></h4>
		    <br>
		    <h4><span class="fleft"><?php if(date("Y", strtotime(@$appDetail)) != '1970'){
                                                echo "Date: ".date("d/m/Y h:i:sa", strtotime(@$appDetail));
                                            }else{
                                                echo "Date: .......... / .......... / ..........";
                                            }
                                    ?> </span>
		    <br><br><br>
		    <span class="fright" style="color:#F17795 !important"><?php echo @$uids;?></span><br/>
		    <span class="fright">Tel:<?php echo @$uphones;?></span></h4>
		    </div>    
	    </div>
	</body>
	<?php 
	}elseif($frmId == '14'){
   
	    $mamount = 0;
	    $tbl1 = '';
        $i = 0;
        $j = 0;
            //$acceptUser = '';
	    foreach($frmData as $row){
		$am ='';
		$af ='';
		$pm = '';
		$nt = '';
		
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;
        $phones = $row->phone;
		
		if($row->patient_gender == 'm'){
		    $pgender = "ប្រុស";
		}else{
		    $pgender = "ស្រី";
		}

			if($row->types_id !== '2'){

				$total +=  $row->items_qty * $row->items_prices;
				$discount += $row->items_discount;

	            $j = $j + 1;
			    $tbl1.= "<tr>";
				$tbl1 .= "<td>". $j ."</td>";
				$tbl1 .= "<td class='myLeft'>".$row->products_name."</td>";
				$tbl1 .= "<td class='myLeft'>".$row->items_time."</td>";
	            $tbl1 .= "<td class='myLeft'>".$row->name."</td>";
				$tbl1 .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
			    $tbl1 .= "</tr>";
			    $tbl1 .= "<tr><td colspan='5'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
			}
	    }
	?>
		<div style="min-height:690px; padding-top:2px">
		    <div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">គ្លីនិកឯកទេសសើស្បែក នឹង ឡេសឺរ រស្មីសោភា<br>Reaksmey Sorphea Skin and Laser Clinic</center>
			<div style="float:right;position: relative;top:-44px; color:#F17795 !important;font-size:15px">សេវាកម្ម</div>
			<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
			   	<center>
			    	<div style="text-align:left;float:left;width:358px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
			    	<div style="text-align:left;float:left;width:60px !important; ">អាយុ៖  <?php echo @$ppage;?></div>
			    	<div style="text-align:left;float:left;width:64px !important;">ភេទ៖ <?php echo @$pgender;?></div>
			    </center>
		    </div>
		    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
			   	<center>
			    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo @$pcode;?></div>
			    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
			    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
			    </center>
		    </div>
		    <table class="table">
			<thead>
			    <tr>
				<th style="color:#F17795 !important" width="5%">លេខ</th>
				<th style="color:#F17795 !important" width="30%">សេវា</th>
				<th style="color:#F17795 !important" width="32%">ពណ៌នា</th>
	            <th style="color:#F17795 !important" width="20%">ឈ្មោះ</th>
				<th style="color:#F17795 !important" width="13%">តម្លៃ</th>
			    </tr>
			</thead>
			<tbody>
			    <?php 
				echo $tbl1;
			    ?>
			    
			    <tr>
				<td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
				<td class="myRight"><?php echo round(@$total,2);?>$</td>
			    </tr>
			    <tr>
				<td colspan="4" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
				<td class="myRight"><?php echo round(@$discount,2);?>$</td>
			    </tr>
			    <tr>
				<td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
				<td class="myRight"><?php echo round(($total - $discount),2);?>$</td>
			    </tr>
			</tbody>
		    </table>
		    <div style="line-height: 1">
		    <h4><span class="fleft">សូមយកវេជ្ជបញ្ជាមកជាមួយ​</span><span class="fright">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></span></h4>
		    <br>
		    <h4><span class="fleft">ថ្ងៃណាត់ជួបលើកក្រោយ</span><span class="fright" style="margin-right:50px">ហត្ថលេខា</span></h4>
		    <br>
		    <h4><span class="fleft">Date: <?php if(date("Y", strtotime(@$appDetail)) != '1970'){
                                                echo date("d/m/Y h:i:sa", strtotime(@$appDetail));
                                            }else{
                                                echo "Date: .......... / .......... / ..........";
                                            }
                                    ?> </span>
		    <br><br><br>
		    <span class="fright" style="color:#F17795 !important"><?php echo @$uids;?></span><br/>
		    <span class="fright">Tel:<?php echo @$uphones;?></span></h4>
		    </div>
		</div>
	<?php 
	    }elseif($frmId == '10'){
	
            $total2 = 0;
            $total3 = 0;
            $total4 = 0;
            $total5 = 0;
                
	    $mamount = 0;
	    $tbl1 = '';
            $tbl2 = '';
            $tbl3 = '';
            $tbl4 = '';
            $tbl5 = '';
            $ii = 0;
	    foreach($frmData as $row){
		$am ='';
		$af ='';
		$pm = '';
		$nt = '';

		$i = $i + 1;
		$discount += $row->items_discount;
		$pdob = $row->patient_dob;
		$pname = $row->patient_kh_name;
		$pcode = $row->patient_code;
		$pphone = $row->patient_phone;
		$ordernant_no  = $row->ordernant_no;
		if($row->patient_gender == 'm'){
		    $pgender = "ប្រុស";
		}else{
		    $pgender = "ស្រី";
		}
		
		if($row->types_id == '2'){
				$ii = $ii+1;
                    if($row->ordernant_no == '1'){
                        $total +=  $row->items_qty * $row->items_prices;
                        // No. top
                        $tblRow .= "<tr>";
                            $tblRow .= "<td>". $ii ."</td>";
                            $tblRow .= "<td class='myLeft'>".$row->products_name."</td>";
                            $tblRow .= "<td class='myLeft'>".$row->items_time."</td>";
                            $tblRow .= "<td class='myCenter'>".$row->items_qty."</td>";
                            $tblRow .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
                        $tblRow .= "</tr>";
                        // $tblRow .= "<tr><td colspan='9'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
                    }
                    if($row->ordernant_no == '2'){
                        
                        $total2 +=  $row->items_qty * $row->items_prices;
                        
                        $tbl2 .= "<tr>";
                            $tbl2 .= "<td>". $ii ."</td>";
                            $tbl2 .= "<td class='myLeft'>".$row->products_name."</td>";
                            $tbl2 .= "<td class='myLeft'>".$row->items_time."</td>";
                            $tbl2 .= "<td class='myCenter'>".$row->items_qty."</td>";
                            $tbl2 .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
                        $tbl2 .= "</tr>";
                        // $tbl2 .= "<tr><td colspan='9'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
                    }
                    if($row->ordernant_no == '3'){
                        
                        $total3 +=  $row->items_qty * $row->items_prices;
                        
                        $tbl3 .= "<tr>";
                            $tbl3 .= "<td>". $ii ."</td>";
                            $tbl3 .= "<td class='myLeft'>".$row->products_name."</td>";
                            $tbl3 .= "<td class='myLeft'>".$row->items_time."</td>";
                            $tbl3 .= "<td class='myCenter'>".$row->items_qty."</td>";
                            $tbl3 .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
                        $tbl3 .= "</tr>";
                        // $tbl3 .= "<tr><td colspan='9'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
                    }
                    if($row->ordernant_no == '4'){
                        
                        $total4 +=  $row->items_qty * $row->items_prices;
                        
                        $tbl4 .= "<tr>";
                            $tbl4 .= "<td>". $ii ."</td>";
                            $tbl4 .= "<td class='myLeft'>".$row->products_name."</td>";
                            $tbl4 .= "<td class='myLeft'>".$row->items_time."</td>";
                            $tbl4 .= "<td class='myCenter'>".$row->items_qty."</td>";
                            $tbl4 .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
                        $tbl4 .= "</tr>";
                        // $tbl4 .= "<tr><td colspan='9'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
                    }
                    if($ordernant_no == '5'){
                        
                        $total5 +=  $row->items_qty * $row->items_prices;
                        
                        $tbl5 .= "<tr>";
                            $tbl5 .= "<td>". $ii ."</td>";
                            $tbl5 .= "<td class='myLeft'>".$row->products_name."</td>";
                            $tbl5 .= "<td class='myLeft'>".$row->items_time."</td>";
                            $tbl5 .= "<td class='myCenter'>".$row->items_qty."</td>";
                            $tbl5 .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
                        $tbl5 .= "</tr>";
                        // $tbl5 .= "<tr><td colspan='9'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
                    }
		}else{
                    
                    $total +=  $row->items_qty * $row->items_prices;
                    
		    $tbl1.= "<tr>";
			$tbl1 .= "<td>". $i ."</td>";
			$tbl1 .= "<td class='myLeft'>".$row->products_name."</td>";
			$tbl1 .= "<td class='myLeft'>".$row->items_time."</td>";
			$tbl1 .= "<td class='myRight'>".round(($row->items_qty * $row->items_prices),2)."$ </td>";
		    $tbl1 .= "</tr>";
		    $tbl1 .= "<tr><td colspan='4'><span style='visibility: hidden;'>ក</span>".$row->items_detail."</td></tr>";
		}
	    }
	    
	    $dias = '';
	    $diaLevel = '';
	    $j = 0;
	    foreach ($diaData as $row1) {
		$j = $j + 1;
		if($j <= 4){
		    $dias = $row1->icd10_desc;
		    $diaLevel = $row1->diagnostics_level;
		}
	    }
	?>
	
	<body>
            <?php
                if($tblRow <> '' || $tblRow != '' || $tbl1 != ''){ 
            ?>
	       	<!-- xxxxxxxxxx -->
			<div style="min-height: 850px;">
				<div style="float:left"><img style="width:50px !important" src="<?php echo base_url("resources/theme/defualt/img/logoPrint.png")?>"/></div>
			<center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">គ្លីនិកឯកទេសសើស្បែក នឹង ឡេសឺរ រស្មីសោភា<br>Reaksmey Sorphea Skin and Laser Clinic<br><br><span style="margin-left:40px; color:#F17A97 !important">វិក័យប័ត្រ</span></center>
			<div style="float:right;position: relative;top:-44px; color:#F17795 !important;font-size:15px"></div>

				<!-- <center style="color:#2F3290 !important;font-size:15px;position: relative;left: -30px;">វិក័យប័ត្រ</center>
				<div style="float:right;position: relative;top:-44px; color:#F17795 !important;font-size:15px">សេវាកម្ម</div> -->
				<div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
				   	<center>
				    	<div style="text-align:left;float:left;width:358px !important;">ឈ្មោះ៖ <?php echo @$pname;?></div>
				    	<div style="text-align:left;float:left;width:60px !important; ">អាយុ៖  <?php echo @$ppage;?></div>
				    	<div style="text-align:left;float:left;width:64px !important;">ភេទ៖ <?php echo @$pgender;?></div>
				    </center>
			    </div>
			    <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
				   	<center>
				    	<div style="text-align:left;float:left;width:150px !important;">លេខកូដ៖ <?php echo @$pcode;?></div>
				    	<div style="text-align:left;float:left;width:270px !important;">Diagnostic: <?php echo @$diag;?></div>
				    	<div style="text-align:left;float:left;width:60px !important;">Level: <?php echo @$diagLevel;?></div>
				    </center>
			    </div>
                <?php if(@$dias != null || @$dias != ''){ ?>
                	<!-- <div style="float:left;width:100% !important padding:0px !important; margin:0px !important">
					   	<center>
					    	<div style="text-align:left;float:left;width:420px !important;">រោគវិនិច្ឆ័យ៖ <?php echo @$dias;?></div>
					    	<div style="text-align:left;float:left;width:60px !important;">កម្រិត៖  <?php echo @$diaLevel;?></div>
					    </center>
				    </div> -->
                <?php 
                    }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">លេខ</th>
                            <th width="30%">ឈ្មោះថ្មាំ</th>
                            <th width="42%">ពណ៌នា</th>
                            <th width="10%">ចំនួន</th>
                            <th width="15%">តម្លៃ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo $tblRow;
                        ?>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color:#F17795 !important" width="5%">លេខ</th>
                            <th style="color:#F17795 !important" width="30%">សេវា</th>
                            <th style="color:#F17795 !important" width="52%">ពណ៌នា</th>
                            <th style="color:#F17795 !important" width="13%">តម្លៃ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo $tbl1;
                        ?>

                        <tr>
                            <td colspan="3" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(@$total,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
                            <td class="myRight"><?php echo round(@$discount,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(($total - $discount),2);?>$</td>
                        </tr>
                    </tbody>
                </table>
                <div style="line-height: 1">
			    <h4><span class="fleft">សូមយកវេជ្ជបញ្ជាមកជាមួយ​</span><span class="fright">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></span></h4>
			    <br>
			    <h4><span class="fleft">ថ្ងៃណាត់ជួបលើកក្រោយ</span><span class="fright" style="margin-right:50px">ហត្ថលេខា</span></h4>
			    <br>
			    <h4><span class="fleft">Date: <?php if(date("Y", strtotime(@$appDetail)) != '1970'){
                                                    echo date("d/m/Y h:i:sa", strtotime(@$appDetail));
                                                }else{
                                                	echo "Date: .......... / .......... / ..........";
                                            	}
                                        ?> </span>
			    <br><br><br>
			    <span class="fright" style="color:#F17795 !important"><?php echo @$uids;?></span><br/>
			    <span class="fright">Tel:<?php echo @$uphones;?></span></h4>
			    </div>
            </div> 
            <?php 
                }
                if($tbl2 != ''){
            ?>
            <div style="min-height: 850px;">
                <br/><br/><br/><br/><br/><br/>
                <center><h3>វិក័យប័ត្រ</h3></center>
                <center><h6>លេខកូដ៖ <?php echo $pcode;?> / ឈ្មោះ៖ <?php echo $pname;?> / ភេទ៖ <?php echo $pgender;?>/ អាយុ៖  <?php echo $ppage;?>/ Diagnostic: <?php echo @$diag;?>/ Level: <?php echo @$diagLevel;?></h6>
                <?php if(@$dias != null || @$dias != ''){ ?>
                    <h6>រោគវិនិច្ឆ័យ៖ <?php echo @$dias;?> / កម្រិត៖  <?php echo @$diaLevel;?></h6></center>
                <?php }?>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">លេខ</th>
                            <th width="30%">ឈ្មោះថ្មាំ</th>
                            <th width="42%">ពណ៌នា</th>
                            <th width="10%">ចំនួន</th>
                            <th width="15%">តម្លៃ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo $tbl2;
                        ?>
                        
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(@$total2,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
                            <td class="myRight"><?php echo round(@$discount,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(($total2),2);?>$</td>
                        </tr>
                        
                    </tbody>
                </table><br/>
            </div>
            <?php 
                }
                if($tbl3 != '' || $tbl3 <> ''){
            ?>
            <div style="min-height: 850px;">
                <br/><br/><br/><br/><br/><br/>
                <center><h3>វិក័យប័ត្រ</h3></center>
                <center><h6>លេខកូដ៖ <?php echo $pcode;?> / ឈ្មោះ៖ <?php echo $pname;?> / ភេទ៖ <?php echo $pgender;?>/ អាយុ៖  <?php echo $ppage;?>/ Diagnostic: <?php echo @$diag;?>/ Level: <?php echo @$diagLevel;?></h6>
                <?php if(@$dias != null || @$dias != ''){ ?>
                    <h6>រោគវិនិច្ឆ័យ៖ <?php echo @$dias;?> / កម្រិត៖  <?php echo @$diaLevel;?></h6></center>
                <?php }?>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">លេខ</th>
                            <th width="30%">ឈ្មោះថ្មាំ</th>
                            <th width="42%">ពណ៌នា</th>
                            <th width="10%">ចំនួន</th>
                            <th width="15%">តម្លៃ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo $tbl3;
                        ?>
                        
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(@$total3,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
                            <td class="myRight"><?php echo round(@$discount,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(($total3),2);?>$</td>
                        </tr>
                    </tbody>
                </table><br/>
            </div>
            <?php 
                }
                if($tbl4 != '' || $tbl4 <> ''){
            ?>
            <div style="min-height: 850px;">
                <br/><br/><br/><br/><br/><br/>
                <center><h3>វិក័យប័ត្រ</h3></center>
                <center><h6>លេខកូដ៖ <?php echo $pcode;?> / ឈ្មោះ៖ <?php echo $pname;?> / ភេទ៖ <?php echo $pgender;?>/ អាយុ៖  <?php echo $ppage;?>/ Diagnostic: <?php echo @$diag;?>/ Level: <?php echo @$diagLevel;?></h6>
                <?php if(@$dias != null || @$dias != ''){ ?>
                    <h6>រោគវិនិច្ឆ័យ៖ <?php echo @$dias;?> / កម្រិត៖  <?php echo @$diaLevel;?></h6></center>
                <?php }?>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">លេខ</th>
                            <th width="30%">ឈ្មោះថ្មាំ</th>
                            <th width="42%">ពណ៌នា</th>
                            <th width="10%">ចំនួន</th>
                            <th width="15%">តម្លៃ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo $tbl4;
                        ?>
                        
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(@$total4,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
                            <td class="myRight"><?php echo round(@$discount,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(($total4),2);?>$</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <?php 
                }
                if($tbl5 != '' || $tbl5 <> ''){
            ?>
            <div style="min-height: 850px;">
                <br/><br/><br/><br/><br/><br/>
                <center><h3>វិក័យប័ត្រ</h3></center>
                <center><h6>លេខកូដ៖ <?php echo $pcode;?> / ឈ្មោះ៖ <?php echo $pname;?> / ភេទ៖ <?php echo $pgender;?>/ អាយុ៖  <?php echo $ppage;?>/ Diagnostic: <?php echo @$diag;?>/ Level: <?php echo @$diagLevel;?></h6>
                <?php if(@$dias != null || @$dias != ''){ ?>
                    <h6>រោគវិនិច្ឆ័យ៖ <?php echo @$dias;?> / កម្រិត៖  <?php echo @$diaLevel;?></h6></center>
                <?php }?>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">លេខ</th>
                            <th width="30%">ឈ្មោះថ្មាំ</th>
                            <th width="42%">ពណ៌នា</th>
                            <th width="10%">ចំនួន</th>
                            <th width="15%">តម្លៃ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo $tbl5;
                        ?>
                        
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(@$total,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">បញ្ចុះតម្លៃ</td>
                            <td class="myRight"><?php echo round(@$discount,2);?>$</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="myRight" style="color:#F17795 !important">សរុប</td>
                            <td class="myRight"><?php echo round(($total5),2);?>$</td>
                        </tr>
                    </tbody>
                </table><br/>
            </div>
            <?php 
                }
            ?>
	</body>
	
    <?php }else{ ?>
	<h1> It is not in range ! </h1>
    <?php }?>

	<style type="text/css">
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
	    h2{
		font-family: 'Preahvihear' !important;
		font-weight: bold !important;
		float: left !important;
		padding-left: 20% !important;
	    }
	    h4{
		font-size: 10px !important;
	    }
	    h5{
    	    /*margin-top: 0px​!important;*/
			/*margin-bottom: 3px​!important;*/
			/*font-size: 10px !important;*/
		float: left !important;
		padding-left: 10% !important;
	    }
	    .h2custom{
		padding-left: 10% !important;
	    }
	    .h215{
		padding-left: 15% !important;
	    }
	    .h225{
		padding-left: 25% !important;
	    }
	    .h220{
		padding-left: 20% !important;
	    }
	    body{
		font-family: 'Kantumruy' !important;
		font-size:11px;		
	    }
	    th{
		text-align: center !important;
		color:pink;
	    }
	    .table{
	    	margin-bottom: 10px !important;
	    }
	    table, th, td {
		border: 1px solid #3CA9DF !important;
		font-size: 10px !important;
	    }
	    .table tbody tr td{
	    	padding:2px !important;
	    }
	    .table tbody tr th{
	    	padding:2px !important;
	    }
	    img{
		width: 100px !important;
		float: left !important;
		padding-bottom: 5px !important;
	    }
	</style>
	<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript">
		$(window).bind("load", function() {
			window.print();
			window.close();
		});
	</script>
	
</html>
