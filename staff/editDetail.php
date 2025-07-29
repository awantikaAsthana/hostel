<?php
session_start();
include "../backend/connection.php";

if (isset($_SESSION["loggedin"]) && isset($_SESSION["staff"])) {
    $sql = "select * from student;";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>
    alert('No Students found');
    </script>";
    }
} else {
    echo "<script>
alert('Login First');
window.location.href = '/hostel/';
</script>";

}

    $email = $_GET['email'];
    $sql = "select * from student where email='$email' ";
    $result = mysqli_query($conn, $sql);
  
    if (!$result) {
      echo"<script>
      alert('data cannot be fetched!')
      window.location.href='/hostel/studentdetail.php';
      </script>";
    }
    if (mysqli_num_rows($result)) {   
      $row = mysqli_fetch_assoc($result);
      
    }
    else{

      echo"<script>
      alert('data cannot be xxxx fetched!')
      window.location.href='/hostel/studentdetail.php';
      </script>";
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
    

</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Edit Student</a>
    <div class="d-flex" >  
    <a class="btn btn-outline-primary mx-2" href="./dashboard.php">Back</a>
    <a class="btn btn-danger" href="./backend/logout.php">Logout</a>
    </div>
  </div>
</nav>
  <div class="container col-5 m-auto">

    <h1 class="display-4 text-center">Hostel Management System</h1>
    <h3 class="text-center ">Please enter student details</h3>
    <br>
    <form action="/hostel/backend/edit_backend.php" method="POST">
      <div class="mb-3">
    
      <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=$row['email']?>" readonly>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?=$row['name']?>">
        </div>

      <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" value="<?=$row['dob']?>">
      </div>

      <div class="mb-3">
        <label for="contact" class="form-label">Phone no.</label>
        <input type="tel" class="form-control" id="contact" name="contact" value="<?=$row['contact']?>">
      </div>

      <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="<?=$row['year']?>" max=4 min=1>
      </div>

      <!-- 

  <div class="mb-3">
    <label for="isStaff" class="form-label">Are you a Staff Member?</label>
    <input type="checkbox" class="" id="isStaff" name="isStaff">
  
  </div> -->

      <button type="submit" class="btn btn-primary " name="submit">Edit Student</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>


