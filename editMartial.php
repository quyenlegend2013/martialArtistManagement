<?php
	require("connect/connect.php");
	session_start();
	/*if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}*/
	$sqlCoach="SELECT * FROM coach";
	
	$revalCoach=mysqli_query($conn,$sqlCoach);
	$countCoach=mysqli_num_rows($revalCoach);
	
	$sqlClub="SELECT * FROM club";
	
	$revalClub=mysqli_query($conn,$sqlClub);
	$countClub=mysqli_num_rows($revalClub);
	
	$maID= $_GET["maID"];
	$sqlEditMartial="SELECT * FROM martial WHERE maID='$maID'";
	$queryEditMartial=mysqli_query($conn,$sqlEditMartial);
	$revalEditMartial=mysqli_fetch_array($queryEditMartial);
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Martial Artist</title>

<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>

<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
			

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
        <a href="exam.php" class="list-group-item list-group-item-action bg-light">Exam</a>
       
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
          
          <div class="col-3"><b style="font-size:24px; margin-left:5%;">Martial Artist</b></div>
         
        </div>
      </nav>

      <div class="container-fluid">

        
       	<div class="row mt-2 ml-1">
            	<p><a href="martialArtist.php">Martial artist</a> / Edit martial artist</p>
            </div>
           
            
            <form action="xulyEditMartial.php" method="post">
            <div class="row" style="margin-left:10%">
            	<div class="col-5 card card-body">
                	<div class="row mt-1">
						<h6 class="card-title">Basic information</h6>
					</div>
                    <input type="hidden" value="<?php echo $revalEditMartial['maID']; ?>" name="maID" />
                    <div class="row mt-3">
                    	<input type="text" class="form-control" value="<?php echo $revalEditMartial['maName']; ?>" placeholder="Martial Artist's Name" name="maName" required="required" />
                    </div>
                     
                    <div class="row mt-3">
                    	<input type="date" class="form-control" value="<?php echo $revalEditMartial['maDob']; ?>" placeholder="Birthday" name="maDob" />
                    </div>
                    
                   
                    <div class="row mt-3">
                    	<select class="form-control" name="maGender">
                        	<option>Male</option>
                            <option>Remale</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" value="<?php echo $revalEditMartial['maPhone']; ?>" placeholder="Phone" name="maPhone" />
                    </div>
                    
                </div>
                <div class="col-5 card card-body" style="margin-left:2%;">
                	
                	<div class="row mt-1">
						<h6 class="card-title">Club</h6>
					</div>
                    <div class="row mt-3">
                    	<select class="form-control" name="clubName">
                        	<?php
								if($countCoach>0)
								{
									while($rs=mysqli_fetch_assoc($revalClub))
									{
										echo "<option>".$rs["clubName"]."</option>";
									}
								}
							?>
                        </select>
                        
                    </div>
                    <!--<div class="row mt-3">
                    	<select class="form-control" name="coachName">
                        	<?php
								/*if($countCoach>0)
								{
									while($rs=mysqli_fetch_assoc($revalCoach))
									{
										echo "<option>".$rs["coachName"]."</option>";
									}
								}*/
							?>
                        </select>
                    </div>-->
                   
                    <div class="row mt-3">
                    	<input type="date" class="form-control" value="<?php echo $revalEditMartial['maDoa']; ?>" placeholder="Date DOA" name="maDoa" />
                       
                    </div>
                     <div class="row mt-3">
                    	<select class="form-control" name="level">
                        	<option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                           
                        </select>
                       
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-left:10%; margin-top:2%;">
            	<div class="col-5 card card-body">
                	<div class="row mt-1">
						<h6 class="card-title">Education</h6>
					</div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" value="<?php echo $revalEditMartial['school']; ?>" placeholder="School Name" name="school" required="required" />
                    </div>
                </div>
                <div class="col-5 card card-body" style="margin-left:2%">
                	
                	<div class="row mt-1">
						<h6 class="card-title">Other</h6>
					</div>
                    <div class="row mt-3">
                    	<select class="form-control" name="status">
                        	<option>Active</option>
                            <option>Done</option>
                            <option>Fail</option>
                            <option>Cacel</option>
                        </select>
                        
                    </div>

                    <div class="row mt-3">
                    	<input type="text" class="form-control" value="<?php echo $revalEditMartial['maNote']; ?>" placeholder="Note" name="maNote" />
                       
                    </div>
                    
                </div>
            </div>
            
            
            
            <div class="row mt-3 mb-2">
            	<div class="col-6"  align="right"><button type="submit" class="btn btn-success" name="" >Save</button></div>
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