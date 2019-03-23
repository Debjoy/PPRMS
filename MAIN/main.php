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
    <script type="text/JavaScript" src="js/record.js"></script>
<?php
     function redirect($path){
        echo "<script>window.location.href = '$path';</script>";
     }
     if(isset($_GET["err"])){
                   $_SESSION["ErrorMessage"]=$_GET["err"];
                }
     ?>
 <style>
    fieldset 
	{
		border: 1px solid #ddd !important;
		margin: 0;
		min-width: 0;
		padding: 10px;       
		position: relative;
		border-radius:4px;
		background-color:#f5f5f5;
		padding-left:10px!important;
	}	
	
		legend
		{
			font-size:14px;
			font-weight:bold;
			margin-bottom: 0px; 
			width: 35%; 
			border: 1px solid #ddd;
			border-radius: 4px; 
			padding: 5px 5px 5px 10px; 
			background-color: #ffffff;
		}
     
    
    </style>
    <script>
        //AJAX Loading of Institution
        function optionsadd(str) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("selectinstitution").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","instinamesfetch.php?state="+str+"",true);
                xmlhttp.send();
            
            
        }
        // enabling /disabling an option
        function clearusersearch(){
            document.getElementById("userinput").value="";
        }
        
        
    
    </script>
</head>
<body onload="optionsadd('SELECT STATE')">
   
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
                <?php echo Message(); ?> 
                <li class="active">
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
            
            <div class="container col-sm-10">
                <br>
                <h1 style="text-align:center;">Patient Records</h1>
                <div  class="form-inline" style="text-align:center;">
                <fieldset>
                   <legend>Search</legend>
                    
                    
                     <div class="form-group">
                        <input class="form-control" style="margin-top:10px;" id="userinput" type="text" onkeydown="whenloaded()" placeholder="User ID">
                     </div>
                     
                     
                     <strong style="margin-left:10px;top:6px;position:relative;margin-right:10px;">OR</strong>
                     
                   <div class="form-group">
                        <input class="form-control" style="margin-top:10px;" id="username" type="text" onkeydown="clearusersearch()" placeholder="Name" name="username">
                     </div> 
                     
                     
                  <div class="form-group ">
                    <label for="statename">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select class="form-control" id="listBox" style="margin-top:10px;" onchange="optionsadd(this.value); clearusersearch()" name="statename">
                      </select>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="institution">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select class="form-control" name="institution" style="margin-top:10px;" onchange="clearusersearch()" id="selectinstitution">
                          <option value="">SELECT CAMP</option>
                      </select>
                  </div>
                  
                  
                    <label >&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <button  style="margin-top:10px;" class="btn btn-default btn-success" onclick="preprocess()"><span class="glyphicon glyphicon-search"></span> SEARCH</button>
                  
                  
                  
                </fieldset> 
                    
                </div>
            <!--  The TABLE To Be shown -->
                
                <h3 style="text-align:center;">Record Table</h3>
            
                <div class="container table-responsive col-sm-12" id="tablespace">
                    
                </div>
            
            
            
            </div>
        </div>
        
    </div>
    
        <br><br><br><br><br><br><br>
    <!---foooter ----->
    <div class="container-fluid " id="footer">
        <h5>Copyright © 2018 Company</h5>
        <h6 style="font-size:10px;">designed by <a href="http://debjoy.000webhostapp.com/inner.html" target="_blank">Debjoy</a></h6>
    </div>
<script>
    function whenloaded(){
    var handles = ["SELECT STATE","Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Dadra and Nagar Haveli","Daman and Diu","Delhi","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka",
                                        "Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Puducherry","Punjab", "Rajasthan","Sikkim","Tamil Nadu",
                                        "Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal"];
      var options = '';
  for (var i = 0; i < handles.length; i++) {
      options += '<option value="' + handles[i] + '">' + handles[i] + '</option>';
  }
  document.getElementById("listBox").innerHTML=options;
        optionsadd(handles[0]);
        document.getElementById("username").value="";
    };
    whenloaded();
    </script>
</body>
</html>