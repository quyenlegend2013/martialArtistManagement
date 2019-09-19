<?php
	require "connect/connect.php";
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Check result point</title>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->

<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
	function check()
	{
		
		var maid=document.getElementById("maID").value;
		var examid=document.getElementById("examID").value;
		
		//document.getElementById("kq").value=maid;
			$.ajax({
					url:'dataCheck.php',
					type:'POST',
					data:{maid:maid,examid:examid},
					success: function(data){
							for(var i in data)
							{
								
								document.getElementById("name").innerHTML=data[i].maName;
								document.getElementById("exam").innerHTML=data[i].examName;
								document.getElementById("punch").innerHTML="Punch: "+data[i].scoreOfPunch;
								document.getElementById("kick").innerHTML="Kick: "+data[i].scoreOfKick;
								document.getElementById("main").innerHTML="Main: "+data[i].scoreOfMain;
								document.getElementById("practice").innerHTML="Practice: "+data[i].scoreOfPractice;
								document.getElementById("counter").innerHTML="Counter vailing: "+data[i].scoreOfCounterVailing;
								document.getElementById("physical").innerHTML="Physical: "+data[i].scoreOfPhysical;
				
							}			
						}
						
				});
	}
</script>
</head>

<body>
	<div class="container-fluid">
    			
      	  		
                <div class="row" style="margin:6%;">
                	
                	<div class="row card card-body" style="background:#F7F7F7;">
                    	<div class="row " style="margin-left:45%; font-size:18px;">Result Exam</div>
                    	<div class="row mt-3">
                        	<div class="col-5 mt-2" align="right">
                            	Martial Artist ID:
                            </div>
                            	
                            <div>
                            <input type="text" id="maID" class="form-control" onfocusout="check();"/>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-5 mt-2" align="right">
                            	Exam ID:
                            </div>
                            <div>
                        	<input type="text" id="examID" class="form-control" />
                            </div>
                        </div>
                        <div class="row" style="margin-left:44%;">
                        	<button class="btn btn-success" type="submit" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="check();">Check</button>
                        </div>
                        <div class="row collapse mt-2" id="collapseExample">
                          <div class="card card-body">
                                <div class="row ml-3">
                                	<p id="name" style="font-size:24px;"></p>
                                </div>
                                <div class="row ml-3">
                                	<p id="exam"></p>
                                </div>
                                <div class="row ml-1">
                                    <div class="col-2">
                                    	<b id="punch"></b>
                                    </div>
                                    <div class="col-2">
                                    	<b id="kick"></b>
                                    </div>
                                    <div class="col-2">
                                    	<b id="main"></b>
                                    </div>
                                    <div class="col-2">
                                    	<b id="practice"></b>
                                    </div>
                                    <div class="col-2">
                                    	<b id="counter"></b>
                                    </div>
                                    <div class="col-2">
                                    	<b id="physical"></b>
                                    </div>
                                </div>
                            
                          </div>
                		</div>
           </div>
     </div>                
 </div>
</body>
</html>