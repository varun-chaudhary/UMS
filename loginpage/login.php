<?php

$server="localhost";
$username="root";
$password="";

$con= mysqli_connect($server,$username,$password);

if(!$con){
    die("the connection is not established due to " . mysqli_connect_error());
}
else{
echo "connected";
}
?>