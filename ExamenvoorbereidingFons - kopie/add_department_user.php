<?php 
include 'database.php';
include 'validator/both.php';

    $id = $_GET['id'];
    // $compid = $_GET['compid'];
    $db = new Database();

// $users = $db->select("SELECT id, email, username FROM users WHERE id not in(select users.id FROM users inner join department_user on users.id=department_user.user_id)",[]);

$users = $db->select("SELECT id, email, username FROM users WHERE id not in(select users.id FROM users inner join department_user on users.id=department_user.user_id WHERE department_user.departement_id = :id)",['id' => $id]);

// $users = $db->select("SELECT users.id, users.email, users.username FROM department_user inner join users on department_user.user_id=users.id Where department_user.user_id != department_user.departement_id ",[]);



// $users = $db->select("SELECT id, email, username FROM users inner join department_user on users.id=department_user.user_id Where department_user.user_id != department_user.departement_id ",[]);

$department = $db->select("SELECT id, name FROM departments where id = :id", [':id' => $id]);

        
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
    }else{

        $columns = array_keys($users[0]);
        $row_data = array_values($users);

        $departments = array_values($department);
        foreach ($departments as $companies){};

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
                       echo "<a href=add_into_department.php?id=".$rows['id']."&compid=".$companies['id']."><button class=edit>Add into ".$companies['name']."</button></a>";
                       // echo "<a onclick=return confirm(Are you sure?) href=delete_user_hours.php?id=$rows[id]><button class=delete>clear hours</button></a>";
                        // echo "<a href=delete_user.php"?"id=".$rows['id']."onclick=return confirm(are you sure you want to delete this user?)>delete</a>";
}
                   echo "</td>";
            echo "</table>";
            echo "<br>";
            echo "<a><button onclick=history.go(-1);>Terug</button></a>";
            // echo "<a href=add_department_user.php><button type=button>Voeg mensen toe</button></a>";

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