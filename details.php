
<?php 
include 'incl/header.php';
include 'incl/nav.php';
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	

}
if (isset($_GET['id'])) {
	$tid=$_GET['id'];
	$tsql=$conn->query("SELECT * FROM ticket where id = '$tid'");
	$tres = mysqli_fetch_assoc($tsql);
	//tcket table
	$t_id=$tres['id'];
	$u_id=$tres['uid'];
	$e_id=$tres['eventid'];
	$claz=$tres['class'];
	//event table
	$esql = $conn->query("SELECT * FROM events where e_id = '$e_id'");
	$eres = mysqli_fetch_assoc($esql);
	$e_name =$eres['e_name'];
	$e_date =$eres['e_date'];
	$e_ide_venue =$eres['e_ide_venue'];
	$e_venue =$eres['e_venue'];
	$vip =$eres['vip'];
	$regular =$eres['regular'];

	//user data
	$usql = $conn->query("SELECT * from user where nid = '$user'");
	$ures = mysqli_fetch_assoc($usql);
	$fname= $ures['fname'];
	$nid= $ures['nid'];
	$phone= $ures['phone'];
	$email= $ures['email'];
	




}


?>
<body>

<div class="container-fluid" style="margin-top: 20px;">
  <div class="row">
    <?php include 'incl/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ticket Number: CH<?=$tid ?> Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
	      <li class="nav-item dropdown no-arrow mx-1">
	        <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Account
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
	          <a class="dropdown-item" href="ticket.php">My Tickets</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">My Details</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="login.php">Logout</a>
	        </div>
	      </li>
          
        </div>
      </div>
       <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-1">
	 			
	 		</div>
	 		<div class="col-md-10" style="margin-top: 10px; ">
	 			<div class="card bg-dark text-white">
				  <img src="images/maxresdefault.jpg" class="card-img" alt="...">
				  <div class="card-img-overlay">
				    <h2 class="card-title bg-bright bg-primary" style="text-align: center;padding: 5px; border-radius: 10px"><?=$e_name =$eres['e_name'];  ?></h2>
				    <h5>Ticket Number: CH<?=$tid ?></h5>
				    <h5>Class: <?=strtoupper($claz)  ?></h5>
				    <h5>Name:  <?=$fname ?></h5>
				    <h5>ID Number:<?=$phone ?></h5>
				    <h5>Mobile:<?=$phone ?></h5>
				    <h5>Email:<?=$email ?></h5>
				    <h5>Date: <?=$e_date ?></h5>
				    <h5>Venue: <?=$e_venue ?></h5>
				    <div class="col-md-4 bg-light" style="padding: 10px; border-radius: 10px; color: black">
				    	<h5 class="bg-danger" style="padding: 2px; border-radius: 10px; text-align: center;">Charges</h5>
					    <h6>Regular: <span class="bg-primary" style="padding: 5px; border-radius: 10px;">Ksh<?=$regular ?></span></h6><br>
					    <h6>VIP: <span class="bg-primary" style="padding: 5px; border-radius: 10px;">Ksh<?=$vip ?></span></h6><br>
					    <p class="card-text" >Time Booked: <span class="badge-success" style="padding: 3px; border-radius: 10px;"><?=$tres['tim'] ?></span> </p>
				    </div>
				    <div class="col-md-4">
				    	
				    </div>
				    <div class="col-md-4">
				    	
				    </div>
				    		    
				    
				    
				  </div>
				</div>


	 			
	 		</div>
	 		<div class="col-md-1">
	 			
	 		</div>
	 	</div>
	 </div>

      
    </main>
  </div>
</div>
<?php
include 'incl/footer.php';

 ?>