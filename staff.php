
<!DOCTYPE html>
<html>
    <head>
        <title>Staff Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" type="text/css" href="staffCSS.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top bg">
                <div class="container">
                <a class="navbar-brand" href="#">CRS.ORG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-light" aria-hidden="true"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto float-right text-right">
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="#aboutus">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="#picture">Picture Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="#staff">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5" href="homepage.php">Log Out</a>
                    </li>
                  </ul>
                </div>
                </div>
              </nav>
        </header>

        <section id = "home">
            <video controls="" autoplay="" muted="" loop="">
                <source src="naturaldisastervideo.mov" type="video/mp4">
            </video>

            <div class = "container">
                <div class="row pt-5">
                    <div class="home-text col-mid-8 col-sm-12 mt-5">
                        <h1>We value life above everything</h1>
                        <p>Chance to be a citizen HERO</p>
                        <p>Together working for the greater good</p>
                        <p>Let us stay united!</p>
                    </div>
                </div>
            </div>

            <div class="overlay"></div>
        </section>

        <section id="aboutus">
            <div class="container py-5">
                <div class="row py-5 my-5">
                    <div class="aboutus-text text-center py-5 col-md-10 col-sm-12 mx-auto">
                        <h1 class="pb-3">About Us</h1>
                        <h2>Crisis Relief Services (CRS) is an NGO (Non-Government Organization) that aims to help people who are facing crises arising from natural disasters such as flood and earthquakes.</h2>
                    </div>
                </div>
            </div>
        </section>

        <section id="picture" class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="picture-item">
                            <a href="image1.jpg">
                                <img src="image1.jpg" alt="Image1" class="img-fluid">
                                <div class="picture-overlay">
                                  <div class="picture-info">
                                    <h1>Volunteers do not necessarily have the time,<br> they just have the heart</h1>
                                    <h3> Click to pop!</h3>
                                  </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="picture-item">
                            <a href="image2.jpg">
                                <img src="image2.jpg" alt="Image1" class="img-fluid">
                                <div class="picture-overlay">
                                  <div class="picture-info">
                                    <h1>"Only a life lived for others is worth living</h1>
                                    <h3> Click to pop!</h3>
                                  </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="picture-item">
                            <a href="image3.jpg">
                                <img src="image3.jpg" alt="Image1" class="img-fluid">
                                <div class="picture-overlay">
                                  <div class="picture-info">
                                    <h1>Volunteers are not paid, not because they are worthless, <br>but because they are priceless</h1>
                                    <h3> Click to pop!</h3>
                                  </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="picture-item">
                            <a href="image4.jpg">
                                <img src="image4.jpg" alt="Image1" class="img-fluid">
                                <div class="picture-overlay">
                                  <div class="picture-info">
                                    <h1>Volunteer, <br> Lend a hand and make a difference</h1>
                                    <h3> Click to pop!</h3>
                                  </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="staff" class="h-100">
            <div class="container py-3">
                <h1 class="text-center">Meet Our Staff</h1>
                <!-- Swiper -->
                <div class="swiper-container py-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar1.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Johan Yu Han<br><span>CRS Manager</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar2.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Amelia Lee<br><span>CRS Manager</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar3.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Daniel Cheah Hao Ming<br><span>CRS Staff</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar4.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Kenin Tan Hui Ling<br><span>CRS Staff</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar5.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Ismail<br><span>CRS Staff</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar6.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Leonardo Oh Feng Heng<br><span>CRS Staff</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar7.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Michelle Yong Hui Wenn<br><span>CRS Staff</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar8.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Lim Hui Mei<br><span>CRS Staff</span></h3>
                            </div>
                        </div>
                        <div class="swiper-slide col-lg-3 col-md-6 col-sm-12">
                            <img src="avatar9.png" class="img-fluid">
                            <div class="text pt-2">
                                <h3>Jonathan Lee Jiun Sheng<br><span>CRS Staff</span></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>


<!-- manage trip application -->
        <div class="modal fade" id="manageModal" tabindex="-1" role="dialog" aria-labelledby="manageModalLabel" aria-hidden="true">
          <div class="modal-dialog " role="document" >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="manageModalLabel">Manage Trip Application </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th id="tripID" scope="col">Trip ID</th>
                        <th scope="col">Trip Date</th>
                        <th scope="col">Trip Type</th>
                        <th scope="col">Skills <br> Requirements </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>5/8/2021</td>
                        <td>Tsunami</td>
                        <td>swimming</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>15/4/2021</td>
                        <td>Landslide</td>
                        <td>emergency rescue skills</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>29/6/2021</td>
                        <td>wildfire</td>
                        <td>Firefighter rescue skills</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3" style="color: black; font-size: 20px;font-weight:bold;"> Please enter Trip ID : </span>
                    <input type="number" name="tripInput" id="tripInput" min="1" required style="margin-left:20px;">
                  </p>
                </div>
                <div class="modal-footer">

                <button name="submit" id="submit" type="button" class="btn btn-primary" value="Submit" data-toggle="modal" data-target="#appModal"  data-dismiss="modal" onsubmit="inputTripBlankValidation()">Submit</button>

                <button name="close" type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- select application -->
                <div class="modal fade" id="appModal" tabindex="-1" role="dialog" aria-labelledby="appModalLabel" aria-hidden="true">
                  <div class="modal-dialog " role="document" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="appModalLabel">Select Application</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Application ID</th>
                                <th scope="col">Application Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">remarks</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>4/8/2021</td>
                                <td>New</td>
                                <td>-</td>
                              </tr>
                            </tbody>
                          </table>
                          <p class="d-flex justify-content-center align-items-center">
                            <span class="me-3" style="color: black; font-size: 20px;font-weight:bold;"> Input application ID : </span>
                            <input type="number" name="inputID" id="inputID" style="margin-left:20px;">
                          </p>
                          <p class="d-flex justify-content-center align-items-center">
                            <span class="me-3" style="color: black; font-size: 20px;font-weight:bold;"> Update Status (rejected/accepted) :
                            </span>
                            <input type="text" name="updateStatus" id="updateStatus" placeholder="View documents first" style="margin-left:20px;">
                          </p>
                        </div>

                        <div class="modal-footer">

                        <button name="update" id="update" type="button" class="btn btn-primary" value="update" data-toggle="modal" data-target="#updateModal"  data-dismiss="modal" onclick="checkStatus()">Submit</button>

                        <button name="close" type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                      </div>
                    </div>
                  </div>
                </div>

        <!-- update status and remakrs -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                  <div class="modal-dialog " role="document" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Document Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Document ID</th>
                                <th scope="col">Certificate Expiry Date</th>
                                <th scope="col">Passport Expory Date</th>
                                <th scope="col">Document Files </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>2/4/2021</td>
                                <td>4/8/2021</td>
                                <td>files</td>
                              </tr>
                            </tbody>
                          </table>
                        <div class="modal-footer">
                        <button name="close" type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#appModal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



<!-- organize trip -->
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
                <form name="tripForm" id="tripForm" action="manager.html" method="POST">
                  <div class="form-group">
                    <label for="tripDate" class="col-form-label">Trip Date :</label>
                    <input type="date" class="form-control" id="tripDate" placeholder="trip date" required>
                  </div>
                  <div class="form-group">
                    <label for="location" class="col-form-label">Location :</label>
                    <input type="text" id="location" class="form-control" placeholder="location" required>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-form-label">Description :</label>
                    <textarea type="text" class="form-control" id="description" placeholder="description" required rows="8" cols="80"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="cType" class="col-form-label">Crisis Type:</label>
                    <input type="text" class="form-control" id="cType" placeholder="crisis type" required>
                  </div>
                  <div class="form-group">
                    <label for="numVolunteers" class="col-form-label">Amount Volunteer Required :</label>
                    <input type="number" class="form-control" id="numVolunteers" placeholder="numVolunteers" min="1" required>
                  </div>
                </form>
              </div>
              <div class="modal-footer">

                <button name="submit" id="submit" type="button" class="btn btn-primary" value="Submit"  onclick=" tDateValidation(),locationBlankValidation(),descBlankValidation(),cTypeBlankValidation(),numVBlankValidation(), numVGreater1()">Submit</button>

                <button name="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


        <section id="features" class="text-center text-white">
          <div class="container p-4 pb-0">
          <h2>Create Trip / Manage Trip Application</h2>
      <!-- Section: CTA -->
          <section class="">

            <p class="d-flex justify-content-center align-items-center">
              <span class="me-3" style="color: black; font-size: 26px;font-weight:bold;">Organize Trip : </span>
              <button type="button" id="btnOrganize" class="btn btn-outline-light btn-rounded" data-toggle="modal" data-target="#organizeModal">Organize Trip Here!</button>
            </p>
            <p class="d-flex justify-content-center align-items-center">
              <span class="me-3" style="color: black; font-size: 26px;font-weight:bold; padding-bottom:20px;">Manage Application :  </span>
              <button type="button" id="btnManage" class="btn btn-outline-light btn-rounded" data-toggle="modal" data-target="#manageModal">Manage Trip Application Here!</button>
            </p>
          </section>
      <!-- Section: CTA -->
          </div>
        </section>





        <section id=contact>
          <footer class="py-5">
              <div class="container" py-5>
                  <div class="row">
                      <div class="col-md-5 col-sm-6">
                          <h2> CRS Sdn. Bhd.</h2>
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
                              <p>Crisis Relief Services (CRS) is an NGO (Non-Government Organization) that aims to help people who are facing crises arising from natural disasters such as flood and earthquakes.</p>
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

        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script>
            $(window).scroll(function(){
                $('nav').toggleClass('scrolled',$(this).scrollTop()>50)
            })
        </script>
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 105,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            });

            // Only allow today as the max date can be pick, and dsiable future date to be pick from.
            var date = new Date().toISOString().slice(0,10);

            //To restrict future date
              $('#tripDate').attr('min', date);

            //validation on blank
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

            function cTypeBlankValidation(){
              if(document.getElementById('cType').value == ''){
                alert("Crisis Trip input cannot be blank")
                document.getElementById('cType').focus();
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

            //check number of volunteers must be greater than 1
            function numVGreater1(){
              if(document.getElementById('numVolunteers').value < 1){
                alert("Number of volunteers required cannot be less than 1")
                document.getElementById('numVolunteers').focus();
                throw new Error("This is not an error. This is just to abort javascript.")
              }
            }

            // trip input validation
            function inputTripBlankValidation(){
              if(document.getElementById('tripInput').value == ''){
                alert("Please enter the trip ID otherwise Please click close to exit")
                document.getElementById('tripInput').focus();
                throw new Error("This is not an error. This is just to abort javascript.")
              }
            }


            // check the status input
            function checkStatus(){

              var result = document.getElementById('updateStatus').value.toLowerCase();
              var reject = "rejected";
              var accept = "accepted";
              if(!(result === reject || result === accept)){
                alert("Please enter the status correctly OR pls evaluate the documents first")
                document.getElementById('updateStatus').focus();
                throw new Error("This is not an error. This is just to abort javascript.")
              }
            }




        </script>
    </body>
</html>
