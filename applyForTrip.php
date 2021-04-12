<!--
Author: LEE WAI HOE
Student ID: B1801134
-->
<?php
  require_once("function.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Apply For Trip</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="applyForTrip.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top bg">
                <div class="container">
                <a class="navbar-brand" href="homepage.php">CRS.ORG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-light" aria-hidden="true"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto float-right text-right">
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="manageVolunteerProfile.php">Manage Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="applyForTrip.php">Apply For Trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="viewApplicationStatus.php">View Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="homepage.php">Log Out</a>
                    </li>
                  </ul>
                </div>
                </div>
              </nav>
        </header>

        <div class="main" id="main-section">
            <div class="main-content container">
                <h1>List of Crisis Trips</h1>
                <div id = "searchfunction-main">
                  <form name = "search-form" action = "applyForTrip.php" method = "POST" >
                    <div class="inputbox">
                        <label for="searchbox" style="font-size: 20px; font-weight: 400;">Search By ID or Type or Location</label>
                        <input type="text" placeholder="e.g. 2, flood or Australia" id="searchbox" name="searchbox" autofocus>
                        <input type="submit" id="submit" name="search" value="Search">
                    </div>
                  </form>
                  <?php
                  $servername = "localhost";
                  $username   = "root";
                  $password   = "";
                  $dbname     = "crs";

                  // Create connection
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  $date = date('Y-m-d H:i:s');
                  $sql = "SELECT * FROM crisistrip WHERE cTDate > '$date' AND availableSlots > 0 AND cTID NOT IN (SELECT cTID_fk FROM Application WHERE userID_fk = '".$_SESSION['userID']."')";

                  //The search function
                  if (isset($_POST['search'])){
                    $search_term = $_POST['searchbox'];
                    $sql = "SELECT * FROM crisistrip WHERE (cTDate > '$date' AND availableSlots > 0 AND cTID NOT IN (SELECT cTID_fk FROM Application WHERE userID_fk = '".$_SESSION['userID']."')) AND (cTID = '$search_term' OR cType LIKE '%$search_term%' OR location LIKE '%$search_term%')";
                  }
                  $sql_run = mysqli_query($conn, $sql);
                  ?>
                </div>
                <div id = "tableMain" style="overflow-y: scroll;">
                  <table class="content-table table-bordered table-secondary table table-dark table-responsive">
                    <tr class="header-row" style="background-color: orange; color: black;">
                      <th>CTID</th>
                      <th>Type</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Location</th>
                      <th>Minimum Duration</th>
                      <th>Number of Volunteers</th>
                      <th>Skill Requirement(s)</th>
                      <th>Available Slots</th>
                      <th>Operation</th>
                    </tr>
                    <?php
                    $servername = "localhost";
                    $username   = "root";
                    $password   = "";
                    $dbname     = "crs";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }

                    if ($sql_run -> num_rows > 0){
                      while ($row = $sql_run -> fetch_assoc()){
                        echo "<tr class='content-row'><form action = 'function.php' method = 'POST'>";
                        echo "<td>".$row['cTID']."</td>";
                        echo "<td>".$row["cType"]."</td>";
                        echo "<td>".$row["description"]."</td>";
                        echo "<td>".$row["cTDate"]."</td>";
                        echo "<td>".$row["location"]."</td>";
                        echo "<td>".$row["minDuration"]."</td>";
                        echo "<td>".$row["numVolunteers"]."</td>";
                        echo "<td>".$row["skillRequirement(s)"]."</td>";
                        echo "<td>".$row["availableSlots"]."</td>";
                        //The hidden value is to store the value of cTID for the use of inserting a new row in application table in function.php
                        echo "<td>"."<input type='hidden' name='hidden' value=".$row['cTID'].">"."<input name='action' value='applyForTrip' hidden>"."<input type='submit' class='applyForTrip' id='applyForTrip' name='applyForTrip' value='Apply'>"."</td>";
                        echo "</form></tr>";
                      }
                    }
                    else{
                      echo "0 result";
                    }
                    ?>
                  </table>
                </div>
            </div>
        </div>

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
                              <p><a href="#">CRS@gmail.com</a></p>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

          $(document).ready(function () {
            //=================================================================
            //click on table body
        		$('#tableMain').on('click', 'tr', function() {
        		    //get row contents into an array
                var tableData = $(this).children("td").map(function() {
                  return $(this).text();
                }).get();
                var td = "CTID: " + tableData[0] + "\nType: " + tableData[1] + "\nDescription: " + tableData[2] + "\nDate: " + tableData[3] + "\nLocation: " + tableData[4] + "\nMinimum Duration: " + tableData[5] + "\nNumber of Volunteers: " + tableData[6]
                + "\nSkill Requirement(s): " + tableData[7] + "\nAvailable Slots: " + tableData[8];
                alert(td);
        		});
      		});
        </script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
