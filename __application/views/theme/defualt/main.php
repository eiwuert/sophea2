<script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo $resources;?>plugins/jslibs/table.js"></script>
<script src="<?php echo $resources;?>jquery-ui/jquery-ui.js" ></script>

<div class="content-wrapper" style="min-height: 916px;">
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
		<a href="<?php echo $base_url;?>index.php/diagnostics">
		    <span class="info-box-icon bg-fuchsia"><i class="fa fa-user-md"></i></span>
		    <div class="info-box-content">
		      <span class="info-box-text"> OPD </span>
		      <span class="info-box-number" id="opdTotal"></span>
		    </div><!-- /.info-box-content -->
		  </div><!-- /.info-box -->
		</a>
            </div><!-- /.col -->
	    
	    <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
		<a href="<?php echo $base_url;?>index.php/ipds">
		    <span class="info-box-icon bg-aqua"><i class="fa fa-user-md"></i></span>
		    <div class="info-box-content">
		      <span class="info-box-text"> IPD </span>
		      <span class="info-box-number" id="ipdTotal"></span>
		    </div><!-- /.info-box-content -->
		</a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
	    
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
		<a href="<?php echo $base_url;?>index.php/products">
		    <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>
		    <div class="info-box-content">
		      <span class="info-box-text">Service</span>
		      <span class="info-box-number" id="serviceTotal"></span>
		    </div><!-- /.info-box-content -->
		</a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
		<a href="<?php echo $base_url;?>index.php/products">
		    <span class="info-box-icon bg-green"><i class="fa fa-tags"></i></span>
		    <div class="info-box-content">
		      <span class="info-box-text">Product</span>
		      <span class="info-box-number" id="productTotal"></span>
		    </div><!-- /.info-box-content -->
		</a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
		<a href="<?php echo $base_url;?>index.php/patients">
		    <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
		    <div class="info-box-content">
		      <span class="info-box-text"> New Patients </span>
		      <span class="info-box-number" id="patientTotal"></span>
		    </div><!-- /.info-box-content -->
		</a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
    <a href="<?php echo $base_url;?>index.php/patients/visited">
        <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"> All Patients </span>
          <span class="info-box-number" id="patientTotalView"></span>
        </div><!-- /.info-box-content -->
    </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
		<a href="<?php echo $base_url;?>index.php/icd10s">
		    <span class="info-box-icon bg-yellow"><i class="fa fa-bookmark"></i></span>
		    <div class="info-box-content">
		      <span class="info-box-text"> Diagnostic </span>
		      <span class="info-box-number" id="icd10Total"></span>
		    </div><!-- /.info-box-content -->
		</a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
    <a href="<?php echo $base_url;?>index.php/users">
        <span class="info-box-icon bg-yellow"><i class="fa fa-bookmark"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"> User </span>
          <span class="info-box-number" id="user"></span>
        </div><!-- /.info-box-content -->
    </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
	  
            <div class="col-md-12 col-sm-12 col-xs-12" style=" background: white !important;">
                <h3 class="center"> Appoinment </h3>
                <table class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Doctor</th>
                            <th>Patient</th>
                        </tr>
                    </thead>
                    <tbody id="appment">
                    </tbody>
                </table>
            </div>
	  
        </section><!-- /.content -->
      </div>
<script>
    $(document).ready(function(){
        $.post("<?php echo $base_url;?>index.php/icd10s/get_count_icd10",function (data){$("#icd10Total").html(data);});
        $.post("<?php echo $base_url;?>index.php/patients/get_count_patient",function (data){$("#patientTotal").html(data);});
        $.post("<?php echo $base_url;?>index.php/patients/get_count_patient_view",function (data){$("#patientTotalView").html(data);});
        $.post("<?php echo $base_url;?>index.php/users/get_user_count ",function (data){$("#user").html(data);});
      	$.post("<?php echo $base_url;?>index.php/visitors/get_count_patient_opd",function (data){$("#opdTotal").text(data);});
      	$.post("<?php echo $base_url;?>index.php/visitors/get_count_patient_ipd",function (data){$("#ipdTotal").text(data);});
      	$.post("<?php echo $base_url;?>index.php/products/get_count_product",function (data){$("#productTotal").text(data);});
      	$.post("<?php echo $base_url;?>index.php/products/get_count_service",function (data){$("#serviceTotal").text(data);});
        $.post("<?php echo $base_url;?>index.php/diagnostics/getappoinmentall",function (data){
            var htmlView = '';
            $.each(data, function(key,value) {
                htmlView += '<tr>';
                    htmlView += '<td>' + value.appoitments_time + '</td>';
                    htmlView += '<td>' + value.name + '</td>';
                    htmlView += '<td>' + value.patient_kh_name+' (' + value.patient_en_name + ')' + '</td>';
                htmlView += '</tr>';
            });
            
            $('#appment').html(htmlView);
        });
    });
</script>    