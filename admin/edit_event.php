<?php 
error_reporting(0);
include 'incl/header.php';

//edit
if (isset($_GET['edit'])) {
  $edit = $_GET['edit'];
  $edsql = $conn->query("SELECT * FROM events where e_id='$edit'");

  echo $edit;
}
//update
if (isset($_POST['update'])) {
  $eid =$_POST['eid'];
  $ename =$_POST['ename'];
  $edate =$_POST['edate'];
  $mc =$_POST['mc'];
  $evenue =$_POST['evenue'];
  $capacity=$_POST['capacity'];
  $vip =$_POST['vip'];
  $regulars =$_POST['regular'];
  $usql = $conn->query("UPDATE events SET e_name = '$ename', e_date ='$edate', e_mc='$mc', e_venue ='$evenue', capacity = '$capacity', vip = '$vip', regular = '$regulars' WHERE e_id = $eid");
  if ($usql) {?>
    <script type="text/javascript">
      alert('The event was successfully updated!')
      document.location.replace('events.php');
    </script>
    <?php
    
  }

}
?>
<body>
<h1 style="background-color: blue; text-align: center;" class="fixed-top">Administrator Panel</h1><hr>

<div class="container-fluid" style="margin-top: 20px;">
  <div class="row">
    <?php include 'incl/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Event Number <?=$edit ?></h1>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6">
            
            <h2>Edit event</h2>
            <?php 
             ?>
            <?php while($eres=mysqli_fetch_assoc($edsql)): ?>
            <form action="edit_event.php" method="post">
              <label>Edit Event:</label>
              <input type="text" name="ename" class="form-control" value="<?=$eres['e_name'] ?>">
              <label>Edit Date:</label>
              <input type="date" name="edate" class="form-control" value="<?=$eres['e_date'] ?>">
              <label>Edit MC:</label>
              <input type="text" name="mc" class="form-control" value="<?=$eres['e_mc'] ?>">
              <label>Edit Venue:</label>
              <input type="text" name="evenue" class="form-control" value="<?=$eres['e_venue'] ?>">
              <label>Edit Capacity</label>
              <input type="text" name="capacity" class="form-control" value="<?=$eres['capacity'] ?>">
              <label>Edit VIP fee:</label>
              <input type="number" name="vip" class="form-control" value="<?=$eres['vip'] ?>">
              <label>Edit Regulars' Fee:</label>
              <input type="number" name="regular" class="form-control" value="<?=$eres['regular'] ?>"> <br>
              <input type="hidden" name="eid" value="<?=$eres['e_id'] ?>">
              <input type="submit" name="update" value="Update Changes" class="btn btn-success">
            </form>
          <?php endwhile ?>
                       
          </div>
          <div class="col-md-3">
            
          </div>
          
        </div><br><br>
        
      </div>

      
    </main>
  </div>
</div>
<?php
include 'incl/footer.php';

 ?>