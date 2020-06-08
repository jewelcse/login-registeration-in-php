<?php


// DECLARE CONNECTION VARIABLE

$HOST_NAME = "localhost"; // localhost and 127.0.0.1 are same 
$USER_NAME = "root"; //  Default user name is root
$USER_PASSWORD = ""; // Default password is null or empty
$DATABASE_NAME = "testdb"; // Database name wheather you want store your data. Make sure create a databse before start.

// DECLARE A VARIABLE NAME $CONN 

$CONN = mysqli_connect($HOST_NAME,$USER_NAME,$USER_PASSWORD,$DATABASE_NAME);

if(!$CONN){
    echo "Connection failed ".mysqli_error(); // if you failed to establiesd your connection then it return this statements with mysqli error
}


?>