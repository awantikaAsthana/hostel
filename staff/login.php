
<?php
include("../backend/connection.php");

if (isset($_POST['submit'])) {
   global $email;
    global $password;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from staff where email='$email' and password='$password'";
    $result = mysqli_query($conn, $sql);


    if (!$result) {
        die("query failed " . mysqli_error($conn));
    }
   
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["email"] = $row["email"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["contact"] = $row["contact"];
        $_SESSION["position"] = $row["position"];
        $_SESSION["loggedin"] = true;
        $_SESSION["staff"]= true; 
        header("Location: /hostel/staff/dashboard.php");

    }
    else{
        
        echo  "
        <script>
        alert('wrong ID or password! try again.');
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
  <title>Staff Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/cottoncandy.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/login.css">
</head>
<body>
  <!-- Floating shapes -->
  <div class="shape small" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
  <div class="shape medium" style="top: 60%; left: 80%; animation-delay: 2s;"></div>
  <div class="shape large" style="top: 30%; left: 50%; animation-delay: 4s;"></div>

  <div class="login-card">
    <h3>Staff Login</h3>
    <form method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
      </div>
      <button type="submit" name="submit" class="btn-login ">Login</button>

      <div class="social-links">
        <a href="/hostel/parents/login.php"><i class="fas fa-hands-holding-child"></i> Parents</a>
        <a href="/hostel/student/login.php"><i class="fas fa-user-graduate"></i> Student</a>
        <a href="/hostel/security/login.php"><i class="fas fa-shield-alt"></i> Security</a>
      </div>
    </form>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>





