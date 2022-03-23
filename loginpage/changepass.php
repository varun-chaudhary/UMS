<?php

session_start();
$success = false;
if (isset($_SESSION['uname'])) {

    $username=$_SESSION['uname'];
    require_once "config.php";
    $oldpass = $newpass =$hashpass= "";
    $opass_err =  $npass_err = $cpass_err = $err = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (empty(trim($_POST['opass']))) {
            $opass_err = "Please enter old password";
        }
        if (empty(trim($_POST['npass']))) {
            $npass_err = "Please enter  new password";
        
        }
        if (empty(trim($_POST['cpass']))) {
            $cpass_err="Please confirm password";
        } 
        if (trim($_POST["npass"])!= trim($_POST["cpass"])) {
            $cpass_err="Password should match";
        }
        else {
                    $oldpass=trim($_POST['opass']);
                    $newpass=trim($_POST['npass']);
                    $hashpass=password_hash($newpass,PASSWORD_DEFAULT);


            $sql = "SELECT regno, fname , uname, pass  FROM credentials WHERE uname = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $_SESSION['uname'];

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $regno, $fname, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($oldpass, $hashed_password)) {
                           
                            $query="UPDATE credentials SET  pass='$hashpass' WHERE uname='$username'";
                            $updt = mysqli_query($conn,$query);

                            if ($updt) {
                                $success= true;
                            }
                            else{
                                $err="Failed to change password";
                            }
   
                        } 
                        else {
                            $opass_err = "Wrong old password entered";
                        }
                    }
                }            
            }
            
        }
  
    } 

}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- this title is temporary -->
    <link rel="stylesheet" href="landingpagestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <!-- different css pages can be made for each element and linked so as to improve readability  -->
    <div id="navigationbar">
        <ul>
            <li><a href="#"><img src="logo.png" alt="Logo"></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="timetable.html">Time Table</a></li>
            <li><a href="#">Examinations</a></li>
            <li><a href="changepass.html">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="box cp">
        <div class="sp">
        </div>
        <div class="lgcont">

            <!-- <img id="logo" src="logo.png" alt="University Logo"> -->
            <div class="container">
            <?php
                if ($success == true) {
                    echo "<p class='msg msgg'> Password succesfully changed
                </p>";
                } elseif (!empty($opass_err) || !empty($npass_err) || !empty($cpass_err) ) {
                    echo "<p class='msg msgr'> $opass_err <br> $npass_err <br> $cpass_err
                </p>";
                }

                ?>
            </div>
            <form action="#" id="login" method="POST">
                <legend class="cred scred">
                    <!-- <p class="ets fill">Change Password</p> -->
                    <input class="ets cts" type="text" name="opass" class="ets" placeholder="Current password">
                    <input class="ets cts" type="text" name="npass" class="ets" placeholder="New password">
                    <input class="ets cts" type="password" name="cpass" id="pass" placeholder="Confirm password">
                </legend>

                <button class=" btn " id="lgbtn ">

                    <b> Change Password</b> </button>


            </form>
            
        </div>
    </div>

 
</body>

</html>