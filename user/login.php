<?php
    if(isset($_POST['submit'])){
        include 'dbconnect.php';
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $sqllogin = "SELECT * FROM tbl_users WHERE user_email = '$email' AND user_pass = '$password'";
        $stmt = $conn->prepare($sqllogin);
        $stmt ->execute();
        $number_of_rows = $stmt->fetchColumn();

        if($number_of_rows>0){
            session_start();
            $_SESSION["sessionid"]=session_id();
            echo "<script>alert('Login Succesfully')</script>";
            echo "<script> window.location.replace('login.php')</script>";

        }
        else{
            echo "<script>alert('Login Failed')</script>";
            echo "<script> window.location.replace('login.php')</script>";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="style.css" />
    <title>MY Tutor</title>

    <style>
        .w3-monts {
            font-family: Montserrat;
        }

        .responsive {
            height: auto;
            width: 20%;
        }
    </style>

</head>

<body class="w3-indigo">

    <div class=" w3-monts" style="display: flex; justify-content: center">
        <div class="w3-container w3-white w3-card w3-padding-32 w3-margin" style="width:600px; margin:auto; text-align:left">
            <div class="w3-container w3-center">
            <img src="..\user\res\logo.png"  style="width:220px; height:auto">
                <p class="w3-text-shadow" style="font-weight: bold; font-size: 28px;">Welcome back!</p>
                <p style="font-weight: bold; font-size: 10px;">Are you ready to book the best tutor for your future?</p>
                <img src="..\user\res\imagesign.png" style="width: 218px; height:auto">
            </div>
        
            <form name="loginForm" action="login.php" method="post">
                <p>
                    <label><b>Email</b></label>
                    <input class="w3-input w3-round w3-border"
                        type="email" name="email" id="email_id" placeholder="Enter your email" required>
                </p>
                <p>
                    <label><b>Password</b></label>
                    <input class="w3-input w3-round w3-border"
                        type="password" name="password" id="pass_id" placeholder="Enter your password" required>
                </p>
                <p>
                    <button class="w3-btn w3-input w3-round w3-border w3-indigo w3-block" name="submit" id="submit_id">SIGN IN</button>
                        
                </p>
            </form>
            <hr>
            <p class="w3-center w3-monts w3-padding-16">Don't have an account yet? <a href="signup.php" class="w3-text-indigo">Register now</a>  
            <p>
            
            <div>

            </div>
        </div>
    </div>



    <footer class="w3-center w3-monts w3-indigo w3-padding-24">
        <p>Copyright MY Tutor&copy; </p>
        <a href="https://github.com/aensyaf" target="_blank">Visit my Github for more information on MY Tutor website code!</a>
    </footer>
</body>
</html>

    </footer>
</body>

</html>