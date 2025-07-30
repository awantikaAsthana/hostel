<?php
include("../backend/connection.php");

if (isset($_POST['submit'])) {

  // Fetching Data from Form
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $student_email = mysqli_real_escape_string($conn, $_POST['student_email']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);


  // Email should be Unique
  $check_email = ('select * from parents where email= "$email"');
  $result = mysqli_query($conn, $check_email);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
   if ($password == $cpassword) {
    echo $password;
      $hashed_password = password_hash($password, PASSWORD_DEFAULT); // secure hashing
  $sql = "INSERT INTO parents    (name, email, password,  student_email, contact) 
          VALUES ('$name', '$email', '$hashed_password',  '$student_email', '$contact')";

      $result = mysqli_query($conn, $sql);
      echo "
    <script>
    alert('user successfully created!');
    window.location.href='/hostel/staff/dashboard.php';
    </script>
    ";
    } else {
      echo "
    <script>
    alert('password does not match!try again.');
    window.location.href='/hostel/staff/createuserparent.php';
    </script>
    ";
    }
  } else {
    echo "
  <script>
  alert('Email already exists! try again.');
 window.location.href='/hostel/staff/createuserparent.php';
  </script>
  ";
  }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel ERP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="../style/parentDashboard.css">

</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Add parent</a>
    <div class="d-flex" >  
    <a class="btn btn-outline-primary mx-2" href="./dashboard.php">Back</a>
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    </div>
  </div>
</nav>
  <div class="container col-5 m-auto">

    <h1 class="display-4 text-center">Hostel Management System</h1>
    <h3 class="text-center ">Please enter Parent details</h3>
    <br>
    <form action="#" method="post">
      <div class="mb-3">

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">

        </div>

        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword">
      </div>

      <div class="mb-3">
        <label for="contact" class="form-label">Phone no.</label>
        <input type="tel" class="form-control" id="contact" name="contact">
      </div>

      <div class="mb-3">
        <label for="student_email" class="form-label">Student Email</label>
        <input type="text" class="form-control" id="student_email" name="student_email">
      </div>


      <button type="submit" class="btn btn-primary " name="submit">Add Parent Member</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>