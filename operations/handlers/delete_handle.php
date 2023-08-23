<?php
session_start();
require('../fun/functions.php');
$errors = [];
if (!check_method()) {
    $errors['method'] = "The method is not defined";
    $_SESSION['invalid_method'] = $errors['method'];
    redirect('../task.php');
    die;
}  else {
    $conn = mysqli_connect("Localhost", "root", "" , "tasks");
    if (!$conn) {
        echo "connect error" . mysqli_connect_error($conn);
    }

    $delete_task = "DELETE from tasks where id = '{$_POST['task_id']}' ; ";
    $new_insert = mysqli_query($conn, $delete_task);
    redirect('../task.php');
}
