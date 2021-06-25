<?php 
include 'database.php';
include 'validator/user.php';

    $db = new database();

    $users = $db->select("SELECT id, type_id, email, username,  updated_at, created_at FROM user", []);
        $columns = array_keys($users[0]);
        $row_data = array_values($users);
        foreach($columns as $column);
        foreach($row_data as $rows);
        foreach($rows as $data);



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
                echo "<li><a href=users.php>User overzicht</a></li>";

                 }else{
                    echo "<li><a href=update_user_details.php?id=" . $rows['id'] . "\">User details</a></li>";
                 }


              ?>
             
              <li style="float:right;background-color: indianred;"><a href="logout.php">Logout</a></li>
              <li style="float:right"><a href="contact.php">Contact</a></li>
            </ul>
        </header>
        <h1><?php print_r($message); ?></h1>
</body>
</html>