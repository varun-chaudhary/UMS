
<?php
//conecting with database
require_once "config.php";


$username = $password = $fullname= "";
$username_err = $password_err = $fullname_err="";
$register = false;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty(trim($_POST["uname"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT regno FROM credentials WHERE uname = ? ";//generating query
        $stmt = mysqli_prepare($conn, $sql);//binding query with connection and creating statement
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);//binding parameter
            $param_username = trim($_POST['uname']);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {//checking if username already exist
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['uname']);
                }
            }
            mysqli_stmt_close($stmt);
        }
    }


//checking if any field remain empty
    if (empty(trim($_POST['fname']))) {
        $fullname_err = "Full name cannot be blank";
    } else {
        $fullname = trim($_POST['fname']);
    }
        
    if (empty(trim($_POST['pass']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['pass'])) < 6) {//checking if passis atleast 6 character
        $password_err = "Password cannot be less than 6 characters";
    } else {
        $password = trim($_POST['pass']);
    }
//uploading image
    $file_err=$fileDesti=$not_uploaded="";
    $file = $_FILES['file'];

    $filename = $_FILES['file']['name'];
    $filetmp = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $fileerr = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    $fileext= explode('.',$filename);
    $fileactualext=strtolower(end($fileext));

    $allowed= array('','jpg','jpeg','png','gif','svg');//checking if image had one of these extension

    if (in_array( $fileactualext, $allowed)) {
        if ($fileerr === 0) {
           if ($filesize < 5000000) {//checking if image sixe not greater than 5mb
               $fileNameNew=uniqid('', true).".".$fileactualext ;//making new file name to prevent overwrite cases
               if (!empty($filename)) {//if user uploaded file than move to database folder and  enter path in  db  - table colum
                   $fileDesti= 'student/'.$fileNameNew;
                   move_uploaded_file($filetmp,$fileDesti );
            }             
           }
           else {
            $file_err="Your file is too big!";
            // echo"Your file is too big!";
           }
        }
        else {
            $not_uploaded="You didn't uploaded your profile picture";   
    
        }
    }
    else {
        $file_err="This file type not allowed";
        // echo"not allowed thi ext";
    }
    //if no errors then proceed and write details into database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) &&empty($file_err)  ) {
   
    //generating sql query
        $sql = "INSERT INTO credentials (fname ,uname , pass , picsource) VALUES (?, ?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);//connecting query to database
        if ($stmt) {
            //binding parameter with user enterd data
            mysqli_stmt_bind_param($stmt, "ssss",  $param_fullname, $param_username, $param_password, $param_image);

            
            $param_fullname = $fullname;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);//encrypting user entered password
            $param_image= $fileDesti;

           
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
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <title>Sign up</title>
</head>

<body>
    <div class="bgb">
    </div>
    <div class="box sup">
        <div class="lgcont">

            <img id="logo" src="img/logo.png" alt="University Logo">
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
                if (!empty($file_err)) {
                    echo "<p class='msg msgr'>$file_err
                </p>";
                }
                if (!empty($not_uploaded)) {
                    echo "<p class='msg msgr'>$not_uploaded
                </p>";
                }

                ?>
            </div>
            <?php
            if ($register == false) {
                echo "<form action='#' id='login' method='post' enctype='multipart/form-data' >
               <legend class='cred scred'>           
                   <input class='ets' type='text' name='fname' class='ets' placeholder='Full Name'>
                   <input class='ets' type='text' name='uname' class='ets' placeholder='Username'>
                   <input class='ets' type='password' name='pass' id='pass' placeholder='Password'>
                   <p class='ets eti'>Upload profile picture </p>
                   <input class='eti'type='file' name='file' value='#'/>
               </legend>
               <a class='ref' href='signin.php'> Go Back to Sign in</a>

                <button type='submit' name='submit' class=' btn ' id='lgbtn '>
                <b> Sign Up</b> </button>
           </form>";
            }
            if ($register == true) {
                echo "<button class='btn gb_btn' id='link_login'><a class='link'href='signin.php'>Go back to Log In</a></button>";
            }
            ?>
            
        </div>
    </div>


</body>

</html>