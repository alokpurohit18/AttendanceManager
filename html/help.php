<!DOCTYPE html>
<html lang="en">

<head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager - Help</title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/help.css">
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
            <a id="info" href="../html/logout.php">l</a>
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

    <section>
        <article id="instructions">
            <h2>How To Use</h2>
            <p>
                This app solves the attendance management problems faced by college or university students who need to
                compulsorily attend a minimum percentage of classes each semester or session.
            </p>
            <p>
                <b>Timetable</b> - You can add your class timetable and mark attendance accordingly.
            </p>
            <p>
                <b>Attendance</b> - Attendance of each subject is displayed along with the percentage and a status which
                notify how many classes you need to attend to fulfill the attendance percentage criteria as a student.
            </p>
            <p>
                <b>Attendance History</b> - The history of events can be used using calendar view or timeline view.
                You can view a detailed history of all the events like marking present, absent, adding subjects,
                deleting subjects, resetting attendance and editing attendance.
            </p>
            <p>
                <b>Edit Attendance / Mark Past Attendance</b> - If you forget to mark attendance on a particular day,
                jump to that date and mark the attendance also mistakes made while marking attendance in the past can be
                added easily.
            </p>
            <p>
                <b>Edit Attendance Criteria</b> - If the need arises, you can edit the attendance criteria that you need
                to fulfill as a student.
            </p>
            <p>
                <b>Other Features</b> -
            <ul>
                <li>Delete Subject: If you wish to delete a subject you can delete it.</li>
                <li>Reset Attendance: Reset the attendance of the subjects.</li>
                <li>Report Bug: Found a bug? Report it to the developer on the tap of a button.</li>
            </ul>
            </p>
        </article>

        <article id="tutorial">
            <h2>Video Tutorial</h2>
            <p>
                Here's a video tutorial demonstrating and explaining how to use the app in a very easy way -
            </p>
            <iframe src="https://www.youtube.com/embed/TxPKu9779Y0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            <h2>
                Thank You !!!
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