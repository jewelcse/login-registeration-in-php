<?php 

include_once 'header.php';
include_once 'navbar.php';
include_once 'db.php';

if(isset($_POST['update_btn'])){

   
    $update_id = $_POST['id'];

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $query = "UPDATE customers SET firstname='{$firstname}',lastname='{$lastname}',email='{$email}',address='{$address}',phone='{$phone}' WHERE id = '{$update_id}' ";
   
    $insert_query = mysqli_query($CONN,$query);

    if(!$insert_query){
        echo 'Failed Update '.mysqli_error($CONN);
    }else{
        header('Location:index.php');
    }


}

        

if(isset($_GET['edit_id'])){
    //echo $_GET['edit_id'];
    $edit_id = $_GET['edit_id'];
    $select_query = "SELECT * FROM customers WHERE id ='{$edit_id}'";
    $execute_select_query = mysqli_query($CONN,$select_query);
    if($execute_select_query){
        $row = mysqli_fetch_assoc($execute_select_query);
        
            $id = $row['id'];
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $email = $row['email'];
            $address = $row['address'];
            $phone = $row['phone'];  
    } 
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Record</title>
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
                <h4 class="text-center">Update Record</h4>
        
                <form class="pt-3" method="post" action="edit_customer.php">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-2 col-form-label"><strong>Firstname:</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label"><strong>Lastname</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><strong>Email:</strong></label>
                        <div class="col-sm-10">
                        <input type="eamil" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label"><strong>Address:</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label"><strong>Phone:</strong></label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-secondary" name="update_btn" value="Update Record">
                    </div>
                </form>
             
                <p class="mt-3"><a href="index.php" id="back-button"> Back</a></p>
            </div>
        </div>
    </div>
</body>
</html>



