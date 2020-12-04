var menuToggle = 0;

function openMenu() {
    let menu = document.getElementsByTagName("menu")[0];
    if (menuToggle === 0) {
        menu.style.display = "block";
        menuToggle = 1;
        document.getElementById("menuButton").style.backgroundColor = "#2ec76e";
    } else {
        menu.style.display = "none";
        menuToggle = 0;
        document.getElementById("menuButton").style.backgroundColor = "#18191f";
    }
}

function setHeader() {
    let months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];
    let currentDate = new Date();
    let currentYear = currentDate.getFullYear().toString();
    let monthIndex = currentDate.getMonth();
    let currentMonth = months[monthIndex];
    let currentDay = currentDate.getDate().toString();

    document.getElementById("year").innerHTML = currentYear;
    document.getElementById("month").innerHTML = currentMonth;
    document.getElementById("day").innerHTML = currentDay;
    document.getElementById("name").innerHTML = localStorage.getItem("name");
}

setHeader();