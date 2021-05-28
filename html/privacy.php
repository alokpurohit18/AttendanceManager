<!DOCTYPE html>
<html lang="en">

<head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager - Privacy Policy</title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="icon" type="image/jpg" href="../media/icon.png">

    <style>
        h2 {
            padding-top: 20px;
        }

        section {
            width: 75%;
            align-items: center;
            margin: auto;
            border-radius: 10px;
            background-color: #18191f;
        }

        embed {
            border: 2px solid white;
            border-radius: 15px;
            margin-bottom: 20px;
            width: 75%;
            height: 420px;
        }
    </style>
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
        <h2>Privacy Policy</h2>
        <embed src="../media/privacy_policy.pdf" type="application/pdf">
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