<?php
$insert=false;
if(isset($_POST['fname']))
{
    $server="localhost";
    $username="root";
    $password="";

    $con= mysqli_connect($server,$username,$password);

    if(!$con){
        die("the connection is not established due to " . mysqli_connect_error());
    }
    echo "connected";
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass =  $_POST['pass'];

   $sql="INSERT INTO `ums`.`credentials` (`fname`, `uname`, `pass`, `date`) VALUES ('$fname', '$uname', '$pass', current_timestamp());";
   
  
   if($con->query($sql) == true){

    $insert = true;
    }
    else{
    echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
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
        <div class="sp">
        </div>
        <div class="lgcont">

            <img id="logo" src="logo.png" alt="University Logo">

            <form action="signup.php" method="post" >
                <legend class="cred scred">
                    <p class="ets fill">Fill this Form</p>
                    <input class="ets" type="text" name="fname" class="ets" placeholder="Full Name">
                    <input class="ets" type="text" name="uname" class="ets" placeholder="Username">
                    <input class="ets" type="password" name="pass" id="pass" placeholder="Password">

                    <button class=" btn " id="lgbtn ">

                        <b> Sign Up</b> </button>
                </legend>

            </form>
        </div>
    </div>


</body>

</html>
