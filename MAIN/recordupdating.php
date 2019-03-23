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
                    
                    $id=mysql_real_escape_string($_GET["id"]);
                    
                    if(isset($_POST["curfollowcamp"])){
                        $curfollow=1;
                    }
                    else{
                        $curfollow=0;
                    }
                    if(!empty($curdiagnosis)||!empty($curtreat)||!empty($currefer)){
                        $date=array($curdate);
                        $diagnosis=array($curdiagnosis);
                        $treat=array($curtreat);
                        $refer=array($currefer);
                        $follow=array($curfollow);
                    }else{
                        $date=array();
                        $diagnosis=array();
                        $treat=array();
                        $refer=array();
                        $follow=array();
                    }
                    
                    
                    if($address==="" && $phno===""){
                        $_SESSION["ErrorMessage"]="Address field and Contact no field both of them cant be empty, fill atleast one of them";
                        Redirect_to("updatemian.php?id=$id");
                    }else{
                        
                        if(!empty($_POST["datecamp"][0])||!empty($_POST["diagnosiscamp"][0])||!empty($_POST["treatcamp"][0])||!empty($_POST["refercamp"][0])){
                           
                            $datecamp=$_POST["datecamp"];
                            $diagnosiscamp=$_POST["diagnosiscamp"];
                            $treatcamp=$_POST["treatcamp"];
                            $refercamp=$_POST["refercamp"];
                            
                            for($i=0;$i<sizeof($datecamp);$i++){
                                if(!empty($datecamp[$i])||!empty($diagnosiscamp[$i])||!empty($treatcamp[$i])||!empty($refercamp[$i])){
                                    if(isset($_POST["followcamp"][$i])){
                                        $followcamp=1;
                                    }
                                    else{
                                        $followcamp=0;
                                    }
                                    array_push($date,$datecamp[$i]);
                                    array_push($diagnosis,$diagnosiscamp[$i]);
                                    array_push($treat,$treatcamp[$i]);
                                    array_push($refer,$refercamp[$i]);
                                    array_push($follow,$followcamp);
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
                        
                        
                        
                        $query="UPDATE records SET name = '$name',age = '$age',gender = '$gender',phno = '$phno', camp = '$camp', address = '$address', ltmeds = '$longmeds' , chronic = '$chronic', date = '$date', diagnosis = '$diagnosis', treat = '$treat', refer = '$refer',followup = '$follow' WHERE id=$id";
                        
                        if($execute=mysql_query($query)){
                            
                            $_SESSION["SuccessMessage"]="Record UPDATED Successfully!!";
                            
                            $select;
                    		mysql_close($select);
                            Redirect_to("infomain.php?id=$id");
                        }else{
                            $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
                            $select;
                    mysql_close($select);
                            Redirect_to("updatemain.php?id=$id"); 
                        }                      
                    }
                }
?>