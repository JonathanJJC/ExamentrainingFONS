<?php 
include 'database.php';
include 'export.php';

//validator checkt wie ingelogd is, als niemand is ingelogd dan word de gebruiker verwezen naar de inlog pagina
include 'validator/admin.php';

$db = new database();
$users = $db->select("SELECT users.id, users.type_id ,usertype.type, users.username, users.email, users.updated_at, users.created_at 
    FROM users 
    INNER JOIN usertype ON users.type_id = usertype.id", []);



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    
     <?php $page = 'users'; include'header/header.php'; ?>
   
        <?php 
    if (empty($users)) {
    echo "<h1 class=no_data>There is no data to be seen</h1>";
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
                       echo "<a style=float:left; href=update_user.php?id=".$rows['id']."><button class=edit>edit</button></a>";
                       echo "<a style=float:left; onclick=return confirm(Are you sure?) href=delete_user.php?id=$rows[id]><button class=delete>delete</button></a>";
                       echo "<form action=users.php?id=".$rows['id']." class=export_form style=float:left; method='post'>";
                        echo "<button class=export type='submit' name='export_id' value='Export to excel file'/>Export</button>";
            echo "</form>";
                        // echo "<a href=delete_user.php"?"id=".$rows['id']."onclick=return confirm(are you sure you want to delete this user?)>delete</a>";
}
                   echo "</td>";
            echo "</table>";
            echo "<br>";
           echo "<a onclick=history.go(-1);><button> Terug</button></a>";
            echo "<form class=export_form  method='post'>";
            
            echo "<button class=export type='submit' name='export' value='Export to excel file'/>Export to excel file</button>";
            echo "</form>";

        echo "</div>";}?>

</div>
</body>
</html>