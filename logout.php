<?php session_start();
include ('./inc/connect.inc.php'); ?>
<?php 

if($_SESSION["user"] || $_COOKIE['user_log_in']){

$user_expire = time()-60*60*24*7*52;
setcookie('user_log_in', $_SESSION["user"],  $user_expire);
session_destroy();
}
// echo $_SESSION["user_login"];
header("Location: index.php");
?>