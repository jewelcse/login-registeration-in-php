
<?php include_once 'header.php' ; ?>
<?php include_once 'navbar.php' ; ?>

    <div class="container">
        <div class="row bg-info p-5 m-5">
           
           <div class="col-md-6 text-center">
               
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
    </div>

<?php include_once 'footer.php' ; ?>
