<?php 
session_start();
include 'incl/header.php';
include 'incl/nav.php';
if (isset($_POST['login'])) {
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$_SESSION['user']=$id;
	$user = $_SESSION['user'];
	$sql = $conn->query("SELECT * from user WHERE nid='$user'");
	$sqlres = mysqli_fetch_assoc($sql);
	$nid = $sqlres['nid'];
	$fname = $sqlres['fname'];
	$pass1 = $sqlres['pass1'];
	$rows = mysqli_num_rows($sql);
	print_r($rows);
	if ($rows<1) {?>
		<script type="text/javascript">
			alert('The ID is not registered, please register!');
			document.location.replace('register.php');
		</script>
		<?php
		
	}elseif ($pass!==$pass1) {?>
		<script type="text/javascript">
			alert('Wrong Password!');
			document.location.replace('login.php');
		</script>
		<?php
		
	}elseif ($pass===$pass1) {?>
		<script type="text/javascript">
			alert('Welcome Back <?=$fname ?>!');
			document.location.replace('Homepage.php');
		</script>
		<?php
		
	}

}
				      	 
?>
<body>

<div class="container-fluid" style="">
  <div class="row">
  	<?php include 'incl/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="background-image: url(incl/maxresdefault (2).jpg);">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Events Available</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        	<li class="nav-item dropdown no-arrow mx-1">
	        <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Account
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
	          <a class="dropdown-item" href="ticket.php">My Tickets</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">ID=<?=$nid ?></a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="login.php">Logout</a>
	        </div>
	      </li>
        </div>
      </div>
      <?php 
	      $event = $conn->query("SElECT * FROM events ");

	      


	       ?>
	       <div class="container-fluid">
	       	<div class="row">
	       		<?php while ($result=mysqli_fetch_assoc($event)): ?>
	       		<div class="col-md-4" style="margin-bottom: 10px;">
	       			
			       <div class="card" style="padding: 10px; background-color: #EBF5FB">
					  <h5 class="card-header bg-primary" style="color: white;"><td><?=$result['e_name'] ?></td></h5>
					  <div class="card-body" style="border: outset;">
					    <h5 class="card-title">Day: <td><?=$result['e_date'] ?></td></h5>
					    <p class="card-text"><td>Venue: <?=$result['e_venue'] ?></td></p>
					    <u><h5>Entry Fees Charged</h5></u>
					    <p>VIP:<span class="badge badge-pill badge-primary">Ksh<?=$result['vip'] ?></span></p>
					    <p>Regular:<span class="badge badge-pill badge-primary">Ksh<?=$result['regular'] ?></span></p>

					    <a href="reserve.php?id=<?=$result['e_id'] ?>" class="btn btn-success form-control">View details</a>
					  </div>
					</div>
				
	       		</div>
	       	<?php endwhile ?>
	       	</div>
	       	
	       </div>
	       
	      

      
    </main>
  </div>
</div>
<?php
include 'incl/footer.php';

 ?>