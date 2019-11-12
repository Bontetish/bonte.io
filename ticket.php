
<?php 
include 'incl/header.php';
include 'incl/nav.php';
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$name = $conn->query("SELECT * from user Where uid ='$user'");
	$namres= mysqli_fetch_assoc($name);

}
$selsql = $conn->query("SELECT * from ticket Where uid ='$user'");


?>
<body>

<div class="container-fluid" style="margin-top: 20px;">
  <div class="row">
    <?php include 'incl/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Your Tickets</h1>
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
	 		<div class="col-md-10 bg-light" style="margin-top: 10px;">
	 			<table class="table table-bordered">
	 				<?php 


	 				 ?>
				  <thead>
				    <tr>
				      <th scope="col">Ticket Number</th>
				      <th scope="col">Event Name</th>
				      <th scope="col">Class</th>
				      <th scope="col">Event Date</th>
				      <th scope="col">Venue</th>
				      <th>Time booked</th>
				      <th>Details</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php while($sesre = mysqli_fetch_assoc($selsql)): ?>
				    <tr>
				      <th scope="row"><?= $sesre['id'] ?></th>
				      <td>
				      	<?php 
				      	$eid = $sesre['eventid'];
				      	$sel = $conn->query("SELECT * from events Where e_id ='$eid'");
				      	$res = mysqli_fetch_assoc($sel);
				      	$ename =$res['e_name'];
				      	echo $ename;

				      	 ?>
				      </td>
				      <td>
				      	<?=strtoupper($sesre['class'])  ?>
				      </td>
				      <td><?=$res['e_date']; ?></td>
				      <td>
				      	<?=$res['e_venue']; ?>
				    
				      </td>
				      <td><span class="badge badge-secondary"><?= $sesre['tim'] ?></span></td>
				      <td><a class="btn btn-outline-primary" href="details.php?id=<?=$sesre['id'] ?>">Details</a></td>
				    </tr>
				<?php endwhile; ?>
				  </tbody>
				</table>

	 			
	 			
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