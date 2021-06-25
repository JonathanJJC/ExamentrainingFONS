<?php  
include 'database.php';
// include 'validator/both.php';

$db = new Database();
$db->insert_admin();
$db->insert_user();
// $db = new Database();
// var_dump($db);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $db = new Database();
      
    $db->login($username, $password);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inlog</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <header>
            <ul>
             <li><a class="back" onclick="history.go(-1);">Terug</a></li>  
              <li><a class="active"href="index.php">Login</a></li>
              <li><a href="signup.php">Signup</a></li>
              <li style="float:right"><a href="contact.php">Contact</a></li>
              
            </ul>
        </header>
	<form class="form" method="post">
        <h3>Login</h3>
                <label>Username:</label><br> 
                <input required type="text" name="username"><br> 
                <label for="password" >Password:</label><br>
                <input required type="password" name="password"><br><br>
                <button type="submit" name="login" value="Login">Login</button>
                <a class="export" href="signup.php">Signup</a>
            </form>
</body>
</html>