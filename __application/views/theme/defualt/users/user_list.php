<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
            <h1 id="hrd" class="handOver">
                    Users
                    <!--<small> Patients List </small>-->
            </h1>
	</section>

	<!-- Main content -->
	<section class="content">
            
            <div class="row" id="frm">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Username
                                    </div>
                                    <input type="text" id="userName" value="" class="form-control">
                                    <input type="text" id="userId" value="0" class="form-control" style="display: none;">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Password
                                    </div>
                                    <input type="password" id="userPassword" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Name
                                    </div>
                                    <input type="text" id="userFullName" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Role
                                    </div>
                                    <select class="form-control" id="userRole">
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Sex
                                    </div>
                                    <select class="form-control" id="userSex">
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Background
                                    </div>
                                    <input type="text" id="userBackground" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Phone
                                    </div>
                                    <input type="text" id="userPhone" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Email
                                    </div>
                                    <input type="text" id="userEmail" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Address
                                    </div>
                                    <input type="text" id="userAddress" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        status
                                    </div>
                                    <input type="text" id="userStatus" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Work Place
                                    </div>
                                    <input type="text" id="userWorkPlace" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Description
                                    </div>
                                    <input type="text" id="userDesc" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="submit" id="saveBtn" class="form-control btn-primary" value="Create">
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!-- /.col -->
            </div>
            
            <div class="row" id="lts">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                        </div>
                        <div class="row"><div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" id="btn_create">
                                            <i class="fa fa-plus-circle"></i> 
                                            Create
                                        </button>
                                    </div>
                                </div><br/>

                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                                <tr role="row">
                                                    <th style="width: 15%;"></th>
                                                    <th style="width: 5%;">No</th>
                                                    <th style="width: 65%;">User</th>
                                                    <th style="width: 15%;">Role</th>
                                                </tr>
                                        </thead>
                                        <tbody id="tbodyRole">
                                        </tbody>
                                </table>
                            </div></div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </div><!-- /.col -->
            </div><!-- /.row -->
	</section><!-- /.content -->
</div>
<style>
    .handOver {
	cursor: pointer; 
	cursor: hand;
    }
</style>
<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>
<script src="<?php echo $resources;?>plugins/jslibs/pagination.js"></script>
<script>
    $(document).ready(function(){
        getRoleCombo();
        getSexCombo();
        getUserList();
        $('#btn_create').click(function(){
            cleaned();
            showFrm();
        });
        $('#hrd').click(function (){
            showList();
        });
        $('#saveBtn').click(function(){
            saveUser();
        });
    });
    function getUserList(){
        
        showList();
        
        var i = 0;
        var htmlView = '';
        $.post("<?php echo $base_url;?>index.php/users/get_user_list_json",function(data){
            $.each(data, function(key,value) {
                i = parseInt(i) + 1;
                htmlView += "<tr>"; 
                    htmlView += "<td> &nbsp;&nbsp; <i class='fa fa-edit action-btn primary handOver' title='Edit' onclick='editUser("+ value.uid +");'></i> &nbsp;&nbsp; <i class='fa fa-trash action-btn danger handOver' onclick='deleteUser("+ value.uid +");' title='Delete'></i></td>";
                    htmlView += "<td>"+i+"</td>";
                    htmlView += "<td>"+value.name+"</td>";
                    htmlView += "<td>"+value.roles_name+"</td>";
                htmlView += "</tr>";
            });
            $('#tbodyRole').html(htmlView);
        });
    }
    
    function cleaned(){
        $("#userId").val('0');
        $("#userName").val('');
        $("#userFullName").val('');
        $("#userSex").val('');
        $("#userBackground").val('');
        $("#userPhone").val('');
        $("#userEmail").val('');
        $("#userAddress").val('');
        $("#userDesc").val('');
        $("#userStatus").val('');
        $("#userWorkPlace").val('');
        $("#userRole").val('');
    }
    
    // Function Edit
    function editUser(ids){
        showFrm();
        $('#submit_edit').val('Update');
        $('#title_name').html('/ Edit');
        
        cleaned();
        
        $.post("<?php echo $base_url;?>index.php/users/get_user_info_json/"+ids,function(data){
            $.each(data, function(key,value) {
                $("#userId").val(value.uid);
                $("#userName").val(value.username);
                $("#userFullName").val(value.name);
                $("#userSex").val(value.sex);
                $("#userBackground").val(value.background);
                $("#userPhone").val(value.phone);
                $("#userEmail").val(value.email);
                $("#userAddress").val(value.address);
                $("#userDesc").val(value.note);
                $("#userStatus").val(value.status);
                $("#userWorkPlace").val(value.work_place);
                $("#userRole").val(value.roles_id);
            });
        });
    }
    
    // Function Save
    function saveUser(){
        var ids = $("#userId").val();
        var username = $("#userName").val();
        var password = $("#userPassword").val();
        var fullName = $("#userFullName").val();
        var roleId = $("#userRole").val();
        var sex = $("#userSex").val();
        var background = $("#userBackground").val();
        var phone = $("#userPhone").val();
        var email = $("#userEmail").val();
        var address = $("#userAddress").val();
        var note = $("#userDesc").val();
        var status = $("#userStatus").val();
        var workPlace = $("#userWorkPlace").val();
        
        $.post("<?php echo $base_url;?>index.php/users/save_user/"+ids,{
            uname: username,
            upass: password,
            fname: fullName,
            role: roleId,
            sex: sex,
            bg: background,
            phone: phone,
            email: email,
            address: address,
            note: note,
            status: status,
            workplace: workPlace
        },function(data){
            getUserList();
        });
    }
    
    function deleteUser(ids){
		$.post("<?php echo $base_url;?>index.php/users/delete_user/"+ids,{role_id: ids},function(data,status){}); 
		getUserList();            
    }
    
    function getRoleCombo(){
        var htmlView = "";
        $.post("<?php echo $base_url;?>index.php/roles/get_role_list_json",function(data){
            $.each(data, function(key,value) {
                htmlView += "<option value='"+value.roles_id+"'>"+value.roles_name+"</option>";
            });
            $("#userRole").html(htmlView);
        });
    }
    
    function getSexCombo(){
        var htmlView = "<option value='M'>Male</option>";
        htmlView += "<option value='F'>Female</option>";
        $("#userSex").html(htmlView);
    }
    
    function showList(){
        $('#lts').css('display','block');
        $('#frm').css('display','none');
    }
    
    function showFrm(){
        $('#userName').val('');
        $('#userDesc').val('');
        
        $('#lts').css('display','none');
        $('#frm').css('display','block');
    }
    
</script>
