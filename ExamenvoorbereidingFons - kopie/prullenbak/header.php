<?php 
              //main header menu
               echo "<header>";
               echo "<ul>";
               echo "<li><a class=back onclick=history.go(-1);>Terug</a></li>";
               echo "<li><a href=welcome.php>Home</a></li>"; 

                if ($_SESSION['type_id'] == 1) {
                    //admin krijgt admin rechten te zien, en users krijgen user rechten te zien
                     echo "<li><a href=add_user.php>Add user</a></li>";
                    echo "<li><a href=users.php>User overzicht</a></li>";
                    echo "<li><a href=hours.php>Hour overview</a></li>";
                    echo "<li><a href=departments.php>Departments overview</a></li>";

                }else{
                    //user krijgt user rechten te zien, en users krijgen user rechten te zien
                    echo "<li><a href=update_user.php?id=" . $_SESSION['id'] . ">User details</a></li>";
                    echo "<li><a class=active href=update_user_hour.php?id=" . $_SESSION['id'] . ">Hour overview</a></li>";
                 }
                 //main side header menu
                    echo "<li style=float:right;background-color:indianred;><a href=logout.php>Logout</a></li>";
                    echo "<li style=float:right><a href=contact.php>Contact</a></li>";
                    echo "<li class=message><a href=update_user.php?id=" . $_SESSION['id'] . ">$message</a></li>";
                    echo "</ul>";
                    echo "</header>"; 
                    

                    // if ($_SESSION['usertype_id'] == 1) {
                    // echo "<section class=articleimage>";
                    //     echo "<img src=https://thumbs.dreamstime.com/b/letter-block-word-admin-wood-background-187713195.jpg>";
                    //     echo "<img style=float: right; src=https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YWRtaW58ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80>";
                    // echo "</section>";
                    // }else{
                    // echo "<section class=articleimage>";
                    //     echo "<img src=https://userdefenders.com/wp-content/uploads/2021/02/User-Defenders-Logo-Web.png>";
                    //     echo "<img style=float: right; src=https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YWRtaW58ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80>";
                    // echo "</section>";
                    // }
              ?>
