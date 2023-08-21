<?php   session_start() ; ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Page </title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="register-box">
		<h1>Register</h1>
		<form action="register_handle.php" method="POST">
<!-------------------------------------------- username input ------------------------------------------------------------------>
			<label for="username">Username</label>
			<input type="text" placeholder="Enter Username" id="username" name="username" >
<!------------------------------------ validation for username------------------------------------------------------------------>
            <?php  
                if (isset($_SESSION['$errors_for_username'] )) : ?>
					<div style="color:#d40000 ;  padding : 5px ; font-weight : bold ;">
                        <?php    
							foreach ($_SESSION['$errors_for_username'] as  $value) {
                                echo $value ; 
                            }
						?>
					</div>
					<br>
                <?php endif ?>
			<?php
            unset($_SESSION['$errors_for_username']) ;
			
            ?>
			
<!-------------------------------------------- Email input --------------------------------------------------------------------->
			<label for="email">Email</label>
			<input type="email" placeholder="Enter Email" id="email" name="email" >
<!------------------------------------ validation for Email -------------------------------------------------------------------->
			<?php  
                if (isset($_SESSION['$errors_for_email'] )) : ?>
					<div style="color:#d40000 ;  padding : 5px ; font-weight : bold ;">
                        <?php    
							foreach ($_SESSION['$errors_for_email'] as  $value) {
                                echo $value ; 
                            }
						?>
					</div>
					<br>
                <?php 
				endif  ; 
				?>
			<?php
            unset($_SESSION['$errors_for_email']) ; 
            ?>
<!-------------------------------------------- Password input ------------------------------------------------------------------>
			<label for="password">Password</label>
			<input type="password" placeholder="Enter Password" id="password" name="password" >
<!------------------------------------ validation for Password -------------------------------------------------------------------->
			<?php  
                if (isset($_SESSION['$errors_for_password'] )) : ?>
					<div style="color:#d40000 ;  padding : 10px ; font-weight : bold ;">
                        <?php    
							foreach ($_SESSION['$errors_for_password'] as  $value) {
                                echo $value ; 
                            }
						?>
					</div>
					
                <?php  endif ?>
			<?php
            unset($_SESSION['$errors_for_password']) ; 
            ?>

<!-------------------------------------------- image input ------------------------------------------------------------------>
			<label for="image">Image</label>
            <br>
			<input type="file" id="image" name="image">
                <br> 
                <br>
<!------------------------------------ validation for image  -------------------------------------------------------------------->
<?php  
                if (isset($_SESSION['$errors_for_image'] )) : ?>
					<div style="color:#d40000 ;  padding : 10px ; font-weight : bold ;">
                        <?php    
							foreach ($_SESSION['$errors_for_image'] as  $value) {
                                echo $value ; 
                            }
						?>
					</div>
					
                <?php  endif ?>
			<?php
            unset($_SESSION['$errors_for_image']) ; 
            ?>
			<input type="submit" value="Register">
			<p>Already have an account? <a href="login_page.php">Login here</a></p>
		</form>
	</div>

</body>
</html>