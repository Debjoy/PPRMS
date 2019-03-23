<?php
if(isset($_GET["camp"])){
$search=$_GET["camp"];
header('Content-Type: application/octetstream; name="somename.xml"');
header('Content-Type: application/octet-stream;name="somename.xml"');
header('Content-Disposition: attachment; filename="somename.xml"');
// Output file contents here
require_once("include/DB.php");
$search=mysql_real_escape_string($search);
$connect;
$query="SELECT * FROM records WHERE camp LIKE '$search'";

$out='<?xml version="1.0" encoding="utf-8" ?><sams41383970667>';
$execute=mysql_query($query);
$flag=0;
    while($row = mysql_fetch_assoc($execute))
    {
        
        $flag=0;
        if($row["followup"]!=""){
             if($row["followup"])
                $follow=unserialize($row["followup"])[0];
        
        if($follow==1){
            $follow="Needed";
        }else
            $follow="";
        }
        if($row["age"]>60)
            $flag=1;
        $out=$out.'<records>';
        $out=$out.'<id>'.$row["id"].'</id>';
        $out=$out.'<uniqueid>'.$row["uniqueid"].'</uniqueid>';
        $out=$out.'<name>'.str_replace("&","&amp;",$row["name"]).'</name>';
        $out=$out.'<age>'.$row["age"].'</age>';
        $out=$out.'<gender>'.$row["gender"].'</gender>';
        $out=$out.'<phone>'.$row["phno"].'</phone>';
        $out=$out.'<address>'.str_replace("&","&amp;",$row["address"]).'</address>';
        if($flag==1){
            $out=$out.'<LongTermMedicines>'.str_replace("&","&amp;",$row["ltmeds"]).'</LongTermMedicines>';
            $out=$out.'<ChronicDiseases>'.str_replace("&","&amp;",$row["chronic"]).'</ChronicDiseases>';
        }
        $out=$out.'<date>'.$row["date1"].'</date>';
        $out=$out.'<diagnosis>'.str_replace("&","&amp;",$row["diagnosis1"]).'</diagnosis>';
        $out=$out.'<treatment>'.str_replace("&","&amp;",$row["treatment1"]).'</treatment>';
        $out=$out.'<refer>'.str_replace("&","&amp;",$row["refer1"]).'</refer>';
        $out=$out.'<followUp>'.$follow.'</followUp>';
        $out=$out.'</records>';
        
        $diag=unserialize($row["diagnosis"]);
        $var = str_replace("&","&amp;",$diag[0]);


    }
    $out=$out.'</sams41383970667>';
    echo $out;
}
?>