<?php 
error_reporting(0);
include 'incl/header.php';
$evsql = $conn->query("SELECT * FROM events");
if (isset($_GET['event'])) {
  $event = $_GET['event'];
  $eventsql = $conn->query("SELECT * FROM events where e_name='$event'");
  $eventres = mysqli_fetch_assoc($eventsql);
  $eid = $eventres['e_id'];
  $tisql = $conn->query("SELECT * from ticket where eventid = '$eid' ");
}

?>
<body>
<h1 style="background-color: blue; text-align: center;" class="fixed-top">Administrator Panel</h1><hr>

<div class="container-fluid" style="margin-top: 20px;">
  <div class="row">
    <?php include 'incl/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 bg-light" style="text-align: center; padding: 5px; border-radius: 10px;">Tickets Awarded for '<?= isset($_GET['event'])?strtoupper($event) :'' ?>' Event</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="dropdown">
            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Event
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php while($evres = mysqli_fetch_assoc($evsql)): ?>
              <a class="dropdown-item" href="attendees.php?event=<?=$evres['e_name'] ?>"><?=$evres['e_name'] ?></a>
            <?php endwhile ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php if(!isset($_GET['event'])): ?>
            <h5 class="bg-danger text-dark" style="padding: 5px; text-align: center;border-radius: 10px;">please select an event to view the reserved tickets for that particular event!</h5>
            <?php endif ?>
            <?php if(isset($_GET['event'])): ?>
            <table class="table table-bordered">
              
            <thead>

              <tr class="bg-success">
                <th scope="col">Ticket ID</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Class</th>
                <th scope="col">Cost</th>
                <th scope="col">Time booked</th>
              </tr>
            </thead>
            <tbody>
              <?php while($tires=mysqli_fetch_assoc($tisql)): ?>
              <tr>
                <th scope="row"><?=$tires['id'] ?></th>
                <td><?=$tires['uid'] ?></td>
                <td><?=$tires['class'] ?></td>
                <td>
                  

                </td>
                <td><?=$tires['tim'] ?></td>
              </tr>
                <?php endwhile ?>
            </tbody>
          </table>
        <?php endif ?>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php
include 'incl/footer.php';

 ?>