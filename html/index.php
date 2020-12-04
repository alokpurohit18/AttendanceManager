<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Attendance Manager</title>
	<link rel="stylesheet" href="../css/index.css">
	<link rel="icon" type="image/jpg" href="../media/icon.png">
</head>

<body>
	<div id="container">
		<header>
			<h1>Attendance</h1>
			<div>
				<h2>Manager</h2>
			</div>
		</header>

		<section>
			<form id="login_form" action="home.php" method="POST" onsubmit="return validate_login()">
				<div>
					<input type="text" id="email" name="email" placeholder="Email">
				</div>
				<div>
					<input type="password" id="password" name="password" placeholder="Password">
				</div>
				<input type="submit" class="login_left" id="login" name="login" value="Login">
			</form>

			<button id="signup_dummy" class="signup_right" onclick="validate_signup()">Sign Up</button>

			<form id="signup_form" action="home.php" method="POST" onsubmit="return validate_signup()" style="display: none;">
				<div>
					<input type="text" id="email1" name="email1" placeholder="Email">
				</div>
				<div>
					<input type="password" id="password1" name="password1" placeholder="Password">
				</div>
				<div>
					<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
				</div>
				<div>
					<input type="text" id="name" name="name" placeholder="Name">
				</div>
				<div>
					<input type="number" id="age" name="age" placeholder="Age" min="12" max="60">
				</div>
				<input type="submit" class="signup_right" id="signup" name="signup" value="Sign Up">
			</form>

			<button id="login_dummy" class="login_left" style="display: none;" onclick="validate_login()">Login</button>
			


			<div>
				- Powered by Google -
			</div>

			<script type="text/javascript">
				let toggle = 0;

				function validate_login() {
					let valid = true;
					if (toggle === 0) {
						let email = document.getElementById("email").value.trim();
						let password = document.getElementById("password").value.trim();

						if (email === "" || email === null) {
							alert("Email is required!");
							valid = false;
						} else if (password === "" || email === null) {
							alert("Password is required!");
							valid = false;
						} else {
							valid = true;
						}
						if (valid) {
							localStorage.setItem("default_load","false");
						} else {
							return false;
						}
					} else {
						let login_form = document.getElementById("login_form");
						let signup_form = document.getElementById("signup_form");
						let login_dummy = document.getElementById("login_dummy");
						let signup_dummy = document.getElementById("signup_dummy");
						signup_form.style.display = "none";
						login_dummy.style.display = "none";
						signup_dummy.style.display = "block";
						login_form.style.display = "block";
						toggle = 0;
						return false;
					}
				}

				function validate_signup() {
					let valid = true;
					if (toggle === 1) {
						let email = document.getElementById("email1").value.trim();
						let password = document.getElementById("password1").value.trim();
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
						for (i = 0; i < name.length; i++) {
							ch = name.charAt(i);
							if (ch === ' ' && name.charAt(i + 1) != ' ') {
								word_count++;
							}
						}

						if (email === "" || email === null) {
							alert("Please enter your email!");
							valid = false;
						} else if (!email.includes(".") || !email.includes("@")) {
							alert("Please enter a valid email!");
							valid = false;
						} else if (password === "" || email === null) {
							alert("Please choose a password!");
							valid = false;
						} else if (flag[0] === false || flag[1] === false || flag[2] === false || counter < 8) {
							alert("Password must be atleast 8 characters long and contain atleast 1 uppercase letter, 1 lowercase letter and 1 digit!");
							valid = false;
						} else if (confirm_password === "" || confirm_password === null) {
							alert("Please confirm your password!");
							valid = false;
						} else if (password != confirm_password) {
							alert("Passwords do not match!");
							valid = false;
						} else if (name === "" || name === null) {
							alert("Please enter your name!");
							valid = false;
						} else if (word_count > 2) {
							alert("Please enter your first name and last name only!");
							valid = false;
						} else if (age === "" || age === null) {
							alert("Please enter your age!");
							valid = false;
						} else if (parseInt(age) < 12 || parseInt(age) > 60) {
							alert("Only college children can sign up to use this app!");
							valid = false;
						} else {
							valid = true;
						}
						if (valid) {
							localStorage.setItem("default_load","false");
							//new account is created. So now put all the values of this account into the database under as student.
							alert("You have been successfully signed up on this app!");
						} else {
							return false;
						}
					} else {
						let login_form = document.getElementById("login_form");
						let signup_form = document.getElementById("signup_form");
						let login_dummy = document.getElementById("login_dummy");
						let signup_dummy = document.getElementById("signup_dummy");
						login_form.style.display = "none";
						signup_dummy.style.display = "none";
						signup_form.style.display = "block";
						login_dummy.style.display = "block";
						toggle = 1;
						return false;
					}
				}
			</script>
		</section>
	</div>
</body>
</html>