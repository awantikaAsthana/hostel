<?php
include '../backend/checkLogin.php';
// Check if the user is logged in and is a student
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
  <div class="container-fluid justify-content-between" style="margin: 1px; padding: 10px;">
      <div style=""><h1 style="font-size: 35px;">Dashboard</h1></div>
   
    <form class="d-flex " role="search">  
    <a class="btn btn-danger " href="../backend/logout.php">Logout</a>
    </form>
    
  
 
</nav>

<br>

 <span style="font-size:30px; margin:10px;">Welcome<?php echo " ";echo $_SESSION['name'];?></span></div>


    <div class="d-flex justify-content-center center-align" >
       
        <div class="col-2 card card-body justify-content-center c" style="margin: 20px; padding: 30px;">
        
        <p class="h3 text-center" >
            Apply for Outpass
        </p>
         <br>  
        <a href="outpass.php" class="btn btn-primary">ADD</a>
    </div>

       <div class="col-2 card card-body justify-content-center" style="margin: 20px; padding: 30px;">
       
        <p class="h3 text-center">
            Outpass Dashboard
        </p>
         <br>  
        <a href="detail.php" class="btn btn-primary">View All</a>
    </div>

    <div class="col-2 card card-body justify-content-center" style="margin: 20px; padding: 30px;">
     
    <p class="h3 text-center">
            Change your Password
        </p>
         <br>  
        <a href="changePassword.php" class="btn btn-primary">Change Password</a>

    </div>
    
        

    </div>

</body>

</html>