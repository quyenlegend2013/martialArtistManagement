<?php
	require("connect/connect.php");
	session_start();
	/*if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}*/
	$maID=$_GET['maID'];
	$examID=$_GET['examID'];
	
	$sqlPointExamMaID="SELECT * FROM martial WHERE maID='$maID'";
	
	$queryPointExamMaID=mysqli_query($conn,$sqlPointExamMaID);
	$viewPointExamMaID=mysqli_fetch_array($queryPointExamMaID);
	
	
	$sqlPointExamExamID="SELECT * FROM exam WHERE examID='$examID'";
	
	$queryPointExamExamID=mysqli_query($conn,$sqlPointExamExamID);
	$viewPointExamExamID=mysqli_fetch_array($queryPointExamExamID);
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add Club</title>

<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>

<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
			function key(){
					
					$("#punch,#kick,#main,#practice,#counter,#physical").keyup(function(){
					var punch=parseFloat($("#punch").val());
					var kick=parseFloat($("#kick").val());
					var main=parseFloat($("#main").val());
					var practice=parseFloat($("#practice").val());
					var counter=parseFloat($("#counter").val());
					var physical=parseFloat($("#physical").val());
					
					$("#kqScore").val(punch+kick+main+practice+counter+physical);
				});
					
				}

</script>

</head>
<body onload="loaddata()">
	
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b><?php
		  /*echo $_SESSION["user"];*/ echo "user name"; ?></b></div>
      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="coach.php" class="list-group-item list-group-item-action bg-light">Coach</a>
        <a href="club.php" class="list-group-item list-group-item-action bg-light">Club</a>
        <a href="martialArtist.php" class="list-group-item list-group-item-action bg-light">Martial Artist</a>
        <a href="examination.php" class="list-group-item list-group-item-action bg-light">Exam</a>
  
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-success" id="menu-toggle"><i class="fas fa-bars"></i></button>
         <!--<button class="btn btn-dark" id="menu-toggle" style="margin-left:8px">Theme</button>-->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		
        <div class="row collapse navbar-collapse" id="navbarSupportedContent">
          
          <div class="col-6"><b style="font-size:24px; margin-left:5%;">Point Of Martial Artist</b></div>
         
        </div>
      </nav>

      <div class="container-fluid">

        
       	<div class="row mt-2 ml-1">
            	<p><a href="examOfMartial.php">Exam Of Martial</a> / Add Point Martial</p>
            </div>
           
            
            <form action="xulyAddPointOfMartial.php" method="post">
            <div class="row" style="margin-left:10%">
            	<div class="col-5 card card-body">
                	<div class="row mt-1">
						<h6 class="card-title">Basic information</h6>
					</div>
                    <input type="hidden" value="<?php echo $maID?>" name="maID" />
                    <input type="hidden" value="<?php echo $examID?>" name="examID" />
                    <div class="row mt-3">
                    	<input type="text" class="form-control" value="<?php echo $viewPointExamMaID['maName'];?>" placeholder="Martial Artist's Name" name="maName" readonly="readonly" />
                    </div>
                     
                    <div class="row mt-3">
                    	<input type="text" class="form-control" value="<?php echo $viewPointExamExamID['examName'];?>" name="examName" readonly="readonly" />
                    </div>
                    
                   
                    <div class="row mt-3">
                    	<input type="text" class="form-control" value="<?php echo $viewPointExamMaID['maGender']; ?>" name="maGender" readonly="readonly" />
                    </div>
                    
                </div>
                <div class="col-5 card card-body" style="margin-left:2%;">
                	
                	<div class="row mt-1">
						<h6 class="card-title">Examimer</h6>
					</div>
                   
                    <div class="row mt-3">
                    	<input type="text" class="form-control"   name="resultExaminer" />
                       
                    </div>
                     <div class="row mt-3">
                    	<input type="text" id="kqScore" class="form-control" placeholder="Point of Martial" value="<?php ?>"  name="totalScore" readonly="readonly" />
                       
                    </div>
                    
                </div>
            </div>
            
            <div class="row" style="margin-left:10%; margin-top:2%;">
            	<div class="col-5 card card-body">
                	<div class="row mt-1">
						<h6 class="card-title">Point </h6>
					</div>
                    <div class="row mt-3">
                    	<input type="text" id="punch" onclick="key()" class="form-control" placeholder="Score Of Punch " name="scoreOfPunch" required="required" />
                    </div>
                    <div class="row mt-3">
                    	<input type="text" id="kick" onclick="key()" class="form-control" placeholder="Score Of Kick" name="scoreOfKick" required="required" />
                    </div>
                    <div class="row mt-3">
                    	<input type="text" id="main" onclick="key()" class="form-control" placeholder="Score Of Main" name="scoreOfMain" required="required" />
                    </div>
                </div>
                <div class="col-5 card card-body" style="margin-left:2%">
                	
                	<div class="row mt-1">
						<h6 class="card-title">---</h6>
					</div>
                    <div class="row mt-3">
                    	<input type="text" id="practice" onclick="key()" class="form-control"  placeholder="Score Of Practice" name="scoreOfPractice" required="required" />
                    </div>
                    <div class="row mt-3">
                    	<input type="text" id="counter" onclick="key()" class="form-control" placeholder="Score Of Counter Vailing" name="scoreOfCounterVailing" required="required" />
                    </div>
                    <div class="row mt-3">
                    	<input type="text" id="physical" onclick="key()" class="form-control" placeholder="Score Of Physical" name="scoreOfPhysical" required="required" />
                    </div>
                    
                </div>
            </div>
            
            
            
            <div class="row mt-3 mb-2">
            	<div class="col-5"  align="right"><button type="submit" class="btn btn-success" name="" >Save</button></div>
                <div class="col-1" align="left"><button type="reset" class="btn btn-success" name="" >Cancel</button></div>
                <div class="col-2" style="margin-left:1%;"><button type="reset" class="btn btn-success" onclick="location.href='martialArtist.php'" >Exit</button></div>
            </div>
      </form>            	
            
                
    

		</div>
     </div>
   </div>
</div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  
<script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
  new WOW().init();
</script> 

    		
</body>
</html>