<?php
	require("connect/connect.php");
	session_start();
	/*if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}*/
	$sqlCoach="SELECT * FROM coach";
	//$sqlEvent="SELECT * FROM event";
	//$sqlClass="SELECT * FROM class";
	//$revalEvent=mysqli_query($conn,$sqlEvent);
	$revalCoach=mysqli_query($conn,$sqlCoach);
	//$revalClass=mysqli_query($conn,$sqlClass);
	$countCoach=mysqli_num_rows($revalCoach);
	//$countEvent=mysqli_num_rows($revalEvent);
	//$countClass=mysqli_num_rows($revalClass);
	
	
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
				function loaddata(){
					$.ajax({
					url: 'loadDataCoach.php',
					type: 'POST',
					data: {
						res: 1
					},
					success: function(response){
						$('.danhsach').html(response);
						//$("#delete").attr("disabled", true);
						//$("#edit").attr("disabled", true);
						
					}
				})
				}
				
				function dosearch() {
				$('#searchCoach').keyup(function(){
					var txt=$('#searchCoach').val();
					$.post('searchCoach.php',{data: txt},function(data){
						$('.danhsach').html(data);
						})
					})};
				
				function deleteCoach(coachID) {
					if (confirm("Do you want to delete this coach?")) {
						$.ajax({
							url: 'deleteCoach.php?coachID=' + coachID,
							method: 'POST',
							success: function (data) {
								
								loaddata();
							},
							
						});
					} else {
						//alert("Cancel");
					}
		
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
          
          <div class="col-3"><b style="font-size:24px; margin-left:5%;">Coach</b></div>
          <div class="col-5" style="margin-left:22%"><input type="text" name="" placeholder="Search..." class="form-control" id="searchCoach" onclick="dosearch();" /></div>
        </div>
      </nav>

      <div class="container-fluid">

        <div class="row mb-4 mt-3">
          <div class="col-12 mb-1 mt-2">
			<div class="card card-stats mb-3">
				<div class="card-body">	
					<div class="row">
                        <div class="col-3"><h4>Coach<span class="badge badge-danger"><?php echo $countCoach;?></span></h4></div>
                          <div class="col-2" style="margin-left:55%;"><button type="button" onclick="location.href='addCoach.php'" class="btn btn-success">+ Add coach</button></div>
                        </div>
                        <hr />
                        <div class="row">
                          <!--<div style="margin-left:1.5%;">Show</div>
                          <div class="col-2">
                          	<select class="form-control">
                          		<option>1</option>
                            	<option>2</option>
                            </select> 
                           </div>-->
                          <div class="col-2" style="margin-left:64%;"><button type="button" onclick="location.href='importCoach.php'" class="btn btn-success">Import Data</button></div>
                          <div class="col-2"><button type="button" onclick="location.href='exportCoach.php'" class="btn btn-success">Export Data</button></div>
                        </div>
                        <div class="row mt-2">
                        	<table class="table table-striped">
                            	<thead>
                                	<tr>
                                    	<th>#</th>
                                        <th>Full name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th></th>
                                        <th>Active</th>
                                        <th></th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody class="danhsach"></tbody>
                            </table>
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