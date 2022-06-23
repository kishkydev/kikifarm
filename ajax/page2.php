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

$get = mysqli_query($con,"SELECT * FROM message WHERE  from_id='$user_id' ORDER BY date_time DESC LIMIT $start_from, $record_per_page    ") or die (mysqli_error()); 



$query3 = mysqli_query($con,"SELECT * FROM message WHERE  from_id='$user_id' ORDER BY date_time DESC   ") or die (mysqli_error()); 
$total_records = mysqli_num_rows($query3);
$total_pages = ceil($total_records/$record_per_page);

?>




<div><!--pagination--->
<?php  if($page == 1) : ?>

<a href="javascript:;" class="disabled" style="padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left; border-radius: 6px 0 0 6px;" >&laquo;</a>
<?php  else : ?>
  <a href="javascript:;" class="pagination_minus2" style="padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left;" id="<?php echo $page; ?>">&laquo;</a>
<?php  endif; ?>



<?php  for($i=1; $i<=$total_pages; $i++) : ?>
<?php  if($i != $page) : ?>

<a href="javascript:;" class="pagination_link2" style="padding: 2px 4px; background: white; color:#173e43;  border:1px solid #173e43; float:left;" id="<?php echo $i; ?>"><?php echo $i; ?></a>
<?php  else : ?>
 <a href="javascript:;" class="pagination_link2" style="padding: 2px 4px; color: #ffffff;  background: #173e43;  border:1px solid #173e43; float:left;" id="<?php echo $i; ?>"><?php echo $i; ?></a>
<?php  endif; ?>

<?php  endfor; ?>


<?php  if($page == $total_pages) : ?>

<span class="disabled" style="cursor:pointer; padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left; border-radius: 0 6px 6px 0;" >&raquo;</span>
<?php  else : ?>
    <span class="pagination_plus2" style="cursor:pointer; padding: 2px 4px; background: white; border:1px solid #173e43; color:#173e43; float:left; border-radius: 0 6px 6px 0;" id="<?php echo $page; ?>">&raquo;</span>
<?php  endif; ?>

</div><!--pagination--->




<div class="table table-responsive">
<table class="table-condensed">
                            <tbody>

        <?php $i=1;  while($row4 = mysqli_fetch_assoc($get)) : ?>
            <?php
               $message_idF = $row4['message_id'];
                $subjectF = $row4['subject'];
               $messageF = $row4['message'];
                $materialF = $row4['material'];
                $material_extF = $row4['material_ext'];
                $from_idF = $row4['from_id'];
                $to_idF = $row4['to_id'];
                $date_timeF = $row4['date_time'];
               
             


                $date_timeF =  date('M j, h:i A', $date_timeF);

                 $query66= mysqli_query($con,"SELECT * FROM users WHERE user_id = '$to_idF' ");
    $row66 = mysqli_fetch_assoc($query66);

  
              


  $snameF = $row66['sname']; 
  $onameF = $row66['oname']; 
  $to_nameF = $row66['username'];

 // $to_nameF =  ucfirst($to_nameF).' ('.$snameF.' '.$onameF.')';
            ?>
                            
                            <tr>
                              
                                <td><a href="read-message?id=<?php echo (int)$message_idF; ?>&type=2"><small><i class="fa fa-user" style="color:#7cda0a"></i> <?php echo ucwords($to_nameF) ?></small></a>

                                 <br><small><a href="read-message?id=<?php echo (int)$message_idF; ?>&type=2"><?php echo $date_timeF; ?></a></small></td>


                                 <td><a href="read-message?id=<?php echo (int)$message_idF; ?>&type=2"><?php echo substr($subjectF,0,100); ?></a>

                                </td>

                              
                            </tr>
                  <?php $i++;  endwhile; ?>
                           
                            
                            </tbody>
                        </table>
                      </div>







