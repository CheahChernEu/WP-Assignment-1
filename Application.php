<!--
Student Name: CHEAH CHERN EU
Student ID: B1801196
-->
<?php
	require_once("function.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Application Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
				<link href='https://fonts.googleapis.com/css?family=Gugi' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="staffCSS.css">
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

                      <!-- User profile !-->
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
                        <a class="nav-link ml-5" href="staff.php">Organize Trip</a>
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

        <div class="main">
            <div class = "container" style="overflow-x:auto;">
                <div class="row pt-5" table-wrapper-scroll-y my-custom-scrollbar>
                    <div class="home-text col-md-12 col-sm-12 mt-5">
                      <?php
                      //connect to mysql
                        $conn = new mysqli("localhost","root","", "crs");
                        if ($conn->connect_error){
                          die("Connection failure: " . mysqli_connect_error());
                        }
                        // use table
                        $application = "use application";
												$crisisTrip = "use crisistrip";
                        $conn->query($application);
												$conn->query($crisisTrip);
												// Getting the ctid from the function.php
												$tripid = $_SESSION['cTID'];
												//select all based on the ctid
												$sql = "SELECT * FROM application inner join crisistrip WHERE application.cTID_fk = $tripid and crisistrip.cTID = $tripid";

                        $result = mysqli_query($conn, $sql);
                        //fetch the data from crs database
                        $resultArray = mysqli_query($conn, $sql) or die("Database error existed:". mysqli_error($conn));
                        //if application table doesnt have data, display the message
                        if (mysqli_num_rows($result) == 0 ) { ?>
                          <h2>There are no application currently!</h2>
                        <?php }
                        else {
                        ?>
                        <!-- if have application -->
                        <h3 style="font-family: 'Gugi'; font-size:30px;">Lists of Application Table</h3>

                        <!-- All application that come with the crisis trip !-->

                        <table id="table-row" class="table table-bordered table-secondary table table-dark col-md-12 col-sm-5 mt-5 " id="cTripTable" style="margin:auto;">
													 <form action="function.php" method="POST" class="form-control">
                            <thead>
                            <tr class=" table-warning" style="color:black;" >
                              <th class="text-center">Select Checkbox</th>
                              <th class="text-center">Application ID</th>
                              <th class="text-center">Date</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Remark(s)</th>
                              <th class="text-center">View <br> Document</th>
                            </tr>
                            </thead>
                            <tbody>
															<?php
                              // get each row of application into from application table
															while($row = mysqli_fetch_assoc($resultArray)):
                              ?>
                              <tr>
																<form class="" action="" method="post">
		                                <td align="middle">
				                                <!-- to select application!-->
																				<input type="checkbox" id="checkboxApp<?php echo $row['applicationID'];?>" onchange="isChecked(this, 'viewDoc<?php echo $row['applicationID'];?>')" name="checkboxApp" value="<?php echo $row['applicationID'];?>" required>
		                                </td>
		                                <td align="center"><?php echo $row['applicationID'];?></td>
		                                <td align="center"><?php echo $row['applicationDate'];?></td>
		                                <td align="center"><?php echo $row['applicationStatus'];?></td>
		                                <td align="center"><?php echo $row['remarks'];?></td>
		                                <td align="middle">
																			<!-- call the fucntion from function.php -->
																			<input name="action" value="viewDoc" hidden>
		                                 	<!-- to view document !-->
		                                	<button type="submit" id="viewDoc<?php echo $row['applicationID'];?>" name="viewDoc" disabled class="btn btn-info">View Document</button>
		                                </td>
																</form>
                              </tr>
														</form>
	                         <?php endwhile;?>
                          </tbody>
                        </table>
                      	<?php } ?>
                      <br>
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





        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

				<!-- to enable and disable the button with checkbox -->
				<script type="text/javascript">
						function isChecked(checkbox, viewDoc) {
							document.getElementById(viewDoc).disabled = !checkbox.checked;
						}
				</script>
    </body>
</html>
