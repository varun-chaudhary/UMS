<?php
//starting session
session_start();
$success = false;//var to chech if pass changed succesfully
if (isset($_SESSION['uname'])) {//checking if user logged in

    $username = $_SESSION['uname'];
    require_once "config.php";
    $oldpass = $newpass = $hashpass = "";
    $opass_err =  $npass_err = $cpass_err = $err = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
//checking if any field is empty
        if (empty(trim($_POST['opass']))) {
            $opass_err = "Please enter old password";
        }
        if (empty(trim($_POST['npass']))) {
            $npass_err = "Please enter  new password";
        }
        if (empty(trim($_POST['cpass']))) {
            $cpass_err = "Please confirm password";
        }
        if (trim($_POST["npass"]) != trim($_POST["cpass"])) {
            $cpass_err = "Password should match";
        } else {
            //storing user entered values in variables
            $oldpass = trim($_POST['opass']);
            $newpass = trim($_POST['npass']);
       //converting entered pass to hashed pass because we stored like that on signingup
            $hashpass = password_hash($newpass, PASSWORD_DEFAULT)

;
            $sql = "SELECT regno, fname , uname, pass  FROM credentials WHERE uname = ?";
            $stmt = mysqli_prepare($conn, $sql);
            //using parameter binding technique to prevent sql injection attacks
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $_SESSION['uname'];

            if (mysqli_stmt_execute($stmt)) {//executing query binded with var
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {//checking if user exist or not
                    mysqli_stmt_bind_result($stmt, $regno, $fname, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($oldpass, $hashed_password)) {

                            $query = "UPDATE credentials SET  pass='$hashpass' WHERE uname='$username'";
                            $updt = mysqli_query($conn, $query);

                            if ($updt) {
                                $success = true;
                            } else {
                                $err = "Failed to change password";
                            }
                        } else {
                            $opass_err = "Wrong old password entered";
                        }
                    }
                }
            }
        }
    }
}

//checking if user not logged in directly coming to changepass page
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    //redirecting to signin first
    header("location: signin.php");
}

//code to access profile pic from databasee
$profile_pic="";
$user_pic=$_SESSION['picsource'];
$default_pic= "student/default.jpg";

if (file_exists($user_pic)) {
    $profile_pic=$user_pic;
}
else {
    $profile_pic=$default_pic;
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
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <!-- different css pages can be made for each element and linked so as to improve readability  -->
    <div id="navigationbar">
        <ul>
            <li><a href="index.php"><img src="img/logo.png" alt="Logo"></a></li>
            <li><a href="landingpage.php">Home</a></li>
            <li><a href="timetable.php">Time Table</a></li>
            <li><a href="examination.html">Examinations</a></li>
            <li><a href="changepass.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li class="nav_item profview"><img class="pic " src="<?php echo$profile_pic ?>"  alt=""><a class="uname" href="landingpage.php"><?php echo$_SESSION['uname']  ?></a></li>

        </ul>
    </div>
    <div class="box cp">
        <div class="sp">
        </div>
        <div class="lgcont">

            <!-- <img id="logo" src="logo.png" alt="University Logo"> -->
            <div class="container bgfix">
                <?php
                if ($success == true) {
                    echo "<p class='msg msgg'> Password succesfully changed
                </p>";
                }
                if (!empty($opass_err)) {
                    echo "<p class='msg msgr'> $opass_err 
                </p>";
                }
                if (!empty($npass_err)) {
                    echo "<p class='msg msgr'>$npass_err
                </p>";
                }
                if (!empty($cpass_err)) {
                    echo "<p class='msg msgr'> $cpass_err
                </p>";
                }

                ?>
            </div>
            <form action="#" id="login" method="POST">
                <legend class="cred scred">
                    <!-- <p class="ets fill">Change Password</p> -->
                    <input class="ets cts" type="password" name="opass" class="ets" placeholder="Current password">
                    <input class="ets cts" type="password" name="npass" class="ets" placeholder="New password">
                    <input class="ets cts" type="password" name="cpass" id="pass" placeholder="Confirm password">
                </legend>

                <button class=" btn " id="lgbtn ">

                    <b> Change Password</b> </button>


            </form>

        </div>
    </div>


</body>

</html>