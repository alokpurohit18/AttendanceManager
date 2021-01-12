<?php

if (isset($_POST["login"])) {
    session_start();
    $_SESSION["email"] = $_POST["email"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'attendance_system';

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Failed to connect: " . $conn->connect_error);
    } else {
        $loggedIn = false;
        $query = "SELECT * FROM student";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            if ($row["email"] === $email && $row["password"] === $password) {
                $name = $row["name"];
                $age = $row["age"];
                $criteria = $row["attendance_criteria"];
                $course = $row["course"];
                $college = $row["college_name"];
                $attendance = $row["attendance"];
                $loggedIn = true;
            }
        }

        if ($loggedIn === false) {
            header("Location: index.php");
        }
    }
}

if (isset($_POST["signup"])) {

    session_start();
    $_SESSION["email"] = $_POST["email1"];
    $email = $_POST["email1"];
    $password = $_POST["password1"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $criteria = 100;
    $course = null;
    $college = null;
    $attendance = 0;
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'attendance_system';

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Failed to connect: " . $conn->connect_error);
    } else {
        $query = "INSERT INTO student SET email = '$email', name = '$name', age = '$age', password = '$password' ";
        $result = $conn->query($query);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager- Home</title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="icon" type="image/jpg" href="../media/icon.png">
</head>

<body>
    <script type="text/javascript">
        if (localStorage.getItem("default_load") === "false") {
            let name = "<?= $name ?>";
            let age = "<?= $age ?>";
            let email = "<?= $email ?>";
            let password = "<?= $password ?>";
            let criteria = "<?= $criteria ?>";
            let course = "<?= $course ?>";
            let college = "<?= $college ?>";
            let attendance = "<?= $attendance ?>";
            localStorage.setItem("name", name);
            localStorage.setItem("age", age);
            localStorage.setItem("email", email);
            localStorage.setItem("password", password);
            localStorage.setItem("criteria", criteria);
            localStorage.setItem("course", course);
            localStorage.setItem("college", college);
            localStorage.setItem("attendance", attendance);
            localStorage.setItem("default_load", "true");
        }
    </script>
    <script>window.location.href = "home2.php";</script>
</body>

</html>
