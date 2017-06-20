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
        
        $diag = '';
        $diagLevel = '';
        $diagDetail = '';
        $appDetail = '';
        
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

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".($row->items_qty * $row->items_prices)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
	    <img class="myCenter" src="<?php echo $resources?>img/bc_logo.png">
	    <h2 class="myCenter h225">ប័ណ្ណចាក់ថ្នាំ</h2>
	    <h5><center>លេខកូដ៖ 00000001 / ឈ្មោះ៖ សេង សុភ័ក្ត្រ / ទូរស័ព្ទ៖ 089 478 368 </center></h5>
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">លេខ</th>
			<th width="15%">ថ្ងៃខែឆ្នាំ</th>
			<th width="30%">ឈ្មោះថ្មាំ</th>
			<th width="20%">បរិយាយ</th>
			<th width="15%">វេជ្ជបណ្ឌិត</th>
			<th width="15%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo @$total;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo @$discount;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo ($total - $discount);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <?php echo @$uids;?></h4>
	</body>
    <?php 
	}elseif($frmId == '2'){
    ?>
	<body>
	    
	    <?php 
		foreach($frmData as $row){
		    $i = $i + 1;
		    $total +=  $row->items_qty * $row->items_prices;
		    $discount += $row->items_discount;
		    
		    $tblRow .= "<tr>";
			$tblRow .= "<td>". $i ."</td>";
			$tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
			$tblRow .= "<td>".$row->products_name."</td>";
			$tblRow .= "<td>".$row->items_time."</td>";
			$tblRow .= "<td class='myCenter'>".$row->name."</td>";
			$tblRow .= "<td class='myCenter'>".($row->items_qty * $row->items_prices)."$ </td>";
		    $tblRow .= "</tr>";
		}
	    ?>
	    
	    <img class="myCenter" src="<?php echo $resources?>img/bc_logo.png">
	    <h2 class="myCenter h225">ប័ណ្ណ Laser</h2>
	    <h5><center>លេខកូដ៖ 00000001 / ឈ្មោះ៖ សេង សុភ័ក្ត្រ / ទូរស័ព្ទ៖ 089 478 368 </center></h5>
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">លេខ</th>
			<th width="15%">ថ្ងៃខែឆ្នាំ</th>
			<th width="25%">ឈ្មោះថ្មាំ</th>
			<th width="20%">បរិយាយ</th>
			<th width="20%">វេជ្ជបណ្ឌិត</th>
			<th width="15%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo @$total;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo @$discount;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo ($total - $discount);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <?php echo @$uids;?></h4>
	</body>
    <?php 
	}elseif($frmId == '3'){
    ?>
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".($row->items_qty * $row->items_prices)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
	    <img class="myCenter" src="<?php echo $resources?>img/bc_logo.png">
	    <h2 class="myCenter h225">Skin Care</h2>
	    <h5><center>លេខកូដ៖ 00000001 / ឈ្មោះ៖ សេង សុភ័ក្ត្រ / ទូរស័ព្ទ៖ 089 478 368 </center></h5>
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">លេខ</th>
			<th width="15%">ថ្ងៃខែឆ្នាំ</th>
			<th width="25%">សេវា</th>
			<th width="20%">បរិយាយ</th>
			<th width="20%">វេជ្ជបណ្ឌិត</th>
			<th width="15%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo @$total;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo @$discount;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo ($total - $discount);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <?php echo @$uids;?></h4>
	</body>
    <?php 
	}elseif($frmId == '4'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".($row->items_qty * $row->items_prices)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
	    <img class="myCenter" src="<?php echo $resources?>img/bc_logo.png">
	    <h2 class="myCenter">ប័ណ្ណ Modern Facial</h2>
	    <h5><center>លេខកូដ៖ 00000001 / ឈ្មោះ៖ សេង សុភ័ក្ត្រ / ទូរស័ព្ទ៖ 089 478 368 </center></h5>
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">លេខ</th>
			<th width="15%">ថ្ងៃខែឆ្នាំ</th>
			<th width="30%">ឈ្មោះថ្មាំ</th>
			<th width="20%">បរិយាយ</th>
			<th width="15%">វេជ្ជបណ្ឌិត</th>
			<th width="15%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo @$total;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo @$discount;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo ($total - $discount);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <?php echo @$uids;?></h4>
	</body>
    <?php 
	}elseif($frmId == '5'){
    ?>
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".($row->items_qty * $row->items_prices)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	<body>
	    <img class="myCenter" src="<?php echo $resources?>img/bc_logo.png">
	    <h2 class="myCenter h2custom">ប័ណ្ណបូមខ្លាញ់ មុនខ្សាច់ និងញេចមុន</h2>
	    <h5><center>លេខកូដ៖ 00000001 / ឈ្មោះ៖ សេង សុភ័ក្ត្រ / ទូរស័ព្ទ៖ 089 478 368 </center></h5>
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">លេខ</th>
			<th width="15%">ថ្ងៃខែឆ្នាំ</th>
			<th width="30%">ឈ្មោះថ្មាំ</th>
			<th width="20%">បរិយាយ</th>
			<th width="15%">វេជ្ជបណ្ឌិត</th>
			<th width="15%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo @$total;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo @$discount;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo ($total - $discount);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <?php echo @$uids;?></h4>
	</body>
    <?php 
	}elseif($frmId == '6'){
    ?>
	
	<?php 
	    foreach($frmData as $row){
		$i = $i + 1;
		$total +=  $row->items_qty * $row->items_prices;
		$discount += $row->items_discount;

		$tblRow .= "<tr>";
		    $tblRow .= "<td>". $i ."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->items_modified."</td>";
		    $tblRow .= "<td>".$row->products_name."</td>";
		    $tblRow .= "<td>".$row->items_time."</td>";
		    $tblRow .= "<td class='myCenter'>".$row->name."</td>";
		    $tblRow .= "<td class='myCenter'>".($row->items_qty * $row->items_prices)."$ </td>";
		$tblRow .= "</tr>";
	    }
	?>
	
	<body>
	    <img class="myCenter" src="<?php echo $resources?>img/bc_logo.png">
	    <h2 class="myCenter"> ប័ណ្ណ Hydroimpact</h2>
	    <h5><center>លេខកូដ៖ 00000001 / ឈ្មោះ៖ សេង សុភ័ក្ត្រ / ទូរស័ព្ទ៖ 089 478 368 </center></h5>
	    
	    <table class="table">
		<thead>
		    <tr>
			<th width="5%">លេខ</th>
			<th width="15%">ថ្ងៃខែឆ្នាំ</th>
			<th width="30%">ឈ្មោះថ្មាំ</th>
			<th width="20%">បរិយាយ</th>
			<th width="15%">វេជ្ជបណ្ឌិត</th>
			<th width="15%">តម្លៃ</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
			echo $tblRow;
		    ?>
		    
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo @$total;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">បញ្ចុះតម្លៃ</td>
			<td class="myCenter"><?php echo @$discount;?>$</td>
		    </tr>
		    <tr>
			<td colspan="5" class="myRight">សរុប</td>
			<td class="myCenter"><?php echo ($total - $discount);?>$</td>
		    </tr>
		</tbody>
	    </table>
	    <h4 class="myLeft">ភ្នំពេញថ្ងៃទី៖ <?php echo date("d/m/Y h:i:sa");?></h4>
	    <h4 class="myLeft">ហត្ថលេខា <?php echo @$uids;?></h4>
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
	    h2{
		font-family: 'Preahvihear' !important;
		font-weight: bold !important;
		float: left !important;
		padding-left: 20% !important;
	    }
	    h5{
		float: left !important;
		padding-left: 10% !important;
	    }
	    .h2custom{
		padding-left: 10% !important;
	    }
	    .h225{
		padding-left: 25% !important;
	    }
	    body{
		font-family: 'Kantumruy' !important;
		color: black !important;
	    }
	    th{
		text-align: center !important;
	    }
	    table, th, td {
		border: 1px solid black !important;
	    }
	    img{
		width: 100px !important;
		float: left !important;
		padding-bottom: 5px !important;
	    }
	    @media print{
		.borderNone{
		    border-left: solid 1px white !important;
		    border-bottom: solid 1px white !important;
		}
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
