<?php
session_start();
require('../fun/functions.php');
$errors = [];
if (!check_method()) {
    $errors['method'] = "The method is not defined";
    $_SESSION['invalid_method'] = $errors['method'];
    redirect('../task.php');
    die;
} elseif (!required($_POST['task'])) {
    $errors['empty_task'] = "The task name is required";
    $_SESSION['empty_task'] = $errors['empty_task'];
    redirect('../task.php');
    die;
} else {
    $new_task = sanitize($_POST['task']);
    $conn = mysqli_connect("Localhost", "root", "" , "tasks");
    if (!$conn) {
        echo "connect error" . mysqli_connect_error($conn);
    }
    
    $id = get_id("Localhost", "root", "", "tasks", "users", "{$_SESSION['email']}");
    $insert_new_task = "INSERT INTO `tasks`(`task` , `user_id`) values ('$new_task' , $id) ";
    $new_insert = mysqli_query($conn, $insert_new_task);
    redirect('../task.php') ;
}
