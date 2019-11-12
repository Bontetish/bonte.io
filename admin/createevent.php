<?php 
include 'incl/header.php';
include 'incl/connect.php';
?>
<body>
<h1 style="background-color: blue; text-align: center;" class="fixed-top">Administrator Panel</h1><hr>

<div class="container-fluid" style="margin-top: 20px;">
  <div class="row">
    <?php include 'incl/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Attendees</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6" style=" border-radius: 10px; padding: 15px;">
            <form action="createevent.php" method="post">
              
            
            
            <h2 style="text-align: center;">Add a New Event</h2><hr>
            <?php 
            if (isset($_POST['add'])) {
              $ename = $_POST['ename'];
              $edate = $_POST['edate'];
              $mc = $_POST['mc'];
              $venue = $_POST['venue'];
              $capacity = $_POST['capacity'];
              $vip = $_POST['vip'];
              $regular = $_POST['regular'];
              if ($ename ==="" OR $edate ===""OR $mc ==="" OR $venue ==="" OR $capacity ==="" OR $vip ==="" OR $regular ==="" ) {
                ?>
                <div style="background-color: red; padding: 10px; border-radius: 10px;">
                  <p>Please enter data each of the fields!</p>
                </div>
                <?php
              }else{
                $ins = $conn->query("INSERT into events(e_id,e_name,e_date,e_mc,e_venue,capacity,vip,regular) VALUES(NULL, '$ename','$edate','$mc','$venue','$capacity','$vip','$regular' )");
                    if ($ins) {?>
                      <script type="text/javascript">
                        alert('You Added an Event Successfully!');
                        document.location.replace('events.php');
                      </script>
                      
                      <?php

                    }
              }
              
            }


             ?>
            <label>Event Name:</label>
            <input type="text" name="ename" placeholder="Enter Event Name" class="form-control"><br>
            <label>Event Date:</label>
            <input type="date" name="edate" placeholder="Enter Event Date" class="form-control"><br>
            <label>Event MC:</label>
            <input type="text" name="mc" placeholder="Enter Event MC" class="form-control"><br>
            <label>Event Venue:</label>
            <input type="text" name="venue" placeholder="Enter Venue" class="form-control"><br>
            <label>Venue Capacity:</label>
            <input type="number" name="capacity" placeholder="Enter Capacity" class="form-control"><br>
            <label>Price for VIPs:</label>
            <input type="number" name="vip" placeholder="Enter Price Per VIP" class="form-control"><br>
            <label>Price Per Regular:</label>
            <input type="number" name="regular" placeholder="Enter Price per Regular" class="form-control"><br>
            <input type="submit" name="add" class="btn btn-success" value="Add event">
            </form>

          </div>

          <div class="col-md-3">
            
          </div>
        </div>
      </div>


      
    </main>
  </div>
</div>
<?php
include 'incl/footer.php';

 ?>