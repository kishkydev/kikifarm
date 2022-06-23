<?php session_start();
 include ('./../inc/connect.inc.php'); ?>
<?php
if(isset($_SESSION["user"]) ){
  //this is for shop owner
$username = $_SESSION["user"];

$get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get);
  $user_id = $rows["user_id"];
  $username = $rows["username"];  
  }
  else if(isset($_COOKIE['user_log_in'])){
    
$username = $_COOKIE['user_log_in'];  
  $get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get);
  $user_id = $rows["user_id"];
  $username = $rows["username"];    
    }
?>
<?php



$plus = '';
$page = '';
$output = '';
$record_per_page = 50;


if(isset($_POST['minus'])){
$page = $_POST['minus'];
$page =  $page - 1;
}
else if(isset($_POST['plus'])){
$page = $_POST['plus'];
$page =  $page + 1;
}
else if(isset($_POST['page'])){
$page = $_POST['page'];
}
else{
$page = 1;
}
$start_from = ($page - 1) * $record_per_page;

$get = mysqli_query($con,"SELECT * FROM message WHERE  to_id='$user_id' ORDER BY date_time DESC LIMIT $start_from, $record_per_page    ") or die (mysqli_error()); 



$query3 = mysqli_query($con,"SELECT * FROM message WHERE  to_id='$user_id' ORDER BY message_id DESC   ") or die (mysqli_error()); 
$total_records = mysqli_num_rows($query3);
$total_pages = ceil($total_records/$record_per_page);

?>




<div><!--pagination--->
<?php  if($page == 1) : ?>

<a href="javascript:;" class="disabled" style="padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left; border-radius: 6px 0 0 6px;" >&laquo;</a>
<?php  else : ?>
  <a href="javascript:;" class="pagination_minus" style="padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left;" id="<?php echo $page; ?>">&laquo;</a>
<?php  endif; ?>



<?php  for($i=1; $i<=$total_pages; $i++) : ?>
<?php  if($i != $page) : ?>

<a href="javascript:;" class="pagination_link" style="padding: 2px 4px; background: white; color:#173e43;  border:1px solid #173e43; float:left;" id="<?php echo $i; ?>"><?php echo $i; ?></a>
<?php  else : ?>
 <a href="javascript:;" class="pagination_link" style="padding: 2px 4px; color: #ffffff;  background: #173e43;  border:1px solid #173e43; float:left;" id="<?php echo $i; ?>"><?php echo $i; ?></a>
<?php  endif; ?>

<?php  endfor; ?>


<?php  if($page == $total_pages) : ?>

<span class="disabled" style="cursor:pointer; padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left; border-radius: 0 6px 6px 0;" >&raquo;</span>
<?php  else : ?>
    <span class="pagination_plus" style="cursor:pointer; padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left; border-radius: 0 6px 6px 0;" id="<?php echo $page; ?>">&raquo;</span>
<?php  endif; ?>

</div><!--pagination--->




<div class="table table-responsive">
<table class="table-condensed">
                           
             <tbody >
        <?php while($row3 = mysqli_fetch_assoc($get)) : ?>
            <?php
               $message_idM = $row3['message_id'];
                $subjectM = $row3['subject'];
               $messageM = $row3['message'];
                $materialM = $row3['material'];
                $material_extM = $row3['material_ext'];
                $from_idM = $row3['from_id'];
                $to_idM = $row3['to_id'];
                $date_timeM = $row3['date_time'];
                $status = $row3['status'];
               

                $date_timeM =  date('M j, h:i A', $date_timeM);


                if($status == 'no'){
                    $read = 'New';
                }

                 $query55= mysqli_query($con,"SELECT * FROM users WHERE user_id = '$from_idM' ");
    $row55 = mysqli_fetch_assoc($query55);

      

       $snameM = $row55['sname']; 
  $onameM = $row55['oname']; 
  $from_nameM = $row55['username'];

 // $from_nameM =  ucfirst($from_nameM).' ('.$snameM.' '.$onameM.')';

            ?>
                            
                            <tr>
                              
                                <td><a href="read-message?id=<?php echo (int)$message_idM; ?>&type=1"><small><i class="fa fa-user" style="color:#7cda0a"></i> <?php echo ucwords($from_nameM); ?></small></a>
                                <br>
                                <small><a href="read-message?id=<?php echo (int)$message_idM; ?>&type=1"><?php echo $date_timeM; ?></a></small>

                                </td>
                                 <td><a href="read-message?id=<?php echo (int)$message_idM; ?>&type=1">
                                  <?php if($status == 'no') : ?>
                                  <span class="badge badge-danger"><?php echo $read; ?></span>
                                <?php endif; ?>
                                  <?php echo substr($subjectM,0,100); ?> 
                                </a> </td>

                               
                              
                            </tr>


                  <?php  endwhile; ?>


         </tbody>  



       </table>
   </div>







