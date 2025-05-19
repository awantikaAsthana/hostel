<?php
session_start();
if (isset($_SESSION["loggedin"])) {
    if(isset($_SESSION["staff"])){
        echo "<script>
        
        </script>";
    } 
} else {
    echo "<script>
alert('Please Log In First');
window.location.href = '/hostel/';
</script>";

}
?>