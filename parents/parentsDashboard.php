<?php
session_start();
include "../backend/connection.php";

if (!isset($_SESSION["loggedin"])) {
    echo "<script>alert('Login First'); window.location.href='/hostel/';</script>";
    exit;
}

$email = $_SESSION["student_email"];

$sql_pending = "SELECT * FROM outpass WHERE email='$email' AND approval IS NULL ORDER BY created_on DESC";
$sql_approved = "SELECT * FROM outpass WHERE email='$email' AND approval=1 ORDER BY created_on DESC";
$sql_rejected = "SELECT * FROM outpass WHERE email='$email' AND approval=0 ORDER BY created_on DESC";

$pending = mysqli_query($conn, $sql_pending);
$approved = mysqli_query($conn, $sql_approved);
$rejected = mysqli_query($conn, $sql_rejected);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Outpass Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/parentDashboard.css">
</head>
<body>
  <!-- Floating Shapes -->
  <div class="shape small" style="top: 10%; left: 5%; animation-delay: 0s;"></div>
  <div class="shape medium" style="top: 50%; left: 80%; animation-delay: 2s;"></div>
  <div class="shape large" style="top: 75%; left: 20%; animation-delay: 4s;"></div>
  <div class="shape small" style="top: 30%; left: 60%; animation-delay: 1s;"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="#"> Outpass Requests</a>
      <div class="d-flex">
        <a class="btn btn-light mx-2" href="../parents/welcome.php">Back</a>
      </div>
    </div>
  </nav>

  <div class="container my-5">

    <!-- Filter Buttons -->
    <div class="text-center mb-4">
      <button class="btn btn-primary mx-2" onclick="showSection('pending-section')">Pending</button>
      <button class="btn btn-primary mx-2" onclick="showSection('approved-section')">Approved</button>
      <button class="btn btn-primary mx-2" onclick="showSection('rejected-section')">Rejected</button>
    </div>

    <!-- Pending Section -->
    <div id="pending-section" class="outpass-section">
      <h2 class="mb-4">⏳ Pending Outpasses</h2>
      <div class="row g-4 justify-content-center">
        <?php if(mysqli_num_rows($pending) > 0): foreach ($pending as $row): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card p-4">
              <h5 class="card-title">Outpass #<?= $row["outpassId"] ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Duration: <?= $row["from_date"];?> → <?= $row["to_date"];?> </h6>
              <p class="card-text"><strong>Reason:</strong> <?= $row["reason"] ?></p>
              <p class="card-text"><small>Created on <?= $row["created_on"] ?></small></p>
              <?php $_id = $row['outpassId']; $_link = "http://localhost/hostel/student/parentConfirmation.php?id=$_id"; ?>
              <a class='btn btn-primary btn-sm' href='<?= $_link ?>'>Parent Approval Pending</a>
            </div>
          </div>
        <?php endforeach; else: ?>
          <p class="text-muted">No pending requests.</p>
        <?php endif; ?>
      </div>
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
