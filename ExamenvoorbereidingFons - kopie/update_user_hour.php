<?php 
include 'database.php';
include 'validator/both.php';

    $id = $_GET['id'];
    $db = new Database();

$users = $db->select("SELECT users.username ,hours.id, hours.start_at, hours.end_at, hours.created_at, hours.updated_at FROM hours INNER JOIN users ON hours.id = users.id WHERE users.id= :id", [':id' => $id]);
               
foreach($users as $rows){}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $id = ($_POST['id']);
    $start_at = ($_POST['start_at']);
    $end_at = ($_POST['end_at']);

    $db = new Database();
      
    $db->update_user_hour($id, $start_at, $end_at);


}               

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <?php $page = 'hours'; include'header/header.php'; ?>
   
        <?php 

        if (empty($users)) {
            echo "<h1 class=no_data>There is no data to be seen</h1>";
        }else{
            include 'update_user_hour_form.php';
        }

         ?>
    
</body>
</html>