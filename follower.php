<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 


$user = $_GET['user']; 
?>









 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">People following <?php echo ucfirst($user); ?></h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Follower's Page</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->



         <!--site-main start-->
        <div class="site-main">

            <!-- sidebar -->
            <div class="ttm-row only-one-section ttm-bgcolor-white clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row" id="load_data">







                    </div><!-- row end -->

                      <span id="load_data_message"></span>
                      <script>



var limit = 20; //The number of records to display per request
 var start = 0; //The starting pointer of the data
 var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
 var user = '<?php echo $user; ?>';
 function load_post_data(limit, start)
 {
  $.ajax({
   url:"ajax/more_followers",
   method:"POST",
   data:{limit:limit, start:start, user:user},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == 0)
    {
     $('#load_data_message').html("");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html('<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
     action = 'inactive';
    }
    
   }
  });
 }


if(action == 'inactive')
 {
  action = 'active';
  load_post_data(limit, start);
 }


$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_post_data(limit, start);
   }, 1000);
  }
 });

</script>




                </div>
            </div>
            <!-- sidebar end -->

        </div><!--site-main end-->

<?php  include ('./inc/footer.inc.php'); ?>