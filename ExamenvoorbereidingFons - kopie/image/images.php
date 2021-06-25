<?php

include '../database.php';
  $msg = "";
 $db = new database();
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
        $folder = "".$filename;
         
    
 
        // Get all the submitted data from the form
        $sql = "INSERT INTO image (filename) VALUES ('$filename')";
 
        // Execute query
        $db->select("INSERT INTO image (filename) VALUES ('$filename')", []);
         
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
  $result = $db->select("SELECT * FROM image", []);
  foreach ($result as $data) {
  	echo "<img src=$data[Filename]>";
  }
?>
<!DOCTYPE html>
<html>
 
<head>
    <title>Image Upload</title>
    <link rel="stylesheet"
          type="text/css"
          href="style.css" />
</head>
 
<body>
</body>
    <div id="content">
 
        <form method="POST"
              action=""
              enctype="multipart/form-data">
            <input type="file"
                   name="uploadfile"
                   value="" />
 
            <div>
                <button type="submit"
                        name="upload">
                  UPLOAD
                </button>
            </div>
        </form>
    </div>
</body>
 
</html>