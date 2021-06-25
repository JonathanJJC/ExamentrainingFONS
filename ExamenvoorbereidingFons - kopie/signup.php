<?php  
include 'database.php';
include 'helper.php';
// $db = new Database();
// var_dump($db);
// $db->create_admin();


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])){
$fields = ['username','password','email'];

 
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    

    $db = new Database();
      
    $db->create_user($email,$username, $password );

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
              <li><a href="index.php">Login</a></li>
              <li><a class="active" href="signup.php">Signup</a></li>
              <li style="float:right"><a href="contact.php">Contact</a></li>
              
            </ul>
        </header>

	<form class="form" method="post"> <!-- hoeft geen action = "" ,omdat code op huidige pagina bevindt. -->
        <h3>Signup</h3>
                <label>Username:</label><br> 
                <input required type="text" name="username"><br> 
                <label>Password:</label><br>
                <input required type="password" name="password"><br>
                <label>email:</label><br>
                <input required type="email" name="email"><br><br>
                <button type="submit" name="signup">Signup</button>
                <a class="export" href="index.php">Login</a>
            </form>
        
</body>
</html>