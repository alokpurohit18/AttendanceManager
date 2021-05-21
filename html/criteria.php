<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Manager - Home</title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/criteria.css">
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

    <section>
        <form action="set_criteria.php" method="POST" onsubmit="return edit_criteria()">
            <div id="slider_value">
                25%
            </div>
            <input id="slider" name="slider" type="range" min="25" max="99" value="25" steps="1">
            <div>
                <input type="submit" id="save" name="save" value="SAVE">
            </div>
        </form>
        <script>
            const slideValue = document.getElementById("slider_value");
            const inputSlider = document.querySelector("input");
            inputSlider.oninput = (() => {
                let value = inputSlider.value;
                slideValue.textContent = value + "%";
                slideValue.style.left = (value / 2) + "%";
                slideValue.classList.add("show");
            });
            inputSlider.onblur = (() => {
                slideValue.classList.remove("show");
            });

            function edit_criteria() {
                var r = confirm("Do you want to set new attendance criteria?");
                if (r == false) {
                    return false;
                } else {
                    localStorage.setItem("criteria", document.getElementById("slider").value);
                }
            }
        </script>
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
</body>

</html>