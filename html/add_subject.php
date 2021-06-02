<!DOCTYPE html>
<html lang="en">

<head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager - Add Subject</title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="icon" type="image/jpg" href="../media/icon.png">
    <style>
        input {
            font-family: 'Ubuntu', sans-serif;
            font-size: 24px;
            background-color: #f4f9f4;
            height: 40px;
            width: 40%;
            border: 2px solid black;
            border-radius: 5px;
            display: block;
            align-items: center;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        h3 {
            font-size: 28px;
        }

        #create_subject {
            width: 25%;
            height: auto;
            word-wrap: normal;
            background-color: #20a15c;
            color: #f4f9f4;
            padding: 10px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            border: 2px solid #f4f9f4;
        }
    </style>
</head>

<body>
    <form id="subject_form" method="POST">
        <h3>Subject Details</h3>
        <input type="text" id="name" name="name" placeholder="Name" required />
        <input type="number" id="present" name="present" min=0 placeholder="Hours Present" required />
        <input type="number" id="absent" name="absent" min=0 placeholder="Hours Absent" required />
        <input type="number" id="credit" name="credit" min=0 placeholder="Credit" required />
        <input type="submit" id="create_subject" name="create_subject" value="Add" />
    </form>
    <script>
        document.getElementById("subject_form").action = "add_subject.php?email=" + "<?= $_GET['email']  ?>";
    </script>
    <?php
    if (isset($_POST['create_subject'])) {
        $dbhost5 = 'localhost';
        $dbuser5 = 'root';
        $dbpass5 = '';
        $dbname5 = 'attendance_system';
        $conn5 = new mysqli($dbhost5, $dbuser5, $dbpass5, $dbname5);
        $present = $_POST['present'];
        $absent = $_POST['absent'];
        $name = $_POST['name'];
        $credit = $_POST['credit'];
        $attendance_number = round(($present / ($present + $absent)) * 100);
        $attendance = strval($attendance_number);
        $total_hours = $present + $absent;
        $query1 = "SELECT * FROM subject WHERE email='" . $_GET['email'] . "'";
        $result1 = $conn5->query($query1);
        $n = $result1->num_rows;
        $s_id = $n + 1;
        $query5 = "INSERT INTO subject VALUES ('" . $s_id . "', '" . $_GET['email'] . "', '" . $name . "', '" . $total_hours . "', '" . $present . "', '" . $absent . "', '" . $credit . "', '" . $attendance . "')";
        $conn5->query($query5);
        echo "<script>window.close();</script>";
    }
    ?>
</body>