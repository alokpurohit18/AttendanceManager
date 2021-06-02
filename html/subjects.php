<!DOCTYPE html>
<html lang="en">

<head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager - Subjects</title>
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
            <a id="info" href="../html/logout.php">L</a>
        </div>
    </header>

    <main>
        <menu>
            <a href="home2.php">Home</a>
            <a href="subjects.php">Subjects</a>
            <a href="criteria.php">Edit Criteria</a>
            <a href="help.php">How to Use</a>
            <a href="developer.php">Developer Info</a>
            <a href="privacy.php">Privacy Policy</a>
            <a href="contact.php">Contact Us</a>
        </menu>
    </main>

    <section id="main_container">
        <?php
        ob_start();
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
        $subject_hours_completed = array();
        $subject_hours_present = array();
        $subject_hours_absent = array();
        $subject_credit = array();
        $subject_atendance = array();
        echo "<h3 style='display: inline-block; margin-right: 1%;'>Subjects</h3>";
        echo "<button id='add_subject' style='display: inline-block; margin-left: 1%; background-color: #2ec76e; border-radius: 50%; height: 30px; width: 30px; outline: none; color: white; cursor: pointer; font-size: 24px; '>+</button>";
        echo "<button id='remove_subject' style='display: inline-block; margin-left: 1%; background-color: #cf0000; border-radius: 50%; height: 30px; width: 30px; outline: none; color: white; cursor: pointer; font-size: 24px; font-weight: bold;'>-</button>";
        echo "<form action='subjects.php' method='POST'>";
        echo "<table>";
        echo "<tr>";
        echo "<td><B>ID</B></td>";
        echo "<td><B>Name</B></td>";
        echo "<td><B>Total Classes</B></td>";
        echo "<td><B>Present</B></td>";
        echo "<td><B>Absent</B></td>";
        echo "<td><B>Attendance</B></td>";
        echo "<td><B>Credit</B></td>";
        echo "<td><B>Confirm</B></td>";
        echo "</tr>";
        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row['s_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['hours_completed'] . "</td>";
            echo "<td><input type='number' name='subject_hours_present[]' style='background-color: #18191f; color: white; width: 25%; font-size: 24px; border: 1px solid #18191f; text-align: center;' min=0 value='" . $row['hours_present'] . "' /></td>";
            echo "<td><input type='number' name='subject_hours_absent[]' style='background-color: #18191f; color: white; width: 25%; font-size: 24px; border: 1px solid #18191f; text-align: center;' min=0 value='" . $row['hours_absent'] . "' /></td>";
            echo "<td>" . $row['attendance'] . "%</td>";
            echo "<td>" . $row['credit'] . "</td>";
            echo "<td><input type='submit' name='update' class='action_button' style='background-color: #2ec76e; border-radius: 50%; height: 30px; width: 30px; outline: none; color: white; cursor: pointer;' value='✔' /></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
        if (isset($_POST['update'])) {
            $total = count($_POST['subject_hours_present']);
            echo "<script>console.log('Total: " . $total . "' );</script>";
            $subject_hours_present = $_POST['subject_hours_present'];
            $subject_hours_absent = $_POST['subject_hours_absent'];
            for ($i = 0; $i < $total; $i++) {
                $present = $subject_hours_present[$i];
                $absent = $subject_hours_absent[$i];
                $attendance_number = round(($present / ($present + $absent)) * 100);
                $attendance = strval($attendance_number);
                $total_hours = $present + $absent;
                $subject_id = $i + 1;
                $query1 = "UPDATE subject SET hours_present = '" . $present . "', hours_absent = '" . $absent . "', hours_completed = '" . $total_hours . "', attendance = '" . $attendance . "' WHERE email = '$email' AND s_id = '" . $subject_id . "';";
                $conn->query($query1);
                $sum = $sum + $attendance;
                header("Location: subjects.php");
            }
            $averageAttendance = strval(round($sum / $total));
            $query2 = "UPDATE student SET attendance = '" . $averageAttendance . "' WHERE email = '$email'";
            $conn->query($query2);
        }
        ob_end_flush();
        ?>
    </section>

    <script>
        document.getElementById("add_subject").addEventListener('click', function(event) {
            let params = "scrollbars=no, resizable=no, status=no, location=no, toolbar=no, menubar=no, width=500,height=450, left=500, top=200";

            open("add_subject.php?email=" + "<?= $email ?>", "add_subject_window", params);
        });

        document.getElementById("remove_subject").addEventListener('click', function(event) {
            let params = "scrollbars=no, resizable=no, status=no, location=no, toolbar=no, menubar=no, width=500,height=250, left=500, top=200";

            open("remove_subject.php?email=" + "<?= $email ?>", "remove_subject_window", params);
        });
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
            <a id="privacyPolicy" href="privacy.php">Privacy Policy</a>
        </div>
    </footer>

    <script type="text/javascript" src="../javascript/home.js"></script>
</body>

</html>