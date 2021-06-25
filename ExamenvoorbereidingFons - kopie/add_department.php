<?php  
include 'database.php';
include 'validator/admin.php';
// $db = new Database();
// var_dump($db);
// $db->create_admin();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {

    $department = ($_POST['department']);
    $postcode = ($_POST['postcode']);

    $db = new Database();
      
    $db->add_department($department, $postcode);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inlog</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <?php $page = 'departments'; include'header/header.php'; ?>
	<form class="form" method="post"> <!-- hoeft geen action = "" ,omdat code op huidige pagina bevindt. -->
        <h3>Add Department</h3>
                <label>department:</label><br> 
                <input required type="text" name="department"><br> 
                <label>postcode:</label><br>
                <input required type="text" name="postcode"><br><br>
                <button type="submit" name="add">add</button>
                
            </form>
</body>
</html>