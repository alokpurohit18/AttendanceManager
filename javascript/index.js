let toggle = 0;

function validateLogin() {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    if (email === "" || email === null) {
        alert("Email is required!");
        return false;
    } else if (password === "" || email === null) {
        alert("Password is required!");
        return false;
    } else {
        return true;
    }
}

function validateSignup() {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirm_password = document.getElementById("confirm_password").value.trim();
    let name = document.getElementById("name").value.trim();
    let age = document.getElementById("age").value;

    var i;
    var ch;
    var counter = 0;
    var flag = [false, false, false];
    for (i = 0; i < password.length; i++) {
        ch = password.charCodeAt(i);
        counter++;
        if (ch <= 57 && ch >= 48) {
            flag[0] = true;
        } else if (ch <= 90 && ch >= 65) {
            flag[1] = true;
        } else if (ch <= 122 && ch >= 97) {
            flag[2] = true;
        } else {
            continue;
        }
    }

    let word_count = 1;
    for (i=0; i<name.length; i++){
        ch = name.charAt(i);
        if(ch===' ' && name.charAt(i+1)!=' '){
            word_count++;
        }
    }

    if (email === "" || email === null) {
        alert("Please enter your email!");
        return false;
    } else if (!email.includes(".") || !email.includes("@")) {
        alert("Please enter a valid email!");
        return false;
    } else if (password === "" || email === null) {
        alert("Please choose a password!");
        return false;
    } else if (flag[0] === false || flag[1] === false || flag[2] === false || counter < 8) {
        alert("Password must be atleast 8 characters long and contain atleast 1 uppercase letter, 1 lowercase letter and 1 digit!");
        return false;
    } else if (confirm_password === "" || confirm_password === null) {
        alert("Please confirm your password!");
        return false;
    } else if (password != confirm_password) {
        alert("Passwords do not match!");
        return false;
    } else if (name === "" || name === null) {
        alert("Please enter your name!");
        return false;
    } else if (word_count > 2) {
        alert("Please enter your first name and last name only!");
        return false;
    } else if (age === "" || age === null) {
        alert("Please enter your age!");
        return false;
    } else if (parseInt(age) < 12 || parseInt(age) > 60) {
        alert("Only college children can sign up to use this app!");
        return false;
    } else {
        return true;
    }

}

function login() {
    if (toggle === 0) {
        var valid = validateLogin();
        if (valid) {
            window.location.href = "/html/home.html";
        } else {
            return;
        }
    } else {
        let confirm_password = document.getElementsByClassName("signup_content")[0];
        let name = document.getElementsByClassName("signup_content")[1];
        let age = document.getElementsByClassName("signup_content")[2];
        confirm_password.style.display = "none";
        name.style.display = "none";
        age.style.display = "none";
        toggle = 0;
    }
}

function signup() {
    if (toggle === 1) {
        var valid = validateSignup();
        if (valid) {
            alert("You have been successfully signed up on this app! Please login to your new account!")
            window.location.href = "/html/index.html";
        } else {
            return;
        }
    } else {
        let confirm_password = document.getElementsByClassName("signup_content")[0];
        let name = document.getElementsByClassName("signup_content")[1];
        let age = document.getElementsByClassName("signup_content")[2];
        confirm_password.style.display = "block";
        name.style.display = "block";
        age.style.display = "block";
        toggle = 1;
    }
}