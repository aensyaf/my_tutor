<?php
    $servername="localhost";
    $email="root";
    $password="";
    $dbname= "mytutor";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $email, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected Succesfully!";
    }
    catch(PDOException $e){
        echo $sql . "Connection failed: " .$e->getMessage();
    }
    
?>