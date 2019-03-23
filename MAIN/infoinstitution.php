<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php require_once("include/DB.php"); ?>
<?php confirm_user(); ?>
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
      <script>
    function printing(){
        var original=document.body.innerHTML;
        var part=document.getElementById("documentprint").innerHTML;
        var start='<div class="container" ><h1 style="color:#005477;margin-bottom:0px;"><img src="images/finallogo.png" height="50px"><br><strong>TITLE</strong></h1><p >COMPANY\'S MOTO / TAGLINE</p></div><br><h1 style="text-align:center;">Institution Details</h1><br>';
        var end='<div class="container-fluid " id="footer"><h5>Copyright © 2018 Company</h5></div>';
        document.body.innerHTML=start+part+end;
        window.print();
        document.body.innerHTML=original;
    }
    
    
    </script>
    <style>
        #sticky{
            position:absolute;
            bottom:-35px;
            right:-5px;
        }
    </style>
   
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
                
                <li><a href="manage.php">
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
                $connect;
                $id=mysql_real_escape_string($_GET["id"]);
                $Querry="SELECT * FROM institution WHERE id=$id";
                $execute=mysql_query($Querry);
                $row = mysql_fetch_assoc($execute);
            
            
            
            ?>
            <div class="container col-sm-8">
                <br>
                <h1 style="text-align:center;">Camps Details  <a  style="font-size:20px;position:relative;bottom:17px;" onclick="printing();">print</a></h1>
                
                <br>
                <div id="documentprint">
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
                <div class="col-sm-2" >
                    <h3>Records</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php 
                    $name=trim($row["name"]);
                    $querry='SELECT Count(*) AS num FROM records WHERE camp Like "'.$name.'"';
                    $execute=mysql_query($querry);
                    $row = mysql_fetch_assoc($execute);
                    
                    echo trim($row["num"]);  ?> &nbsp;&nbsp;Entries&nbsp;&nbsp;
                    <a href="zuejTKcmXp.php?camp=<?php echo $name; ?>"><button class="btn btn-warning"><span class="glyphicon glyphicon-cloud-download" ></span>&nbsp;Download</button></a></h4>
                    
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                
               <?php $select;
                    mysql_close($select);   ?>
                
                
            </div>
            
            </div>
            
            
        </div>
        <br><br><br><br><br><br><br>
        <a href="deleteinstitution.php?id=<?php 
                 
                
                 echo $_GET["id"]?>">delete</a>
    </div>
    <!---foooter ----->
    <div class="container-fluid " id="footer">
        <h5>Copyright © 2018 Company</h5>
        <h6 style="font-size:10px;">designed by <a href="http://debjoy.000webhostapp.com/inner.html" target="_blank">Debjoy</a></h6>
    </div>

</body>
</html>