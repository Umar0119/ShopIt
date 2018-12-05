<?php
    session_start();
    if(isset($_SESSION["loginUser"])){
        session_destroy();
        header('Location: login.php');
    }
    else{
        echo "How is it Possible";
    }
?>