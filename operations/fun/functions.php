<?php
function check_method()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        return true;
    } else {
        return false;
    }
}

function redirect($path)
{
    echo header("Location:$path");
}

function required($input)
{
    if (!empty($input)) {
        return true;
    } else {
        return false;
    }
}

function sanitize($input){
    return trim(htmlspecialchars(htmlentities($input))) ;
}

function get_tasks_from_database($servername ,$username ,$password , $database_name , $table_name){
    try {
        $id = get_id("Localhost", "root", "", "tasks", "users", "{$_SESSION['email']}");
        $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
        // set the PDO error mode to exception
        $res = $conn->query("SELECT * from $table_name WHERE user_id = '$id' "); ;
        return $res ; 
    } catch (PDOException $e) {
        return "Connection failed: " . $e->getMessage();
    }
}
function insert_new_task($table_name , $tasks_in_database , $new_task) {
    $result = $tasks_in_database->prepare("INSERT INTO $table_name(task_name) values ($new_task)");
    return $result->execute();
}

//------------------------------------ get user id function ------------------------------ 
function get_id($hostname, $username, $password, $database, $table_name,  $email)
{
    $conn = mysqli_connect($hostname, $username, $password,  $database);
    if (!$conn) {
        return "connect error" . mysqli_connect_error($conn);
    }
    $sql = "SELECT id FROM $table_name  WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $res  = $result->fetch_all();
    $id = $res[0][0];
    return $id;
}
