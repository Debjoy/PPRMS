<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php
$_SESSION["User_Id"]=null;
session_destroy();
redirect("loginpage.php");
 
 
 
?>
<?php 
    function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
    }?>