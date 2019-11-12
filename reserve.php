
<?php 
include 'incl/header.php';
include 'incl/nav.php';
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

?>
<body>

<div class="container-fluid" style="margin-top: 20px;">
  <div class="row">
    <?php include 'incl/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">View Ticket</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        	<?php
        	if ($user!=='') {?>
        	 	<a class="btn btn-primary" href="login.php">Logout</a>
        	 	<?php
        	 } 

        	 ?>
          
        </div>
      </div>
       <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-1">
	 			
	 		</div>
	 		<div class="col-md-10" style="margin-top: 10px;">
	 			<?php 
	 			if (isset($_GET['id'])) {
	 				$eid=$_GET['id'];
	 				$esql = $conn->query("SELECT * from events where e_id = '$eid' ");
	 				$es = $conn->query("SELECT * from user where nid = '$user' ");
	 				$resu = mysqli_fetch_assoc($es);
	 				$uname=$resu['fname'];
	 				$mail = $resu['email'];
	 			}
	 			if (isset($_POST['book'])) {
	 				$eid = $_POST['eid'];
	 				$uid = $_POST['uid'];
	 				$claz = $_POST['claz'];
	 				$trans =$_POST['trans'];
	 				$amt =$_POST['amt'];
	 				//money
	 				$moneysql = $conn->query("SELECT from cash where amt = '$amt' and code ='$trans' and user = '$uid'");
	 				$moneyres = mysqli_fetch_assoc($moneysql);
	 				$moneyrows= mysqli_num_rows($moneysql);
	 				//
	 				$selsql = $conn->query("SELECT * from ticket Where uid ='$user'");
	 				$selre = mysqli_num_rows($selsql);
	 				
	 				if ($user=='') {
	 					?>
	 					<script type="text/javascript">
	 						alert("lease login!");
	 						document.location.replace('login.php');
	 					</script>
	 				<?php
	 				}if ($user=='') {
	 					?>
	 					<script type="text/javascript">
	 						alert("lease login!");
	 						document.location.replace('login.php');
	 					</script>
	 				<?php
	 				}if ($uid=='' OR $eid=='' OR $claz=='') {
	 					?>
	 					<script type="text/javascript">
	 						alert("Please select a class to reserve the Ticket");
	 						document.location.replace('homepage.php');
	 					</script>
	 				<?php
	 				}if ($selre>=5) {
	 					?>
	 					<script type="text/javascript">
	 						alert("The maximum Tickets Should be 5 in number!");
	 						document.location.replace('homepage.php');
	 					</script>
	 				<?php
	 				}else  {
	 					$insr = $conn->query("INSERT into ticket(id,uid,eventid,class) values(NULL,'$uid', '$eid', '$claz')");
	 					
	 						 				//mail function
	 				




						}$to = $mail; // note the comma

						// Subject
						$subject = 'Churchill booking ticket';

						// Message
						$message = '
						<html>
						<head>
						  <title>Churchil Show Ticket</title>
						</head>
						<body>
						  <p>Dear user, you recently booked a ticket for churchil show event! For more Details please log into your account and view your ticket details under Account tab!</p>
						  <p>Regards!</p>
						  <p>Churchill team!</p>
						</body>
						</html>
						';

						// To send HTML mail, the Content-type header must be set
						$headers[] = 'MIME-Version: 1.0';
						$headers[] = 'Content-type: text/html; charset=iso-8859-1';

						// Additional headers
						$headers[] = $emai;
						$headers[] = 'From: Ticket Details <$mail>';

						// Mail it
						mail($to, $subject, $message, implode("\r\n", $headers));
	 					?>

	 					<script type="text/javascript">
	 						alert("Ticket Booked successfully!");
	 						document.location.replace('homepage.php');
	 					</script>
	 				<?php	

	 				
	 			}

	 			 ?>
	 			 <?php while($res = mysqli_fetch_assoc($esql)): ?>



	 			 	<!-- Card -->
					<div class="card card-image" style="background-image: url('images/maxresdefault (1).jpg');">

					  <!-- Content -->
					  <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
					    <div>
					      <h2 class="bg-warning" style="text-align: center; padding: 3px;border-radius: 10px; color: white">Event:<strong class="d-inline-block mb-2 text-success"><?=strtoupper( $res['e_name'] )?></strong></h2>
			            	<P >Name: <?=$uname?></P>
			            	<P >Amt: <?=$amt?></P>
			            	<P >Transaction code: <?=$trans?></P>
			            	<P>VIP charges: Ksh<?= $res['vip'] ?></P>
			               	<P>Regular charges: Ksh<?= $res['regular'] ?></P>
			               	<div class="mb-1 text-muted small">Event Date: <?= $res['e_date'] ?></div>
			               <p class="card-text mb-auto">Event Venue: <?= $res['e_venue'] ?></p>
			               <form action="reserve.php" method="post">
			               	<input type="hidden" name="eid" value="<?=$res['e_id'] ?> ">
			               	<input type="text" name="amt" class="form-control" placeholder="Enter The Amount Paid"><br>
			               	<input type="text" name="trans" class="form-control" placeholder="Enter Transaction code">
			               	<input type="hidden" name="uid" value="<?=$user ?> "><br>
			               	<select class="form-control" name="claz">
			               		<option value="">---Select Class---</option>
			               		<option value="vip">VIP</option>
			               		<option value="Regular">Regular</option>
			               	</select><br>
			               	<input type="submit" name="book" class="btn btn-success form-control" value="Reserve">

			               	
			               </form>
					    </div>
					  </div>

					</div>
					<!-- Card -->
 			 <?php endwhile ?>
	 			
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