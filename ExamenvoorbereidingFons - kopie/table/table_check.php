<!-- <?php 
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
                       echo "<a href=update_user.php?id=".$rows['user_id']."><button class=edit>edit</button></a>";
                       echo "<a onclick=return confirm(Are you sure?) href=delete_user.php?id=$rows[user_id]><button class=delete>delete</button></a>";
                        // echo "<a href=delete_user.php"?"id=".$rows['id']."onclick=return confirm(are you sure you want to delete this user?)>delete</a>";
}
                   echo "</td>";
            echo "</table>";
            echo "<br>";
            echo "<a><button onclick=history.go(-1);>Terug</button></a>";

        echo "</div>";}?> -->
