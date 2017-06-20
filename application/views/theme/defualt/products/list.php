<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/products">'.$h_product.'</a>';?>
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
	    
		<div class="row">
			<div class="col-xs-12" id="form_row" style="display: none;">
				<div class="box" style="padding: 10px !important;">
						
						<br/>
						
						
						<!-----Product Code------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $code;?>
							  </div>
							  <input type="text" name="product_code" id="product_code" class="form-control">
							</div>
						  </div>
						
						<!-----Product Name------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $name;?>
							  </div>
							  <input type="text" name="product_name" id="product_name" class="form-control">
							  <input type="text" name="product_id" id="product_id" style="display:none;">
							</div>
						  </div>
						  
						  <!-----Unit Combo------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $h_unit;?>
							  </div>
							  <?php echo form_dropdown('unit_id', @$unitCombo, @$unit_id,'class="form-control" id="unit_id"');?>
							</div>
						  </div>
						  
						  <!-----Category Combo------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $h_category;?>
							  </div>
							  <?php echo form_dropdown('category_id', @$categoryCombo, @$category_id,'class="form-control" id="category_id"');?>
							</div>
						  </div>
						  
						  <!-----Product Qty------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $qty;?>
							  </div>
							  <input type="text" name="product_qty" id="product_qty" class="form-control">
							</div>
						  </div>
						
						  <!-----Product Cost------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $cost;?>
							  </div>
							  <input type="text" name="product_cost" id="product_cost" class="form-control">
							</div>
						  </div>
						  
						 <!-----Product Qty------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $price;?>
							  </div>
							  <input type="text" name="product_price" id="product_price" class="form-control">
							</div>
						  </div>
						  
						  <!----- Desc ------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo @$desc;?>
							  </div>
							  <textarea name="product_desc" id="product_desc" class="form-control" rows="7"></textarea>
							</div>
						  </div>
						  						  
						  <!----- Submit ------->
						  <div class="form-group">
							<div class="input-group">
							  <input type="submit" class="form-control btn-primary" id="submit_edit" value="<?php echo @$create;?>">
							</div>
						  </div>
			</div><!-- /.box -->			  	
			</div><!-- /.col -->
		</div><!-- /.row -->
		
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
												<th><?php echo $qty;?></th>
												<th><?php echo $price;?></th>
												<th></th>
											</tr>
										</thead>
										<tbody id="productList"></tbody>
									</table>
									<div class="pull-left"><strong><?php echo @$c_total.' : '.@$totals;?></strong></div>
									
									<!-- Start Ppagination -->
									<ul class="pagination pagination-sm no-margin pull-right">
										<li><span class="pg" id="pg0" onclick="pagination(`pg0`);">«</span></li>
										<li><span class="pg pg-active" id="pg1" onclick="pagination(`pg1`);">1</span></li>
										<li><span class="pg" id="pg2" onclick="pagination(`pg2`);">2</span></li>
										<li><span class="pg" id="pg3" onclick="pagination(`pg3`);">3</span></li>
										<li><span class="pg" id="pg4" onclick="pagination(`pg4`);">»</span></li>
									</ul>
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
<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
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
	    $('#msgs').css('display','none');
            pagination(ids);
        }
    }
    $("#btn_create").click(function(){
		$('#msgs').css('display','none');
		$('#form_row').css('display','block');
		$('#form_table').css('display','none');
		$('#title_name').html('/ Create');
	});
	
	//insert Data
    $("#submit_edit").click(function(){
		saveEdit();
	});
    
    function getProductList(mySearch,pageStart,pageLimit){
        
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });

        var htmlView = '';
        var i = 0;
        var stRow = '';
        $.post("<?php echo $base_url;?>index.php/products/get_product_list",{
			search_data: mySearch,
			page_start: '0',
			page_limit: '0'},
			function(data,status){
            $.each(data, function(key,value) {
                htmlView += '<tr ' + stRow + '>';
                    htmlView += '<td>' + value.products_code + '</td>';
                    htmlView += '<td>' + value.products_name + '</td>';
                    htmlView += '<td>' + value.products_qty + '</td>';
                    htmlView += '<td>' + value.products_price + '</td>';
                    htmlView += '<td>';
                        htmlView +='<a href="#" title="<?php echo @$edit;?>"><i class="fa fa-edit action-btn primary" onclick="editProduct(' + value.products_id + ');"></i></a>';
                        htmlView +='<a href="#" title="<?php echo @$delete;?>"><i class="fa fa-trash-o action-btn danger" onclick="deleteProduct(' + value.products_id + ');"></i></a>';
                    htmlView += '</td>';
                htmlView += '</tr>';
            });
                        
            $("#productList").html(htmlView);
            
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }
    function editProduct(ids){
		 $('#msgs').css('display','none');
		 $('#form_row').css('display','block');
		 $('#form_table').css('display','none');
		 $('#submit_edit').val('Update');
		 $('#title_name').html('/ Edit');
		 $.post("<?php echo $base_url;?>index.php/products/get_product_info_by_id_json/"+ids,
		 function(data,status){
			$.each(data, function(key,value) {
				$('#product_id').val(value.products_id);
				$('#product_code').val(value.products_code);
				$('#product_name').val(value.products_name);
				$('#product_price').val(value.products_price);
				$('#product_qty').val(value.products_qty);
				$('#product_cost').val(value.products_cost);
				$('#product_desc').val(value.products_desc);
				$('#unit_id').val(value.units_id);
				$('#category_id').val(value.categories_id);
			});
		 });
    }
    
    function saveEdit(){
		var productId = $('#product_id').val();
		var productCode = $('#product_code').val();
		var productName = $('#product_name').val();
		var productPrice = $('#product_price').val();
		var productQty = $('#product_qty').val();
		var productCost = $('#product_cost').val();
		var productDesc = $('#product_desc').val();
		var unitId = $('#unit_id').val();
		var categoryId = $('#category_id').val();		
		$.post("<?php echo $base_url;?>index.php/products/save_product",{
		    product_id: productId,
		    product_code: productCode,
		    product_name: productName,
		    product_cost: productCost,
		    product_price: productPrice,
		    product_qty: productQty,
		    product_desc: productDesc,
		    unit_id: unitId,
		    category_id: categoryId,
		    product_price: productPrice
		},function(data,status){
		    $('#msgs').css('display','block');
		    pagination();
		});
		
		$('#form_row').css('display','none');
		$('#form_table').css('display','block');
	}
    
    function deleteProduct(ids){
		 $.post("<?php echo $base_url;?>index.php/products/delete_product/"+ids,{products_id: ids},function(data,status){
                     pagination();
                     pagination();
                 }); 
                 pagination();
		             
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
		getProductList(mySearch,pageStart,pageLimit);
	}
    
</script>
