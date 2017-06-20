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
			Drug Report
		</h4>
	    </div>
            <!--<h5 class="subHeader textCenter">
                
            </h5>-->
            <table class="table" style="width: 100% !important;">
		<thead>
		    <tr>
			            <th>No</th>
                        <th>Drug Name</th>
                        <th>Quantity Used</th>
                        <th>Quantity Price</th>
		    </tr>
		</thead>
		<tbody>
            <?php
    			$n = 0;
                $total = 0;
                $total_price = 0;
    			foreach ($dr_report as $rows) {
                    $n++;
                    $total += ($rows->sumQty);
                    $total_price += ($rows->sumPrice);
                                
    			    echo '<tr role="row" class="odd">';
    				    echo '<td>'.$n.'</td>';
                        echo '<td>'.$rows->products_name.'</td>';
                        echo '<td>'.$rows->sumQty.'</td>';
                        echo '<td style="text-align: right;">'.$rows->sumPrice.'$</td>';
    			    echo '</tr>';
    			}                            
                    echo '<tr role="row" class="odd" style="font-weight: bold;">';
                        echo '<td colspan="2" style="text-align: right;"> Total </td>';
                        echo '<td style="text-align: left;">'.$total.'</td>';
                        echo '<td style="text-align: right;">'.$total_price.'$</td>';
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
