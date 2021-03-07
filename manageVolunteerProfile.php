<!DOCTYPE html>
<html>
    <head>
        <title>ManageVolunteerProfile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="managevolunteerprofile.css">
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

        <section id="form">
        <div class="form col-6 col-md-6 col-sm-6">
            <div class="row">
            <h2>Manage Profile</h2>
            <p>*Required fields</p>
            <form name="volunteerform" action="managevolunteerprofile.html" enctype="multipart/form-data">
                <div class="inputbox">
                    <label for="oldpassword">Old Password*</label>
                    <input type="password" placeholder="Old password" id="oldpassword" name="oldpassword" required autofocus>
                </div>

                <div class="inputbox">
                    <label for="newpassword">New Password*</label>
                    <input type="password" placeholder="New password" id="newpassword" name="newpassword" required>
                </div>

                <div class="inputbox">
                    <label>Name*</label>
                    <input type="text" placeholder="Name" id="name" name="name" required>
                </div>

                <div class="inputbox">
                    <label>Phone No.*</label>
                        <input type="tel" placeholder="Phone number" id="phoneno" name="phoneno" required>

                </div>

                <div class="docinputbox">
                    <label>Document Type*</label>
                    <div>
                        <label for="visa">VISA</label>
                        <input type="radio" name="documenttype" id="visa" value="visa" required>
                        <label for="passport">PASSPORT</label>
                        <input type="radio" name="documenttype" id="passport" value="passport" required>
                        <label for="certificate">CERTIFICATE</label>
                        <input type="radio" name="documenttype" id="certificate" value="certificate" required>
                    </div>
                </div>

                <div class="inputbox">
                    <label>Date of Expiry*</label>
                    <input type="date" name="dateofexpiry" id="dateofexpiry" placeholder="dd/mm/yyyy" required>
                </div>

                <div class="fileuploadinputbox">
                    <label for="fileupload">Document Upload</label>
                    <div>
                        <input type="file" name="fileupload" id="fileupload">
                    </div>
                </div>

                <div class="btn">
                    <button type="reset" id="Reset" value="Reset">Reset</button>
                    <button type="button" id="Submit" value="Submit" onclick="blankOldPwValidation(), blankNewPwValidation(), pwValidation(), nameValidation(), phoneValidation(), docTypeBlankValidation(), checkDate(), submitMessage()">Submit</button>
                </div>
            </form>
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

        <script>
            /*function for validating the blank fields because submit button type is not submit so the required is not working*/
            function blankOldPwValidation(){
                if(document.getElementById('oldpassword').value == ''){
                    alert("Old password cannot be blank")
                    document.getElementById('oldpassword').focus();
                    /*throw new Error is use to allow only one validation occurs at the same time*/
                    throw new Error("This is not an error. This is just to abort javascript.")
                }
            }

            function blankNewPwValidation(){
                if(document.getElementById('newpassword').value == ''){
                    alert("New password cannot be blank")
                    document.getElementById('newpassword').focus();
                    throw new Error("This is not an error. This is just to abort javascript.")
                }
            }

            function pwValidation(){
                if(document.getElementById('newpassword').value == document.getElementById('oldpassword').value){
                    alert("New password cannot be the same as old password")
                    document.getElementById('newpassword').value = ''
                    document.getElementById('newpassword').focus();
                    throw new Error("This is not an error. This is just to abort javascript.")
                }
            }

            function nameValidation(){
                var letter = /^[a-z]*$/i;
                if((!(document.getElementById('name').value).match(letter)) || document.getElementById('name').value == ''){
                    alert("Please fill in required field and input letters only in the name section")
                    document.getElementById('name').focus();
                    throw new Error("This is not an error. This is just to abort javascript.")
                }
            }

            function phoneValidation(){
                var letter = /^[a-z]*$/i;
                if(document.getElementById('phoneno').value.match(letter) || document.getElementById('phoneno').value == ''){
                    alert("Please fill in required field and input numbers only in the phone number section")
                    document.getElementById('phoneno').focus();
                    throw new Error("This is not an error. This is just to abort javascript.")
                }
            }

            function docTypeBlankValidation(){
                var doctype = document.getElementsByName('documenttype');
                if (doctype[0].checked == false && doctype[1].checked == false && doctype[2].checked == false){
                    alert("Please select one document type")
                    document.getElementById('visa').focus();
                    throw new Error("This is not an error. This is just to abort javascript.")
                }
            }

            // Validates that the input string is a valid date formatted as "dd/mm/yyyy"
            function isValidDate(dateString)
            {
                // First check for the pattern
                if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
                    return false;

                // Parse the date parts to integers
                var parts = dateString.split("/");
                var day = parseInt(parts[0], 10);
                var month = parseInt(parts[1], 10);
                var year = parseInt(parts[2], 10);

                // Check the ranges of month and year
                if(year < 1000 || year > 3000 || month == 0 || month > 12)
                    return false;

                var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

                // Adjust for leap years
                if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
                    monthLength[1] = 29;

                // Check the range of the day
                return day > 0 && day <= monthLength[month - 1];
            };

            function checkDate(){
            // define date string to test
            var ExpiryDate = document.getElementById('dateofexpiry').value;
            // check date and print message
                if (!isValidDate(ExpiryDate)) {
                    alert('Invalid date format');
                    document.getElementById('dateofexpiry').focus();
                    throw new Error("This is not an error. This is just to abort javascript.")
                }
            }

            function submitMessage(){
                document.volunteerform.submit();
                alert("Thank you for using our service!");
            }

        </script>
    </body>
</html>
