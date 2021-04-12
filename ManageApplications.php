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
        <title>ManageApplications Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
				<link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
				<link href='https://fonts.googleapis.com/css?family=Gugi' rel='stylesheet'>

        <link rel="stylesheet" type="text/css" href="managerStaff.css">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top bg">
                <div class="container" >
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

                        <a class="nav-link ml-5" href="staff.php">Organize Trip</a>
                    </li>
                    <li class="nav-item">
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
            <div class = "container " style="margin:auto;margin-top:150px;min-width:82%;">
                <div class="row" >
                    <div class="home-text col-xl-12 col-lg-11 col-md-12 col-sm-12">
                      <?php
                      //connect to mysql
                        $conn = new mysqli("localhost","root","", "crs");
                        if ($conn->connect_error){
                          die("Connection failure: " . mysqli_connect_error());
                        }

                        //use table
                        $crisisTrip = "use crisistrip";
                        $conn->query($crisisTrip);

                        $sql = selectTrip();
												// Query processing, and object return
                        $result = mysqli_query($conn, $sql);

                        //fetch the data from crs database
                        $resultArray = mysqli_query($conn, $sql) or die("Database error existed:". mysqli_error($conn));
                        //if crisis trip table doesnt have data, display the message
                        if (mysqli_num_rows($result) == 0) { ?>
                          <h2>There are no crisis trip currently!</h2>
                        <?php //if have crisis trip
                        } else {
													echo manageApp();
                        ?>

                        <h2 style="font-family: 'Gugi'; font-size:40px; color:black; font-weight:bolder; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
												line-height: 40px;
											 ">Manage Applications</h2>
                        <h3 >Lists of Crisis Trips Table</h3>

                        <!-- All crisis trip that staff in-charge !-->

                        <table class="table table-bordered table-secondary table table-dark" id="tripTable">
                          <form action="function.php" method="POST" class="form-control">
                            <thead >
                            <tr class=" table-warning" style="color:black;" >
                              <th class="text-center">Select Checkbox</th>
                              <th class="text-center">Trip ID</th>
                              <th class="text-center">Trip Date</th>
                              <th class="text-center">Trip Type</th>
                              <th class="text-center">Location</th>
                              <th class="text-center">Skill Requirements</th>
                              <th class="text-center">Available Slots</th>
                              <th class="text-center">View <br> Applications</th>
                              <th class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // get each row of related crisis trip from database table into webpage table
                            while($row = mysqli_fetch_assoc($resultArray)):
                            ?>
                            <tr>
                            	<form  class="" action="" method="post">
	                              <td align="middle">
	                              <!-- to select trip !-->
	                              <input type="checkbox" name="checkbox" onchange="isChecked(this, 'viewApp<?php echo $row['cTID'];?>', 'delete<?php echo $row['cTID'];?>')" value="<?php echo $row['cTID'];?>" required>
	                              </td>
	                              <td align="center"><?php echo $row['cTID'];?></td>
	                              <td align="center"><?php echo $row['cTDate'];?></td>
	                              <td align="center"><?php echo $row['cType'];?></td>
	                              <td align="center"><?php echo $row['location'];?></td>
	                              <td align="center"><?php echo
	                              $row['skillRequirement(s)'];?></td>
	                              <td align="center"><?php echo $row['availableSlots'];?></td>
	                              <td align="middle">
	                                <!-- to view applications !-->
																	<input name="action" value="viewApp" hidden>
	                                <a href="Application.php"><button type="submit" id="viewApp<?php echo $row['cTID'];?>" name="viewApp" disabled 	class="btn btn-info">View Application</button>
																</a>
	                              </td>
	                              <td align="middle">
																	<!-- call the function from function.php -->
																	<input name="action" value="manageApp" hidden>
	                                <!-- to delete trip if neccessarily !-->
	                                <input type="submit" id="delete<?php echo $row['cTID'];?>" name="delete" value ="Delete" disabled class="btn btn-info" style="background:red;">

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
        <script type="text/javascript">

        function isChecked(checkbox, viewApp, deleteApp) {
          document.getElementById(viewApp).disabled = !checkbox.checked;
          document.getElementById(deleteApp).disabled = !checkbox.checked;
        }

      </script>
    </body>
</html>
