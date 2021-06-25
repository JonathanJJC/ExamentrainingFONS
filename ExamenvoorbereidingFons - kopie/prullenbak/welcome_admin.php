<?php 
include 'database.php';
include 'validator/admin.php'
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <header>
            <ul>
                <li><a class="back" onclick="history.go(-1);">Terug</a></li>  
              <li><a class="active" href="#home">Home</a></li>
              <?php 
               
              if ($_SESSION['type_id'] == 1) {
    
                echo "<li><a href=signup_admin.php>Voeg admin toe</a></li>";
                echo "<li><a href=signup_user.php>Voeg user toe</a></li>";
                echo "<li><a href=users.php>User details</a></li>";

                 }else{
                    echo "<li><a href=update_user_details.php?id=" . $rows['id'] . "\">User details</a></li>";
                 }

              ?>
              <li style="float:right;background-color: indianred;"><a href="logout.php">Logout</a></li>
              <li style="float:right"><a href="contact.php">Contact</a></li>
            </ul>
        </header>
        <h1><?php print_r($message); ?></h1>
    <br>
</body>
</html>