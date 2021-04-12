<!--
Student Name: CHEAH CHERN EU
Student ID: B1801196
-->
<?php
	require_once("function.php");
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crs";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Staff Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="managerStaff.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top bg">
                <div class="container">
                <a class="navbar-brand" href="staff.php">CRS.ORG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-light" aria-hidden="true"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto float-right text-right">
                    <li class="nav-item ml-4">

                      <!-- User profile  !-->
                       <div class="dropdown" style="width:auto;height:auto;">
                        <button type="button" class="navbar-brand btn btn-dark dropdown-toggle" data-toggle="dropdown"
                        <i onclick="dropdown(this)" style="width:100px; height:auto; font-size:15px; color:white;"> Profile </i>
                         </button>

                         <!-- Dropdown profile info !-->
                        <div class="dropdown-menu">
													<a class="dropdown-item" href="#"> ID: <?php echo $_SESSION["userID"]; ?> </a>
                          <a class="dropdown-item" href="#"> Username: <?php echo $_SESSION["username"]; ?> </a>
                          <a class="dropdown-item" href="#"> Name: <?php echo $_SESSION["name"]; ?> </a>
                          <a class="dropdown-item" href="#"> Position: <?php echo $_SESSION["position"]; ?> </a>
                        </div>
                      </div>
                    </li>
                    <li class="nav-item">
												<!-- href for organize trip -->
                        <a class="nav-link ml-5" data-toggle="modal" data-target="#organizeModal">Organize Trip</a>
                    </li>
                    <li class="nav-item">
											<!-- href for manage applications -->
                        <a class="nav-link ml-5" href="ManageApplications.php" >Manage Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="homepage.php">Log Out</a>
                    </li>
                  </ul>
                </div>
                </div>
              </nav>
        </header>

				<div class="main" id="main-background">
				    <div class = "container">
				        <div class="row pt-3">
				            <div class="home-text col-mid-8 col-sm-12 mt-5">
				              <!-- Use SESSION to store and display the name of the user when log in -->
				                <h1>Welcome Back! <?php echo $_SESSION["name"]; ?> </h1>
				                <p>Together we achieve MORE</p>
				                <ul class="section-btn">
				                  <button type="button" data-toggle="modal" data-target="#organizeModal"><span data-hover="Organize Trip Here!">Organize Trip Here!</span></button>
				                </ul>
				            </div>
				        </div>
				    </div>
				</div>

				<!-- footer -->
        <section id="contact">
            <footer class="py-5">
                <div class="container" py-5>
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <h2>CRS Sdn. Bhd.</h2>
                            <p>Wisma Help, Jalan Dungun, Bukit Damansara,<br>50490 Kuala Lumpur,<br>Wilayah Persekutuan Kuala Lumpur</p>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="footer-info">
                                <h2>Keep In Touch</h2>
                                <p><a href="#">016-1234567</a></p>
                                <p><a href="#">crs@gmail.com</a></p>
                                <p><a href="#">Our Location</a></p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="footer-info">
                                <h2>About Us</h2>
                                <p>CRS is an NGO (Non-Government Organization) that aims to help people who are facing crises arising from natural disasters such as flood and earthquakes.</p>
                            </div>
                        </div>

                        <div class="col-md-12 col-12 text-center">
                            <div class="copyright-text">
                                <p>Copyright @ 2021 <a href="#">CRS Organization</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>


	<!-- organize trip modal-->
  <form name="tripForm" id="tripForm" action="function.php" method="POST">
      <div class="modal fade" id="organizeModal" tabindex="-1" role="dialog" aria-labelledby="organizeModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document" >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="organizeModalLabel">Create New Crisis Trip</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="tripDate" class="col-form-label">Trip Date :</label>
                  <input type="date" class="form-control" id="tripDate" name="tripDate"  placeholder="trip date" required>
                </div>
                <div class="form-group">
                  <label for="location" class="col-form-label">Location :</label>
                  <input type="text" id="location" name="location" class="form-control" placeholder="location" required>
                </div>
                <div class="form-group">
                  <label for="description" class="col-form-label">Description :</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="description" required rows="8" cols="80"></textarea>
                </div>
                <div class="form-group">
                  <label for="cType" class="col-form-label">Crisis Type:</label>
									<!-- Trip selection dropdown -->
										<select name="cType" id="cType" style="margin-top:10px; width:22%;height: 45px;">
					    				<option value="Flood">Flood</option>
					    				<option value="Tsunami">Tsunami</option>
											<option value="Earthquake">Earthquake</option>
					    				<option value="Tornadoes">Tornadoes</option>
											<option value="Bushfire">Bushfire</option>
					    				<option value="Landslides">Landslides</option>
					  				</select>
                </div>
                <div class="form-group">
                  <label for="minDuration" class="col-form-label">Minimum Duration (Days):</label>
                  <input type="number" class="form-control" id="minDuration" name="minDuration" placeholder="min duration" required>
                </div>
                <div class="form-group">
                  <label for="skillReq" class="col-form-label">Skill Requirement(s):</label>
                  <input type="text" class="form-control" id="skillReq" name="skillReq" placeholder="skill requirements" required>
                </div>
                <div class="form-group">
                  <label for="numVolunteers" class="col-form-label">Number of Volunteers Required :</label>
                  <input type="number" class="form-control" id="numVolunteers" name="numVolunteers" placeholder="num volunteers" min="1"  required>
                </div>
            </div>
            <div class="modal-footer">
              <input name="action" value="createTrip" hidden>
              <input name="submit" id="submit" type="submit" class="btn btn-primary" value="Submit">
              <button name="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </form>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- javascript -->
      <script type="text/javascript">
        // Only allow today as the min date can be pick, and dsiable past date to be pick from.
      	var date = new Date().toISOString().slice(0,10);
      	//To restrict past date
        $('#tripDate').attr('min', date);
			// blank validation for each input sections
      function tDateValidation(){
        if(document.getElementById('tripDate').value == ''){
          alert("Trip Date input cannot be blank")
          document.getElementById('tripDate').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

      function locationBlankValidation(){
        if(document.getElementById('location').value == ''){
          alert("Location input cannot be blank")
          document.getElementById('location').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

      function descBlankValidation(){
        if(document.getElementById('description').value == ''){
          alert("Description input cannot be blank")
          document.getElementById('description').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

      function minDBlankValidation(){
        if(document.getElementById('minDuration').value == ''){
          alert("Minimum duration cannot be blank")
          document.getElementById('minDuration').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

      function skillReqBlankValidation(){
        if(document.getElementById('skillReq').value == ''){
          alert("Skill Requirement cannot be blank")
          document.getElementById('skillReq').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

      function numVBlankValidation(){
        if(document.getElementById('numVolunteers').value == ''){
          alert("Number of volunteers required input cannot be blank")
          document.getElementById('numVolunteers').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

      // Check the amount of volunteer to be greater than 1
      function numVGreater1(){
        if(document.getElementById('numVolunteers').value < 1){
          alert("Number of volunteers required cannot be less than 1")
          document.getElementById('numVolunteers').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

			//Check the min duration to be greater than 1
      function numDGreater1(){
        if(document.getElementById('minDuration').value < 1){
          alert("Minimum duration of the trip cannot be less than 1")
          document.getElementById('minDuration').focus();
          throw new Error("This is not an error. This is just to abort javascript.")
        }
      }

      // Validate the description, location and crisis trip type only consists of letters
      function descriptionValidation(){
          var letter = /^[a-z]*$/i;
          if((!(document.getElementById('description').value).match(letter))){
              alert("Please fill in input letters only in the Description section")
              document.getElementById('description').focus();
              throw new Error("This is not an error. This is just to abort javascript.")
          }
      }

			// validate the characters only for location
      function locationValidation(){
          var letter = /^[a-z]*$/i;
          if((!(document.getElementById('location').value).match(letter))){
              alert("Please fill in input letters only in the Location section")
              document.getElementById('location').focus();
              throw new Error("This is not an error. This is just to abort javascript.")
          }
      }

				//event property
			document.getElementById('submit').onsubmit = tDateValidation,locationBlankValidation,descBlankValidation,numVBlankValidation, numVGreater1,minDBlankValidation,skillReqBlankValidation,numDGreater1,descriptionValidation,locationValidation;

        </script>
    </body>
</html>
