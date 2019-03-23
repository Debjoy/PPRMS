var ar=[];

function preprocess(){
    var userid=document.getElementById("userinput").value;
    var camp=document.getElementById('selectinstitution').value;
    var name=document.getElementById('username').value;
   if(userid==="" && camp==="" && name==="" ){
        document.getElementById("tablespace").innerHTML='<p style="text-align:center;width:95%;color:grey;font-size:30px">Please enter a search query!</p>';
    }else{
        afterprocess(userid,name,camp);
    }
}
function notfound(){
    document.getElementById("tablespace").innerHTML='<p style="text-align:center;width:95%;color:grey;font-size:30px">Record not found!</p>';
}

function afterprocess(){
    
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    
                    if (this.readyState == 4 && this.status == 200) {
                        var output;
                        $StringValue=this.responseText;
                        if($StringValue==="[]"){
                            document.getElementById("tablespace").innerHTML='<p style="text-align:center;width:95%;color:grey;font-size:30px">Record not found!</p>';
                        }
                        else{
                            
                            ar=JSON.parse($StringValue);
                            output='<ul class="pagination" style="cursor:pointer;">';
                            var x;
                            x=0;
                            output=output.concat('<li class="active"><a onclick="showtable('+x+')">'+(x+1)+'</a></li>');
                            for(x=1;x<ar.length;x++){

                                output=output.concat('<li><a onclick="showtable('+x+')">'+(x+1)+'</a></li>');
                            }
                            output=output.concat('</ul>');

                            output=output.concat('<table class="table table-striped"><thead><tr><th>Unique ID</th><th>Name</th><th>Age</th><th>Address</th><th>Follow Up</th><th>Info / Update</th><th>Delete</th></tr></thead><tbody>');
                            output=output.concat(ar[0]);
                            output=output.concat('</tbody></table>');
                            
                            document.getElementById("tablespace").innerHTML = output;
                        }
                    }
                };
                xmlhttp.open("GET","recordfetch.php?userid="+arguments[0]+"&name="+arguments[1]+"&camp="+arguments[2]+"",true);
                xmlhttp.send();
    
}
function showtable(index){
    output='<ul class="pagination pagination-sm" style="cursor:pointer;">';
    var x;
    for(x=0;x<ar.length;x++){
        if(x==index){
            output=output.concat('<li class="active"><a onclick="showtable('+x+')">'+(x+1)+'</a></li>'); 
        }else{
            output=output.concat('<li><a onclick="showtable('+x+')">'+(x+1)+'</a></li>');
        }
       
    }
    output=output.concat('</ul>');
    output=output.concat('<table class="table table-striped"><thead><tr><th>Unique ID</th><th>Name</th><th>Age</th><th>Address</th><th>Follow Up</th><th>Info / Update</th><th>Delete</th></tr></thead><tbody>');
    output=output.concat(ar[index]);
    output=output.concat('</tbody></table>');
    document.getElementById("tablespace").innerHTML = output;
    
}