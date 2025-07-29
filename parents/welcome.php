<?php
include("../backend/connection.php");
session_start();
if (isset($_SESSION["loggedin"]) && isset($_SESSION["parent"])) {
$student_email=$_SESSION["student_email"];
    $email = $_SESSION["parent_email"]; 
  
    $sql = "SELECT * FROM outpass o INNER JOIN STUDENT s on o.email = s.email WHERE o.email = '$student_email' AND o.approval IS NULL ORDER BY  created_on DESC LIMIT 3 ";
   $sql2 = "SELECT * FROM student WHERE email='$student_email'";
    $result = mysqli_query($conn, $sql);
  $result1 = mysqli_query($conn,$sql2);
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

 if(mysqli_num_rows($result1)==1){
        $row = mysqli_fetch_assoc($result1);
        
        $year= $row["year"];
        $enrollment= $row["enrollment"];
        $name= $row["name"];
        $course = $row["course"];
      
      
    } else {
        echo"<script>alert('Cannot fetch data! Try again');</script>";
    }

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
    <div class="container-fluid px-4 justify-content-end">

    <!-- <a class="navbar-brand "><?php echo $_SESSION['name'];?></a> -->
    <form class="d-flex" role="search">  
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    </form>
  </div>
</nav>

 <div style="margin: 10px; padding: 10px;" > 
 <h1 style="font-size: 60px;">Dashboard</h1>
 <span style="font-size:30px">Welcome<?php echo " ";echo $_SESSION['name'];?></span>


                <div class="d-flex justify-content-center " style="padding: 10px;">

                 <div class="card" style="width: 18rem; min-height: auto; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Name</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"> <?php echo $name;?></h6>
                        <!-- <p class="card-text">Email : </p> -->
                        <!-- <p class="card-text">Contact : </p> -->
                         <!-- <p class="card-text">Enrollment No. : </p> -->

                   
                        
                    </div>
                </div>



                 <div class="card" style="width: 18rem; min-height: auto; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Enrollment No.</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"> <?php echo $enrollment;?> </h6>
                        <!-- <p class="card-text">Email : </p> -->
                        <!-- <p class="card-text">Contact : </p> -->
                         <!-- <p class="card-text">Enrollment No. : </p> -->

                   
                        
                    </div>
                </div>




                 <div class="card" style="width: 18rem; min-height: auto; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Course</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"> <?php echo $course;?></h6>
                        <!-- <p class="card-text">Email : </p> -->
                        <!-- <p class="card-text">Contact : </p> -->
                         <!-- <p class="card-text">Enrollment No. : </p> -->

                   
                        
                    </div>
                </div>




                 <div class="card" style="width: 18rem; min-height: auto; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Year</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"> <?php echo $year;?> </h6>
                        <!-- <p class="card-text">Email : </p> -->
                        <!-- <p class="card-text">Contact : </p> -->
                         <!-- <p class="card-text">Enrollment No. : </p> -->

                   
                        
                    </div>
                </div>
                </div>





                   <div class="card mt-4 shadow">
          <div class="card-header">
            Pending Recent Requests
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  
                  <th>Outpass ID</th>
                  <th>Reason</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
             <tbody>
                          
            <?php
            foreach ($result as $row):

                 ?>  
                <tr>
                  <td><?= $row["name"] ?></td>
                  <td><?= $row["email"] ?></td>
                  <td><?= $row["enrollment"] ?></td>
                  <td><?= $row["reason"] ?></td>
                  <td><?= $row["created_on"] ?></td>
                  <td><span class="status-pending">Pending</span></td>
                  <td>
                    <?php $_id = $row['outpassId']; $_link = "http://localhost/hostel/student/parentConfirmation.php?id=$_id"; ?>
              <a class='btn btn-primary btn-sm' href='<?= $_link ?>'>Take Action</a>
                  </td>
                </tr>
 <?php
                
            endforeach;
            ?>
               
              </tbody>
            </table>
          </div>
        </div>
<div class="d-flex justify-content-center align-items-center">
  <a href="parentsDashboard.php" class="btn btn-primary mt-3">View More</a>
</div>
 
        

    </div>
  </div> 
</body>

</html>