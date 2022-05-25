<?php
    session_start();
    if(!isset($_SESSION['sessionid'])){
        echo "<script>alert('Session not available. Please login again');</script>";
        echo "<script> window.location.replace('../login.php')</script>";
    }

    if (isset($_POST['submit'])) {
      include_once("dbconnect.php");
      $name = $_POST["name"];
      $email =$_POST["email"];
      $phoneNo =$_POST["phoneNo"];
      $address =$_POST["address"];
      $password = sha1($_POST["password"]);
      $sqlregister = "INSERT INTO `tbl_users`(`user_name`, `user_email`, `user_phoneNo`, `user_address`, `user_password`) 
      VALUES ($name','$email','$phoneNo','$address','$password')";
      
      try {
        $conn->exec($sqlregister);
        if(file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])){
          $last_id =$conn->lastInsertId();
          uploadImage($last_id);
          echo "<script>alert('Registration successful! You may login to our website')</script>";
          echo "<script>window.location.replace('login.php')</script>";
        }
      }
      catch (PDOException $e) {
        echo "<script>alert('Registration successful')</script>";
        echo "<script>window.location.replace('signup.php')</script>";
      }
      
    }

    function uploadImage($filename){
      $target_dir= "../user/res/users/";
      $target_file= $target_dir . $filename . ".png";
      move_uploade_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script src="user\script\registerscript.js"></script>
    <title>User Registration</title>

    <style>
        .w3-monts {
            font-family: Montserrat;
        }
    </style>
  </head>

  <body class="w3-indigo">
    
    <div class="w3-main w3-padding w3-content" style="margin-top:90px; max-width:1200px">

      <div class="w3-row w3-white w3-card">
        <div class="w3-container w3-half ">
          <img src="..\user\res\regpic.png" class="w3-image w3-center w3-padding" style="color:#4B0082; width:100%; height:100%; object-fit:cover;">
        </div>

        <div class="w3-half w3-container w3-padding-64">
          <h4 style="font-weight: bold; font-size: 40px">Create account</h4>
          
          <form name="registerForm"  action="signup.php" method="post" class="w3-container w3-padding-32">
            
            <p>
              
              <div class="w3-container w3-center">
                <img class="w3-image w3-margin" src="..\user\res\profilepic.png" style="height:100%;width:400px"><br>
                <input type="file" name="fileToUpload" onchange="previewFile()">
            </div>
            </p>
            <p>
              <label class="w3-monts">
                <b>Email</b>
              </label>
              <input class="w3-input w3-border w3-round" name="email" type="email" id="email_id" required>
            </p>

            <p>
              <label class="w3-monts">
                <b>Name</b>
              </label>
              <input class="w3-input w3-border w3-round" name="name" type="name" id="name_id" required>
            </p>

            <p>
              <label class="w3-monts">
                <b>Phone number</b>
              </label>
              <input class="w3-input w3-border w3-round" name="phone" type="phone" id="phone_id" required>
            </p>
            
            <p>
              <label class="w3-monts">
                <b>Home Address</b>
              </label>
              <input class="w3-input w3-border w3-round" name="phone" type="phone" id="phone_id" required>
            </p>

            <p>
              <label class="w3-monts">
                <b>Password</b>
              </label>
              <input class="w3-input w3-border w3-round" name="password" type="password" id="password_id" required>
            </p>

            <p>
              <button class="w3-btn w3-round w3-border w3-indigo w3-block" name="submit">REGISTER</button>
            </p>

            <p class="w3-center w3-monts w3-padding-16">Already registered? <a href="login.php" class="w3-text-indigo">LOGIN HERE</a><p>

          </form>

        </div>

      </div>

    </div>
    <form class="w3-container w3-padding" name="registerForm" action="signup.php" method="post" onsubmit="return confirmDialog()" enctype="multipart/form-data"></form>

    <footer class="w3-center w3-monts w3-padding-24">
        <p>Copyright MY Tutor&copy; </p>
        <a href="https://github.com/aensyaf" target="_blank">Visit my Github for more information on MY Tutor website code!</a>
    </footer>


  </body>
</html>