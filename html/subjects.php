<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager - Home</title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/subjects.css">
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

            <img id="icon" src="../media/icon.png" alt="App Icon" width="50" height="50">

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
            <a href="criteria.php">Edit Criteria</a>
            <a href="help.html">How to Use</a>
            <a href="developer.html">Developer Info</a>
            <a href="privacy.html">Privacy Policy</a>
            <a href="contact.html">Contact Us</a>
        </menu>
    </main>

    <section id="main_container">
        <?php

        session_start();
        $email = $_SESSION["email"];
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'attendance_system';



        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


        $query = "SELECT * FROM subject WHERE email='$email'";
        $result = $conn->query($query);
        $n = $result->num_rows;
        $subject_name = array();
        $subject_total_hours = array();
        $subject_hours_completed = array();
        $subject_hours_present = array();
        $subject_hours_absent = array();
        $subject_credit = array();
        $subject_atendance = array();

        while ($row = $result->fetch_assoc()) {
            $subject_name[] = $row['name'];
            $subject_total_hours[] = $row['total_hours'];
            $subject_hours_completed[] = $row['hours_completed'];
            $subject_hours_present[] = $row['hours_present'];
            $subject_hours_absent[] = $row['hours_absent'];
            $subject_credit[] = $row['credit'];
            $subject_attendance[] = $row['attendance'];
        }

        ?>

        <h3>Subjects</h3>
        <table>
            <tr>
                <td><B>No.</B></td>
                <td><B>Name</B></td>
                <td><B>Total<br>Classes</B></td>
                <td><B>Present</B></td>
                <td><B>Absent</B></td>
                <td><B>Attendance</B></td>
                <td><B>Credit</B></td>
                <td><B>Action</B></td>
            </tr>

            <?php for ($i = 0; $i < count($subject_name); $i++) : ?>
                <tr>
                    <td><?= ($i + 1) . "." ?></td>
                    <td><?= $subject_name[$i]; ?></td>
                    <td><?= $subject_hours_completed[$i]; ?></td>
                    <td><?= $subject_hours_present[$i]; ?></td>
                    <td><?= $subject_hours_absent[$i]; ?></td>
                    <td><?= $subject_attendance[$i] . "%"; ?></td>
                    <td><?= $subject_credit[$i]; ?></td>
                    <td class="buttons"></td>
                </tr>
            <?php endfor; ?>

        </table>
    </section>

    <script>
        for (let i = 0; i < <?= $i ?>; i++) {
            let present_button = document.createElement("button");
            present_button.innerHTML = "✔";
            present_button.style.backgroundColor = "#2ec76e";
            let absent_button = document.createElement("button");
            absent_button.style.backgroundColor = "#ff0505";
            absent_button.innerHTML = "✖";
            let buttons = document.getElementsByClassName("buttons")[i];
            present_button.style.borderRadius = "50%";
            present_button.style.height = "30px";
            present_button.style.width = "30px";
            present_button.style.outline = "none";
            present_button.style.color = "white";
            present_button.style.cursor = "pointer";
            present_button.style.marginRight = "5px";
            present_button.style.marginLeft = "5px";
            let x = i + 1;
            let id = (i + 1).toString();
            present_button.id = id;

            absent_button.style.borderRadius = "50%";
            absent_button.style.height = "30px";
            absent_button.style.width = "30px";
            absent_button.style.outline = "none";
            absent_button.style.color = "white";
            absent_button.style.cursor = "pointer";
            absent_button.style.marginRight = "5px";
            absent_button.style.marginLeft = "5px";

            buttons.appendChild(present_button);
            buttons.appendChild(absent_button);
        }
    </script>

    <footer>
        <div class="left">
            Attendance Manager<br>2020 ©
        </div>
        <div class="center">
            <span>
                Official Page -
            </span>
            <span>
                <a href="https://twitter.com/AlokPur32580593?s=08" target="_blank">
                    <img src="../media/twitter.png" alt="Twitter Icon" height="48px" width="48px">
                </a>
            </span>
        </div>
        <div class="right">
            <a id="privacyPolicy" href="privacy.html">Privacy Policy</a>
        </div>
    </footer>

    <script type="text/javascript" src="../javascript/home.js"></script>
</body>

</html>