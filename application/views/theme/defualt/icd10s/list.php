<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo '<a href="'.$base_url.'index.php/icd10s">'.$h_icd10.'</a>';?>
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
								<?php echo $code;?>
							  </div>
							  <input type="text" name="icd10_code" id="icd10_code" class="form-control">
							  <input type="text" name="icd10_id" id="icd10_id" style="display:none;">
							</div>
						  </div>
						  
						  <!----- Desc ------->
						  <div class="form-group">
							<div class="input-group">
							  <div class="input-group-addon">
								<?php echo @$desc;?>
							  </div>
							  <textarea name="icd10_desc" id="icd10_desc" class="form-control" rows="7"></textarea>
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
												<th><?php echo $desc;?></th>
												<th></th>
											</tr>
										</thead>
										<tbody id="icd10List"></tbody>
									</table>
									<!--<div class="pull-left"><strong><?php echo @$c_total.' : '.@$total;?></strong></div>
									<!-- Start Ppagination -->
									<ul class="pagination pagination-sm no-margin pull-right">
										<li><span class="pg" id="pg0" onclick="pagination(`pg0`);">«</span></li>
										<li><span class="pg pg-active" id="pg1" onclick="pagination(`pg1`);">1</span></li>
										<li><span class="pg" id="pg2" onclick="paginations(`pg2`);">2</span></li>
										<li><span class="pg" id="pg3" onclick="paginations(`pg3`);">3</span></li>
										<li><span class="pg" id="pg4" onclick="paginations(`pg4`);">»</span></li>
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
<script src="<?php echo $resources;?>plugins/jslibs/pagination.js"></script>
<script>
    $(document).ready(function(){
        paginations();
    });
    
     function getSearch(){
        var e = event.keyCode;
        if(e == 13){
	    var ids = "";
            //var vals = $(':focus').val();
            setPageStart(0);
	    $('#msgs').css('display','none');
            paginations(ids);
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
    
    function getIcd10List(mySearch,pageStart,pageLimit){
        
        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });

        var htmlView = '';
        var i = 0;
        var stRow = '';
        $.post("<?php echo $base_url;?>index.php/icd10s/get_icd10_list",{
			search_data: mySearch,
			page_start: pageStart,
			page_limit: pageLimit}
			,function(data,status){
            $.each(data, function(key,value) {
		
		htmlView ='<a href="#" title="<?php echo @$edit;?>"><i class="fa fa-edit action-btn primary" onclick="editIcd10(' + value.icd10_id + ');"></i></a>';
		htmlView +='<a href="#" title="<?php echo @$delete;?>"><i class="fa fa-trash-o action-btn danger" onclick="deleteIcd10(' + value.icd10_id + ');"></i></a>';
	
		startTrTd();
                    setTd(value.icd10_code);
                    setTd(value.icd10_desc);
                    setTd(htmlView);
                stopTrTd();
		
            });
	    
	    viewRows('icd10List');
            
            $(document).ajaxComplete(function(){
                $("#wait").css("display", "none");
            });

        });
    }
    function editIcd10(ids){
	    $('#msgs').css('display','none');
	    $('#form_row').css('display','block');
	    $('#form_table').css('display','none');
	    $('#submit_edit').val('Update');
	    $('#title_name').html('/ Edit');
	    $.post("<?php echo $base_url;?>index.php/icd10s/get_icd10_info_by_id_json/"+ids,
	    function(data,status){
		   $.each(data, function(key,value) {
			   $('#icd10_code').val(value.icd10_code);
			   $('#icd10_desc').val(value.icd10_desc);
			   $('#icd10_id').val(value.icd10_id);
		   });
	    });
    }
    
    function saveEdit(){
	    var icd10Id = $('#icd10_id').val();
	    var icd10Code = $('#icd10_code').val();
	    var icd10Desc = $('#icd10_desc').val();		
	    $.post("<?php echo $base_url;?>index.php/icd10s/save_icd10",{
		    icd10_id: icd10Id,
		    icd10_code: icd10Code,
		    icd10_desc: icd10Desc
	    },function(data,status){
		$('#msgs').css('display','block');
		paginations();
	    });
	    
	    $('#form_row').css('display','none');
	    $('#form_table').css('display','block');
    }
    
    function deleteIcd10(ids){
		 $.post("<?php echo $base_url;?>index.php/icd10s/delete_icd10/"+ids,{icd10_id: ids},function(data,status){}); 
		 paginations();            
    }
    
    function viewWindow(htms){
            var myWindow = window.open("", "MsgWindow", "width=9000, height=7000");
            myWindow.document.open("text/html", "replace");
            myWindow.document.write(htms);
            myWindow.document.close();
    }
    
    function paginations(ids){
	
	var totals = <?php echo @$totals;?>;
	var limits = <?php echo @$item_per_page;?>;
	
	pagination(ids,totals,limits);
	
	var mySearch = $(':focus').val();

	/*  Post 3 parameter [ strSearch, Start, Limit]*/
	getIcd10List(mySearch,getPageStart(),limits);

	setPageStartTop(0);
    }  
    
</script>
