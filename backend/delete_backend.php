<?php 
include("connection.php");


// Delete Student CODE

if (isset($_POST['delete'])){

    // Fetching Data from Form
    $newemail =  $_POST['email'];
    $sql = "DELETE FROM student where email='$newemail'";
    $result = mysqli_query($conn, $sql);

    if(!$result){
      echo "<script>
      // alert('user not Deleted!!');
      // window.location.href='/hostel/studentdetail.php';
      </script>
      ";
      die("Query failed " . mysqli_error($conn));
    }
    else{
      echo "<script>
      alert('user successfully Deleted!');
      window.location.href='/hostel/studentdetail.php';
      </script>
      ";
  }}
?>
