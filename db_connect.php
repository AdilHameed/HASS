<!-- connect to database-->-

<?php
    $con = mysqli_connect("localhost", "root", "", "osms") or die(mysqli_error($con));
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>