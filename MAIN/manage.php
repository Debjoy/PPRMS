<?php require_once("include/sessions.php"); 
 require_once("include/functions.php"); ?>
<?php require_once("include/DB.php"); ?>
<?php confirm_super(); ?>
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
  <link rel="icon" type="image/ico" href="images/croppedlogo.jpg" >
<?php
     function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
     }
     if(isset($_GET["err"])){
                   $_SESSION["ErrorMessage"]=$_GET["err"];
                }
			if(isset($_GET["suc"])){
                                       $_SESSION["SuccessMessage"]=$_GET["suc"];
                }
     ?>
    <style>
    /*
    #footer{
    color:grey;
    height:100px;
    margin-top:50px;
    border:1px solid black;
    text-align:center;
    padding-top:25px;
    padding-bottom:25px;    
}*/
    
    
    </style>
</head>
<body>
       
    <div class="container" >
        
        <a href="index.php" style="text-decoration:none;" target="_blank"><h1 onmouseover="this.style.color='#0072a3'" onmouseout="this.style.color='#005477'" style="color:#005477;margin-bottom:0px;"><img src="images/finallogo.png" height="50px"><br><strong>TITLE</strong></h1>
        </a>
        <p >COMPANY'S MOTO / TAGLINE</p>
    </div>
    
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-2">
            <br><br>
                <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li>
                    <h4>&nbsp;&nbsp;&nbsp;<strong style="color:#14a01b;">User:</strong><strong> <?php echo  $_SESSION["Username"]; ?></strong></h4>
                </li>
                <li >
                <a href="main.php">
                <span class="glyphicon glyphicon-th-list"></span>
                &nbsp;Records</a></li>
                <li><a href="newrecord.php">
                <span class="glyphicon glyphicon-list-alt"></span>
                &nbsp;Add New Record</a></li>
                
                <li class="active"><a href="manage.php">
                <span class="glyphicon glyphicon-user"></span>
                &nbsp;Manage Users</a></li>
                
                <li ><a href="newinstitution.php">
                <span class="glyphicon glyphicon-map-marker"></span>
                &nbsp;Manage Camps</a></li>
                
		
		<li ><a href="index.php" target="_blank">
                <span class="glyphicon glyphicon-home"></span>
                &nbsp;Homepage</a></li>
                
                <li><a href="logout.php">
                    <span class="glyphicon glyphicon-log-out"></span>
                    &nbsp;Logout</a>
                </li>   

            </ul>

            </div> <!-- Ending of Side area -->
<?php 
    
    if(isset($_POST["submit"])){
        $connect;
        $userid=mysql_real_escape_string($_POST["userid"]);
        $password=mysql_real_escape_string($_POST["pwd"]);//
        $cfpassword=mysql_real_escape_string($_POST["cfpwd"]);//
        $date=date("Y-m-d");
        if(empty($userid)||empty($password)){
            $select;
                    mysql_close($select);
            redirect("manage.php?first=$userid&err=User Name/Password cannot be empty");   
        }elseif(strlen($userid)<4){
            $_SESSION["ErrorMessage"]="User Name should be more than 4 letter";
            $select;
                    mysql_close($select);
            //redirect("manage.php?first=$userid");
        }elseif(strlen($password)<6){
           $select;
                    mysql_close($select);
            redirect("manage.php?first=$userid&err=Password should contain atleast 6 characters!");
        }elseif(!preg_match('/.*[a-zA-Z]+.*/', $password)){
            $select;
                    mysql_close($select);
            redirect("manage.php?first=$userid&err=Password should contain atleast one alpabet!");
        }elseif(strcmp($password,$cfpassword)!=0){
            $select;
                    mysql_close($select);
            redirect("manage.php?first=$userid&err=Password did'nt match!!");
        }else{
            
            $Querry="INSERT INTO admins (user,password,date) VALUES ('$userid','$password','$date')";
            if(mysql_query($Querry)){
                $select;
                    mysql_close($select);
                redirect("manage.php?suc=User added Succesfully !");  
            }else{
                $select;
                    mysql_close($select);
                redirect("manage.php?first=$userid&err=Something Went Wrong. Try Again !");
            }
            
        }
        
        
    }
    
    
    
?>
            <div class="col-sm-4">
                <br>
                <h1 style="text-align:center;">Add New User</h1>
                <br>
                <?php echo Message();?>
                
                <form action="manage.php"  method="POST">
                    <div class="form-group">
                          <label for="userid">User Name:</label>
                          <input type="text" class="form-control" placeholder="Enter User Name" name="userid" value="<?php 
                                                                                                                     if(isset($_GET["first"]))
                                                                                                                     echo $_GET["first"];
                                                                                                                     ?>">
                    </div>
                    <h4>Password must contain atleast 6 characters and an alphabet</h4>
                    <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control"  placeholder="Enter password" name="pwd">
                    </div>
                    <div class="form-group">
                          <label for="cfpwd">Confirm Password:</label>
                          <input type="password" class="form-control"  placeholder="Retype password" name="cfpwd">
                    </div>
                    <div style="text-align:center">
                    <button type="submit" style="width:60%;" class="btn btn-default btn-success" name="submit">ADD</button> 
                    </div>
                </form>
            

            </div>
            <div class="col-sm-6">
                <br>
                <h1 style="text-align:center;">Users</h1>
                <br>
                <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Sl No.</th>
                           <th>User Name</th>
                           <th>Added On</th>
                           <th>Delete</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php 
                       require_once("include/DB.php");
                       $connect;
                       $Querry="SELECT * FROM admins";
                       $execute=mysql_query( $Querry);
                       $slno=1;
                       while($row = mysql_fetch_assoc($execute)){
                           ?>
                        <tr>
                           <td><?php echo $slno; ?></td>
                           <td><?php if(strlen($row["user"])>7){echo substr($row["user"],0,7)."..";}else {echo $row["user"];}?></td>
                           <td><?php echo $row["date"]; ?></td>
                           <td>
                           <a href="deleteadmin.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                        </tr>
                       <?php    
                       $slno=$slno+1;
                       }
                       $select;
                    mysql_close($select); ?>
                   </tbody>
                    
                </table>
            
            

            </div>
        </div>
    </div>
    <!---foooter ----->
    <div class="container-fluid " id="footer">
        <h5>Copyright © 2018 Company</h5>
        <h6 style="font-size:10px;">designed by <a href="http://debjoy.000webhostapp.com/inner.html" target="_blank">Debjoy</a></h6>
    </div>


</body>
</html>