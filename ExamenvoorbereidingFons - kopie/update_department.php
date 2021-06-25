<?php 
include 'database.php';
include 'validator/both.php';

    $id = $_GET['id'];
    $db = new Database();

$users = $db->select("SELECT * FROM departments WHERE id= :id", [':id' => $id]);
               
foreach($users as $rows){}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $id = ($_POST['id']);
    $name = ($_POST['name']);
    $postcode = ($_POST['postcode']);

    $db = new Database();
      
    $db->update_department($id, $name, $postcode);


}               

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <?php $page = 'departments'; include'header/header.php'; ?>
    
<form class="form" action="update_department.php?id=<?php echo $rows['id']?>" method="post">
    <input type="hidden" name="id" value="<?php echo ($_GET['id']) ?>"><br>
    <label>company</label><br>
    <input type="text" name="name" value="<?php echo  $rows['name']?>"><br>
    <label>postcode</label><br>
    <input type="text" name="postcode" value="<?php echo $rows['postcode']?>"><br><br>
    <label>Updated at</label>
    <?php echo "<strong>" . $rows['updated_at'] . "</strong>";?><br><br>
    <label>Created at</label>
     <?php echo "<strong>" . $rows['created_at'] . "</strong>";?><br><br>
    <button type="submit" name="update" value="Update">Update</button>
    <a href="users.php"><button type="button">Users overview</button></a>
</form>
    
</body>
</html>