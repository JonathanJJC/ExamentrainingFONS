<?php  
include 'validator/both.php';


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FlowerPower</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
	<body>
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
                    echo "<li><a href=update_user_hour.php?id=" . $_SESSION['id'] . ">Hour overview</a></li>";
                 }
                 //main side header menu
                    echo "<li style=float:right;background-color:indianred;><a href=logout.php>Logout</a></li>";
                    echo "<li style=float:right><a class=active href=contact.php>Contact</a></li>";
                    echo "</ul>";
                    echo "</header>"; 
                    echo "<h1 class=message>$message</h1>";
              ?>
		<section class="articleimage">
			<img src="https://thumbs.dreamstime.com/b/letter-block-word-admin-wood-background-187713195.jpg">
			<img style="float: right;" src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YWRtaW58ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80">
		</section>
<footer	class="contact"			>
  				<p>Contact</p>
  					<address>
					    You can contact author at <a href="http://www.somedomain.com/contact">
					    www.somedomain.com</a>.<br>
					    If you see any bugs, please <a href="mailto:webmaster@somedomain.com">
					    contact webmaster</a>.<br>
					    You may also want to visit us:<br>
					    Mozilla Foundation<br>
					    331 E Evelyn Ave<br>
					    Mountain View, CA 94041<br>
					    USA
  					</address>

  		</footer>
		
	</body>

	
</html>