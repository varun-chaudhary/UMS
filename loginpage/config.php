<?php

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','ums');

$conn = mysqli_connect( DB_SERVER , DB_USERNAME ,DB_PASSWORD , DB_NAME);

if (!$conn) {
    die("the connection is not established due to " . mysqli_connect_error());
}

?>