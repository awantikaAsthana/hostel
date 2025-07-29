<?php 
session_start();
include "../backend/connection.php";

if (isset($_SESSION["loggedin"]) && isset($_SESSION["staff"])) {

    $email = $_SESSION["email"]; 
    $count="SELECT f_approval, count(*) from outpass WHERE approval = 1 GROUP BY  f_approval;";
    $sql = "SELECT * FROM outpass o INNER JOIN STUDENT s on o.email = s.email WHERE o.approval=1 AND o.f_approval IS NULL ORDER BY  created_on DESC LIMIT 3 ";
    $result = mysqli_query($conn, $sql);
   $count_result = mysqli_query($conn,$count);
   
$pending = 0;
$approved = 0;
$rejected = 0;
$total = 0;

while ($row = mysqli_fetch_assoc($count_result)) {
    if ($row['f_approval'] === NULL) {
        $pending = $row['count(*)'];
    } elseif ($row['f_approval'] == 1) {
        $approved = $row['count(*)'];
    } else {
        $rejected = $row['count(*)'];
    }
    
}

$total = $pending+$approved+$rejected;

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
        // window.location.href='/hostel/staff/dashboard.php';
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
        winddow.location.href='/hostel/staff/dashboard.php';
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Warden Outpass Management Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="new.css">

</head>
<body>
  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <nav class="col-md-2 sidebar shadow">
        <div class="text-center mb-4">
          <!-- <img src="https://via.placeholder.com/80" class="rounded-circle mb-2 border border-light" alt="Warden"> -->
          <h5>Warden Panel</h5>
          <small>Welcome<?php echo " ";echo $_SESSION['name'];?></small>
        </div>
        <a href="../staff/new.php" class="active"> Dashboard</a>
        <!-- new pages -->
        <a href="../staff/pending.php"> Pending Requests</a>
        <a href="../staff/approved.php"> Approved Requests</a>
        <a href="../staff/rejected.php"> Rejected Requests</a>
         <a href="../staff/studentdetail.php"> Edit Details</a>
          <a href="../staff/signUp.php"> Create Student</a>
        <!-- <a href="#"> Notifications</a>
        <a href="#"> Settings</a> -->
        <a href="../backend/logout.php"> Logout</a>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 content">
        <h2 class="mb-4 text-primary">Warden Outpass Dashboard</h2>







        <!-- Dashboard Cards -->
        <div class="row g-4">
          <div class="col-md-3">
            <div class="card p-3 shadow">
              <div class="d-flex align-items-center">
                <div class="me-3 card-icon">⏳</div>
                <div>
                  <h4><?php echo $pending?></h4>
                  <p class="mb-0 text-muted">Pending Requests</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-3 shadow">
              <div class="d-flex align-items-center">
                <div class="me-3 card-icon">✅</div>
                <div>
                  <h4><?php echo $approved?></h4>
                  <p class="mb-0 text-muted">Approved</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-3 shadow">
              <div class="d-flex align-items-center">
                <div class="me-3 card-icon">❌</div>
                <div>
                  <h4><?php echo $rejected?></h4>
                  <p class="mb-0 text-muted">Rejected</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-3 shadow">
              <div class="d-flex align-items-center">
                <div class="me-3 card-icon">📊</div>
                <div>
                  <h4><?php echo $total?></h4>
                  <p class="mb-0 text-muted">Total Requests</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Outpass Request Table -->
        <div class="card mt-4 ">
          <div class="card-header">
            Pending Outpass Requests
          </div>
          <div class="card-body table-responsive">

            <table class="table  align-middle">
              <thead class="table-light">
                <tr>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th>Roll No</th>
                  <th>Reason</th>
                  <th>Date</th>
                  <th>Status</th>
                 
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
                  
            
                </tr>
 <?php
                
            endforeach;
            ?>
               
              </tbody>
            </table>
          </div>
        </div>
     

        <!-- Notifications -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header">Recent Actions</div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">✅ Approved outpass for Priya Verma</li>
                  <li class="list-group-item">❌ Rejected outpass for Rohan Mehta</li>
                  <li class="list-group-item">✅ Approved outpass for Anjali Gupta</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header">Notifications</div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">📢 Hostel meeting scheduled for 22 July 2025</li>
                  <li class="list-group-item">⚠️ Multiple students requested same-day outpass</li>
                  <li class="list-group-item">✅ Weekly report generated</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
