			      <?php 
			      include 'incl/header.php';
			      include 'incl/nav.php';

			      if (isset($_POST['login'])) {
			      	$_SESSION['user']=$_POST['id'];
			      }
			      ?>
			      <body style="background-color: ;">
			      <div class="container">
			      	<div class="row">
			      	  <div class="col-md-3">
			      	  	
			      	  </div>
			      	  <div class="col-md-6 bg-bright" style="background-color: white;margin-top: 20px; border-radius: 5px;padding: 50px">
			      	  	<div class="note">
                    <h2>LOGIN</h2>
                </div><br>
				      	
				      	<form action="homepage.php" method="post">
				      			<label>ID Number:</label>
				      			<input type="text" name="id" placeholder="Enter your ID" class="form-control"><br>
				      			<label>Password:</label>
				      			<input type="password" name="pass" placeholder="Enter Password" class="form-control"><br>
				      		<button type="submit" name="login" class="btnSubmit">Login</button>
				      		<p style="margin-left: 200px;">Not Registered?  <a href="register.php">Register</a></p>
				      		
				      		
				      	</form>
				        
				      </div>
			      	  </div>
			      	  <div class="col-md-3">
			      	  	
			      	  </div>
			      	</div>
			      </div><br><br><br><br>
			      
			      <?php include 'incl/footer.php'; ?>