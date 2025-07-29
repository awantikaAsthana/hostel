<?php
include("../backend/connection.php");

if(isset($_POST['parent_submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM parents WHERE email ='$email' AND password = '$password'";
    $result= mysqli_query($conn,$sql);
    if(!$result){
        die("Query failed " . mysqli_error($conn));
    }
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["parent_email"] = $row["email"];
        $_SESSION["student_email"] = $row["student_email"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["id"] = $row["id"];
        $_SESSION["loggedin"] = true;
         $_SESSION["parent"] = true;
        header("location: /hostel/parents/welcome.php");
    } else {
        echo"<script>alert('Login failed! Try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ffb6f0, #cdb4ff, #a0e7ff);
      background-size: 300% 300%;
      animation: candyflow 10s ease infinite;
      color: #2c2c2c;
      overflow: hidden;
      position: relative;
      height: 100vh;
    }
    @keyframes candyflow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .shape {
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.25);
      animation: float 6s ease-in-out infinite;
      z-index: 0;
    }
    .shape.small { width: 80px; height: 80px; background: rgba(255,182,240,0.3);} 
    .shape.medium { width: 150px; height: 150px; background: rgba(160,231,255,0.3);} 
    .shape.large { width: 250px; height: 250px; background: rgba(205,180,255,0.3);} 
    @keyframes float {
      0% { transform: translateY(0) rotate(0); }
      50% { transform: translateY(-20px) rotate(180deg); }
      100% { transform: translateY(0) rotate(360deg); }
    }
    .login-card {
      position: relative;
      z-index: 2;
      max-width: 420px;
      margin: 8% auto;
      background: rgba(255,255,255,0.85);
      backdrop-filter: blur(15px);
      padding: 40px;
      border-radius: 25px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      color: #333;
    }
    .login-card h3 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
      color: #4a2f52;
      text-shadow: 0 2px 6px rgba(255,255,255,0.6);
    }
    .form-label {
      color: #4a2f52;
      font-weight: 600;
    }
    .form-control {
      background: rgba(255,255,255,0.9);
      border: 1px solid #e4d7f7;
      border-radius: 15px;
      color: #333;
    }
    .form-control::placeholder {
      color: #8c7a99;
    }
    .btn-login {
      width: 100%;
      padding: 12px;
      border-radius: 30px;
      font-size: 1rem;
      font-weight: 600;
      background: linear-gradient(45deg, #ffb6f0, #cdb4ff, #a0e7ff);
      color: #4a2f52;
      border: none;
      transition: 0.3s;
    }
    .btn-login:hover {
      background: linear-gradient(45deg, #a0e7ff, #ffb6f0);
      color: #fff;
    }
    .social-links {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
    }
    .social-links a {
      flex: 1;
      text-align: center;
      margin: 5px;
      padding: 10px;
      background: rgba(255,255,255,0.85);
      border-radius: 15px;
      color: #4a2f52;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }
    .social-links a:hover {
      background: rgba(255,255,255,1);
      color: #000;
    }
  </style>
</head>
<body>
  <!-- Floating shapes -->
  <div class="shape small" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
  <div class="shape medium" style="top: 60%; left: 80%; animation-delay: 2s;"></div>
  <div class="shape large" style="top: 30%; left: 50%; animation-delay: 4s;"></div>

  <div class="login-card">
    <h3>Parent Login</h3>
    <form method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
      </div>
      <button type="submit" name="parent_submit" class="btn-login">Login</button>

      <div class="social-links">
        <a href="/hostel/staff/staffLogin.php"><i class="fas fa-school"></i> Staff</a>
        <a href="/hostel/student/login.php"><i class="fas fa-user-graduate"></i> Student</a>
        <a href="/hostel/security/securitylogin.php"><i class="fas fa-shield-alt"></i> Security</a>
      </div>
    </form>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
