<?php session_start() ;
$id = $_SESSION['my_own_id'] ;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="welcome-box">
		<h1>Welcome!</h1>
		<p>You are now logged in.</p>
          <?php
          $users = json_decode(file_get_contents('./users/users.json') , true) ;
          foreach ($users as  $user) {
            if ($_SESSION['author'][1] == $user['email']) {
                  $id = $user['id'] ;
            }
          }
          echo "<h4 class=\"username\">" ; 
                echo  "Your Name  is : {$_SESSION['my_name']} " . "<br>";
          echo "</h4>" ;
          echo "<h4 class=\"email\">" ; 
                echo "Your Email is : {$_SESSION['my_email']}" . "<br>" ;
          echo "</h4>" ;
          ?>  
          <div>
            <a href="./operations/view.php?id=<?php echo $id;?>" class ="view" >View</a>
            <a href="./operations/update.php?id=<?php echo $id;?>" class ="update">Update</a>
            <a href="./operations/delete.php?id=<?php echo $id;?>" class ="delete">Delete</a>
            <br>
            <br>
            <a href="./operations/tasks.php?id=<?php echo $id;?>" class ="tasks">Tasks</a>
    
      </div>
          <br>
		<a href="login_page.php">Logout</a>
	</div>
</body>
</html> 