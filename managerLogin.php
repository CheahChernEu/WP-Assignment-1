<!DOCTYPE html>
<html>
<head>
	<title>Login Homepage</title>
	<link rel="stylesheet" type="text/css" href="loginStyling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="bg">
  <div class="container" id="container">
  <div class="form-container sign-up-container">
  <form action="signUp.php" method="get">
  	<h2>Sign Up Credentials</h2>
  	<input  type="email" id="" name="signUpUsername" placeholder="Username" required>
	  <input type="password" id="signUpPw" name="password" placeholder="Password"  minlength="8" required>
		<input  list="options" name="roleOptions" placeholder="Sign Up as" required>

		<datalist id="options">
  		<option value="Manager">
  		<option value="Staff">
  		<option value="Volunteer">
	  </datalist>
	  <button id="signUpBtn">SignUp</button>
</form>
</div>
<div class="form-container sign-in-container">
	 <form action="signIn.php" method="post">
		<h2>Sign In Here</h2>
    <input  type="number" id="userID" name="userID" min="1" placeholder="Manager ID" required>
	<input  type="email" id="username" name="username" placeholder="Username"  value="manager123@gmail.com" required>
	<input  type="password" id="password" name="password" placeholder="Password"value = "1234567@managerID"  minlength="8" required>
	<button id="signInBtn">Sign In</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>Keep us connected? Sign In Here </p>
			<button class="btn" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello, Welcome to HELP Bomba</h1>
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



</script>


</body>
</html>
