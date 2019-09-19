<?php
	require("connect/connect.php");
	session_start();
	/*if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}*/
	
	$maID= $_GET["maID"];
	$sql="SELECT * FROM martial m INNER JOIN club cl ON m.clubID=cl.clubID WHERE m.maID='$maID'";
	$retvalViewMartial=mysqli_query($conn,$sql);
	$queryMartial=mysqli_fetch_array($retvalViewMartial);
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Trang Chu</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>

<script type="text/javascript" src="js/jquery-3.3.1.js"></script>


</head>
<body>
	
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
      </nav>

        <div class="container-fluid">		
		
        		<div class="row mt-2 ml-1">
                    <p><a href="martialArtist.php">Martial Artist</a> / View Martial Artist</p>
                </div>
                
               <div class="row">
               		<div class="col-2 mt-3 mb-2 border border-right-0" style="margin-left:20%; background:#F00;">
                    	<i class="fas fa-user-circle" style="font-size:100px; color:#FFF; margin:20%;;" ></i>
                    </div>
                    <div class="col-5 mt-3 mb-2 border border-left-0">
                    	<div class="row ml-2 mt-2">
                        	<b class="row ml-1"><?php echo $queryMartial["maName"]; ?></b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                        	<p><?php echo $queryMartial['maGender']; ?></p>
                           
                            
                        </div>
                        <div class="row ml-5 mt-1">
                        	<p><?php echo $queryMartial['maDob']; ?></p>
                           
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryMartial['maPhone']; ?></p>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryMartial['school']; ?></p>
                        </div>
                        <div class="row ml-2 mt-2">
                        	<b class="row ml-1">Club</b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryMartial['clubName']; ?></p>
                        </div>
                        
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryMartial['maDoa']; ?></p>
                        </div>
                         <div class="row ml-5 mt-1">
                            <p><?php echo $queryMartial['level']; ?></p>
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryMartial['status']; ?></p>
                        </div>
                        
                    </div>
               </div>
               <div class="row">
               	<div class="col-9" align="right"><button type="button" class="btn btn-success" onclick="location.href='editMartial.php?maID=<?php echo $queryMartial['maID']; ?>'">Edit</button></div>
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

    		
</body>
</html>