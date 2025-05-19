<?php
session_start();
include "../backend/connection.php";

if (isset($_SESSION["loggedin"])) {
    $email = $_SESSION["security_email"];
    $sql = "SELECT * FROM outpass o INNER JOIN STUDENT s on o.email = s.email ORDER BY created_on DESC";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if (!$result) {
        echo "<script>
        alert('Data cannot be fetched!');
        window.location.href='/hostel/studentdetail.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
    alert('Login First');
    window.location.href = '/hostel/';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">Outpass Details</a>
        <div class="d-flex">
            <a class="btn btn-outline-primary mx-2" href="/hostel/security/welcome.php">Back</a>
            <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card-container">
        <h1 class="display-4 text-center">Approved & Rejected Outpass Details</h1>

        <div class="d-flex flex-wrap justify-content-center gap-2 mt-5">
        <?php
        $found = false;
        foreach ($result as $row):
            if (!is_null($row["f_approval"])):  // Only show if approved or rejected
                $found = true;
        ?>
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Outpass - <?= $row["outpassId"] ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Duration: <?= $row["from_date"] ?> to <?= $row["to_date"] ?></h6>
                    <p class="card-text">Email: <?= $row["email"] ?></p>
                    <p class="card-text">Name: <?= $row["name"] ?></p>
                    <p class="card-text">Year: <?= $row["year"] ?></p>
                    <p class="card-text">Reason: <?= $row["reason"] ?></p>
                    <p class="card-text">Created On: <?= $row["created_on"] ?></p>
                    <p class="card-text">
                        Status:
                        <?= $row["f_approval"] ? "Approved (Reason): " . $row['r_approval'] : "Rejected (Reason): " . $row['r_approval'] ?>
                    </p>
                </div>
            </div>
        <?php
            endif;
        endforeach;

        if (!$found) {
            echo "<h3 class='text-center mt-5'>No Approved or Rejected Outpass Requests</h3>";
        }
        ?>
        </div>
    </div>
</div>
</body>
</html>
