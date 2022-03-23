<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- this title is temporary -->
    <link rel = "icon" href ="logo.png"  type = "image/x-icon">
    <link rel="stylesheet" href="landingpagestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <!-- different css pages can be made for each element and linked so as to improve readability  -->
    <div id="navigationbar">
        <ul>
            <li><a href="#"><img src="logo.png" alt="Logo"></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="timetable.html">Time Table</a></li>
            <li><a href="#">Examinations</a></li>
            <li><a href="changepass.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="profile">
        <div class="profilepic">
            <img src="userprofile.png" alt="Profile Photo">
        </div>
        <div class="name"><p>Student name: XYZ</p></div>
        <div class="userid"><p>Registration No: 0000</p></div>
        <div class="roll"><p>Roll No: RK21PPA00</p></div>
        <div class="programme"><p>Programme: </p></div>
    </div>
</body>

</html>