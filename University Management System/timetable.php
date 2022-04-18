<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: signin.php");
}
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
    <link rel="icon" href="logo.png" type="image/x-icon">
    <title>Timetable</title>
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/timetablestyling.css">    
</head>

<body>
    <!-- todo : 
    add a table in the center of the page 
    add a nav bar with a logo and a back button  -->
    <div id="navbar">
        <ul>
            <li><a href="landingpage.php"><img src="img/logo.png" alt="Logo" id="logo"></a></li>
            <!-- <li><a href="landingpage.html">Back</a></li> -->
            <!-- <li><a href="loginpage.html">Logout</a></li> -->
            <li>

                <div id="myMenu" class="dropdown">
                    <a href="javascript: void(0)" class="buttonX" onclick="closeMenu()">&times;</a>
                    <div class="dropdown-lists">
                        <a href="landingpage.php"><img class="pic " src="<?php echo$profile_pic ?>"  alt=""><?php echo$_SESSION['uname']  ?></a>
                        <a href="landingpage.php">Home</a>
                        <a href="index.php">About Us</a>
                        <a href="examination.html">Examinations</a>
                        <a href="changepass.php">Change Password</a>
                        <a href="logout.php">Logout</a>
                    
                    </div>
                </div>
                <span class="hamburger" onclick="openMenu()">&#9776;</span>
                <script>function openMenu(){ 
                    document.getElementById("myMenu").style.height = "100%"
                }
                function closeMenu(){ 
                    document.getElementById("myMenu").style.height = "0%"
                }
                </script>
            </li>
        </ul>
    </div>
    <div class="box">
    <div class="tablecontainer">
        <table>
            <thead>
                <tr class="headings">
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
            </thead>
            <tbody>
                <tr class="content">
                    <td>PEL130</td>
                    <td>MTH166</td>
                    <td>CSE202</td>
                    <td>MTH166</td>
                    <td>ECE216</td>
                    <td>CSE326</td>
                </tr>
                <tr class="content">
                    <td>CSE326</td>
                    <td>ECE216</td>
                    <td>MTH166</td>
                    <td>CSE202</td>
                    <td>MTH166</td>
                    <td>PEL130</td>
                </tr>
                <tr class="content">
                    <td>MTH166</td>
                    <td>ECE216</td>
                    <td>PEL130</td>
                    <td>CSE326</td>
                    <td>MTH166</td>
                    <td>CSE202</td>
                </tr>
                <tr class="content">
                    <td>MTH166</td>
                    <td>CSE202</td>
                    <td>PEL130</td>
                    <td>MTH166</td>
                    <td>CSE326</td>
                    <td>ECE216</td>
                </tr>
                <tr class="content">
                    <td>PEL130</td>
                    <td>MTH166</td>
                    <td>CSE202</td>
                    <td>MTH166</td>
                    <td>ECE216</td>
                    <td>CSE326</td>
                </tr>


            </tbody>
        </table>
    </div>
    </div>
</body>

</html>