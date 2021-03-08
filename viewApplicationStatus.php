<!DOCTYPE html>
<html>
    <head>
        <title>View Application Status</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="viewApplicationStatus.css">
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

        <section class="main">
            <div class="main-content">
                <h1>List of Applications</h1>
                <div class="listings container">
                    <div class="list-group">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h3 class="mb-1">Flood Rescue</h3>
                                <p class="mb-1">Date: 12/04/2021</p>
                                <p class="mb-1">Description: Saving the flood victims and provides foods for them</p>
                                <p class="mb-1">Application: Accepted</p>
                            </li>
                            <li class="list-group-item">
                                <h3 class="mb-1">Earthquake Bomba</h3>
                                <p class="mb-1">Date: 03/05/2021</p>
                                <p class="mb-1">Description: Saving the earthquake victims and provides shelter for them</p>
                                <p class="mb-1">Application: Rejected</p>
                                <p class="mb-1">Remarks: Please update your documents at the manage profile section</p>
                            </li>
                            <li class="list-group-item">
                                <h3 class="mb-1">Fire Fighter</h3>
                                <p class="mb-1">Date: 29/03/2021</p>
                                <p class="mb-1">Description: Saving the wildfire victims and provides foods and shelter for them</p>
                                <p class="mb-1">Application: Accepted</p>
                            </li>
                            <li class="list-group-item">
                                <h3 class="mb-1">Earth Protectors</h3>
                                <p class="mb-1">Date: 20/01/2021</p>
                                <p class="mb-1">Description: Saving the earthquake victims and provides clothes for them</p>
                                <p class="mb-1">Application: Accepted</p>
                            </li>
                            <li class="list-group-item">
                                <h3 class="mb-1">Wildlife Rescue</h3>
                                <p class="mb-1">Date: 06/07/2021</p>
                                <p class="mb-1">Description: Saving the wildfire victims and provides a temporary shelter for the wild animals</p>
                                <p class="mb-1">Application: Rejected</p>
                                <p class="mb-1">Remarks: Please update your documents at the manage profile section</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

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
    </body>
</html>
