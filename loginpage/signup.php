<?php

    $server="localhost";
    $username="root";
    $password="";

    $con= mysqli_connect($server,$username,$password);

    if(!$con){
        die("the connection is not established due to " . mysqli_connect_error());
    }
    echo "connected";
    $fname=$_Post['fname'];
    $uname=$_Post['uname'];
    $pass=$_Post['pass'];

   $sql="INSERT INTO `credentials` (`fname`, `uname`, `pass`, `date`) VALUES ('$fname', '$uname', '$pass', current_timestamp());";
   echo $sql;


?>