<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="login-box">
        <h1>Login</h1>
        <form action="../handlers/login_handle.php" method="POST">
            <label for="email">Email</label>
            <input type="text" placeholder="Enter Your Email" id="email" name="email">
            <!------------------------------------ validation for Email -------------------------------------------------------------------->
            <?php
            if (isset($_SESSION['error_for_email'])) : ?>
                <div style="color:#d40000 ;  padding : 5px ; font-weight : bold ;">
                    <?php
                    foreach ($_SESSION['error_for_email'] as  $value) {
                        echo $value;
                    }
                    ?>
                </div>
                <br>
            <?php
            endif;
            ?>
            <?php
            unset($_SESSION['error_for_email']);
            ?>
            <label for="password">Password</label>
            <input type="password" placeholder="Enter Your Password" id="password" name="password">
            <!------------------------------------ validation for Password -------------------------------------------------------------------->
            <?php
            if (isset($_SESSION['error_for_password'])) : ?>
                <div style="color:#d40000 ;  padding : 10px ; font-weight : bold ;">
                    <?php
                    foreach ($_SESSION['error_for_password'] as  $value) {
                        echo $value;
                    }
                    ?>
                </div>

            <?php endif ?>
            <?php
            unset($_SESSION['error_for_password']);
            ?>
            <input type="submit" value="Login">
            <p>Don't have an account? <a href="./register.php">Register here</a></p>

        </form>
    </div>
</body>

</html>