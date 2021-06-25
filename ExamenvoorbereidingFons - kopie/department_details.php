<?php 
include 'database.php';
include 'validator/both.php';

    $id = $_GET['id'];
    $db = new Database();


$users = $db->select("SELECT departments.id, departments.name, users.id, users.username, hours.start_at, hours.end_at
    FROM department_user
    INNER JOIN users ON department_user.user_id = users.id
    INNER JOIN departments ON department_user.departement_id = departments.id
    INNER JOIN hours ON users.id = hours.id
 WHERE department_user.departement_id = :departement_id", ['departement_id' => $id]);

// $users = $db->select("SELECT departments.name AS company, user.username, hours.start_at, hours.end_at FROM department_user 
//     INNER JOIN departments ON id = departement_id 
//     INNER JOIN user ON user.id = user_id 
//     INNER JOIN hours ON hours.id = user.id
//     WHERE departement_id=:id", [':id' => $id]);
        
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $id = ($_POST['id']);
    $start_at = ($_POST['start_at']);
    $end_at = ($_POST['end_at']);

    $db = new Database();
      
    $db->update_user_hour($id, $start_at, $end_at);
}               

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])) {

    $id = $_GET['id'];
    $username = ($_POST['username']);

    $db = new Database();
      
    $db->inser_user_department($id, $username);
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

    <?php 
    if (empty($users)) {
    echo "<h1 class=no_data>There is no data to be seen</h1>";
    echo "<div>";
        echo "<a href=add_department_user.php?id=".$id."><button type=button>Voeg mensen toe</button></a>";
     echo "</div>";
    }else{

        $columns = array_keys($users[0]);
        $row_data = array_values($users);

        echo "<div>";
            echo "<table class=table>";
                echo "<tr>";
                    foreach($columns as $column){
                        echo "<th><strong>$column</strong></th>";
                    }
            echo "<th>action</th>";           
            foreach($row_data as $rows){
                echo "<tr>";
                  foreach($rows as $data)
                    echo "<td>$data</td>";
                    
                echo "<td>";
                       echo "<a href=update_user_hour.php?id=".$rows['id']."><button class=edit>edit hours</button></a>";
                       echo "<a onclick=return confirm(Are you sure?) href=delete_user_hours.php?id=$rows[id]><button class=export>clear hours</button></a>";
                       echo "<a onclick=return confirm(Are you sure?) href=delete_user_departments.php?id=$rows[id]><button class=delete>clear user</button></a>";
                        // echo "<a href=delete_user.php"?"id=".$rows['id']."onclick=return confirm(are you sure you want to delete this user?)>delete</a>";
}
                   echo "</td>";
            echo "</table>";
            echo "<br>";
            echo "<a><button onclick=history.go(-1);>Terug</button></a>";
            echo "<a href=add_department_user.php?id=".$id."><button type=button>Voeg mensen toe</button></a>";

        echo "</div>";}?>
                
   <!-- <form method="post"> 
        <h3>Voeg mensen toe</h3>
                <label>Personen:</label><br> 
                <select name="username">
                    <?php foreach($users as $user){ ?>
                <option value="<?php echo $user['username'];?>"><?php echo $user['username'];     ?></option> 
                <?php } ?>
                </select><br><br>
                <button type="submit" name="insert">Signup</button>
            </form> -->
</body>
</html>