<?php
session_start();
include "../backend/connection.php";

if(!isset($_SESSION["loggedin"])) {
  echo "<script>alert('Login first'); window.location.href='/hostel/';</script>";
  exit;
}

$email = $_SESSION["email"]; // Student's current email

if(isset($_POST["submit"])) {
  $current = $_POST["current_password"];
  $new = $_POST["new_password"];
  $confirm = $_POST["confirm_password"];

  // Fetch current password from DB
  $sql = "SELECT password FROM 'security' WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if(!$row) {
    echo "<script>alert('User not found!');</script>";
  } elseif($row["password"] !== $current) {
    echo "<script>alert('Current password is incorrect!');</script>";
  } elseif($new !== $confirm) {
    echo "<script>alert('New passwords do not match!');</script>";
  } else {
    // Update password
    $update = "UPDATE staff SET password='$new' WHERE email='$email'";
    if(mysqli_query($conn, $update)) {
      echo "<script>alert('Password changed successfully!'); window.location.href='welcome.php';</script>";
    } else {
      echo "<script>alert('Error updating password!');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="../style/parentDashboard.css">


</head>
<body class="" style="height:100vh;">
    <nav class="navbar bg-body-tertiary" style="position: absolute; top: 0; width: 100%;">
  <div class="container-fluid">
    <a class="navbar-brand">Settings</a>
    <form class="d-flex" role="search">  
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    <a class="btn btn-outline-primary mx-2" href="../security/securityDashboard.php">Back</a>
    </form>
  </div>
</nav>
<div class="d-flex justify-content-center align-items-center" style="height:100%">
  <div class="card p-4" style="width: 400px;">
    <h3 class="mb-4 text-center">Change Password</h3>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Current Password</label>
        <input type="password" name="current_password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Confirm New Password</label>
        <input type="password" name="confirm_password" class="form-control" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary w-100">Update Password</button>
    </form>
  </div>
  </div>
</body>
</html>
