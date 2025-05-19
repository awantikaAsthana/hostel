<?php
include "./connection.php";

if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $reason = $_POST['reason'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        $sql = "INSERT INTO outpass (email, reason, from_date, to_date) VALUES ('$email', '$reason', '$from_date', '$to_date')";
        $result = mysqli_query($conn, $sql,MYSQLI_USE_RESULT);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
        else {
            // Fetch the last inserted ID
            $last_id = mysqli_insert_id($conn);
            $file = 'link.txt';
            $handle = fopen($file, 'w');
            $id = $row['id'];
            $data = "http://localhost/hostel/student/parentConfirmation.php?id=$last_id \n";
            fwrite($handle, $data);
            fclose($handle);

            echo "<script>alert('Outpass request submitted successfully!');
            window.location.href='/hostel/student/welcome.php';</script>";
          
        } 
            echo "<script>alert('Error submitting outpass request. Please try again.');
             window.location.href='/hostel/student/outpass.php';
            </script>";
        

    }
?>