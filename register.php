<?php include 'incl/header.php'; ?>
<?php include 'incl/nav.php'; ?>
<?php 

    if (isset($_POST['reg'])) {
        $fname=$_POST['fname'];
        $phone=$_POST['phone'];
        $id=$_POST['id'];
        $email=$_POST['email'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $sesql= $conn->query("SELECT * from user where nid = '$id'");
        $seres= mysqli_num_rows($sesql);
        if ($fname==='' OR $phone==='' OR  $id==='' OR  $email==='' OR $pass1==='' OR $pass2==='') {?>
            <script type="text/javascript">
                alert('Please enter all key fields!');
                document.location.replace('register.php');
            </script>

            <?php

            
        }elseif ($seres>0) {?>
                <script type="text/javascript">
                    alert('The ID already exists!');
                    document.location.replace('register.php');
                </script>
                
                <?php
            }elseif ($pass1!==$pass2) {?>
                <script type="text/javascript">
                    alert('The two passwords did not match!');
                    document.location.replace('register.php');
                </script>
                
                <?php
            }/*elseif (strlen($pass1)<6) {?>
                <script type="text/javascript">
                    alert('Password should be 6 or more characters long!');
                    document.location.replace('register.php');
                </script>
                
                <?php
            }elseif (strlen($id !=8)) {?>
                <script type="text/javascript">
                    alert('The ID you entered is invalid!');
                    document.location.replace('register.php');
                </script>
                
                <?php
            }*/else{
            $reg = $conn->query("INSERT into user(uid,fname,phone,nid,email,pass1,pass2) values(NULL, '$fname', '$phone', '$id','$email', '$pass1', '$pass2')");
            if ($reg) {?>
                <script type="text/javascript">
                    alert('Your registration was successful!');
                    document.location.replace('register.php');
                </script>
                
                <?php
            }else{
                echo "Bado kaka!";
            }
        }
    }


 ?>
 <body style="background-color:">
<div class="container register-form" style="margin-top: 100px;">
            <div class="form bg-light" style="border-radius: 5px;">
                <div class="note">
                    <h2>REGISTER</h2>
                </div>

                <div class="form-content">
                    <form action="register.php" method="post">
                        <div class="row" style="padding: 50px; ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" placeholder="Your Name *" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number *" value=""/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" placeholder="National ID *" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="email *" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass1" class="form-control" placeholder="Your Password *"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass2" class="form-control" placeholder="Confirm Password *"/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="reg" class="btnSubmit">Register</button>
                    <p style="margin-left: 400px">Registered? <a href="login.php">Login</a></p>
                </div>

                    </form>

                    
            </div>
        </div>
        <br><br><br><br>
        <?php include 'incl/footer.php'; ?>