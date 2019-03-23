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
  <script language="Javascript" src="js/jquery.js"></script>
    <script type="text/JavaScript" src='js/state.js'></script>
<?php
     function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
     }
     if(isset($_GET["err"])){
                   $_SESSION["ErrorMessage"]=$_GET["err"];
                }
     ?>
    <style>
        
    
    </style>
 <script>
     var numb=0;
     var dis=0;
     function lastcheck(){
         
         var display=document.getElementById("msgcenter");
         var namefield=document.getElementById("nameinput");
         var agefield=document.getElementById("ageinput");
         var genderfield=document.getElementById("genderinput");
         var campfield=document.getElementById("campinput");
         var addressfield=document.getElementById("addressinput");
         var phonofield=document.getElementById("phonoinput");
         var followfield=document.getElementById("followinput");
         if(namefield.value===""){
             display.innerHTML="<div class=\"alert alert-danger\">Please enter patient's name !!</div>";
             namefield.focus();
         }else if(agefield.value===""){
             display.innerHTML="<div class=\"alert alert-danger\">Please enter patient's age !!</div>";
             agefield.focus();
         }
         else if(genderfield.value===""){
             display.innerHTML="<div class=\"alert alert-danger\">Please select patient's gender!!</div>";
             genderfield.focus();
         }
         else if(campfield.value===""){
             display.innerHTML="<div class=\"alert alert-danger\">Please select the name of the camp !!</div>";
             campfield.focus();
         }else if(followfield.checked==true){
             if((addressfield.value==="") && (phonofield.value==="")){
                display.innerHTML="<div class=\"alert alert-danger\">Please enter either address or phone number (or both) for followup !! (as 'follow up' is checked)</div>";
                addressfield.focus();
             }else{
                 document.getElementById("recordform").submit();
             }
         }
         else{
             document.getElementById("recordform").submit();
         }
         
     }
     function disapear(){
         if(dis){
             document.getElementById("referdisapear").innerHTML="";
             dis=0;
         }else{
             document.getElementById("referdisapear").innerHTML='<label for="referred">Refer to:</label><input type="text" name="referred" class="form-control" value="">  ';
             dis=1;
         }
     }
     
    
    
    
    
    </script>
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
                <li ><a href="newrecord.php">
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

            <div class="container col-sm-10">
                <br><div style="text-align:center" id="msgcenter">
                <?php echo Message();?></div>
                <h1 style="text-align:center;">Update Record</h1>
                <br>
                
                <?php
                $id=mysql_real_escape_string($_GET["id"]);
                require_once("include/DB.php");
                $connect;
                $query="SELECT * FROM records WHERE id=$id";
                $Execute=mysql_query($query);
                $rows = mysql_fetch_assoc($Execute)
                ?>
                
            <form action="recordupdating.php?id=<?php echo $_GET["id"]; ?>" id="recordform"  method="POST">
                <div class="form-group col-sm-3 ">
                      <label for="name">Full Name:<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter your full name" name="name" id="nameinput" value="<?php echo $rows["name"] ?>" required>
                </div> 
                
                <div class="form-group col-sm-1 ">
                      <label for="age">Age:<span style="color:red;">*</span></label>
                      <input type="number" class="form-control" id="ageinput" value="<?php echo $rows["age"] ?>" placeholder="age" name="age" required>
                </div>
                
                <div class="form-group col-sm-2">
                      <label for="gender">Gender:<span style="color:red;">*</span></label>
                      <select class="form-control" id="genderinput" name="gender">
                          <option value="" <?php if($rows["gender"]==="") echo "selected"; ?>>SELECT ONE</option>
                          <option value="Male" <?php if($rows["gender"]==="Male") echo "selected"; ?>>Male</option>
                          <option value="Female" <?php if($rows["gender"]==="Female") echo "selected"; ?>>Female</option>
                          <option value="Others" <?php if($rows["gender"]==="Others") echo "selected"; ?>>Others</option>
                      </select>
                </div>
                <div class="form-group col-sm-3">
                      <label for="camp">Camp (select one):<span style="color:red;">*</span></label>
                      <select class="form-control" name="camp" id="campinput" required>
                          <option value="">SELECT CAMP</option>
                          <?php
                          require_once("include/DB.php");
                          $connect;
                          $Querry="SELECT * FROM institution";
                          $execute=mysql_query( $Querry);
                          while($row = mysql_fetch_assoc($execute))
                          {
                            ?><option value="<?php echo $row["name"]; ?>" 
                             <?php 
                              
                                  if($row["name"]===$rows["camp"]){
                                      echo "selected";
                                  }
                                  ?>
                            ><?php echo $row["name"]; ?></option>
                        <?php }
                          
                        
                          ?>
                      </select>
                </div>
                <div class="form-group col-sm-3">
                      <label for="address">Address:</label>
                      <textarea class="form-control" rows="2" id="addressinput" name="address" ><?php echo $rows["address"]; ?></textarea>
                </div>
                <div class="col-sm-4">
                <div class="form-group col-sm-8">
                      <label for="phono">Contact Number:</label>
                      <input class="form-control" type="number" id="phonoinput" placeholder="Enter Contact Number"  value="<?php echo $rows["phno"]; ?>" name="phono">
                </div>
                
                <div class="form-group col-sm-12">
                      <label for="longtermmeds">Any Long Term Medications:</label>
                      <textarea class="form-control" rows="5" name="longtermmeds"><?php echo $rows["ltmeds"]; ?></textarea>
                </div>
                
                <div class="form-group col-sm-12">
                      <label for="chronic">Any Chronic Disease:</label>
                      <textarea class="form-control" rows="5" name="chronic"><?php echo $rows["chronic"]; ?></textarea>
                </div>
                </div>
                 
                <div class="form-group col-sm-4">
                     <br>
                      <h4>Current :<span style="color:red;">*</span></h4>
                     
                     
                    
                    <div class="col-sm-12 form-group">
                     
                      <label for="curdatecamp">Date:</label>
                      <input type="date" name="curdatecamp" class="form-control" value="<?php date_default_timezone_set("Asia/Calcutta"); echo date("Y-m-d");?>">
                      
                      <label for="curdiagnosiscamp">Diagnosis:</label>
                      <textarea name="curdiagnosiscamp" rows="3" class="form-control"></textarea>
                      
                      <label for="curtreatcamp">Treatment:</label>
                      <textarea name="curtreatcamp"  rows="5" class="form-control"></textarea>
                      
                      <label><input type="checkbox" name="curfollowcamp" id="followinput" value="1"> Follow Up Needed</label><br>
                      
                      <label for="currefercamp">Refer to:</label>
                      <input type="text" name="currefercamp" class="form-control" value="">    
                      
                    </div>
                </div>
                
                
                <div class="form-group col-sm-4" id="HealthCamp">
                     
                     <h4>Previous :</h4>
                     <?php
                    $dates=unserialize($rows["date"]);
                    $treat=unserialize($rows["treat"]);
                    $diag=unserialize($rows["diagnosis"]);
                    $refer=unserialize($rows["refer"]);
                    if($rows["followup"]=="")
                        $follow=array("");
                    else{
                        if($rows["followup"])
                            $follow=unserialize($rows["followup"]);}
                    for($i=0;$i<sizeof($dates);$i++){
                    ?>
                   <h2><?php echo $i+1 ;?>#</h2>
                    <div class="col-sm-12 form-group">
                     
                      <label for="datecamp[]">Date:</label>
                      <input type="date" name="datecamp[]" id="dateid" value="<?php echo $dates[$i]; ?>" class="form-control ">
                      
                      
                      
                      <label for="diagnosiscamp[]">Diagnosis:</label>
                      <textarea name="diagnosiscamp[]" rows="4" id="diatid" class="form-control"><?php echo $diag[$i]; ?></textarea>
                      
                      
                      <label for="treatcamp[]">Treatment:</label>
                      <textarea name="treatcamp[]"  rows="5" id="treatid" class="form-control"><?php echo $treat[$i]; ?></textarea>
                      
                       <label><input type='checkbox' name='followcamp[]' value='1'
                        <?php
                        if(isset($follow[$i])){
                                if($follow[$i]==1)
                                    echo "checked";
                            }  ?>
                            > Follow Up Needed </label><br>
                      
                      <label for='refercamp[]'>Refer to:</label> <input type='text' name='refercamp[]' class='form-control' value='<?php echo $refer[$i]; ?>'> 
                    </div>
                    
                    <?php } 
                    $select;
                    mysql_close($select);?>
                    
                    
                    
                </div>
                
                <div style="text-align:center" class="col-sm-12">
                   <br>
                    <a style="width:30%;" onclick="lastcheck();"  class="btn btn-default btn-success" name="sub">UPDATE</a> 
                    <br><br><br>
                </div>
                <br><br><br>
            </form>
            
            </div>
            
        </div>
    </div>
    <!---foooter ----->
    <div class="container-fluid " id="footer">
        <h5>Copyright © 2018 TITLE</h5>
        <h6 style="font-size:10px;">designed by <a href="http://debjoy.000webhostapp.com/inner.html" target="_blank">Debjoy</a></h6>
    </div>

</body>
</html>