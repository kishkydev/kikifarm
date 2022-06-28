<?php
session_start();
ob_start();
$page_title = 'Taidob College';

include ('./inc/header.inc.php'); 


?>
<script src="js/adapter.min.js"></script>
<script src="js/instascan.min.js"></script>
<script src="js/vue.min.js"></script>



<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="page_title">
                    <h2>Scanner</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="graduation-register.php">home</a></li>
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><a href="#">Scanner</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb end-->
 

<?php
if(isset($_POST['text'])){

        echo $_POST['text'];
}
?>
  
<!--teacher_form_wrapper start-->
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-lg-offset-2 col-md-offset-2">
                <div class="ed_teacher_div">
                     
            
            <form class="ed_teacher_form" action="graduation-register5.php" method="post" role="form">
            
                         
                
               <div class="form-group">              
                <input  type="text" name="text" id="text" readonyy=""   class="form-control form-control-lg" placeholder="Enter student Registration Number">
                </div>

               </form>
    
                    <div>
               <video id="preview" width="100%"></video>
             </div>

             


                        <script type="text/javascript">
                            let scanner = new Instascan.Scanner({video:document.getElementById('preview')});

                            Instascan.Camera.getCameras().then(function(cameras){

                                if(cameras.length > 0){

                                            scanner.start(cameras[0]);
                                }else{

                                    alert('No cameras found');
                                }

                            }).catch(function(e){
                                console.error(e);
                            });

                            scanner.addListener('scan', function(c){

                                    document.getElementById('text').value=c;
                                    document.forms[0].submit();
                            });


                        </script>
                
                         
                
              
                </div>


            </div>



            
            

    </div>
  </div>  
</div>

<!--teacher_form_wrapper end-->  

<?php include ('./inc/footer.inc.php');  ?>  