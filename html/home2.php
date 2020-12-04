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
    <title>Attendance Manager - Home</title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="icon" type="image/jpg" href="../media/icon.png">
</head>

<body>
    <header>
        <div class="left">
            <button id="menuButton" onclick="openMenu()">≡</button>
        </div>

        <div class="center">
            <div>
                <div id="month">
                </div>
                <div id="year">
                </div>
            </div>

            <div id="day">
            </div>

            <img id="icon" src="../media/icon.png" alt="App Icon" width="48" height="48">

            <div id="name">
            </div>
        </div>

        <div class="right">
            <a id="info" href="../html/index.php">l</a>
        </div>
    </header>

    <main>
        <menu>
            <a href="home2.php">Home</a>
            <a href="subjects.php">Subjects</a>
            <a href="criteria.php">Edit Attendance Criteria</a>
            <a href="help.html">How to Use</a>
            <a href="developer.html">Developer Information</a>
            <a href="privacy.html">Privacy Policy</a>
            <a href="contact.html">Contact Us</a>
        </menu>
    </main>

    <section>
        <article id="personal_info" class="left">
            <div>
                Name :
                <span id="user_name"></span>
            </div>
            <div>
                Email :
                <span id="user_email"></span>
            </div>
            <div>
                Age :
                <span id="user_age"></span>
            </div>
            <div>
                Password :
                <span id="user_password"></span>
            </div>
            <div>
                Attendance Criteria :
                <span id="user_criteria"></span>
            </div>
            <div>
                Course :
                <span id="user_course"></span>
            </div>
            <div>
                College :
                <span id="user_college"></span>
            </div>
        </article>

        <article id="attendance" class="right">
            <div id="user_attendance">
                <span id="attendance_value"></span>
            </div>
            <h2>
                Attendance
            </h2>
        </article>
    </section>

    <footer>
        <div class="left">
            Attendance Manager<br>2020 ©
        </div>
        <div class="center">
            <span>
                Official Page -
            </span>
            <span>
                <a href="https://twitter.com/AlokPur32580593?s=08">
                    <img src="../media/twitter.png" alt="Twitter Icon" height="48px" width="48px">
                </a>
            </span>
        </div>
        <div class="right">
            <a id="privacyPolicy" href="privacy.html">Privacy Policy</a>
        </div>
    </footer>

    <script type="text/javascript" src="../javascript/home.js"></script>
    <script>
        function setInfo() {
            document.getElementById("user_name").innerHTML = localStorage.getItem("name");
            document.getElementById("user_email").innerHTML = localStorage.getItem("email");
            document.getElementById("user_age").innerHTML = localStorage.getItem("age");
            document.getElementById("user_password").innerHTML = localStorage.getItem("password");
            document.getElementById("user_course").innerHTML = localStorage.getItem("course");
            document.getElementById("user_college").innerHTML = localStorage.getItem("college");
            document.getElementById("user_criteria").innerHTML = localStorage.getItem("criteria") + "%";
            document.getElementById("attendance_value").innerHTML = localStorage.getItem("attendance") + "%";
        }

        setInfo();
    </script>
</body>

</html>