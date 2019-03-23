<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php require_once("include/DB.php"); ?>
<?php confirm_user(); ?>
<?php


    
    $query="SELECT * FROM records";
    $execute=mysql_query($query);
    $output='';
    $ar=[];
    $loop=0;
    while($row = mysql_fetch_assoc($execute)){
        $date=unserialize($row["date"])[0];
        $diagnosis=unserialize($row["diagnosis"])[0];
        $treat=unserialize($row["treat"])[0];
        $refer=unserialize($row["refer"])[0];
        $id=$row["id"];
        
        $querrry="UPDATE records SET date1 ='$date', diagnosis1 = '$diagnosis' , treatment1 = '$treat' , refer1 = '$refer' WHERE id=$id";
        
        
        if($executee=mysql_query($querrry)){
                            
                           echo "success";
                            
                            
                        }else{
                            echo "fail";
                            
                        } 
    }
    $select;
                        mysql_close($select);


?>