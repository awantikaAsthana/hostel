<?php 
include("connection.php");
// include("editDetail.php");

if (isset($_POST['submit'])) {

    // Fetching Data from Form
    $newemail =  $_POST['email'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $year = $_POST['year'];
    $contact = $_POST['contact'];
  
    // Email should be Unique
    $sql = "UPDATE student SET name='$name', dob='$dob', year='$year', contact='$contact' where email='$newemail'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
      echo "<script>
      // alert('user not updated!');
      // window.location.href='/hostel/studentdetail.php';
      </script>
      ";
      // die("Query failed " . mysqli_error($conn));
    }
     echo "<script>
      alert('user successfully updated!');
      window.location.href='/hostel/studentdetail.php';
      </script>
      ";
    
  
  
  
  }
?>