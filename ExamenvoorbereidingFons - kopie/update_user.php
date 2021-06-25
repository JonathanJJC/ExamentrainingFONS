<?php 

// header('Content-Type:text/plain');
include 'database.php';
include 'validator/both.php';

    $id = $_GET['id'];
    $db = new Database();

$users = $db->select("SELECT id, type_id, email, username, password, updated_at, created_at FROM users WHERE id= :id", [':id' => $id]);
               
foreach($users as $rows){}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    $id = ($_POST['id']);
    $type_id = ($_POST['type_id']);
    $email = ($_POST['email']);
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $db = new Database();
      
    $db->update_user($id, $type_id, $email, $username, $password);
}

$msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
        $folder = "./image/".$filename;
        
        // Get all the submitted data from the form
        // $sql = "INSERT INTO image (filename) VALUES ('$filename')";
 
        // Execute query
        $db->insert_image($id, $filename);
         
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }

  if (isset($_POST['update_img'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "./image/".$filename;

           // $db->select("INSERT INTO image (filename) VALUES ('$filename')", []);
         
        // Get all the submitted data from the form
        // $sql = "INSERT INTO image (filename) VALUES ('$filename')";
 
        // Execute query
        
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
            $db->update_image($id, $filename);
        }else{
            $msg = "Failed to upload image";
      }

    }
  $result = $db->select("SELECT * FROM image WHERE id = :id", [':id' => $id]);
  foreach ($result as $data) {
    // echo "<img src=image/$data[Filename]>";
  }


          

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>


    
    <?php $page = 'userdetails'; include'header/header.php'; ?>
<div>
    
    <label style="padding-left: 15px;">Profile picture:</label><br>
    <?php echo "<img style=padding-left:15px; src=image/$data[Filename]>";?>
 
    
    <form class="image_form" method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="uploadfile" value="" />
            <br>
            <?php  
if (empty($result)) {
    echo "<h1 class=no_data>There is no foto to be seen</h1>";
    echo "<button type=submit name=upload>UPLOAD</button>";
    }else{
               echo "<button type=submit name=update_img>UPDATE</button>";
    }
            ?>
                
        
        
        </form>
   
<form class="form" action="update_user.php?id=<?php echo $rows['id']?>" method="post">
    <input type="hidden" name="id" value="<?php echo ($_GET['id']) ?>">
    <input hidden="text" name="type_id" value="<?php echo $rows['type_id']?>">
    <label>Email</label><br>
    <input type="email" name="email" value="<?php echo  $rows['email']?>"><br>
    <label>Username</label><br>
    <input type="text" name="username" value="<?php echo $rows['username']?>"><br>
    <label>Password</label><br>
    <input type="text" name="password" placeholder="new password"><br><br>
    <label>Updated at</label>
    <?php echo "<strong>" . $rows['updated_at'] . "</strong>";?><br><br>
    <label>Created at</label>
     <?php echo "<strong>" . $rows['created_at'] . "</strong>";?><br><br>
    <button type="submit" name="update" value="Update">Update

    <?php if ($_SESSION['type_id'] == 1) {
        echo "<a href=users.php><button type=button>Users overview</button></a>";
    } ?>
    
</form>
    </div>
</body>
</html>