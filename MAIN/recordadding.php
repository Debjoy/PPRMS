<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php require_once("include/DB.php"); ?>
<?php confirm_user(); ?>
<?php 
    
                if(isset($_POST["name"])){
                    $connect;
                    $age=mysql_real_escape_string($_POST["age"]);
                    $gender=mysql_real_escape_string($_POST["gender"]);
                    $name=mysql_real_escape_string($_POST["name"]);
                    $camp=mysql_real_escape_string($_POST["camp"]);
                    $phno=mysql_real_escape_string($_POST["phono"]);
                    $address=mysql_real_escape_string($_POST["address"]);
                    $longmeds=mysql_real_escape_string($_POST["longtermmeds"]);
                    $chronic=mysql_real_escape_string($_POST["chronic"]);
                    
                    $curdate=($_POST["curdatecamp"]);
                    $curdiagnosis=($_POST["curdiagnosiscamp"]);
                    $curtreat=($_POST["curtreatcamp"]);
                    $currefer=($_POST["currefercamp"]);
                    if(isset($_POST["curfollowcamp"])){
                        $curfollow=1;
                    }
                    else{
                        $curfollow=0;
                    }
                    
                    $date=array($curdate);
                    $diagnosis=array($curdiagnosis);
                    $treat=array($curtreat);
                    $refer=array($currefer);
                    $follow=array($curfollow);
                    
                    require_once("include/DB.php");
                          $connect;
                        $query="SELECT id FROM institution WHERE name = '$camp'";
                        $execute=mysql_query( $query);
                        
                        $id=mysql_fetch_assoc($execute)["id"];
                    
                    
                        
                        if(!empty($_POST["datecamp"][0])||!empty($_POST["diagnosiscamp"][0])||!empty($_POST["treatcamp"][0])||!empty($_POST["refercamp"][0])){
                           
                            $datecamp=$_POST["datecamp"];
                            $diagnosiscamp=$_POST["diagnosiscamp"];
                            $treatcamp=$_POST["treatcamp"];
                            $refercamp=$_POST["refercamp"];
                            
                            for($i=0;$i<sizeof($datecamp);$i++){
                                if(!empty($datecamp[$i])||!empty($diagnosiscamp[$i])||!empty($treatcamp[$i])||!empty($refercamp[$i])){
                                    
                                    array_push($date,$datecamp[$i]);
                                    array_push($diagnosis,$diagnosiscamp[$i]);
                                    array_push($treat,$treatcamp[$i]);
                                    array_push($refer,$refercamp[$i]);
                                }
                            }
                        }
                        $date=serialize($date);
                        $diagnosis=serialize($diagnosis);
                        $treat=serialize($treat);
                        $refer=serialize($refer);
                        $follow=serialize($follow);
                        require_once("include/DB.php");
                          $connect;
                        $query="SELECT city FROM institution WHERE name = '$camp'";
                        $execute=mysql_query($query);
                        
                        $UIpart=mysql_fetch_assoc($execute);
                        
                        
                        $query="INSERT INTO records (name,age,gender,phno,camp,address,ltmeds,chronic,date,diagnosis,treat,refer,followup) VALUES ('$name','$age','$gender','$phno','$camp','$address','$longmeds','$chronic','$date','$diagnosis','$treat','$refer','$follow')";
                        
                        if(mysql_query($query)){
                            $lastid=mysql_insert_id();
                            $UIpart=substr(strtoupper($UIpart['city']),0,3).sprintf("%05d",$lastid);
                            
                            $_SESSION["SuccessMessage"]="Record added Successfully!! The User ID of the previous record is >$UIpart<";
                            $query="UPDATE records SET uniqueid='$UIpart' WHERE id=$lastid";
                            mysql_query( $query);
                            
                            
                            $select;
                    mysql_close($select);
                            Redirect_to("newrecord.php?id=$id");
                        }else{
                            $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
                            $select;
                    mysql_close($select);
                            Redirect_to("newrecord.php?id=$id"); 
                        }                      
                    
                }
?>