<?php
session_start();
include('../cont/functions.php');
include('../cont/login_validation.php');


if ((sanitize($_SERVER["REQUEST_METHOD"]) && check_written($_SERVER["REQUEST_METHOD"]))) {
    foreach ($_POST as $key => $input) :
        $$key = trim($input);
    endforeach;
} else {
    echo "invalid method";
}
$error_for_email = [];
$error_for_password = [];
if (!required_VALIDATION($email)) {
    $error_for_email[] = "Please Write Your Email";
}
$_SESSION['error_for_email'] = $error_for_email;



if (!required_VALIDATION($password)) {
    $error_for_password[] = "Please Write Your Password";
}
$_SESSION['error_for_password'] = $error_for_password;
// redirect('../pages/login.php');

var_dump($_POST) ;
if (empty($error_for_email) && empty($error_for_password)) {
    $users = get_users("Localhost", "root", "", "tasks", "users");
    $email = $_POST['email'];
    $password = $_POST['password'];
    var_dump($users);
    foreach ($users as $user) {
        foreach ($user as $value) {
            if ($user[2] == $email) {
                if ($user[3] == sha1($password)) {
                    $_SESSION['email'] = $email ;
                    $_SESSION['password'] = $password ;
                    redirect('../pages/home.php') ;
                    die();
                }
            }
        }
    } 
    } else {
    $error_for_email[0] = "Invalid Email";
    $error_for_password[1] = "Invalid password";
            }
            
        
    



$_SESSION['error_for_email'] = $error_for_email;
$_SESSION['error_for_password'] = $error_for_password;
redirect('../pages/login.php');
die; 




// foreach ($array as $index) {
//     foreach ($index as $value) {
        
//     }
// }


// fclose($users_file);
// $error_for_email = [] ; 
//     if(email_exist_VALIDATION($email))
//         {
//             $error_for_email = "Email Is Required"; 
//         }
//     elseif (condition) {
//         # code...
//     }
