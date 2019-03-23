<?php 

function Redirect_to($New_Location){
    header("Location:".$New_Location);

    exit;
}

function Login_Attempt($Username,$Password){
	
$select=mysql_connect("localhost","root","usbw");
$connect=mysql_select_db("data",$select);



    $Query="SELECT * FROM admins WHERE BINARY user='$Username' AND BINARY  password='$Password'";
    $queryy="SELECT * FROM superuser WHERE BINARY user='$Username' AND BINARY password='$Password'";
    $Execute=mysql_query($Query);
    
    if($admin=mysql_fetch_assoc($Execute)){
        return $admin;
    }else{
            
            $exec=mysql_query($queryy);
            if($super=mysql_fetch_assoc($exec)){
                return $super;
            }else{
                return null;
            }
    }
}

function confirm_user(){
    if(isset($_SESSION["User_Id"])){
        return true;
    }else{
        redirect("loginpage.php?err=Login Required !");
    }
}
function confirm_super(){
    if(confirm_user()){
       
$select=mysql_connect("localhost","root","usbw");
$connect=mysql_select_db("data",$select);

        $curruser=$_SESSION["Username"];
        $queryy="SELECT * FROM superuser WHERE user = '$curruser'";
        
        $exec=mysql_query($queryy);
        $super=mysql_fetch_assoc($exec);
        $match=$super["user"];
        if(strcmp($_SESSION["Username"],$match)!=0){
            redirect("main.php?err=Need Super User Access");
        }
    }
}

?>