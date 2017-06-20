<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
    <head>
        
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo $resources;?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $resources;?>font-awesome/css/font-awesome.min.css">
        <!-- Custom -->
        <link rel="stylesheet" href="<?php echo $resources;?>css/custom.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $resources;?>dist/css/AdminLTE.min.css">
        <!-- Font Embed -->
        <link rel="stylesheet" href="<?php echo $resources;?>css/font.css"/>
        
    </head>
    <body>
	    <div style="width:100% !important; text-align: center; margin-bottom: 30px !important;">
		<h4 class="header textCenter"><br>
			Patient Serve List
		</h4>
	    </div>
            <!--<h5 class="subHeader textCenter">
                
            </h5>-->
            <table class="table" style="width: 100% !important;">
		<thead>
		    <tr>
			<th>Patient</th>
                        <th>Enroll</th>
			<th>Diagnostic</th>
                        <th>Product</th>
                        <th>Service</th>
		    </tr>
		</thead>
		<tbody>
                    <?php
			$vid = 0;
                        $pr = '';
                        $sr = '';
                        $dia = '';
                        $ty = '';
                        $pname = '';
                        $vin_date = '';
                        
			foreach ($patient_report as $rows) {
                            
                            if($vid == 0){
                                $vid = $rows->visitors_id;
                                $pname = $rows->patient_kh_name;
                                $vin_date = $rows->visitors_in_date;
                            }
                            
                            if($vid == $rows->visitors_id){
                                
                                $pname = $rows->patient_kh_name;
                                $vin_date = $rows->visitors_in_date;
                                $ty = $rows->types_id;
                                
                                if($dia == ''){
                                    if($rows->icd10_code != '' || $rows->icd10_desc != ''){
                                        $dia .= '['.$rows->diagnostics_level.']'.$rows->icd10_code.'-'.$rows->icd10_desc;
                                    }else{
                                        $dia .= '['.$rows->diagnostics_level.']'.$rows->diagnostics_detail;
                                    }
                                }
                                
                                if($ty == '2'){
                                    if($pr == ''){
                                        $pr = $rows->products_name;
                                    }else{
                                        $pr .= ','.$rows->products_name;
                                    }
                                }
                                
                                if($ty == '4'){
                                    if($sr == ''){
                                        $sr = $rows->products_name;
                                    }else{
                                        $sr .= ','.$rows->products_name;
                                    }
                                }
                                
                            }else{
                                echo '<tr role="row" class="odd">';
                                    echo '<td>'.$pname.'</td>';
                                    echo '<td>'.$vin_date.'</td>';
                                    echo '<td>'.$dia.'</td>';
                                    echo '<td>'.$pr.'</td>';
                                    echo '<td>'.$sr.'</td>';
                                echo '</tr>';
                                
                                $vid = $rows->visitors_id;
                                $pname = $rows->patient_kh_name;
                                $vin_date = $rows->visitors_in_date;
                                $ty = $rows->types_id;
                                $dia = '';
                                $sr = '';
                                $pr = '';
                                
                                if($dia == ''){
                                    if($rows->icd10_code != '' || $rows->icd10_desc != ''){
                                        $dia .= '['.$rows->diagnostics_level.']'.$rows->icd10_code.'-'.$rows->icd10_desc;
                                    }else{
                                        $dia .= '['.$rows->diagnostics_level.']'.$rows->diagnostics_detail;
                                    }
                                }
                                
                                if($ty == '2'){
                                    if($pr == ''){
                                        $pr = $rows->products_name;
                                    }else{
                                        $pr .= ','.$rows->products_name;
                                    }
                                }
                                
                                if($ty == '4'){
                                    if($sr == ''){
                                        $sr = $rows->products_name;
                                    }else{
                                        $sr .= ','.$rows->products_name;
                                    }
                                }
                            }
			}
                        
                        echo '<tr role="row" class="odd">';
                            echo '<td>'.$pname.'</td>';
                            echo '<td>'.$vin_date.'</td>';
                            echo '<td>'.$dia.'</td>';
                            echo '<td>'.$pr.'</td>';
                            echo '<td>'.$sr.'</td>';
                        echo '</tr>';
		    ?>
		</tbody>
	    </table>
        
    </body>
    <footer>
        <style>
            .invBody{
                padding: 20px !important;
            }
            .textCenter{
                text-align: center !important;
            }
            .textRight{
                text-align: right !important;
            }
            .header{
                width:  100% !important;
                font-weight: bold !important;
                font-family: "Kantumruy" !important;
            }
            .subHeader{
                width:  100% !important;
                font-family: "Kantumruy" !important;
            }
            th{
                text-align: center !important;
                border: solid 1px #5C6A71 !important;
                font-size: 12px !important;
            }
            td{
                border: solid 1px #5C6A71 !important;
                font-size: 12px !important;
            }
            .headPrint{
                background: #5C6A71 !important; 
                color: #FFF !important;
                text-align: center !important;
            }
            
            @media print{
                th{
                    border: solid 1px #5C6A71 !important;
                    background-color: #5C6A71;
                }
                td{
                    border: solid 1px #5C6A71 !important;
                }
                .headPrint{
                    background: #5C6A71 !important; 
                    color: #FFF !important;
                    text-align: center !important;
                }
            }
        </style>
    </footer>
