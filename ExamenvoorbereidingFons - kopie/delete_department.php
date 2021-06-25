<?php  
include 'database.php';
session_start();

if(isset($_SESSION['username']) && $_SESSION['username'] == true){

    $_SESSION['loggedin'] = true;

    if ($_SESSION['type_id'] == 1) {
    	echo 'hello ' . $_SESSION['username'] . ' ,u bent ingelogd als admin. ';
    	echo "deleten van department met id =  " . $_GET['id'] . " goedgekeurd";
    	
    }else{
    	echo 'U bent niet gemachtig voor deze pagina, u word nu verwezen naar de inlog pagina';

    header("refresh:3;url=welcome_user.php");
    exit;
    }
}

$db = new database();
$id = $_GET['id'];
$db->delete_department( [':id' => $id]);

header("refresh:1;url=departments.php");



?>