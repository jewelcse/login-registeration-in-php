
<?php include_once 'header.php' ; ?>
<?php include_once 'navbar.php' ; ?>
<?php 


include_once 'db.php' ; 



if (isset($_GET['delete_id'])) {


    $cus_id = $_GET['delete_id'];

    $query = "DELETE FROM customers WHERE id = '{$cus_id}' ";

    $delete_query = mysqli_query($CONN, $query);

    if ($delete_query) {

        header("Location:index.php");

    } else {

        die("QUERY FAILED" . mysqli_error($connection));

    }

}













?>


    <div class="container">
        <div class="row bg-info p-5 m-5">
           
           <div class="col-md-12 text-center">
               
        <?php if(isset($_SESSION['logged_user_name'])){
            
            echo "<h2>";
            echo "Welcome! ".$_SESSION['logged_user_name'];
            echo "</h2>";
            
        }else{
            echo "<h2>";
            echo "Home Page";
            echo "</h2>";
        } ?>
            
           </div>
        </div>
        <div class="row">
            <div class="col-md-12 mr-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(isset($_SESSION['logged_status'])){ 
                        
                    
                        $select_query = "SELECT * FROM customers";
                        $execute_select_query = mysqli_query($CONN,$select_query);
                        $row_count = mysqli_num_rows($execute_select_query);
                        
                        echo "<div class='ml-5 mb-4'>";
                        echo "<div class='d-flex justify-content-between'>";
                        echo "<button type='button' class='btn btn-info'> ";
                        echo "Number of Records Found <span class='badge badge-light'>$row_count</span>";
                        echo "</button>";
                        

                        echo "<div class='add-customer'>";
                        echo "<button type='button' class='btn btn-info'> <a href='add_customer.php' style='color:#fff'>add new record</a></button>";
                        echo "</div>";
                        echo "</div>";

                        while($row = mysqli_fetch_assoc($execute_select_query)){

                            $id = $row['id'];
                            $fname = $row['firstname'];
                            $lname = $row['lastname'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $phone = $row['phone'];

                        ?>

                            <tr>
                            <th scope="row"><?php echo $id;?></th>
                            <td><?php echo $fname;?></td>
                            <td><?php echo $lname;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $address;?></td>
                            <td><?php echo $phone;?></td>
                            <td><a href='index.php?edit_id=<?php echo $id?>'><i>Edit</i></a></td>
                            <td><a href='index.php?delete_id=<?php echo $id?>'><i>Delete</i></a></td>
                            </tr>

                            <!-- // echo "<tr>";
                            // echo "<td>$row['id']</td>";
                            // echo "<td>$row['firstname']</td>";
                            // echo "<td>$row['lastname']</td>";
                            // echo "<td>$row['username']</td>";
                            // echo "<td><a href='index.php?edit_id=$row['id']'><i>Edit</i></a></td>";
                            // echo "<td><a href='index.php?delete_id=$row['id']'><i>Delete</i></a></td>";
                            // echo "</tr>"; -->


                   <?php  }   ?> 
                        
                    <?php }else{
                        
                        echo "<tr>";
                        echo "<td colspan='6' class='text-center text-danger'>";
                        echo "NO Record Found!";
                        echo "</td>";
                        echo "</tr>";
                    }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php include_once 'footer.php' ; ?>
