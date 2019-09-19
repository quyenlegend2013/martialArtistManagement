<?php
	require("connect/connect.php");
	session_start();
	/*if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}*/
	$sqlCoach="SELECT * FROM coach";
	$sqlRole="SELECT roleID FROM role";
	$revalRole=mysqli_query($conn,$sqlRole);
	$revalCoach=mysqli_query($conn,$sqlCoach);
	$countCoach=mysqli_num_rows($revalCoach);
	$countRole=mysqli_num_rows($revalRole);
	
	$coachID= $_GET["coachID"];
	$sqlEditCoach="SELECT * FROM coach WHERE coachID='$coachID'";
	$queryEditCoach=mysqli_query($conn,$sqlEditCoach);
	$revalEditCoach=mysqli_fetch_array($queryEditCoach);
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Coach</title>

<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>

<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
			function checkPassword(){
				var password=document.getElementById("password").value;
				var repassword=document.getElementById("rePassword").value;
				var note="";
				if(password!=repassword)
				{
					note="password don't match";
				}
				document.getElementById("view-password").innerHTML=note;
					
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
          
          <div class="col-3"><b style="font-size:24px; margin-left:5%;">Coach</b></div>
         
        </div>
      </nav>

      <div class="container-fluid">

        
       	<div class="row mt-2 ml-1">
            	<p><a href="coach.php">Coach</a> / Edit Coach</p>
            </div>
           
            
            <form action="xulyEditCoach.php" method="post">
            <div class="row" style="margin-left:10%">
            	<div class="col-5 card card-body">
                	<div class="row mt-1">
						<h6 class="card-title">Basic Information</h6>
					</div>
                    <input type="hidden" name="coachID" value="<?php echo $revalEditCoach['coachID'];?>" />
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="Full Name" value="<?php echo $revalEditCoach['coachName'];?>" name="coachName" required="required" />
                    </div>
                    
                    <div class="row mt-3">
                    	<select class="form-control" name="coachGender">
                        	<option>Male</option>
                            <option>Remale</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                    	<input type="email" class="form-control" placeholder="E-mail" value="<?php echo $revalEditCoach['coachEmail'];?>" name="coachEmail" required="required" />
                    </div>
                     <div class="row mt-3">
                    	<select class="form-control" name="roleID">
                        	<?php
								if($countRole>0)
								{
									while($rs=mysqli_fetch_assoc($revalRole))
									{
										echo "<option>".$rs["roleID"]."</option>";
									}
								}
							?>
                        </select>
                        
                    </div>
                    <div class="row mt-3">
                    	<input type="date" class="form-control"  name="coachDob" value="<?php echo $revalEditCoach['coachDob'];?>" />
                    </div>
                    
                   
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="Phone" value="<?php echo $revalEditCoach['coachPhone'];?>" name="coachPhone" />
                    </div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="Facebook" value="<?php echo $revalEditCoach['coachFacebook'];?>" name="coachFacebook" />
                    </div>
                    
                </div>
                <div class="col-5 card card-body" style="margin-left:2%">
                	
                	<div class="row mt-1">
						<h6 class="card-title">Account</h6>
					</div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="User name" value="<?php echo $revalEditCoach['userName'];?>" name="userName" required="required"/>
                    </div>
                    <div class="row mt-3">
                    	<input id="password" type="password" class="form-control" value="<?php echo $revalEditCoach['password'];?>" placeholder="Password" name="password" required="required"/>
                    </div>
                   
                    <div class="row mt-3">
                    	<input id="rePassword" type="password" class="form-control" placeholder="Re-password" onfocusout="checkPassword()"/>
                        <p id="view-password"></p>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
            	<div class="col-6"  align="right"><button type="submit" class="btn btn-success" name="" >Save</button></div>
                <div class="col-2" style="margin-left:1%;"><button type="reset" class="btn btn-success" onclick="location.href='coach.php'" >Exit</button></div>
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