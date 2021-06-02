<!DOCTYPE html>
<html lang="en">

<head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager - Remove Subject</title>
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

        #remove_subject {
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
        <input type="number" id="s_id" name="s_id" min=1 placeholder="Subject Number" required />
        <input type="submit" id="remove_subject" name="remove_subject" value="Remove" />
    </form>
    <script>
        document.getElementById("subject_form").action = "remove_subject.php?email=" + "<?= $_GET['email']  ?>";
    </script>
    <?php
    if (isset($_POST['remove_subject'])) {
        $dbhost5 = 'localhost';
        $dbuser5 = 'root';
        $dbpass5 = '';
        $dbname5 = 'attendance_system';
        $conn5 = new mysqli($dbhost5, $dbuser5, $dbpass5, $dbname5);
        $s_id = $_POST['s_id'];
        $query5 = "DELETE FROM subject WHERE email='" . $_GET['email'] . "' AND s_id='" . $s_id . "'";
        $conn5->query($query5);
        echo "<script>window.close();</script>";
    }
    ?>
</body>