<!-- PHP Logic for login a student -->
<?php
include("../backend/connection.php");

if (isset($_POST['submit'])) {
    
     $email = $_POST['email'];
$password = $_POST['password'];

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id, password , name, contact, year,enrollment FROM student WHERE email = ?");
if ($stmt === false) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {

    $stmt->bind_result($user_id, $hashed_password, $name, $contact, $year, $enrollment);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        // session created and adding login details to session
        session_start();
        $_SESSION["user_id"] = $user_id;
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;  
        $_SESSION["contact"] = $contact;
        $_SESSION["year"] = $year;
        $_SESSION["enrollment"] = $enrollment;
        $_SESSION["loggedin"] = true;
        header("Location: /hostel/student/welcome.php");
        exit();
    } else {
         echo  "
        <script>
        alert('Wrong Password! Try again.');
        window.location.href='/hostel/student/login.php';
        </script>
        ";
    }
} else {
     echo  "
        <script>
        alert('wrong ID!! Try again.');
        window.location.href='/hostel/student/login.php';
        </script>
        ";
}


$stmt->close();
$conn->close();

}

?> 

<!-- html code -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
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
    <h3>Student Login</h3>
    <form method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
      </div>
      <button type="submit" name="submit" class="btn-login">Login</button>

      <div class="social-links">
        <a href="/hostel/parents/login.php"><i class="fas fa-hands-holding-child"></i> Parents</a>
        <a href="/hostel/staff/login.php"><i class="fas fa-school"></i> Staff</a>
        <a href="/hostel/security/login.php"><i class="fas fa-shield-alt"></i> Security</a>
      </div>
    </form>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
