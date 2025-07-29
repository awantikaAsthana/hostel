<?php
session_start();
include "../backend/connection.php";

if (isset($_SESSION["loggedin"]) && isset($_SESSION["staff"])) {
    $sql = "select * from student;";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>
    alert('No Students found');
    </script>";
    }
} else {
    echo "<script>
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
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Students Details</a>
    <div class="d-flex" >  
    <a class="btn btn-outline-primary mx-2" href="./dashboard.php">Back</a>
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    </div>
  </div>
</nav>
    <div class="container ">
        
        <div class="card-container">

            <?php
            foreach ($result as $row):
                ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["name"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Year - <?= $row["year"] ?></h6>
                        <p class="card-text">Email : <?= $row["email"] ?></p>
                        <p class="card-text">Contact : <?= $row["contact"] ?></p>
                         <p class="card-text">Enrollment No. : <?= $row["enrollment"] ?></p>

                    <div class="d-flex">
<a href="../staff/editDetail.php?email=<?= urlencode($row['email']) ?>" class="btn btn-success mx-2">EDIT</a>
                        <form action="backend/delete_backend.php" method="POST" onsubmit="return confirm('Are you sure you want to Delete this user?');">
                            <input type="text" value="<?= $row["email"] ?>" name="email" hidden></input>
                            <input class="btn btn-danger" type="submit" name="delete" value="Delete" />   </form>
                    </div>
                        
                    </div>
                </div>

                <?php
            endforeach;
            ?>
        </div>

    </div>

    </div>
</body>

</html>