<?php
session_start();


// To decide which function
if(isset($_POST['action'])) {
  if (isset($_SESSION['error'])){
    unset($_SESSION['error']);
  }

  // determine which form
  switch ($_POST['action']) {
    // login function
    case 'login':
      userLogin();
      break;
    // manage profile function
    case 'manageProfile':
      manageVolunteerProfile();
      break;
    //register new staff
    case 'registerStaff':
      registerStaff();
      break;
    //create new trip
    case 'createTrip':
      createTrip();
      break;
    //update application status
    case 'updateApp':
      updateApp();
      break;
    //manage applications
    case 'manageApp':
      manageApp();
      break;
    //view documents
    case 'viewDoc':
      viewDoc();
        break;
    //apply for trip
    case 'applyForTrip':
      applyForTrip();
      break;
  }
}

//for result of select
function db_search($sql){

  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "crs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $result = $conn->query($sql);

  return $result->fetch_object();
}

// for result of insert, update, delete an existing object
function db_result($sql){
  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "crs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $result = $conn->query($sql);
  return $result;
}

//user login
function userLogin(){
  $sql = "SELECT * FROM crsmember where position = 'manager'";
  $manager = db_search($sql); //object is assigned or null

  //if the manager is not in the database table yet, hard code
  if($manager==null){
      $managerSQL = "INSERT INTO `crsmember`(`userID`,`username`, `password`, `name`, `contactNo`, `position`, `dateJoined`) VALUES (1,'manager@gmail.com','manager123','Jason Lee',0186764534,'manager','2021-03-31')";
      db_result($managerSQL);
  }

  //get the inputs from the login page
  $sql = "SELECT * FROM crsmember where username = '" . $_POST['username'] . "' and password = '" . $_POST['password'] . "'";

  $member = db_search($sql); //object is assigned or null
  if($member != null){
    //when the user login, all the info are stored into the session for futher activities
    $_SESSION['userID'] = $member->userID;
    $_SESSION['username'] = $member->username;
    $_SESSION['password'] = $member->password;
    $_SESSION['name'] = $member->name;
    $_SESSION['contactNo'] = $member->contactNo;
    $_SESSION['position'] = $member->position;

    switch ($_SESSION['position']) {
     case 'manager':
        header("Location:manager.php?position=manager");
        echo "<script> window.location.assign('manager.php'); </script>";
        break;
     case 'staff':
        header("Location:staff.php?position=staff");
        echo "<script> window.location.assign('staff.php'); </script>";
        break;
     case 'volunteer':
        header("Location:volunteerHomepage.php?position=volunteer");
        echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
        break;
    default:
        header("Location:homepage.php?error=usernotfound");
        echo "<script> window.location.assign('homepage.php'); </script>";
        break;
       }
  }
  else {
        //if user not found
        echo '<script> alert("Invalid username or password! You will be redirect to HELP Bomba Homepage ")</script>';
        echo "<script> window.location.assign('homepage.php'); </script>";
  }



}

function manageVolunteerProfile(){
  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "crs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Get the current password of the user for verification
  $sql7 = "SELECT password FROM crsmember WHERE userID = '".$_SESSION['userID']."'";
  $result3 = mysqli_query($conn, $sql7);
  if ($result3 -> num_rows > 0){
    while ($row = $result3 -> fetch_assoc()){
      //Store the value of the current password into $curPassword
      $curPassword = $row["password"];
    }
  }

  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];

  //If the oldpassword section inputed by the user is equal to the current password
  if ($oldpassword == $curPassword){
    //If the newpassword section is not left blank, the system will update the password to the new password, else the oldpassword will be inserted as the password
    if (!empty($newpassword)){
      $sql = "UPDATE crsmember SET password = '$_POST[newpassword]', name = '$_POST[name]', contactNo = '$_POST[phoneno]' WHERE password = '$oldpassword' AND userID = '".$_SESSION['userID']."'";
    }
    else{
      $sql = "UPDATE crsmember SET password = '$_POST[oldpassword]', name = '$_POST[name]', contactNo = '$_POST[phoneno]' WHERE password = '$oldpassword' AND userID = '".$_SESSION['userID']."'";
    }
    $sql_run = mysqli_query($conn, $sql);
  }
  else{
    echo '<script type="text/javascript">alert("Old Password Incorrect")</script>';
    echo "<script> window.location.assign('manageVolunteerProfile.php'); </script>";
  }

  if ($sql_run){
    $documenttype = $_POST['documenttype'];
    $dateofexpiry = $_POST['dateofexpiry'];

    //To store the images uploaded by the user in the folder named images
    $target = "images/".basename($_FILES['fileupload']['name']);
    $file = $_FILES['fileupload']['name'];
    //Get the document table row of the userID of the user of this current session
    $sql2 = "SELECT * FROM `Document` WHERE userID_fk = '".$_SESSION['userID']."'";
    $result = db_search($sql2);
    //If the user does not have a document table row, then the system will insert a new row
    if ($result == null){
      //If user does not upload any image, only the docImage column will not be updated
      if ($_FILES['fileupload']['size'] == 0){
        $sql3 = "INSERT INTO `Document`(`documentType`, `expiryDate`, `userID_fk`) VALUES ('$documenttype', '$dateofexpiry', '".$_SESSION['userID']."')";
      }
      else{
        $sql3 = "INSERT INTO `Document`(`documentType`, `expiryDate`, `docImage`, `userID_fk`) VALUES ('$documenttype', '$dateofexpiry', '$file', '".$_SESSION['userID']."')";
      }
      $sql3_run = mysqli_query($conn, $sql3);
      if ($sql3_run){
        //If the uploaded image is successfully stored in the folder named images
        if(move_uploaded_file($_FILES['fileupload']['tmp_name'], $target)){
          //Get the application table row where the userID of the user of current session
          $sql5 = "SELECT * FROM `Application` WHERE userID_fk = '".$_SESSION['userID']."'";
          $result2 = db_search($sql5);
          //If the user has not applied for any trip yet, then there will be no application table row with the userID of the current session user being returned
          if ($result2 == null){
            echo '<script type="text/javascript">alert("All Data Updated and New Document Inserted but Application Status Not Updated because You Have Not Applied Any Trip Yet")</script>';
            echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
          }
          //If the application table row is found, the system will only update the applicationStatus to 'NEW' and remarks to NULL where the application is rejected by the staff
          else{
            $sql6 = "UPDATE Application SET applicationStatus = 'NEW', remarks = NULL WHERE applicationStatus = 'REJECTED' AND userID_fk = '".$_SESSION['userID']."'";
            $sql6_run = mysqli_query($conn, $sql6);

            if ($sql6_run){
              echo '<script type="text/javascript">alert("All Data Updated and New Document Inserted and Application Status Updated")</script>';
              echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
            }
            else{
              echo '<script type="text/javascript">alert("All Data Updated and New Document Inserted but Application Status Not Updated")</script>';
              echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
            }
          }
        }
        else{
          echo '<script type="text/javascript">alert("All Data Updated but Document File Not Uploaded ")</script>';
          echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
        }
      }
      else{
        echo '<script type="text/javascript">alert("Data Updated but Document Type, Date of Expiry and Document File Not Inserted")</script>';
        echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
      }
    }
    //If the user already has a table row in document table, the system will update the row
    else{
      if ($_FILES['fileupload']['size'] == 0){
        $sql4 = "UPDATE Document SET documentType = '$documenttype', expiryDate = '$dateofexpiry' WHERE userID_fk = '".$_SESSION['userID']."'";
      }
      else{
        $sql4 = "UPDATE Document SET documentType = '$documenttype', expiryDate = '$dateofexpiry', docImage = '$file' WHERE userID_fk = '".$_SESSION['userID']."'";
      }
      $sql4_run = mysqli_query($conn, $sql4);
      if ($sql4_run){
        if(move_uploaded_file($_FILES['fileupload']['tmp_name'], $target)){
          $sql5 = "SELECT * FROM `Application` WHERE userID_fk = '".$_SESSION['userID']."'";
          $result2 = db_search($sql5);
          if ($result2 == null){
            echo '<script type="text/javascript">alert("All Data Updated and Document Updated but Application Status Not Updated because You Have Not Applied Any Trip Yet")</script>';
            echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
          }
          else{
            $sql6 = "UPDATE Application SET applicationStatus = 'NEW', remarks = NULL WHERE applicationStatus = 'REJECTED' AND userID_fk = '".$_SESSION['userID']."'";
            $sql6_run = mysqli_query($conn, $sql6);

            if ($sql6_run){
              echo '<script type="text/javascript">alert("All Data Updated and Document Updated and Application Status Updated")</script>';
              echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
            }
            else{
              echo '<script type="text/javascript">alert("All Data Updated and Document Updated but Application Status Not Updated")</script>';
              echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
            }
          }
        }
        else{
          echo '<script type="text/javascript">alert("All Data Updated but Document File Not Updated")</script>';
          echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
        }
      }
      else{
        echo '<script type="text/javascript">alert("Data Updated but Document Type, Date of Expiry and File Not Updated")</script>';
        echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
      }
    }
  }
  else{
    echo '<script type="text/javascript">alert("All Data Not Updated")</script>';
    echo "<script> window.location.assign('manageVolunteerProfile.php'); </script>";
  }
}

function registerStaff(){
  //get the inputs from the record new staff form
  $username = $_POST['usernameStaff'];
  $password = $_POST['passwordStaff'];
  $name = $_POST['nameStaff'];
  $phoneNo = $_POST['phoneNoStaff'];
  $dateJoined = $_POST['dateJoinedStaff'];

  //check if there is existing staff being created
  $sql1="SELECT * FROM `crsmember` WHERE username = '$username'";
  $select = db_search($sql1);

  if($select!=null){
        echo '<script> alert("This staff has been existed")</script>';
        echo "<script> window.location.assign('manager.php');</script>";
  }else{
    //insert into database if the staff is new
     $sql2 = "INSERT INTO `crsmember`(`username`, `password`, `name`, `contactNo`, `position`, `dateJoined` ) VALUES ('$username', '$password', '$name', '$phoneNo', 'staff', '$dateJoined' )";

     $insert = db_result($sql2);

     if(!$insert){
       echo"ERROR";
     }else{
       echo '<script> alert("This staff has been added successfully")</script>';
       echo "<script> window.location.assign('manager.php');</script>";
     }
  }
}

function createTrip(){
  //get the input from the create crisis trip form
  $tripDate = $_POST['tripDate'];
  $location = $_POST['location'];
  $description = $_POST['description'];
  $cType = $_POST['cType'];
  $minDuration = $_POST['minDuration'];
  $skillReq = $_POST['skillReq'];
  $numVolunteers = $_POST['numVolunteers'];
  $userID = $_SESSION['userID'];

  //Check if the trip is being created on same date with the exisiting trip date
  $sql1="SELECT * FROM `crisistrip` WHERE cTDate = '$tripDate'";
  $select = db_search($sql1);

  if($select!=null){
    echo '<script> alert("On this date, there is another crisis trip  being held. Please choose a different date for the new trip!")</script>';
    echo "<script> window.location.assign('staff.php');</script>";
  }else{
     $sql2 = "INSERT INTO `crisistrip`( `cType`, `description`, `cTDate`, `location`, `minDuration`, `numVolunteers`, `skillRequirement(s)`, `availableSlots`, `userID_fk`) VALUES ('$cType', '$description', '$tripDate', '$location', '$minDuration', '$numVolunteers', '$skillReq', '$numVolunteers', '$userID')";

     $insert = db_result($sql2);

     if(!$insert){
       echo"ERROR";
     }else{
       echo '<script> alert("This crisis trip has been created successfully")</script>';
       echo "<script> window.location.assign('staff.php');</script>";
     }
   }
}

function updateApp(){
  //get the input from the document form
    $applicationID = $_POST['applicationID'];
    $documentID = $_POST['documentID'];
    $statusUpdate = $_POST['statusUpdate'];
    $remarks = $_POST['remarks'];

    //check if there is matching application
    $sql = "SELECT * FROM `application` WHERE applicationID = $applicationID";
    $check = db_search($sql);


    if($check!=null){
      //update application status and remarks if no error
      $sql1 = "UPDATE Application SET applicationStatus = '$statusUpdate', remarks = '$remarks' WHERE applicationID = '$applicationID' AND documentID_fk = '$documentID'";
      $queryUpdate = db_result($sql1);
      if($queryUpdate==null){
         echo '<script> alert("Error occur! Please retry again!")</script>';
         echo "<script> window.location.assign('Application.php'); </script>";
      }else{
        $accepted = 'ACCEPTED';
        //To check if the status is chosen as 'ACCEPTED'
        if(strcmp($statusUpdate, $accepted)==0){
          //reduce the available slots by 1 from the selected crisis trip
          $sql2 = "UPDATE `crisistrip` SET `availableSlots`= availableSlots-1  WHERE cTID = (SELECT cTID_fk FROM application WHERE applicationID = $applicationID)";
          $tripUpdate = db_result($sql2);
          if($tripUpdate == null){
            echo '<script> alert("Application status has been updated!")</script>';
            echo '<script> alert("Error: Available slots is not deducted")</script>';
          }else{
            echo '<script> alert("Application status has been updated!")</script>';
            echo '<script> alert("Available slots have been updated!")</script>';
          }
          echo "<script> window.location.assign('Application.php'); </script>";
        } else {
             echo '<script> alert("Application status has been updated!")</script>';
             echo "<script> window.location.assign('Application.php'); </script>";
        }
      }
    }
    else{
        echo '<script> alert("This application does not exist!")</script>';
        echo "<script> window.location.assign('Application.php'); </script>";
    }
}

function manageApp(){
  //if the delete button is pressed
  if(isset($_POST['delete'])){
    //checkbox contain trip ID
    $Checkbox = $_POST['checkbox'];

    //check if the trip is exisiting
    $sql = "SELECT * FROM `crisistrip` WHERE cTID = $Checkbox";
    $check = db_search($sql);

    if($check!=null){
      //delete from the database about the trip
      $sql1 = "DELETE FROM `crisistrip` WHERE cTID = $Checkbox";
      $queryDelete = db_result($sql1) ;
      if($queryDelete==null){
         echo '<script> alert("Error occur! Please retry again!")</script>';
         echo "<script> window.location.assign('ManageApplications.php'); </script>";
      }else{
       echo '<script> alert("Record selected deleted!")</script>';
      echo "<script> window.location.assign('ManageApplications.php'); </script>";
      }
    }
    else{
        echo '<script> alert("Record selected does not exist!")</script>';
        echo "<script> window.location.assign('ManageApplications.php'); </script>";
    }
  }else{
    //if the view application button is pressed
    if(isset($_POST['viewApp'])){
      //checkbox contain trip ID
      $Checkbox = $_POST['checkbox'];
      //store into the session for futher activities
      $_SESSION["cTID"] = $Checkbox;
      echo "<script> window.location.assign('Application.php'); </script>";
    }
  }
}

function viewDoc(){
  //if the view document button is pressed
  if(isset($_POST['viewDoc'])){
    //checkbox contain trip ID
    $checkbox = $_POST['checkboxApp'];
    //store into the session for futher activities
    $_SESSION["applicationID"] = $checkbox;
    echo '<script> function </script>';
    echo "<script> window.location.assign('Document.php'); </script>";
    }
}


function applyForTrip(){
  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "crs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  if (isset($_POST['applyForTrip'])){
    //Get the document table row of the userID of the user in the current session
    $sql1 = "SELECT * FROM Document WHERE userID_fk = '".$_SESSION['userID']."'";
    $result = mysqli_query($conn, $sql1);
    //If the user has a row in the document table
    if ($result -> num_rows > 0){
      while ($row = $result -> fetch_assoc()){
        //Store the documentID into $documentID_fk
        $documentID_fk = $row["documentID"];
      }
    }
    //If the user does not have a row in document table, user cannot apply for trip
    else{
      echo '<script type="text/javascript">alert("You do not have a document, please proceed to manage profile section to update your document")</script>';
      echo "<script> window.location.assign('applyForTrip.php'); </script>";
    }

    //Insert a new row in application table
    $date = date('Y-m-d H:i:s');
    $sql2 = "INSERT INTO `Application`(`applicationDate`, `applicationStatus`, `userID_fk`, `cTID_fk`, `documentID_fk`) VALUES ('$date', 'NEW', '".$_SESSION['userID']."', '$_POST[hidden]', '$documentID_fk')";


    $sql2_run = mysqli_query($conn, $sql2);


    if ($sql2_run){
      echo '<script type="text/javascript">alert("Applied successfully")</script>';
      echo "<script> window.location.assign('volunteerHomepage.php'); </script>";

    }
    else{
      echo '<script type="text/javascript">alert("Applied unsuccesfully")</script>';
      echo "<script> window.location.assign('volunteerHomepage.php'); </script>";

    }
  }
  else{
    echo '<script type="text/javascript">alert("Error Occur")</script>';
    echo "<script> window.location.assign('volunteerHomepage.php'); </script>";
  }

}

function selectTrip(){
  //get the userID stored in the SESSION
  $userid =  $_SESSION['userID'];
  //select the objects that having same userID, availableSlots > 0 and greater than today's date
  $query = "SELECT * FROM crisistrip c inner join crsmember m WHERE c.userID_fk = $userid and m.userID = $userid and c.availableSlots>0 and c.cTDate>=CURDATE()";
  return $query; //apply in ManagerApplications.php
}

















?>
