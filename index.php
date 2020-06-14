
<?php include_once 'header.php' ; ?>
<?php include_once 'navbar.php' ; ?>
<?php include_once 'db.php' ; ?>

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
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(isset($_SESSION['logged_status'])){ 
                        
                    
                        $select_query = "SELECT * FROM user";
                        $execute_select_query = mysqli_query($CONN,$select_query);
                        $row_count = mysqli_num_rows($execute_select_query);
                        echo $row_count;
                        while($row = mysqli_fetch_assoc($execute_select_query)){

                            $id = $row['id'];
                            $fname = $row['firstname'];
                            $lname = $row['lastname'];
                            $uname = $row['username'];
                            $email = $row['email'];

                        ?>

                            <tr>
                            <th scope="row"><?php echo $id;?></th>
                            <td><?php echo $fname;?></td>
                            <td><?php echo $lname;?></td>
                            <td><?php echo $uname;?></td>
                            <td><?php echo $email;?></td>
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
