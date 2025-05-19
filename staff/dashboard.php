<?php
session_start();
if (isset($_SESSION["loggedin"]) && isset($_SESSION["staff"])) {

} else {
    echo "<script>
alert('Please Login First!! ');
window.location.href = '/hostel/';
</script>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    :root {
      --glass-bg: rgba(255, 255, 255, 0.05);
      --glass-border: rgba(255, 255, 255, 0.1);
      --text-color: #ffffff;
      --card-bg: rgba(255, 255, 255, 0.03);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
      color: var(--text-color);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .navbar {
      background: var(--glass-bg);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--glass-border);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar .user {
      font-size: 1.2rem;
    }

    .logout-btn {
      background: transparent;
      color: var(--text-color);
      border: 1px solid var(--glass-border);
      padding: 0.5rem 1rem;
      min-height: 17rem;
      border-radius: 8px;
      cursor: pointer;
      backdrop-filter: blur(5px);
    }

    .container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      padding: 2rem;
      flex-grow: 1;
    }

    .card {
      background: var(--card-bg);
      backdrop-filter: blur(10px);
      border: 1px solid var(--glass-border);
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
      text-align: center;
      transition: transform 0.2s ease-in-out;
      max-height: 17rem;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 1rem;
    }

    .card a {
      text-decoration: none;
      color: var(--text-color);
      font-size: 1.2rem;
      font-weight: bold;
      display: block;
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="user">Welcome, <?= $_SESSION["name"]?></div>
    <a href="/hostel/backend/logout.php" class="btn btn-danger">Logout</a>
  </nav>

  <div class="container">
    <div class="card">
      <img src="https://placehold.co/300x150" alt="Outpass Details">
      <a href="/hostel/staff/outpass.php">Outpass Details</a>
    </div>
    <div class="card">
      <img src="https://placehold.co/300x150" alt="Create Student">
      <a href="/hostel/staff/signUp.php">Create Student</a>
    </div>
    <div class="card">
      <img src="https://placehold.co/300x150" alt="Edit Student">
      <a href="/hostel/staff/studentdetail.php">Edit Student</a>
    </div>
    <div class="card">
      <img src="https://placehold.co/300x150" alt="View Student Details">
      <a href="/hostel/staff/studentdetail.php">View Student Details</a>
    </div>
  </div>

  <script>
    document.querySelector('.logout-btn').addEventListener('click', () => {
      alert('Logged out successfully');
      // Implement actual logout logic here
    });
  </script>
</body>
</html>
