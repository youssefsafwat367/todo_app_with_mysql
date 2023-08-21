<?php
session_start();
include("./functions.php");
include("register_validation.php");

// check method and written inputs
if ((sanitize($_SERVER["REQUEST_METHOD"]) && check_written($_SERVER["REQUEST_METHOD"]))) {
    foreach ($_POST as $key => $input) :
        $$key = trim($input);
    endforeach;
} else {
    $_SESSION['error'] = "invalid method";
    unset($_SESSION['error']);
}
####################################------------- username Validation -------------##################################

$errors_for_username = [];
// check username is set or not 
if (required_VALIDATION($username)) {
    $errors_for_username[] = "Username Is Required";
}
// check username characters is grater than 3 or not 
elseif (min_VALIDATION($username)) {
    $errors_for_username[] = "Username Characters Must Be Greater Than 3";
}
// check username characters is grater than 3 or not
elseif (max_VALIDATION($username)) {
    $errors_for_username[] = "Username Characters Must Be Lower Than 25 ";
}
// to return to register page with array 
// header("location:../register.php") ; 
$_SESSION['$errors_for_username'] =  $errors_for_username;

####################################------------- Email Validation -------------##################################
$errors_for_email = [];
// check email is set or not 
if (required_VALIDATION($email)) {
    $errors_for_email[] = "Email Is Required";
}
// check if it is a correct email or not 
elseif (!valid_email_VALIDATION($email)) {
    $errors_for_email[] = "Please Enter A Valid Email";
}
// header("location:./register.php");
$_SESSION['$errors_for_email'] =  $errors_for_email;
####################################------------- Password Validation -------------##################################
$errors_for_password = [];
// check password is set or not 
if (required_VALIDATION($password)) {
    $errors_for_password[] = "Password Is Required";
}
// check Password characters is grater than 8 or not 
elseif (min_password_VALIDATION($password)) {
    $errors_for_username[] = "Password Characters Must Be Greater Than 8";
} elseif (max_passwprd_VALIDATION($password)) {
    $errors_for_username[] = "Password Characters Must Be Lower Than 25 ";
}
// header("location:./register.php");
$_SESSION['$errors_for_password'] =  $errors_for_password;
####################################------------- Password Validation -------------##################################
$errors_for_image = [];
// check image is set or not 
if (required_VALIDATION($image)) {
    $errors_for_image[] = "Your Image Is Required";
}
// header("location:./register.php");
$_SESSION['$errors_for_image'] =  $errors_for_image;
####################################------------- store informations in database file  -------------##################################
if (empty($errors_for_username) && empty($errors_for_email) && empty($errors_for_password) && empty($errors_for_image)) {
    $conn = mysqli_connect("Localhost", "root", "");

    if (!$conn) {
        echo "connect error" . mysqli_connect_error($conn);
    }




    $image = $_POST['image'];
    $sql = "USE `tasks`;";
    $insert_new_user = "INSERT INTO `users`(`name` , `email` , `password` , `image`) values ('{$_POST['username']}' , '{$_POST['email']}' , '{$_POST['password']}' , '{$image}' ) ";
    $result = mysqli_query($conn, $sql);
    $new_insert = mysqli_query($conn, $insert_new_user);
    $_SESSION['user'] = "the user is created successfully" ;
    redirect('register.php');
} else {
    redirect('register.php');
    die;
}
