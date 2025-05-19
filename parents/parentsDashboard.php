<?php
session_start();
include "../backend/connection.php";

if(isset($_SESSION["loggedin"])){
    $email=$_SESSION["student_email"];
    $sql = "SELECT * FROM outpass WHERE email = '$email' ORDER BY created_on DESC";
    $result= mysqli_query($conn,$sql);
    $count= mysqli_num_rows($result);
    if(!$result){
        echo "<script>
        alert('data cannot be fetched!')
        window.location.href='/hostel/studentdetail.php';
        </script>";
    }
}
else {
    echo "<script>`
alert('Login First');
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Outpass Details</a>
    <div class="d-flex" >  
    <a class="btn btn-outline-primary mx-2" href="../parents/welcome.php">Back</a>
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    </div>
  </div>
</nav>
<div class="container">
<div class="d-flex flex-wrap justify-content-center gap-2 mt-5">
            <?php
            foreach ($result as $row):
                ?>
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">Outpass - <?= $row["outpassId"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Duration <?= $row["from_date"];?> to <?= $row["to_date"]; ?></h6>
                        <p class="card-text">Reason : <?= $row["reason"] ?></p>
                     
                        <p class="card-text">Created On : <?= $row["created_on"] ?></p>
                        <p class="card-text">
                            <?php
                            if($row["approval"]==NULL){
                                $_id = $row['outpassId'];
                                $_link= "http://localhost/hostel/student/parentConfirmation.php?id=$_id";
                                echo"<a href='$_link'> click here for approval</a>";
                                
                            }
                            else if($row['approval']){
                                echo"approved";
                            }
                            else{
                                echo"denied";
                            }
                            ?>

                        </p>
                        
   
                    </div>

                </div>

                <?php
            endforeach;
            ?>
            </div>
          
</div>
</body>
</html>