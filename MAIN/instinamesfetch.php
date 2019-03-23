<option value="">SELECT CAMP</option>
   <?php 
    require_once("include/DB.php"); 
    if(isset($_GET["state"])){
    $connect;
    $state=mysql_real_escape_string($_GET["state"]);
    //$state=$_GET["state"];
    if(strcmp($state,"SELECT STATE")!=0){
        $Querry="SELECT * FROM institution WHERE state='$state'";}
    else{
        $Querry="SELECT * FROM institution";}
    $execute=mysql_query( $Querry);
    while($row = mysql_fetch_assoc($execute)){
        ?><option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
    <?php }$select;
                    mysql_close($select);}

?>