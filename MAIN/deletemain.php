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
      <script>
    function printing(){
        var original=document.body.innerHTML;
        var part=document.getElementById("documentprint").innerHTML;
        var start='<div class="container" ><h1 style="color:#005477;margin-bottom:0px;"><img src="images/finallogo.png" height="50px"><br><strong>TITLE</strong></h1><p >COMPANY\'S MOTO / TAGLINE</p></div><br><h1 style="text-align:center;">Patient Details</h1><br>';
        var end='<div class="container-fluid " id="footer"><h5>Copyright © 2018 Company</h5></div>';
        document.body.innerHTML=start+part+end;
        window.print();
        document.body.innerHTML=original;
    }
    
    
    </script>
   
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
                <?php
                
                if(isset($_POST["submit"])){
                    
                    $id=mysql_real_escape_string($_GET["id"]);
                    $Querry="DELETE FROM records WHERE id='$id'";
                    if($execute=mysql_query( $Querry)){
                        $_SESSION["SuccessMessage"]="Record deleted Successfully!!";
                        $select;
                    mysql_close($select);
                        redirect("main.php");  
                    }else{
                        $select;
                    mysql_close($select);
                        redirect("deletemain.php?id=".$_GET["id"]."&err=something went wrong, try again!!");
                    }
                }
                
                
                ?>
            </div> <!-- Ending of Side area -->
            <?php
                $connect;
                $id=mysql_real_escape_string($_GET["id"]);
                $Querry="SELECT * FROM records WHERE id=$id";
                $execute=mysql_query($Querry);
                $row = mysql_fetch_assoc($execute);
            
            
            
            ?>
            <div class="container col-sm-8">
                <br>
                <h1 style="text-align:center;">Patient's Details  <a  style="font-size:20px;position:relative;bottom:17px;" onclick="printing();">print</a><form action="deletemain.php?id=<?php echo $_GET["id"]; ?>" method="POST"><button class="btn btn-danger" type="submit" name="submit" value="<?php echo $_GET["id"] ?>">Delete</button></form></h1>
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
                    <h3>Unique ID</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["uniqueid"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2">
                    <h3>Age</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["age"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2">
                    <h3>Gender</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["gender"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Phone No</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["phno"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Camp name</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["camp"]);  ?></h4>
                </div>
                
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Address</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["address"]);  ?></h4>
                </div>
                
                <?php  if($row["chronic"]=="" && $row["ltmeds"]=="")goto aa; ?>
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Long Term Medicines</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["ltmeds"]);  ?></h4>
                </div>
                
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Chronic Diseases</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                    <h4 style="margin-left:15px;"><?php echo trim($row["chronic"]);  ?></h4>
                </div>
                
                <?php aa:
                    ?>
                <?php
                    $date=unserialize($row["date"]);
                    $treat=unserialize($row["treat"]);
                    $diag=unserialize($row["diagnosis"]);
                    $refer=unserialize($row["refer"]);
                    if($row["followup"]=="")
                        $follow=array("");
                    else{
                        if($row["followup"])
                            $follow=unserialize($row["followup"]);}
                    ?>
                    
                    
                <div class="col-sm-2" style="clear:left">
                </div>
                <div class="col-sm-2" >
                    <h3>Doctor's Report</h3>
                </div>
                <div class="col-sm-8" style="text-align:left;margin-top:10px;">
                  <?php
                    
                    for($i=0;$i<sizeof($date);$i++){
                    ?>
                   <h2><?php echo $i+1 ;?>#</h2>
                   <br>
                    <label  style="margin-left:15px;">Date:<h4><?php echo trim($date[$i]);  ?></h4></label>
                    <br>
                    <label  style="margin-left:15px;">Diagnosis:
                    <pre style="margin-left:15px;white-space: pre-wrap;background-color:white;border-color:white;font-size:17px;font-weight: normal;" ><?php echo trim($diag[$i]);  ?></pre></label>
                    <br>
                    <label  style="margin-left:15px;">Treatment:
                    <pre style="margin-left:15px;white-space: pre-wrap;background-color:white;border-color:white;font-size:17px;font-weight: normal;"><?php echo trim($treat[$i]);  ?></pre></label>
                    <br>
                    <label  style="margin-left:15px;">Follow Up:
                    <h4><?php
                        if(isset($follow[$i])){
                                if($follow[$i]==1)
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;needed";
                            }  ?></h4></label>
                    <br>
                    <label  style="margin-left:15px;">Referred to:
                    <h4 style="margin-left:15px;"><?php echo trim($refer[$i]);  ?></h4></label>
                    <br>
                    <?php }?>
                </div>
               <?php $select;
                    mysql_close($select);   ?>
                
                
            </div>
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