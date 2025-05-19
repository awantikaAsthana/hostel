<?php
session_start();
include "../backend/connection.php";

if (isset($_SESSION["loggedin"]) && isset($_SESSION["staff"])) {
    $email = $_SESSION["email"];
    $sql = "SELECT * FROM outpass o INNER JOIN STUDENT s on o.email = s.email ORDER BY created_on DESC";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if (!$result) {
        echo "<script>
        alert('data cannot be fetched!')
        window.location.href='/hostel/studentdetail.php';
        </script>";
    }
} else {
    echo "<script>
alert('Login First');
window.location.href = '/hostel/';
</script>";

}

if (isset($_POST['approve'])) {
    $outpassId = $_POST['outpassId'];
    $email = $_POST['email'];
    $r_approval = $_POST['r_approval'];

    $sql = "UPDATE outpass SET f_approval = 1, assigned_staff='$email',r_approval='$r_approval' WHERE outpassId = '$outpassId'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Outpass request updated successfully!');
        // window.location.href='/hostel/staff/outpass.php';
        </script>";
    } else {
        echo "<script>alert('Error updating outpass request. Please try again.');</script>";
    }
}

if (isset($_POST['reject'])) {
    $outpassId = $_POST['outpassId'];
    $email = $_POST['email'];
    $r_approval = $_POST['r_approval'];
    $sql = "UPDATE outpass SET f_approval = 0, assigned_staff='$email',r_approval='$r_approval' WHERE outpassId = '$outpassId'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Outpass request updated successfully!');
        winddow.location.href='/hostel/staff/outpass.php';
        </script>";
    } else {
        echo "<script>alert('Error updating outpass request. Please try again.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Outpass Details</a>
    <div class="d-flex" >  
    <a class="btn btn-outline-primary mx-2" href="./dashboard.php">Back</a>
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    </div>
  </div>
</nav>
    <div class="container ">
        
        <div class="card-container">
            <?php 
             if ($count == 0) {
                echo "<h1 class='display-4 text-center'>No Outpass Requests</h1>";
             }
            ?>
            <h1 class="display-4 text-center">Outpass Details</h1>
            <div class="d-flex flex-wrap justify-content-center gap-2 mt-5">
               
            <?php
            foreach ($result as $row):
                if($row["approval"]){
                 ?>  
               
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">Outpass - <?= $row["outpassId"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Duration <?= $row["from_date"];?> to <?= $row["to_date"]; ?></h6>
                        <p class="card-text">Email : <?= $row["email"] ?></p>
                        <p class="card-text">Name : <?= $row["name"] ?></p>
                        <p class="card-text">Year : <?= $row["year"] ?></p>
                        <p class="card-text">Reason : <?= $row["reason"] ?></p>
                       
                        <p class="card-text">Created On : <?= $row["created_on"] ?></p>
                        <p class="card-text">Parent's Approval : <?php if($row["approval"]){
                            ?>

                               <p class="card-text">Approved </p>
                            <?php    
                        }
                        else if($row["approval"]==NULL){
                            echo "<button class='btn btn-warning'>Pending</button>";
                        }
                        else{
                         ?>

                            <p class='card-text'>Rejected </p>

                         <?php 
                            
                        } ?>
                        </p>

                        <p class="card-text">Status : <?php if($row["f_approval"]){
                        ?>
                        <p class="card-text">Approved (Reason) : <?= $row['r_approval'] ?></p>
                        <?php
                        }
                        else if($row["f_approval"]==NULL){
                    ?>
                            <form action='' method='POST'>
                                <input type='hidden' name='outpassId' value="<?=$row['outpassId']?>">
                                <input type='hidden' name='email' value='<?=$_SESSION['email']?>'>
                                <input type="text" name="r_approval" id="r_approval" > 
                                <button type='submit' class='btn btn-primary' name="approve">Approve</button>
                                <button type='submit' class='btn btn-primary'name="reject">Reject</button>
                            </form>  
                      <?php  }
                        else{
                            
                            ?>
                            <p class="card-text">Rejected (Reason) : <?= $row['r_approval'] ?></p>
                            <?php
                        } ?></p>
                        
                     </div>       
                  
                </div>

                <?php
                }
            endforeach;
            ?>
            </div>
        </div>

    </div>

    </div>
</body>

</html>