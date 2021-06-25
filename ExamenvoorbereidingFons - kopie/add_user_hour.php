<?php  
include 'database.php';
include 'validator/admin.php';

$db = new Database();

$users = $db->select("SELECT users.id , users.username FROM users inner join hours on users.id=hours.id ", []);

// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {

//     $db = new Database();

//     $username = ($_POST['username']);

//     $id = $db->select("SELECT id from users WHERE username = :username",[':username' => $username]);

//     $columns = array_keys($id[0]);
//     $row_data = array_values($id);

//     foreach($columns as $column){}
//     foreach($row_data as $rows){}
//     foreach($rows as $data){}
//     echo $data;
//     echo $username;

//     $id = $data;
//     $start_at = ($_POST['start_at']);
//     $end_at = ($_POST['end_at']);
      
//     $db->update_user_hour($id, $start_at, $end_at);
// }
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {

    $db = new Database();

    $username = ($_POST['username']);
    $start_at = ($_POST['start_at']);
    $end_at = ($_POST['end_at']);
      
    $db->update_user_hour_id($username, $start_at, $end_at);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add hour</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

    <?php $page = 'hours'; include'header/header.php'; ?>
   
    <form class="form" method="post">
        <h3>Login</h3>
                <label>Username:</label><br>
                <select name="username" required>
                     
                <?php foreach($users as $rows){
                echo "<option>";
                    echo $rows['username'];
                    
                }?>
            </select><br>
                <label>Start at</label><br>
                <input type="time" name="start_at"><br>
                <label>End at</label><br>
                <input type="time" name="end_at"><br><br>
                <button type="submit" name="add" value="add">Add</button>
                <a href="signup.php">No account? signup here</a>
            </form>
</body>
</html>