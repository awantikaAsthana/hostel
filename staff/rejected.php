<?php
session_start();
include "../backend/connection.php";

if (isset($_SESSION["loggedin"])) {
    $email = $_SESSION["email"];
    $sql = "SELECT * FROM outpass  ORDER BY created_on DESC";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if (!$result) {
        echo "<script>
        alert('data cannot be fetched!')
        window.location.href='/hostel/studentdetail.php';
        </script>";
    }
} else {
    echo "<script>
alert('Login First');
window.location.href = '/hostel/';
</script>";

}
 $email = $_SESSION["email"];



$sql_rejected = "SELECT * FROM outpass WHERE email='$email' AND f_approval=0 ORDER BY created_on DESC";


$rejected = mysqli_query($conn, $sql_rejected);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Warden Outpass Management Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="new.css">

</head>
<body>
  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
   <nav class="col-md-2 sidebar shadow">
        <div class="text-center mb-4">
          <!-- <img src="https://via.placeholder.com/80" class="rounded-circle mb-2 border border-light" alt="Warden"> -->
          <h5>Warden Panel</h5>
          <small>Welcome<?php echo " ";echo $_SESSION['name'];?></small>
        </div>
        <a href="../staff/dashboard.php"> Dashboard</a>
        <!-- new pages -->
        <a href="../staff/pending.php"  > Pending Requests</a>
        <a href="../staff/approved.php"> Approved Requests</a>
        <a href="../staff/rejected.php" class="active"> Rejected Requests</a>
        <a href="../staff/studentdetail.php"> Edit Details</a>
          <a href="../staff/signUp.php"> Create Student</a>
          <a href="../staff/changepassword.php"> Settings</a>
        <!-- <a href="#"> Notifications</a>
        <a href="#"> Settings</a> -->
        <a href="../backend/logout.php"> Logout</a>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 content">
        <h2 class="mb-4 text-primary">Warden Outpass Dashboard</h2>



    <!-- Rejected Section -->
    <div id="rejected-section" class="outpass-section ">
      <h2 class="mt-5 mb-4">❌ Rejected Outpasses</h2>
      <div class="row g-4 justify-content-center">
        <?php if(mysqli_num_rows($rejected) > 0): foreach ($rejected as $row): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card p-4">
              <h5 class="card-title">Outpass #<?= $row["outpassId"] ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Duration: <?= $row["from_date"];?> → <?= $row["to_date"];?> </h6>
              <p class="card-text"><strong>Reason:</strong> <?= $row["reason"] ?></p>
              <p class="card-text"><small>Created on <?= $row["created_on"] ?></small></p>
              <span class='denied'>Denied ❌</span>
            </div>
          </div>
        <?php endforeach; else: ?>
          <p class="text-muted">No rejected requests.</p>
        <?php endif; ?>
      </div>
    </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
