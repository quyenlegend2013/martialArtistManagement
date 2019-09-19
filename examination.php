<?php
	require("connect/connect.php");
	session_start();
	/*if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}*/
	$sqlClub="SELECT * FROM club";
	$sqlCoach="SELECT * FROM coach";
	$sqlMartial="SELECT * FROM martial";
	$sqlExam="SELECT * FROM exam";
	$revalCoach=mysqli_query($conn,$sqlCoach);
	$revalClub=mysqli_query($conn,$sqlClub);
	$revalMartial=mysqli_query($conn,$sqlMartial);
	$countClub=mysqli_num_rows($revalClub);
	$countCoach=mysqli_num_rows($revalCoach);
	$countMartial=mysqli_num_rows($revalMartial);
	
	$revalExam=mysqli_query($conn,$sqlExam);
	$countExam=mysqli_num_rows($revalExam);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Trang Chu</title>

<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>

<script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.js"></script>
<script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />

<!-- If you use the default popups, use this. -->
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	var cal = new tui.Calendar('#calendar', {
	    defaultView: 'month', // monthly view option
	    	taskView: ['task'],  // e.g. true, false, or ['task', 'milestone'])
	        scheduleView: ['time']
	  })
	});
	
	

</script>
<style>

</style>

</head>
<body>
	
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b><?php
		  /*echo $_SESSION["user"];*/ echo "user name"; ?></b></div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
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

        <!--<div class="row collapse navbar-collapse" id="navbarSupportedContent">
          <div class="col-11 text-right"><?php
		  echo $_SESSION["user"];
          ?></div>
          <div class="col-1"><a href="exit.php">Logout</a></div>
        </div>-->
      </nav>

      <div class="container-fluid">
        
        		<div class="row mt-4">
					<div class="col-3 col-lg-4">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0"></h5>
										<span class="h3 font-weight-bold mb-0"><a href="exam.php">Exam</a></span>
									</div>
									<div class="col-auto">
										<!--<i class="far fa-user" style="color: blue; font-size: 60px;"></i>-->
                                        <i class="fas fa-user-friends" style="color: Lime; font-size: 50px;"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-3 col-lg-4">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0"></h5>
										<span class="h4 font-weight-bold mb-0"><a href="examOfMartial.php">Exam of Martial</a></span>
									</div>
									<div class="col-auto">
										<i class="far fa-calendar-check"
											style="color: #E67E22; font-size: 50px;"></i>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-3 col-lg-4">
						<div class="card card-stats mb-4 mb-xl-0">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title text-uppercase text-muted mb-0"></h5>
										<span class="h4 font-weight-bold mb-0"><a href="resultOfExam.php">Result of Exam</a></span>
									</div>
									<div class="col-auto">
										<i class="fas fa-school" style="color: green; font-size: 50px;"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
                    
                    
				</div>
                
                
               
                
                <div class="row mt-3 mb-3">
                	<div class="col-12 mb-1 mt-2">
						<div class="card card-stats mb-3">
							<div class="card-body">
							
								 <div id="chart-calendar">
								   <div id="calendar"></div>
                                 </div>	
								
							</div>
						</div>
					</div>
                </div>
                
                
                
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