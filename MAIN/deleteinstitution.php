<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>

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
  <link rel="stylesheet" href="cs/style.css">
  <link rel="icon" type="image/ico" href="images/croppedlogo.jpg" >
 <?php
     function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
     }
     if(isset($_GET["err"])){
                   $_SESSION["ErrorMessage"]=$_GET["err"];
                }
     ?>
</head>
<body>
   
   <?php
    if(isset($_POST["submit"])){
        $connect;
        
        
        $idd=$_GET["id"];
        $Queryy="SELECT * FROM institution WHERE id=$idd";
        $executee=mysql_query( $Queryy);
        $rows = mysql_fetch_assoc($executee);
        $campname = $rows["name"];
        
        
        
        $pwd=mysql_real_escape_string($_POST["pwd"]);
        $querry="SELECT * FROM deleting WHERE password='$pwd'";
        $Execute=mysql_query($querry);
        $value=mysql_fetch_assoc($Execute);
        if($value){
            $id=mysql_real_escape_string($_GET["id"]);
            $Querry="DELETE FROM institution WHERE id='$id'";
            if($execute=mysql_query($Querry)){
                
                $query='DELETE FROM records WHERE camp="'.$campname.'"';
                if(mysql_query($query)){
                    $_SESSION["SuccessMessage"]="Institution deleted Successfully!!";
			$select;
                    mysql_close($select);
                    redirect("newinstitution.php"); 
                }else{
                    $_SESSION["ErrorMessage"]="something went wrong with deleting patient!!";
			$select;
                    mysql_close($select);
                   // Redirect_to("deleteinstitution.php?id=".$_GET["id"]);
                }
                 
            }else{
                $_SESSION["ErrorMessage"]="something went wrong, try again!!";
                $select;
                    mysql_close($select);
                //Redirect_to("deleteinstitution.php?id=".$_GET["id"]);
            }
        }
        else{
            $_SESSION["ErrorMessage"]="Password did'nt match, try again!!";
            $select;
                    mysql_close($select);
            //Redirect_to("deleteinstitution.php?id=".$_GET["id"]);
        }
    }
    
    ?>
   
   
    <div class="container" >
        
       <a href="index.php" style="text-decoration:none;" target="_blank"><h1 onmouseover="this.style.color='#0072a3'" onmouseout="this.style.color='#005477'" style="color:#005477;margin-bottom:0px;"><img src="images/finallogo.png" height="50px"><br><strong>TITLE</strong></h1>
        </a>
        <p >COMPANY'S MOTO / TAGLINE</p>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <!-------------------------------- SIDE BAR -------------------->
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
                
                <li><a href="manage.php">
                <span class="glyphicon glyphicon-user"></span>
                &nbsp;Manage Users</a></li>
                
                <li ><a href="newinstitution.php">
                <span class="glyphicon glyphicon-map-marker"></span>
                &nbsp;Manage Camps</a></li>
                
		
		<li ><a href="./index.php" target="_blank">
                <span class="glyphicon glyphicon-home"></span>
                &nbsp;Homepage</a></li>
                

                <li><a href="logout.php">
                    <span class="glyphicon glyphicon-log-out"></span>
                    &nbsp;Logout</a>
                </li>   

            </ul>

            </div> <!-- Ending of Side area -->
            <?php
                $connect;
                $id=mysql_real_escape_string($_GET["id"]);
                $Querry="SELECT * FROM institution WHERE id=$id";
                $execute=mysql_query( $Querry);
                $row = mysql_fetch_assoc($execute);
            
            
            
            ?>
            
            <div class="container col-sm-10">
                <br>
                <div class="alert alert-danger col-sm-8"><strong>WARNING !!!!</strong> If you delete a camp name <strong>ALL</strong> the corresponding <strong>PATIENTS's</strong> details will be automatically <strong>DELETED</strong>. You can update the information instead.</div>
                
                <div class="col-sm-8">
                <?php echo Message();?>
                <h1  class="col-sm-12" style="text-align:center;color:red;">You need to give deleting password!!</h1>
                 
                  <form action="deleteinstitution.php?id=<?php echo $_GET["id"]; ?>" class="col-sm-12" method="POST">
                   <div class="col-sm-4"></div>
                    <div class="form-group col-sm-4">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control"  placeholder="Enter password" name="pwd">
                          <div>
                            <button type="submit" style="width:60%;margin-top:10px;" class="btn btn-default btn-danger" name="submit">DELETE</button> 
                          </div>
                    </div>
                   
                </form>
            </div>
                <div class="col-sm-4" style="text-align:center;">
                <h1   style="text-align:center;color:green;">You can update the details instead!!</h1>
                <a href="updateinstitution.php?id=<?php echo $_GET["id"]; ?>" ><button style="width:60%;margin-top:10px;"  class="btn btn-default btn-success " >UPDATE</button></a>
                </div>
                <h1 style="text-align:center;"  class="col-sm-8">Camp Details</h1>
                <br>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Name</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["name"]);  ?></h4>
                </div>
                
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2">
                    <h3>State</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["state"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2">
                    <h3>City</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["city"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2">
                    <h3>Pin Code</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["pin"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Address</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["address"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <?php $select;
                    mysql_close($select);  ?>
                
                
            
            </div>
        </div>
        <br><br><br><br><br><br><br>
        
        
    </div>
    <!---foooter ----->
    <div class="container-fluid " id="footer">
        <h5>Copyright © 2018 Company</h5>
        <h6 style="font-size:10px;">designed by <a href="http://debjoy.000webhostapp.com/inner.html" target="_blank">Debjoy</a></h6>
    </div>

</body>
</html>