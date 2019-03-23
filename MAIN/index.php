<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php
    

    if(isset($_SESSION["User_Id"])){
        $_SESSION["SuccessMessage"]="Welcome  {$_SESSION["Username"]} ";
                    redirect("main.php");
    }else{
        redirect("loginpage.php");
    }


?>
<?php 
    function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
    }?>