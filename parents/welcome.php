<?php
include("../backend/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/dashboard.css">
</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand"><?php echo $_SESSION['name'];?></a>
    <form class="d-flex" role="search">  
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    </form>
  </div>
</nav>

    
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card card-body text-center">
    <p class="h5">OutPass Dashboard</p>
    <a href="parentsDashboard.php" class="btn btn-primary mt-3">View</a>
  </div>
</div>

        

    </div>

</body>

</html>