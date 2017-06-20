<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
	<form action="<?php echo $base_url;?>index.php/patients/upload/<?php echo $pid;?>" method="POST" enctype="multipart/form-data"> 
		<div class="row">
                    <div class="box box-danger">
	                <div class="box-body" id="fms">
			<!------------------------ Form Group ------------------------->
			<!----- Patient Name KH ------->
	                  <div class="form-group">
	                    <div class="input-group">
	                      <div class="input-group-addon">
	                        Photo
	                      </div>
	                      <input type="file" name="userfile" class="form-control">
	                    </div>
	                  </div>

                            <!----- Submit ------->
	                  <div class="form-group">
	                    <div class="input-group">
	                      <input type="submit" class="form-control btn-primary" value="Upload">
	                    </div>
	                  </div>
	                </div>   
	              </div>
                    
                    <?php 
                            /*print_r($photoDir);
                            echo $paths;*/
                            $i = 0;
                            
                            foreach ($photoList as $rows) {
                                $i = $i + 1;
                                $dirs = $photoDir.'/'.$rows;
                                if($rows == '.' || $rows == '..' || $rows == ''){
                                    echo '';
                                }else{
                            ?>
                            
                            <div class="col-sm-3">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                      <div class="box-tools pull-right">
                                          <a href="<?php echo $base_url.'index.php/patients/delphoto/'.$pid.'_'.$rows;?>"><button type="button" class="btn btn-box-tool" ><i class="fa fa-times"></i></button></a>
                                      </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <img id="m<?php echo $i;?>" ondblclick="showBig(m<?php echo $i;?>,<?php echo $i;?>);" src="<?php echo $dirs;?>" style=" width:200px; height:200px; border: solid 1px #bbb;"/>
                                    </div>
                                </div>
                            </div>
                            <!-- The Modal -->
                            <div id="myModal<?php echo $i;?>" class="modal" onclick="hides('myModal<?php echo $i;?>');">

                              <!-- Modal Content (The Image) -->
                              <img class="modal-content" id="img01<?php echo $i;?>" src="<?php echo $dirs;?>">

                              <!-- Modal Caption (Image Text) -->
                              <div id="caption<?php echo $i;?>"></div>
                            </div>
                        <?php
                                }
                            }
                        ?>
                    
                    
	            </div>
	          </div>
		</div>
	</form>
            
            
	</section><!-- /.content -->
</div>
<style>
    /* Style the Image Used to Trigger the Modal */
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 800px;
    }

    /* Caption of Modal Image (Image Text) - Same Width as the Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation - Zoom in the Modal */
    .modal-content, #caption { 
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>
<script>
    function showBig(ids,im){
        
        
        document.getElementById('fms').style.display = 'none';
        
        var modalImg = document.getElementById("img01"+im);
        
        // Get the modal
        var modal = document.getElementById('myModal'+im);

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        //var img = document.getElementById(ids);
        
        var captionText = document.getElementById("caption"+im);
        
        modal.style.display = "block";
        //modalImg.src = this.src;
        captionText.innerHTML = this.alt;

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
    }
    
    function hides(ids){
        document.getElementById('fms').style.display = 'block';
        document.getElementById(ids).style.display = "none";
    }
    
</script>
