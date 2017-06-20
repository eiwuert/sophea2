<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/categories">'.$h_category.'</a>';?>
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
						<!-----Unit Name------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $name;?>
							  </div>
							  <input type="text" name="category_name" id="category_name" class="form-control">
							  <input type="text" name="category_id" id="category_id" style="display:none;">
							</div>
						  </div>
						  
						  <!-----Type Combo------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo $h_type;?>
							  </div>
							  <?php echo form_dropdown('type_id', @$typeCombo, @$type_id,'class="form-control" id="type_id"');?>
							</div>
						  </div>
						  
						  <!----- Desc ------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo @$desc;?>
							  </div>
							  <textarea name="category_desc" id="category_desc" class="form-control" rows="7"></textarea>
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
												<th><?php echo $name;?></th>
												<th><?php echo $h_type;?></th>
												<th><?php echo $desc;?></th>
												<th></th>
											</tr>
										</thead>
										<tbody id="categoryList"></tbody>
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
    
    function getCategoryList(mySearch,pageStart,pageLimit){
        
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });

        var htmlView = '';
        var i = 0;
        var stRow = '';
        $.post("<?php echo $base_url;?>index.php/categories/get_category_list",{
			search_data: mySearch,
			page_start: pageStart,
			page_limit: pageLimit},
			function(data,status){
            $.each(data, function(key,value) {
                
                htmlView ='<a href="#" title="<?php echo @$edit;?>"><i class="fa fa-edit action-btn primary" onclick="editCategory(' + value.categories_id + ');"></i></a>';
                htmlView +='<a href="#" title="<?php echo @$delete;?>"><i class="fa fa-trash-o action-btn danger" onclick="deleteCategory(' + value.categories_id + ');"></i></a>';
                
                startTrTd();
                    setTd(value.categories_name);
                    setTd(value.types_name);
                    setTd(value.categories_desc);
                    setTd(htmlView);
                stopTrTd();
            });
                    
            viewRows('categoryList');
            
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }
    function editCategory(ids){
		$('#msgs').css('display','none');
		 $('#form_row').css('display','block');
		 $('#form_table').css('display','none');
		 $('#submit_edit').val('Update');
		 $('#title_name').html('/ Edit');
		 $.post("<?php echo $base_url;?>index.php/categories/get_category_info_by_id_json/"+ids,
		 function(data,status){
			$.each(data, function(key,value) {
				$('#category_name').val(value.categories_name);
				$('#category_desc').val(value.categories_desc);
				$('#type_id').val(value.types_id);
				$('#category_id').val(value.categories_id);
			});
		 });
    }
    
    function saveEdit(){
		var categoryId = $('#category_id').val();
		var categoryName = $('#category_name').val();
		var categoryDesc = $('#category_desc').val();
		var typeId = $('#type_id').val();		
		$.post("<?php echo $base_url;?>index.php/categories/save_category",{
		    category_id: categoryId,
		    type_id: typeId,
		    category_name: categoryName,
		    category_desc: categoryDesc
		},function(data,status){
		    $('#msgs').css('display','block');
		    pagination();
		});
		$('#form_row').css('display','none');
		$('#form_table').css('display','block');
	}
    
    function deleteCategory(ids){
		 $.post("<?php echo $base_url;?>index.php/categories/delete_category/"+ids,{categories: ids},function(data,status){}); 
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
		getCategoryList(mySearch,pageStart,pageLimit);
	}
</script>
