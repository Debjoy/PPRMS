<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php require_once("include/DB.php"); ?>
<?php confirm_user(); ?>
<?php

if(isset($_GET["userid"])){
    $userid=$_GET["userid"];
    $name=$_GET["name"];
    $camp=$_GET["camp"];// left for later
    $connect;
    $userid=mysql_real_escape_string($userid);//
    $name=mysql_real_escape_string($name);
    $camp=mysql_real_escape_string($camp);
    $query="SELECT * FROM records WHERE uniqueid LIKE '%$userid%' AND name LIKE '%$name%' AND camp LIKE '%$camp%'";
    $execute=mysql_query($query);
    $output='';
    $ar=array();
    $loop=0;
    while($row = mysql_fetch_assoc($execute)){
        $id=$row["id"];
        $output=$output.'<tr>';
        $output=$output.'<th>'.$row["uniqueid"].'</th>';
        
        $output=$output.'<td>'.str_ireplace($name,"<span style='background-color:yellow'>".$name."</span>",$row["name"]).'</td>';
        $output=$output.'<td>'.$row["age"].'</td>';
        $output=$output.'<td style="width:20%">'.$row["address"].'</td>';
        $follow=array("");
        if($row["followup"]==""){
             $follow=array("");
        }
        else{
            if($row["followup"])
             $follow=unserialize($row["followup"]);
        }
        if($follow[0]==1){
            $follow="Needed";
        }else
            $follow="";
        $output=$output.'<td>'.$follow.'</td>';
        $output=$output.'<td><a  target="_blank" href="infomain.php?id='.$row["id"].'"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-info-sign"></span></button></a> <a target="_blank" href="updatemain.php?id='.$row["id"].'"><button type="button" class="btn btn-success">Update</button></a></td>';
        $output=$output.'<td><a target="_blank" href="deletemain.php?id='.$id.'"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a></td>';
        $output=$output.'</tr>';
        $loop=$loop+1;
        if($loop % 20==0){
            array_push($ar,$output);
            $output="";
        }
    }
    if(!empty($output))
    {
        array_push($ar,$output);
    }
    $myJSON = json_encode($ar);
    echo $myJSON;
}

?>