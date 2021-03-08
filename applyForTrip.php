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

        <div class="main">
            <div class="main-content">
                <h1>List of Crisis Trips</h1>
                <div class="listings container">
                    <div class="list-group">
                        <a href="#alertModal" class="list1 list-group-item list-group-item-action" data-toggle="modal">
                          <div class="d-flex w-100 justify-content-between">
                            <h2 class="mb-1">Flood Rescue</h2>
                          </div>
                          <p class="mb-1">
                            ID: T001
                          </p>
                          <p class="mb-1">
                            Description: Saving the flood victims and provides foods for them
                          </p>
                          <p class="mb-1">
                            Crisis Type: Flood
                          </p>
                          <p class="mb-1">
                            Date: 12/04/2021
                          </p>
                          <p class="mb-1">
                            Location: Hong Kong
                          </p>
                          <p class="mb-1">
                            No of Volunteer: 25
                          </p>
                        </a>
                        <a href="#alertModal" class="list1 list-group-item list-group-item-action" data-toggle="modal">
                          <div class="d-flex w-100 justify-content-between">
                            <h2 class="mb-1">Earthquake Bomba</h2>
                          </div>
                          <p class="mb-1">
                            ID: T002
                          </p>
                          <p class="mb-1">
                            Description: Saving the earthquake victims and provides shelter for them
                          </p>
                          <p class="mb-1">
                            Crisis Type: Earthquake
                          </p>
                          <p class="mb-1">
                            Date: 03/05/2021
                          </p>
                          <p class="mb-1">
                            Location: Japan
                          </p>
                          <p class="mb-1">
                            No of Volunteer: 100
                          </p>
                        </a>
                        <a href="#alertModal" class="list1 list-group-item list-group-item-action" data-toggle="modal">
                          <div class="d-flex w-100 justify-content-between">
                            <h2 class="mb-1">Fire Fighter</h2>
                          </div>
                          <p class="mb-1">
                            ID: T003
                          </p>
                          <p class="mb-1">
                            Description: Saving the wildfire victims and provides foods and shelter for them
                          </p>
                          <p class="mb-1">
                            Crisis Type: Wildfire
                          </p>
                          <p class="mb-1">
                            Date: 29/03/2021
                          </p>
                          <p class="mb-1">
                            Location: Australia
                          </p>
                          <p class="mb-1">
                            No of Volunteer: 100
                          </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModal" data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Caution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to apply for this trip?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="applyMessage()">Yes</button>
              </div>
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

        <script>
          function applyMessage(){
            alert("You have applied in the trip, please check your application status at manage profile section")
          }
        </script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
