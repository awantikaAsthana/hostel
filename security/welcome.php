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
    <link rel="stylesheet" href="../style/parentDashboard.css">
</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">WELCOME Security Staff</a>
    <form class="d-flex" role="search">  
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    </form>
  </div>
</nav>

    
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; min-width: 50vw;">
  <div class="d-flex flex-column justify-content-between align-items-center col-3 card card-body">
    <a href="securityDashboard.php" class="btn btn-primary" style="font-size: 50px;">View</a>
  </div>
</div>


    </div>

</body>

</html>