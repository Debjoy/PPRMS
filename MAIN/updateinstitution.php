<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php require_once("include/DB.php"); ?>
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
    <script  src='js/state.js'></script>
    
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
                
                <li ><a href="manage.php">
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
            <div class="col-sm-10">
<?php 
    if(isset($_POST["submit"])){
        $connect;
        $insti=mysql_real_escape_string($_POST["institution"]);
        $state=mysql_real_escape_string($_POST["statename"]);
        if (isset($_POST["cityname"])){
        $city=mysql_real_escape_string($_POST["cityname"]);}
        else
        {
            $city="";
        }
        $pin=mysql_real_escape_string($_POST["zip"]);
        $add=mysql_real_escape_string($_POST["address"]);
        
        $id=mysql_real_escape_string($_GET["id"]);
        $Queryy="SELECT * FROM institution WHERE id=$id";
        $execute=mysql_query($Queryy);
        $rows = mysql_fetch_assoc($execute);
        $campname = $rows["name"];
        
        if(empty($insti)||empty($city)||empty($pin)||empty($add)){
            $_SESSION["ErrorMessage"]="All fields must be filled!!";
            
            //Redirect_to("updateinstitution.php?id=$id");   
        }elseif((!preg_match("/^[1-9][0-9]{5}/",$pin))||strlen($pin)>6
               ){
            $_SESSION["ErrorMessage"]="Pin code should contain only 6 digit number not starting with 0";
          
            //Redirect_to("updateinstitution.php?id=$id");
        }else{
            $Querry="UPDATE institution SET name='$insti',state='$state',city='$city',pin='$pin',address='$add' WHERE id=$id";
            if(mysql_query($Querry)){
               
                
                $query='UPDATE records SET camp="'.$insti.'" WHERE camp="'.$campname.'"';
                if(mysql_query($query)){
                    redirect("newinstitution.php?suc=Camp Updated Successfully!!"); 
                           
                }else{
                    $_SESSION["ErrorMessage"]="Something Went Wrong updating patients details. Try Again $campname!";
                    
                    //Redirect_to("updateinstitution.php?id=$id"); 
                }
                 
             
            }else{
                $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
                
                //Redirect_to("updateinstitution.php?id=$id");
            }
            
        }
        
    }
    
    
    
?>
            
                <br><div class="col-sm-10" style="text-align:center;">
                <h1 >Update Camp Details</h1>
                <br>
                <?php echo Message();?>
                </div>
                
            
                <?php 
                    require_once("include/DB.php");
                    $connect;
                    $id=$_GET["id"];
                
                    $Query="SELECT * FROM institution WHERE id=$id";
                    $execute=mysql_query( $Query);
                    $row = mysql_fetch_assoc($execute);
                ?>
                
                <form action="updateinstitution.php?id=<?php echo $_GET["id"]; ?>"  method="POST">
                    <div class="form-group col-sm-3">
                         <br>
                          <label for="institution" style="margin-top:15px;">Name of Camp:</label>
                          <input type="text" class="form-control" placeholder="Enter name of Camp" name="institution" value="<?php echo trim($row["name"]);  ?>" >
                    </div>
                    <div class="col-sm-7">
                    <div class="form-group col-sm-4 selection">
                        
                      <label for="sel1">State (select one):</label>
                      <h5><b style="color:green;">Old Value:</b> <?php echo trim($row["state"]);  ?></h5>
                      <select class="form-control" id="listBox" onchange='selct_district(this.value)' name="statename">
                      </select>
                    </div>
                    <div class="form-group col-sm-4 selection" >
                          <label for="sel1">City (select one):</label>
                          <h5><b style="color:green;">Old Value:</b> <?php echo trim($row["city"]);  ?></h5>
                          <select class="form-control" id='secondlist' name="cityname">
                          </select>
                    </div>
                    <div class="form-group col-sm-3"><br>
                          <label for="zip" style="margin-top:15px;">Pin code:</label>
                          <input type="text" class="form-control" placeholder="Enter pin code" name="zip" value="<?php echo trim($row["pin"]);  ?>">
                    </div>
                    </div>
                    
                    
                    <div class="form-group col-sm-4">
                         
                          <label for="address">Full Address:</label>
                          <input type="text" class="form-control" placeholder="Enter full address" name="address" value="<?php echo trim($row["address"]);  ?>">
                    </div>
                    
                    <?php  
                            $select;
                    mysql_close($select);    ?>
                    
                    
                    
                    <div class="col-sm-10" style="text-align:center;">
                    
                    <br>
                    <button type="submit" style="width:175px;" class="btn btn-default btn-success" name="submit">Update</button> 
                    </div>
                </form>
            

            
            
            
            
            
            
            
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