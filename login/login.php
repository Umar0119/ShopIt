<?php
//session_set_cookie_params('3600');
session_start();
require ('../connection.php');
if(isset($_POST['submit'])){
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM customers where email='$username' AND password= '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            $_SESSION["loginUser"] = $row['username'];
            //echo $_SESSION["loginUser"].'<br>';
            //echo "Session id ";
            //echo session_id().'<br>';
            //Print_r ($_SESSION);
            header('Location: ../details.php');
        }
    } else {
        //echo "Invalid username or Password";

           echo "
           <script type=\"text/javascript\">
                function loginstatus(){
                    document.getElementById(\"invalidUserNameOrPassword\").innerHTML = \"Invalid Username or Password\";    
                }
           </script>
       ";
    }
}
else if (isset($_SESSION["loginUser"])){
    header('Location: ../details.php');
    //echo "Your Session id is " . session_id();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="loginPageStyles.css">

    <script type="text/javascript">
        $(document).ready(function(){
            loginstatus();
        });
    </script>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <!--<div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>-->
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="username" name="userName" required>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password" required>
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn" name="submit">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links" style="color: #ffffff ">
                    <span id="invalidUserNameOrPassword"></span>
                </div>
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="../signUp/SignUp.php" onclick="my()">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>