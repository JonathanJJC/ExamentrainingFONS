<?php  
session_start();

if(isset($_SESSION['username']) && $_SESSION['username'] == true){

    $_SESSION['loggedin'] = true;
    // echo $_SESSION['id'];
}else{
    echo "<strong>u bent niet ingelogd. u word nu verwezen naar de inlog pagina</strong>";
    header("refresh:3;url=index.php");
    exit;
}

    if ($_SESSION['type_id'] == 1) {
    	$message = 'hallo admin, ' . $_SESSION['username'];
    	
    }else{
    	echo '<h1>U bent niet gemachtig voor deze pagina, u word nu verwezen naar de inlog pagina</h1>';

    header("refresh:3;url=index.php");
    exit;
    }

?>