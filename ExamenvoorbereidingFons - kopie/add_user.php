<?php  
include 'database.php';
include 'validator/admin.php';
// $db = new Database();
// var_dump($db);
// $db->create_admin();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup']) && isset($_POST['admin'])) {

    $email = trim(strtolower($_POST['email'])); 
    $username = trim(strtolower($_POST['username']));
    $password = trim(strtolower($_POST['password']));

        $db = new Database();
      
        $db->create_admin($email, $username, $password);

}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    $email = trim(strtolower($_POST['email'])); 
    $username = trim(strtolower($_POST['username']));
    $password = trim(strtolower($_POST['password']));

        $db = new Database();
        $db->create_user( $email, $username, $password);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Inlog</title>
     <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <?php $page = 'add_user'; include'header/header.php'; ?>
    <!-- <?php 
              //main header menu
               echo "<header>";
               echo "<ul>";
               echo "<li><a class=back onclick=history.go(-1);>Terug</a></li>";
               echo "<li><a href=welcome.php>Home</a></li>"; 

                if ($_SESSION['type_id'] == 1) {
                    //admin krijgt admin rechten te zien, en users krijgen user rechten te zien
                    echo "<li><a class=active href=add_user.php>Add user</a></li>";
                    echo "<li><a href=users.php>User overzicht</a></li>";
                    echo "<li><a href=hours.php>Hour overview</a></li>";
                    echo "<li><a href=departments.php>Departments overview</a></li>";



                }else{
                    //user krijgt user rechten te zien, en users krijgen user rechten te zien
                    echo "<li><a href=update_user.php?id=" . $_SESSION['id'] . ">User details</a></li>";
                    echo "<li><a href=update_user_hour.php?id=" . $_SESSION['id'] . ">Hour overview</a></li>";
                   echo "<li class=message><a href=update_user.php?id=" . $_SESSION['id'] . ">$message</a></li>";
                 }
                 //main side header menu
                    echo "<li style=float:right;background-color:indianred;><a href=logout.php>Logout</a></li>";
                    echo "<li style=float:right><a href=contact.php>Contact</a></li>";
                    echo "<li class=message><a href=update_user.php?id=" . $_SESSION['id'] . ">$message</a></li>";
                    echo "</ul>";
                    echo "</header>"; 
              ?> -->

        
	<form class='form' method="post">
        <h3>Signup</h3>
                <label>Admin:</label><br> 
                <input type="checkbox" name="admin"><br> 
                <label>Username:</label><br> 
                <input required type="text" name="username"><br> 
                <label>Email:</label><br>
                <input required type="email" name="email"><br>
                <label>Password:</label><br>
                <input required type="password" name="password"><br><br>
                
                <button type="submit" name="signup">Signup</button>
            </form>
</body>
</html>