<?php 

include_once 'header.php';
include_once 'navbar.php';
include_once 'db.php';

if(isset($_POST['create_btn'])){

    //echo 'working...';
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $query = "INSERT INTO customers(id,firstname,lastname,email,address,phone)";
    $query .= " VALUES('','{$firstname}','{$lastname}','{$email}','{$address}','{$phone}')";

    $insert_query = mysqli_query($CONN,$query);

    if(!$insert_query){
        echo 'Failed Registration '.mysqli_error($CONN);
    }else{
        header('Location:index.php');
    }


}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Customer</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <style>
    #back-button{
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
                <h4 class="text-center">Add New Record</h4>
                <form class="pt-3" method="post" action="add_customer.php">
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
                        <label for="email" class="col-sm-2 col-form-label"><strong>Email:</strong></label>
                        <div class="col-sm-10">
                        <input type="eamil" class="form-control" name="email" placeholder="Enter eamil">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label"><strong>Address:</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label"><strong>Phone:</strong></label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" name="phone" placeholder="phone">
                    </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-secondary" name="create_btn" value="Creat New Record">
                    </div>
                </form>
                <p class="mt-3"><a href="index.php" id="back-button"> Back</a></p>
            </div>
        </div>
    </div>
</body>
</html>



