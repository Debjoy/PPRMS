<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php require_once("include/DB.php"); ?>
<?php confirm_super(); ?>
<?php 
    if(isset($_GET["id"])){
            $connect;
            $id=mysql_real_escape_string($_GET["id"]);
            $Querry="DELETE FROM admins WHERE id='$id'";
            if($execute=mysql_query($Querry)){
                $_SESSION["SuccessMessage"]="Admin deleted Successfully!!";
               redirect("manage.php");  
            }else{
                $_SESSION["ErrorMessage"]="something went wrong, try again!!";
                redirect("manage.php");
            }
$select;
            mysql_close($select);
    }

?>
<?php 
    function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
    }?>