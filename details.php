<?php
    //session_set_cookie_params('3600');
    session_start();
    if(isset($_SESSION["loginUser"])){
        echo "Welcome to details page " . '<br>';
        echo "Your Session id is " . session_id();
    }
    else {
        header('Location: login/login.php');
        //echo "You are not signed in";
    }
?>


<!DOCTYPE>
<html>
<head>
</head>
<body>
    <?php
      echo '<a href="logout.php">Logout</a>';
    ?>
</body>
</html>
