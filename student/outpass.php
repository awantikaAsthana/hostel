<?php
include '../backend/checkLogin.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outpass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/dashboard.css">
</head>

<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand"><?php echo $_SESSION['name'];?></a>
    <form class="d-flex" role="search">  
    <a class="btn btn-danger" href="../backend/logout.php">Logout</a>
    <a class="btn btn-outline-primary mx-2" href="../student/welcome.php">Back</a>
    </form>
  </div>
</nav>

    <div>
    <form action="../backend/outpass.php" method="post">
    <div class="header display-3 text-center mb-5">Apply for Outpass</div>
        <div class="col-3  m-auto">

            <input type="email" name="email" value="<?php echo $_SESSION['email'];?>" required hidden>
            <label for="reason">Reason for Outpass</label>
            <input type="text" name="reason" class="form-control" required>
            <label for="from_date">Enter Date for Outpass</label>
            <input type="date" name="from_date" class="form-control" id="date-new" required>
            <label for="to_date">Enter Date for Outpass</label>
            <input type="date" name="to_date" class="form-control"  id="date-from" onclick="selectDate(document.getElementById('date-new').value)" required>
           <br> 
           <div class="d-flex">
            
           </div>
            <input type="submit" name="submit" class="btn btn-primary"  />

        </div>


    </form>
   </div>
    </div>

    <script>
        const dateInput = document.getElementById("date-new");
        

        const today = new Date();
        const todayFormatted = today.toISOString().split("T")[0]; // Get date in YYYY-MM-DD format
        dateInput.min = todayFormatted;

       
        function selectDate(x){
            const dateInput2 = document.getElementById("date-from");
            
            dateInput2.min = x;
        }
    </script>
</body>


</html>