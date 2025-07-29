<?php
include '../backend/connection.php';
$id = $_GET['id'];
$sql = "SELECT * FROM outpass WHERE outpassId = $id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
if (!$row) {
    die("No record found for the given ID.");
}
$student_email = $row['email'];
$sql2 = "SELECT*FROM student WHERE email = '$student_email'";
$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    die("Query failed: " . mysqli_error($conn));
}
$row2 = mysqli_fetch_assoc($result2);   
if (!$row2) {
    die("No record found for the given ID.");
}

$outpass_id = $row['outpassId'];
$student_name = $row2['name'];
$student_contact = $row2['contact'];
$student_year = $row2['year'];
$from_date = $row['from_date'];
$to_date = $row['to_date'];
$reason = $row['reason'];
$created_on = $row['created_on'];

if (isset($_POST['approve'])) {

        $sql3 = "UPDATE outpass SET approval = '1' WHERE outpassId = '$outpass_id'";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3) {
        echo "<script>alert('Outpass request approved successfully!'); window.location.href='../parents/welcome.php';</script>";
    } else {
        echo "<script>alert('Error approving outpass request. Please try again.'); window.location.href='../parents/welcome.php';</script>";
    }
} elseif (isset($_POST['reject'])) {

    $sql4 = "UPDATE outpass SET approval = '0' WHERE outpassId = '$outpass_id'";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4) {
        echo "<script>alert('Outpass request rejected successfully!'); window.location.href='../parents/welcome.php';</script>";
    } else {
        echo "<script>alert('Error rejecting outpass request. Please try again.'); window.location.href='../parents/welcome.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/parentDashboard.css">
</head>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid px-4 justify-content-end">

  
    <form class="d-flex" role="search">  
    <a class="btn btn-primary" href="../parents/welcome.php">Back</a>
    </form>
  </div>
</nav>


    <div style="font-size=30px">
    
 <div class="container text-center">
    <h3>Welcome to Hostel</h3>    
<h4>Outpass Request</h4>

<P>Please confirm the outpass request by your ward.</P>

</div>
<div class='container'>
    <div class=' card col-4 d-flex justify-content-center mx-auto ' sty>
        <div class='card-body'>
            <h5 class='card-title'>Outpass ID: <?= $outpass_id?></h5>
            <p class='card-text'>Student Name: <?= $student_name?></p>
            <p class='card-text'>Student Email: <?= $student_email?></p>
            <p class='card-text'>Student Contact: <?= $student_contact?></p>
            <p class='card-text'>From <b><?= $from_date?> </b> To Date: <b><?=  $to_date?></b></p>
            <p class='card-text'></p>
            <p class='card-text'>Reason: <?= $reason?></p>
            <p class='card-text'>Created On: <?= $created_on?></p>

            <div class="d-flex text-center justify-content-center">
               <form action="" method="post">
               
                <input type="submit" value="Approve" name="approve" class="btn btn-success">
                <input type="submit" value="Reject" name="reject" class="btn btn-danger">
            </form> 
            </div>
            
        </div>
    </div>
    </div>


</body>
</html>