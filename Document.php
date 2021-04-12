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
        <title>Document Info</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="Document.css">
    </head>
    <body style="background: url(background5.jpg) fixed; background-size: cover;background-position: center center;position: relative;">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top bg">
                <div class="container">
                <a class="navbar-brand" href="homepage.php">CRS.ORG</a>
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

        <?php
        //connect to mysql
          $conn = new mysqli("localhost","root","", "crs");
					// show error if connection failed
          if ($conn->connect_error){
            die("Connection failure: " . mysqli_connect_error());
          }


          // use table
          $application = "use application";
          $document = "use document";
          $conn->query($application);
          $conn->query($document);
					// session from function.php
          $applicationID = $_SESSION["applicationID"];
					// Select all where the documentID is same with the application documentID
          $sql = "SELECT * FROM document WHERE documentID = (SELECT documentID_fk FROM application WHERE applicationID = $applicationID)";
          $resultDoc = mysqli_query($conn, $sql);

          //fetch the data from document database
          $resultRes = mysqli_query($conn, $sql) or die("Document Database error existed:". mysqli_error($conn));

          //if document doesnt have data, display the message
          if (mysqli_num_rows($resultDoc) == 0 ) { ?>
            <h2>There are no document currently!</h2>
          <?php }
          else {
          ?>
          <?php   // get each row of document into table
            while($row = mysqli_fetch_assoc($resultRes)):
          ?>
                  <div class="container" id="form">
                    <form action="function.php" method="post" >
                      <fieldset>
                        <legend style="font-weight:bold; text-center:center;">Document Information:</legend>
                      <div class="row">
                        <div class="col-25">
                           <label for="applicationID" class="col-sm-6 col-lg-4 col-form-label"> Application ID*</label>
                        </div>
                        <div class="col-75">
                          <input type="text" class="form-control" name="applicationID" value="<?php echo $_SESSION["applicationID"];?>" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="documentID" class="col-sm-6 col-lg-4 col-form-label"> Document ID* </label>
                        </div>
                        <div class="col-75">
                          <input type="text" class="form-control" name="documentID" value="<?php echo  $row['documentID'];?>" readonly>
                        </div>
                      </div>
                			<div class="row">
                        <div class="col-25">
                          <label for="documentID" class="col-sm-6 col-lg-4 col-form-label"> Document Type* </label>
                        </div>
                        <div class="col-75">
                          <input type="text" class="form-control" name="documentType" value="<?php echo  $row['documentType'];?>" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                            <label for="expiryDate" class="col-sm-6 col-lg-4 col-form-label"> Expiry Date* </label>
                        </div>
                        <div class="col-75">
                          <input type="text" class="form-control" name="expiryDate" value="<?php echo $row['expiryDate'];?>" >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="docImages" class="col-sm-6 col-lg-4 col-form-label">Document Picture* </label>
                        </div>
                        <div class="col-75">
                          <div>
                              <?php echo $row['docImage'];?>
                              <div class="">
                                    <?php echo "<img src='images/".$row['docImage']."'>";?>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                            <label for="status" class="col-sm-6 col-lg-4 col-form-label">Status*</label>
                        </div>
                        <div class="col-75">
                					<select name="statusUpdate" id="statusUpdate" style="margin-top:10px;margin-bottom: 10px; width:20%;height: 45px;">
                    				<option value="ACCEPTED">ACCEPTED</option>
                    				<option value="REJECTED">REJECTED</option>
                  				</select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                            <label for="remarks" class="col-sm-6 col-lg-4 col-form-label">Remark(s)*</label>
                        </div>
                        <div class="col-75">
                          <input type="text"
                          class="form-control" name="remarks" id="remarks" placeholder="remarks on documents" required>
                      	</div>
											</div>
                      <div class="row" id="btn" >
                        <a href="Application.php"><button type="button" id="Back" value="Back">Back</button></a>
												<!-- call function in the function.php -->
                          <input name = "action" value="updateApp" hidden>
                          <button type="submit" id="Submit" value="Update" name="Update"  onclick="checkStatus(), remarksBlankValidation();">Update</button>
                      </div>
                    </fieldset>
                  </form>
                </div>
          		<?php endwhile;?>
          	<?php } ?>

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

        <script>
						// check the status's characters match or not
            function checkStatus(){
              var result = document.getElementById('statusUpdate').value.toUpperCase();
              var reject = "REJECTED";
              var accept = "ACCEPTED";
              if(!(result === reject || result === accept)){
                alert("Please only choose 'REJECTED' or 'ACCEPTED (Required)'")
                document.getElementById('statusUpdate').focus();
                throw new Error("This is not an error. This is just to abort javascript.")
              }
            }

						// remarks input blank validation
    				function remarksBlankValidation(){
    	        if(document.getElementById('remarks').value == ''){
    	          alert("Remark(s) cannot be blank!")
    	          document.getElementById('remarks').focus();
    	          throw new Error("This is not an error. This is just to abort javascript.")
    	        }
    	      }

        </script>
    </body>
</html>
