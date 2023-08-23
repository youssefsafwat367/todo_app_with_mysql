<?php
include_once('../cont/functions.php');
session_start();
if (empty($_SESSION)) {
    redirect('../pages/login.php');
}
$id = get_id("Localhost", "root", "", "tasks", "users", "{$_SESSION['email']}");
$_SESSION['id'] = $id ;
$user_name = get_name("Localhost", "root", "", "tasks", "users", "yousefsafwat367@gmail.com");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="welcome-box">
        <h1>Welcome!</h1>
        <p>You are now logged in.</p>
        <?php

        echo "<h4 class=\"username\">";
        echo  "Your Name  is : {$user_name} " . "<br>";
        echo "</h4>";
        echo "<h4 class=\"email\">";
        echo "Your Email is : {$_SESSION['email']}" . "<br>";
        echo "</h4>";
        ?>
        <div>
            <a href=""></a>
            <a href="../operations/task.php?id=<?php echo $_SESSION['id']; ?>" class="tasks">Tasks</a>
        </div>
        <br>
        <a href="./logout.php">Logout</a>
    </div>
</body>

</html>