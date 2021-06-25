<?php  

include 'database.php';

$db = new database();
$id = $_GET['id'];
$compid = $_GET['compid'];
echo $id;
echo $compid;

$db->add_into_department( $compid, $id );

header("refresh:0;url=add_department_user.php?id=$compid");


?>