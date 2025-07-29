<?php
session_start();
include "../backend/connection.php";

if (isset($_SESSION["loggedin"])) {
    $email = $_SESSION["security_email"];
    $sql = "SELECT * FROM outpass o INNER JOIN STUDENT s on o.email = s.email ORDER BY created_on DESC";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if (!$result) {
        echo "<script>
        alert('Data cannot be fetched!');
        window.location.href='/hostel/studentdetail.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
    alert('Login First');
    window.location.href = '/hostel/';
    </script>";
    exit();

}




$sql_approved = "SELECT * FROM outpass o 
                 INNER JOIN student s ON o.email = s.email 
                 WHERE approval=1 
                 ORDER BY created_on DESC";

$sql_rejected = "SELECT * FROM outpass o 
                 INNER JOIN student s ON o.email = s.email 
                 WHERE approval=0 
                 ORDER BY created_on DESC";


$approved = mysqli_query($conn, $sql_approved);
$rejected = mysqli_query($conn, $sql_rejected);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/parentDashboard.css">
</head>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">Outpass Details</a>
        <div class="d-flex">
            <a class="btn btn-outline-primary mx-2" href="/hostel/security/welcome.php">Back</a>
            <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container my-5">

    <!-- Filter Buttons -->
    <div class="text-center mb-4">
      
      <button class="btn btn-primary mx-2" onclick="showSection('approved-section')">Approved</button>
      <button class="btn btn-primary mx-2" onclick="showSection('rejected-section')">Rejected</button>
    </div>

   
    <!-- Approved Section -->
    <div id="approved-section" class="outpass-section d-none">
      <h2 class="mt-5 mb-4">✅ Approved Outpasses</h2>
      <div class="row g-4 justify-content-center">
        <?php if(mysqli_num_rows($approved) > 0): foreach ($approved as $row): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card p-4">
              <h5 class="card-title">Outpass #<?= $row["outpassId"] ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Duration: <?= $row["from_date"];?> → <?= $row["to_date"];?> </h6>
              <p class="card-text"><strong>Reason:</strong> <?= $row["reason"] ?></p>
              <p class="card-text"><small>Created on <?= $row["created_on"] ?></small></p>
              <span class='approved'>Approved ✅</span>
            </div>
          </div>
        <?php endforeach; else: ?>
          <p class="text-muted">No approved requests.</p>
        <?php endif; ?>
      </div>
    </div>

    <!-- Rejected Section -->
    <div id="rejected-section" class="outpass-section d-none">
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

  </div>

  <script>
    function showSection(sectionId) {
      document.querySelectorAll('.outpass-section').forEach(sec => sec.classList.add('d-none'));
      document.getElementById(sectionId).classList.remove('d-none');
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
