<?php 

include_once 'db.php';

if(isset($_POST['register_btn'])){

    //echo 'working...';
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    //echo $firstname." ".$lastname." ".$username." ".$email." ".$password;

    $query = "INSERT INTO user(id,firstname,lastname,username,email,user_pass)";
    $query .= " VALUES('','{$firstname}','{$lastname}','{$username}','{$email}','{$password}')";

    $insert_query = mysqli_query($CONN,$query);

    if(!$insert_query){
        echo 'Failed Registration '.mysqli_error($CONN);
    }else{
        header('Location:login.php');
    }


}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <style>
    #create-account{
        color:#fff;
        text-decoration:none;
    }
    h4,p,strong{
        color:#fff;
    }
    
    </style>
</head>
<body>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-6 shadow-lg bg-info m-auto border rounded  p-5">
                <h4 class="text-center">Registration Form</h4>
                <form class="pt-3" method="post" action="registration.php">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-2 col-form-label"><strong>Firstname:</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="fname" placeholder="Enter Firstname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label"><strong>Lastname</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="lname" placeholder="Enter Lastname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label"><strong>Username:</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="uname" placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><strong>Email:</strong></label>
                        <div class="col-sm-10">
                        <input type="eamil" class="form-control" name="email" placeholder="Enter eamil">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label"><strong>Password:</strong></label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-secondary" name="register_btn" value="Register">
                    </div>
                </form>
                <p class="mt-3">Have an account?<a href="login.php" id="create-account"> Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>



