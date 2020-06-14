
<?php 

session_start();

include_once 'db.php';

if(isset($_POST['login_btn'])){

    //echo 'working...';

    $email = $_POST['email'];
    $password = $_POST['pass'];
    //$email = "jon@gmail.com";
    //$password = "123";
    //echo $email." ".$password;

    $query = "SELECT * FROM user WHERE email='{$email}' AND user_pass='{$password}'";
    $login_query = mysqli_query($CONN,$query);
    $row_count = mysqli_num_rows($login_query);
    if($row_count == 1){
        header('Location:index.php');
    }else{
        $_SESSION['error_msg'] = "Email or Password is Wrong! Please try again.";
        //echo 'Login Failed '.mysqli_error($CONN);
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
                <h4 class="text-center">Login Form</h4>
                
                    <?php if(isset($_SESSION['error_msg'])){ ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error_msg'];  ?>
                    </div>
                    <?php } ?>
                
                <form class="pt-3" method="post" action="login.php">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><strong>Email:</strong></label>
                        <div class="col-sm-10">
                        <input type="eamil" name="email" required class="form-control" placeholder="Enter eamil">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label"><strong>Password:</strong></label>
                        <div class="col-sm-10">
                        <input type="password" name="pass" required class="form-control" placeholder="Password">
                    </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="login_btn" class="btn btn-secondary" value="Login">
                    </div>
                </form>
                <p class="mt-3">Don't have an account?<a href="registration.php" id="create-account"> Create Account</a></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

unset($_SESSION['error_msg']);


?>