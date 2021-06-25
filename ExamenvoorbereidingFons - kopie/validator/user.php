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
    	echo 'U bent niet gemachtigd om deze pagina te bekijken, u word nu verwezen naar de home pagina';

    	 header("refresh:3;url=welcome.php");
    	 exit;
    	
    }else{
    	$message = 'hallo user, ' . $_SESSION['username'];
    }

?>