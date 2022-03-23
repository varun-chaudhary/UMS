<?php

require_once "config.php";


$username = $password = $fullname = "";
$username_err = $password_err = $fullname_err = "";
$register = false;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty(trim($_POST["uname"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT regno FROM credentials WHERE uname = ? ";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['uname']);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['uname']);
                }
            }
            mysqli_stmt_close($stmt);
        }
    }



    if (empty(trim($_POST['fname']))) {
        $fullname_err = "Full name cannot be blank";
    } else {
        $fullname = trim($_POST['fname']);
    }


    if (empty(trim($_POST['pass']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['pass'])) < 6) {
        $password_err = "Password cannot be less than 6 characters";
    } else {
        $password = trim($_POST['pass']);
    }

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO credentials (fname ,uname , pass) VALUES (?, ?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss",  $param_fullname, $param_username, $param_password,);

            
            $param_fullname = $fullname;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);


           
            if (mysqli_stmt_execute($stmt)) {
                $register = true;
                
            } else {
                $register_err = "Try after some time";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Sign up</title>
</head>

<body>
    <div class="bgb">
    </div>
    <div class="box sup">
        <div class="lgcont">

            <img id="logo" src="logo.png" alt="University Logo">
            <div class="container">
                <?php
                if ($register == true) {
                    echo "<p class='msg msgg'> Congragulations!!! You are a student now
                </p>";
                }
                if (!empty($username_err)) {
                    echo "<p class='msg msgr'> $username_err 
                </p>";
                }
                if (!empty($password_err)) {
                    echo "<p class='msg msgr'>  $password_err
                </p>";
                }
                if (!empty($fullname_err)) {
                    echo "<p class='msg msgr'>$fullname_err
                </p>";
                }

                ?>
            </div>
            <?php
            if ($register == false) {
                echo "<form action='#' id='login' method='post'>
               <legend class='cred scred'>
                   <p class='ets fill'>Fill this Form</p>
                   <input class='ets' type='text' name='fname' class='ets' placeholder='Full Name'>
                   <input class='ets' type='text' name='uname' class='ets' placeholder='Username'>
                   <input class='ets' type='password' name='pass' id='pass' placeholder='Password'>
               </legend>

               <button class=' btn ' id='lgbtn '>



                   <b> Sign Up</b> </button>
           </form>";
            }
            if ($register == true) {
                echo "<button class='btn ' id='link_login'><a href='login.php'>Go back to Log In</a></button>";
            }
            ?>
        </div>
    </div>


</body>

</html>