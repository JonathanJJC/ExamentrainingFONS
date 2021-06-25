<?php 
include 'database.php';
include 'validator/admin.php';
include 'export.php';

$db = new database();
$users = $db->select("SELECT * FROM departments", []);
// $users = $db->select("SELECT companies.name, users.id, users.username, hours.start_at, hours.end_at FROM companies_users 
//     INNER JOIN companies ON id = companies_id 
//     INNER JOIN users ON users.id = users_id 
//     INNER JOIN hours ON hours.users_id = users.id
//     WHERE companies_users.companies_id=:id", [':id' => $id]);
    
        $columns = array_keys($users[0]);
        $row_data = array_values($users);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    
    <?php $page = 'departments'; include'header/header.php'; ?>

        <div>
    <table class="table">
            <tr>
                <?php foreach($columns as $column){
                    echo "<th><strong>$column</strong></th>";
                }?>   
            <th>action</th>
            <?php foreach($row_data as $rows){
                echo "<tr>";
                  foreach($rows as $data){
                    echo "<td>$data</td>";  }?>
                    <td>
                        <a href="update_department.php?id=<?php echo $rows['id']?>"><button class="edit">edit</button></a>
                        <a href="delete_department.php?id=<?php echo $rows['id']?>"onclick="return confirm('are you sure you want to delete this user?')"><button class="delete">delete</button></a>
                        <a href="department_details.php?id=<?php echo $rows['id']?>"><button class="view">view</button></a>
                        <form action="departments.php?id=<?php echo $rows['id']?>" class=export_form  method='post'>
                        <button class=export type='submit' name='department' value='Export to excel file'/>Export</button>
            </form>
                    </td>
                <?php 
                    } 
                ?>

    </table>
<br>
<a href="add_department.php"><button type="button">add department</button></a>
    <form class=export_form  method='post'>
            
            <button class=export type='submit' name='departments' value='Export to excel file'/>Export to excel file</button>
            </form>
     
</div>
</body>
</html>