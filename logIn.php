<!DOCTYPE html>
<html>
<head>
	<title>Login Homepage</title>
	<link rel="stylesheet" type="text/css" href="loginStyling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- sign up  -->
<div class="bg">
  <div class="container" id="container">
  <div class="form-container sign-up-container">
  <form action="signUp.php" method="post">
  	<h2>Sign Up Credentials</h2>
  	<input  type="email" id="signUpUsername" name="signUpUsername" onkeyup="checkSignUpEmail(); return false;" placeholder="Username" required>
		<div id="errorName1"></div>
	  <input type="password" id="signUpPw" name="signUpPw" minlength="8" onkeyup="checkPass(); return false;" placeholder="Password" required>
		<div id="error1"></div>
		<button type="button" id="signUpBtn" name="signUpBtn" onclick = "userRegister();">SIGN UP</button>
</form>
</div>

<!-- Sign In  -->
<div class="form-container sign-in-container">
	<form action="function.php" method="post">
	<h2>Sign In Here</h2>
	<input  type="email" id="username" name="username" onkeyup="checkSignInEmail(); return false;" placeholder="Username"  required>
	<div id="errorName2"></div>
	<input  type="password" id="password" name="password" placeholder="Password" onkeyup="checkPassword(); return false;" minlength="8" required>
	<div id="error2"></div>
	<input name="action" value="login" hidden>
	<button type="button" name="signInBtn" onclick = "userLogin();" > SIGN IN
	</button>
	</form>
</div>

<!-- overlay-container -->
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>Keep us connected? Sign In Here </p>
			<button class="btn" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello, Welcome to CRS</h1>
			<p> Enter your details and start journey with us</p>
			<button class="btn" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>
</div>

<footer class="text-center text-white" style="background-color: black; ">
 <p class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.7); font-size:18px; padding:auto;">
		© 2021 Copyright: Crisis Relief Services Organization
	</p>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

// validate sign up password
	function checkPass()
	{
		var pass = document.getElementById('signUpPw');
		var message = document.getElementById('error1');
		var goodColor = "#66cc66";
		var badColor = "#ff6666";

		if(pass.value.length > 8)
		{
			pass.style.backgroundColor = goodColor;
			message.style.color = goodColor;
			message.innerHTML = "Good to proceed!"
		}

		else
		{
			pass.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = " Please enter at least 8 characters!"
		}
	}

// validate sign in password
	function checkPassword()
	{
		var pass = document.getElementById('password');
		var message = document.getElementById('error2');
		var goodColor = "#66cc66";
		var badColor = "#ff6666";

		if(pass.value.length > 8)
		{
			pass.style.backgroundColor = goodColor;
			message.style.color = goodColor;
			message.innerHTML = "Good to proceed!"
		}
		else
		{
			pass.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = " Please enter at least 8 characters!"
		}
	}

// validate sign in email
	function checkSignInEmail()
	{
		var email = document.getElementById('username');
		var message = document.getElementById('errorName2');
		var goodColor = "#66cc66";
		var badColor = "#ff6666";
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(email.value.match(filter))
		{
			email.style.backgroundColor = goodColor;

			message.style.color = goodColor;
			message.innerHTML = "Email is valid, please proceed!"
		}
		else
		{
			email.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = " Please enter valid email address!"
		}
}

// validate sign up email
function checkSignUpEmail()
{
	var email = document.getElementById('signUpUsername');
	var message = document.getElementById('errorName1');
	var goodColor = "#66cc66";
	var badColor = "#ff6666";
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(email.value.match(filter))
	{
		email.style.backgroundColor = goodColor;
		message.style.color = goodColor;
		message.innerHTML = "Email is valid, please proceed!"
	}
	else
	{
		email.style.backgroundColor = badColor;
		message.style.color = badColor;
		message.innerHTML = " Please enter valid email address!"
	}
}

// user login fucntion
function userLogin(){

var username = document.getElementById('username').value.toLowerCase();
var password = document.getElementById('password').value.toLowerCase();
var manager = "manager1@gmail.com";
var managerPw = "managerpassword";
var staff = "staff1@gmail.com";
var staffPw = "staffpassword";
var volunteer = "volunteer1@gmail.com";
var volunteerPw = "volunteerpassword";

if (username != '' && password != ''){
		if(username == manager && password == managerPw)
			window.location = "manager.php";
		else if (username == staff && password == staffPw)
			window.location = "staff.php";
		else if (username == volunteer && password == volunteerPw)
			window.location = "volunteerHomepage.php";
		else{
			alert("Invalid username or password, please reenter it again!")
			document.getElementById('username').focus();
			throw new Error("This is not an error. This is just to abort javascript.")
		}
}else{
	alert("Please fill in both username and password")
	document.getElementById('username').focus();
	throw new Error("This is not an error. This is just to abort javascript.")
}

}

// volunteer sign up
function userRegister(){

var username = document.getElementById('signUpUsername').value;
var password = document.getElementById('signUpPw').value;


if (username != '' && password != ''){
			window.location = "homepage.php";
}else{
			alert("Please fill in both username and password")
			document.getElementById('signUpUsername').focus();
			throw new Error("This is not an error. This is just to abort javascript.")
		}
}

</script>


</body>
</html>
