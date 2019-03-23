<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
        if(isset($_POST["submit"])){
            $connect;
            $userid=mysql_real_escape_string($_POST["userid"]);
            $password=mysql_real_escape_string($_POST["pwd"]);
 
            if(empty($userid)||empty($password)){

                $_SESSION["ErrorMessage"]="All Fields must be filled out";
                //redirect("loginpage.php");   
            }else
            {
                $found=Login_Attempt($userid,$password);
                
                $_SESSION["User_Id"]=$found["id"];
                $_SESSION["Username"]=$found["user"];
                if($found){
		    echo "Logging in.....";
                    $_SESSION["SuccessMessage"]="Welcome  {$_SESSION["Username"]} ";
                    $select;
                    mysql_close($select);
                    redirect("index.php");
                }else{
                    $_SESSION["ErrorMessage"]="Invalid Username / Password"; 
                    $select;
                    mysql_close($select);
                }
                
            } 
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PPRMS</title>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="cs/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="cs/style.css">
  <?php
     function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
     }
     if(isset($_GET["err"])){
                   $_SESSION["ErrorMessage"]=$_GET["err"];
                }
     ?>
<link rel="icon" type="image/ico" href="images/croppedlogo.jpg" >
    <style>
        .box{
            margin-top:80px;
            background-color:white;
            padding:30px;
            padding-top:15px;
        }
        .forming{
            text-align:center;
        }
        .form-control{
            width:80%;
            margin:0 auto;
        }
        body{
            background: url("images/cropped.jpg") no-repeat center fixed;
            background-size:cover;
        }
        h1.heading{
            font-size:555%;
        }
        @media (max-width: 992px){
            h1.heading{
                font-size:450%;
            }
        }
       @media (min-width: 768px){
           .lol .form-inline .form-control{
               width:65%;
            }}
    </style>
    <script>
    
    function passwordshow(){
        var x=document.getElementById("pass_input");
        var but=document.getElementById("show_hide");
        if(x.type==="password"){
            x.type="text";
            but.innerHTML="<i class='glyphicon glyphicon-eye-open'></i>";
        }else{
            x.type="password";
            but.innerHTML="<i class='glyphicon glyphicon-eye-close'></i>";
        }
        
        
    }
    
    </script>
</head>
<body ><div class=container>
     <div class="col-sm-7">
         <h1 class="heading" style="color:white;margin-top:80px;text-shadow: 0px 0px 2px grey;">Patients's Permanent Record Management System</h1>
     </div>  
    <div class="container box col-sm-5" >
        
        <a href="../index.php" style="text-decoration:none;" target="_blank"><h1 onmouseover="this.style.color='#0072a3'" onmouseout="this.style.color='#005477'" style="color:#005477;margin-bottom:0px;"><img src="images/finallogo.png" height="50px"><br><strong>TITLE</strong></h1>
        </a><p style="font-size:11px;color:grey;">COMPANY'S MOTO / TAGLINE</p>
        <?php echo Message();?>
        <form action="loginpage.php" class="forming "  method="post">
                   
                   <br>
                    <div class="form-group">
                          <label for="userid">User Name:</label>
                          
                          <input type="text" class="form-control " placeholder="Enter User Name" name="userid" value="<?php if(isset($_GET["first"])) echo $_GET["first"]; ?>">
                     </div>
                          
                           
                    <div class="form-group lol">
                          <label for="pwd">Password:</label>
                          <div class="form-inline" ><input type="password" class="form-control" id="pass_input" placeholder="Enter password" name="pwd">
                          <span class="btn btn-primary " onclick="passwordshow();" id="show_hide"><i class='glyphicon glyphicon-eye-close'></i></span>
                          </div>
                    </div>
                    <br>
                    
                    <div style="text-align:center">
                    <button type="submit" style="width:60%;" class="btn btn-default btn-success" name="submit">LOG IN</button>
                    <br><br>
                    <a class="btn btn-primary" href="../index.php"><span class="glyphicon glyphicon-menu-left"></span> Back</a>
                    
                    </div>
                    
                </form>
            
    </div>
    <h6 style="font-size:10px;text-align:right;color:white">designed by <a href="http://debjoy.000webhostapp.com/inner.html" target="_blank">Debjoy</a></h6>
    </div>
        
   


</body>
</html>