<?php

session_start();

if (isset($_SESSION['uname'])) {
    header("location: landingpage.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['uname']))) {
        $username_err = "Please enter username";
    }
    if (empty(trim($_POST['pass']))) {
        $password_err = "Please enter password";
    } else {
        $username = trim($_POST['uname']);
        $password = trim($_POST['pass']);
    }



    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT regno, fname , uname, pass  FROM credentials WHERE uname = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $regno, $fname, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        session_start();
                        $_SESSION["fname"] = $fname;
                        $_SESSION["uname"] = $username;
                        $_SESSION["regno"] = $regno;
                        $_SESSION["pass"] =$pass;
                        $_SESSION["loggedin"] = true;

                        header("location: landingpage.php");
                    } else {
                        $password_err = "Wrong password entered";
                    }
                }
            } else {
                $username_err = "User does not exist";
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
    <link rel = "icon" href ="logo.png"  type = "image/x-icon">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="bgb">
    </div>
    <div class="box">
        
        <div class="lgcont">

            <img id="logo" src="logo.png" alt="University Logo">
            <div class="container">
                <?php
                if (!empty($username_err)) {
                    echo "<p class='msg msgr'> $username_err  
                    </p>";
                }
                if (!empty($password_err)) {
                    echo "<p class='msg msgr'> $password_err 
                    </p>";
                }

                ?>
            </div>
            <form action="#" id="login" method="post">
                <legend class="cred">
                    <input class="ets" type="text" name="uname" id="uname" placeholder="Username">
                    <input class="ets" type="password" name="pass" id="pass" placeholder="Password">

                </legend>
                <a class="ref" href="signup.php"> New here? Sign up</a>
                <button class=" btn " id="lgbtn ">

                    <b> Sign In </b> </button>
            </form>
        </div>
    </div>


</body>

</html>