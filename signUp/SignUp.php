<?php
    $name = "";
    $phoneNo = "";
    $userName = "";
    $email = "";
    $postalCode = "";
    $password = "";
    $repeatPass = "";

    if (isset($_POST['submit'])){
        require ('../connection.php');
        $name = $_POST['name'];
        $phoneNo = $_POST['phoneNo'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $postalCode = $_POST['postalCode'];
        $repeatPass = $_POST['repeatPass'];
        $password = $_POST['password'];
        if ($password != $repeatPass){ // if both passwords dose'nt match;
            $password = "";
            $repeatPass = "";
            echo "
               <script type=\"text/javascript\">
                    var success = 0;
                    var error = 1;
                    var message = \"Passwords Do Not Match\";
               </script>";
        }
        else {
            $sql = "INSERT INTO customers (username, password, name, email, phone_no, posta_addressl, is_member, is_active) 
                    values ('$userName', '$password', '$name', '$email', '$phoneNo', $postalCode,
                              1,0)";
            if (mysqli_query($conn, $sql)) { // if Query is Successful;
                $name = "";
                $phoneNo = "";
                $userName = "";
                $email = "";
                $postalCode = "";
                $password = "";
                $repeatPass = "";
                echo "
                    <script type=\"text/javascript\">
                        var success = 1;
                        var error = 0;
                        var message = \"Record Have Been Added Successfully\";  
                    </script>";
                //header('Location: successfulSignUp.php');
            }
            else{  //if Any Error Occur while saving record
                //echo mysqli_error($conn);
                echo "
                    <script type=\"text/javascript\">
                        var success = 0;
                        var error = 2;  
                        var message = \"Something Went Wrong\";
                    </script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="signUpPageStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script type="text/javascript">
        $(document).ready(function(){
            if (error == 2){
                alert(message);
            }
            else if (error == 1) {
                document.getElementById("passwordMissMatch").innerHTML = "Passwords did Not Match";
            }
            else if (success == 1){
                alert("Record Have Been Added Successfully");
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <a href="../login.php" class="float-right btn btn-outline-light mt-1">Log in</a>
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <div class="border-top card-body">
                        <form action="SignUp.php" method="post">
                            <div class="form-row">
                                <div class="col form-group input-group-sm">
                                    <label>Name </label>
                                    <input type="text" class="form-control" placeholder="" name="name" value="<?php echo $name ?>">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group input-group-sm">
                                    <label>Phone No</label>
                                    <input type="text" class="form-control" placeholder="" name="phoneNo"  value="<?php echo $phoneNo ?>">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-group input-group-sm">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="" name="email" value="<?php echo $email ?>">
                                <small class="form-text" style="color: #bbc0c4">We'll never share your email with anyone else.</small>
                            </div> <!-- form-group end.// -->
                            <div class="form-group input-group-sm">
                                <label>User Name</label>
                                <input type="text" class="form-control" placeholder="Type a User Name you Want" name="userName" value="<?php echo $userName ?>">
                            </div> <!-- form-group end.// -->

                            <!--<div class="form-group">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="option1">
                                    <span class="form-check-label"> Male </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="option2">
                                    <span class="form-check-label"> Female</span>
                                </label>
                            </div>  form-group end.// -->

                            <div class="form-row">
                                <div class="form-group col-md-6 input-group-sm">
                                    <label>Postal Address</label>
                                    <input type="text" class="form-control" placeholder="" name="postalCode" value="<?php echo $postalCode ?>">
                                </div> <!-- form-group end.// -->
                                <div class="form-group col-md-6 input-group-sm">
                                    <label>Country</label>
                                    <select id="inputState" class="form-control">
                                        <option> Choose...</option>
                                        <option>United States</option>
                                        <option>Russia</option>
                                        <option selected="">Pakistan</option>
                                        <option>India</option>
                                        <option>Australia</option>
                                    </select>
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row.// -->
                            <div class="form-row">
                                <div class="col form-group input-group-sm">
                                    <label>Create Password</label>
                                    <input type="password" class="form-control" placeholder="" name="password" value="<?php echo $password ?>">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group input-group-sm">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control" placeholder="" name="repeatPass" value="<?php echo $repeatPass ?>">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <small id="passwordMissMatch"></small>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-outline-primary btn-block btn-sm"> Register  </button>
                            </div> <!-- form-group// -->
                            <small class="form-text" style="color: #bbc0c4">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                        </form>
                    </div> <!-- card-body end .// -->
                    <div class="border-top card-body text-center">Have an account? <a href="../login.php">Log In</a></div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->
        </div> <!-- row.//-->
    </div>
</body>
</html>
<!--container end.//

<br><br>
<article class="bg-secondary mb-3">
    <div class="card-body text-center">
        <h3 class="text-white mt-3">Bootstrap 4 UI KIT</h3>
        <p class="h5 text-white">Components and templates  <br> for Ecommerce, marketplace, booking websites
            and product landing pages</p>   <br>
        <p><a class="btn btn-warning" target="_blank" href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com
                <i class="fa fa-window-restore "></i></a></p>
    </div>
    <br><br>
</article>-->