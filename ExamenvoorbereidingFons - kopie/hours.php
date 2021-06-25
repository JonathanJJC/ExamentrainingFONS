<?php 
include 'database.php';
include 'validator/admin.php';
include 'export.php';

$db = new database();
$users = $db->select("SELECT hours.id, usertype.type, users.username, departments.name, hours.start_at, hours.end_at, hours.created_at, hours.updated_at FROM HOURS 
    LEFT JOIN users ON hours.id = users.id
    LEFT join department_user ON department_user.user_id = users.id
    LEFT JOIN departments ON department_user.departement_id = departments.id
    LEFT JOIN usertype ON users.type_id = usertype.id", []);
    
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

    <?php $page = 'hours'; include'header/header.php'; ?>
    
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
                    echo "<td>$data</td>";}?>
                    <td>
                        <a href="update_user_hour.php?id=<?php echo $rows['id']?>"><button class="edit">edit</button></a>

                        <a onclick=return confirm(Are you sure?) href="delete_user_hours.php?id=<?php echo $rows['id']?>"><button class=delete>clear hours</button></a>
                        <form action="hours.php?id=<?php echo $rows['id']?>" class=export_form  method='post'>

                         <button class=export type='submit' name='hours' value='Export to excel file'/>Export</button>
             </form>
                        
                    </td>
                <?php 
                    } 
                ?>

    </table>
<Br>
<?php  
echo "<a onclick=history.go(-1);><button> Terug</button></a>";
echo "<a href=add_user_hour.php><button class=edit>Add hours</button></a>";
            echo "<form class=export_form  method='post'>";
            
            echo "<button class=export type='submit' name='exports' value='Export to excel file'/>Export to excel file</button>";
            echo "</form>";?>
    
</div>
</body>
</html>