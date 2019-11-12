<?php 
include 'incl/header.php';
$sql = $conn->query("SELECT * FROM events where del = '0'");
$rows = mysqli_num_rows($sql);
 ?>
  <body>
	
	<body style="">
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color fixed-top bg-primary" style="">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="index.php" style="color: white;"><img style="height: 45px;width: 100px; border-radius: 5px;" src="images/hqdefault.jpg" class="img img-thumbnail"><marquee>CHURCHILL SHOW</marquee> </a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">

      <!-- Dropdown -->

    </ul>
    <!-- Links -->

    <a style="margin-left: 10px; color: white" class="nav-link btn btn-outline-success"  href="login.php">Login</a>
    <a style="margin-left: 10px; color: white" class="nav-link btn btn-outline-success"  href="register.php">Sign Up</a>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar--><br>
  <?php
	include 'incl/slide.php';
  ?>
  <h1 style="text-align: center;">EVENTS</h1>
  <?php if(empty($rows)): ?>
    <div class="alert alert-warning" role="alert">
      <p style="text-align: center;">There are no events currently!</p>
    </div>
  <?php endif ?>
  <div class="container">
        <div class="row" >
          <?php while($res=mysqli_fetch_assoc($sql)): ?>
          <div class="col-md-4" style="margin-bottom: 10px;">
            <!-- Card -->
          <!-- Card -->
          <div class="card bg-light">

            <!-- Card image -->
            
            <img class="card-img-top img-thumbnail" src="images/maxresdefault (2).jpg" alt="Card image cap">

            <!-- Card content -->
            <div class="card-body">

              <!-- Title -->
              <h4 class="card-title text-uppercase" style="text-align: center; "><a><?=$res['e_name'] ?></a></h4>
              <!-- Text -->
              <p class="card-text">Date: <?=$res['e_date'] ?></p>
              <p class="card-text">Venue: <?=$res['e_venue'] ?></p>
              <!-- Button -->
              <a href="login.php" class="btn btn-primary form-control">Buy Ticket</a>

            </div>

          </div>
          <!-- Card -->
    <!-- Card -->
      </div>
    <?php endwhile ?>
    </div>
  </div>
  
  <?php
	include 'incl/footer.php';

	 ?>