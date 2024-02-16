<?php
    $con = mysqli_connect("localhost","root","","library_db") or die ("db connection fail");

    if(isset($_GET['password'])  && isset($_GET['username'])) {
        $password= $_GET['password'];
        $name= $_GET['username'];

        
        // Update the verified column to set the user as verified
        $updateQuery = "UPDATE users SET verified = 1 WHERE password = '$password' AND username = '$name'";
        mysqli_query($con, $updateQuery);
        
        // Redirect the user to a login page or any other relevant page
        header("Location: userdetail.php");
        exit();
    }

?>