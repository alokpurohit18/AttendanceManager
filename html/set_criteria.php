<?php

if (isset($_POST["save"])) {

    session_start();
    $criteria = $_POST["slider"];
    $email = $_SESSION["email"];
    
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'attendance_system';

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Failed to connect: " . $conn->connect_error);
    } else {
        $query = "UPDATE student SET attendance_criteria='$criteria' WHERE email='$email'";
        $result = $conn->query($query);
        header("LOCATION: criteria.php");
    }
}

?>
