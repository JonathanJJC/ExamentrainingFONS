<?php 
include 'database.php';
session_start();

if(isset($_SESSION['username']) && $_SESSION['username'] == true){

    $_SESSION['loggedin'] = true;

    if ($_SESSION['type_id'] == 1) {
    	$message = 'hello ' . $_SESSION['username'] . ' ,u bent ingelogd als admin';
    }else{
        $message = 'hello ' . $_SESSION['username'] . ' ,u bent ingelogd als user';
    	// echo 'U bent niet gemachtig om aanpassingen te maken, u word nu verwezen naar de inlog pagina';

     //    header("refresh:3;url=index.php");
    }

$id = $_GET['id'];
$db = new Database();

$users = $db->select("SELECT id, type_id, email, username, updated_at, created_at FROM user WHERE id= :id", [':id' => $id]);
               
                foreach($users as $rows){}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $id = ($_POST['id']);
    $type_id = ($_POST['type_id']);
    $email = ($_POST['email']);
    $username = ($_POST['username']);
    $updated_at = ($_POST['updated_at']);

    $db = new Database();
      
    $db->update_user($id, $type_id, $email, $username, $updated_at);


}               
}
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
              <li><a  href="welcome_user.php">Home</a></li>
              <li><a class="active" href="users.php">User details</a></li>
              <li style="float:right;background-color: indianred;"><a href="logout.php">Logout</a></li>
              <li style="float:right"><a href="contact.php">Contact</a></li>
            </ul>
        </header>
        <h1><?php print_r($message); ?></h1>
<form action="update_user_details.php?id=<?php echo $rows['id']?>" method="post">
    <input type="hidden" name="id" value="<?php echo ($_GET['id']) ?>"><br>
    <!-- <label>type_id</label><br> -->
    <!-- <select>  
  <option value="Select">1</option>
  <option value="Select">2</option>}   
    </select>    -->
    <input hidden="text" name="type_id" value="<?php echo $rows['type_id']?>"><br>
    <label>email</label><br>
    <input type="email" name="email" value="<?php echo  $rows['email']?>"><br>
    <label>username</label><br>
    <input type="text" name="username" value="<?php echo $rows['username']?>"><br><br>
    <label>Updated at</label>
    <?php echo $rows['updated_at']?><br><br>
    <label>Created at</label>
     <?php echo $rows['created_at']?><br><br>
    <input type="submit" name="update" value="Update">
</form>
	<a href="logout.php">Logout</a>
    <a href="users.php">users</a>
</body>
</html>