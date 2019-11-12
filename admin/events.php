<?php 
error_reporting(0);
include 'incl/connect.php';
include 'incl/header.php';
//delete
if (isset($_GET['remove'])) {
  $did = $_GET['remove'];
  $dsql = $conn->query("UPDATE events set del='1' where e_id = '$did'");
  //$dsql =$conn->query("DELETE FROM events where e_id = '$did'");
  if ($dsql) {
    ?>
    <script type="text/javascript">
      alert('The event was deleted successfully');
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
        <h1 class="h2">Events</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="eremoved.php" class="btn btn-sm btn-outline-primary">Removed Events</a>
            <a href="createevent.php" class="btn btn-sm btn-outline-primary">Create Event</a>
          </div>
        </div>
      </div>

      <!--Main content goes here-->
      <?php 
      $event = $conn->query(" SElECT * FROM events where del = '0'"); 


       ?>
      <table class="table table-bordered table-striped">
        <?=$did; ?>
      <thead>
        <tr>
          <th scope="col">Event Id</th>
          <th scope="col">Event Name</th>
          <th scope="col">Date</th>
          <th scope="col">Venue</th>
          <th scope="col">Fee Per VIPs</th>
          <th scope="col">Fee Per Regulars</th>
          <th>Edit|Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($result=mysqli_fetch_assoc($event)): ?>
        <tr>
          <th scope="row"><?=$result['e_id'] ?></th>
          <td><?=$result['e_name'] ?></td>
          <td><?=$result['e_date'] ?></td>
          <td><?=$result['e_venue'] ?></td>
          <td>Ksh<?=$result['vip'] ?></td>
          <td>Ksh<?=$result['regular'] ?></td>
          <td>
            <a class="btn btn-outline-warning" href="edit_event.php?edit=<?=$result['e_id']?>" class="btn btn-primary">Edit</a>
            <a class="btn btn-outline-danger" href="events.php?remove=<?=$result['e_id'] ?>">Remove</a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>

      
    </main>
  </div>
</div>
<?php
include 'incl/footer.php';

 ?>