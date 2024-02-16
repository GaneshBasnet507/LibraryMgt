<?php
$uname = $_POST['uname'];
$psw = $_POST['psw'];
$cpsw = $_POST['cpsw'];
$email = $_POST['email'];
$con = mysqli_connect("localhost", "root", "", "library_db");
$tble = "create table if not exists users(username varchar(40),password varchar(40),email varchar(100))";
mysqli_query($con, $tble);
$insert = "INSERT INTO users (username, password, email) VALUES ('$uname', '$psw', '$email')";

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email please try again!!.'); window.location.href = '/librarymgt/userregister.html';</script>";
    exit();
}

// Validate username format (only alphabets)
if (!preg_match("/^[a-zA-Z]+$/", $uname)) {
    echo "<script>alert('Username should be only alphabets please try again!!.'); window.location.href = '/librarymgt/userregister.html';</script>";
    exit();
}

// Validate password match
if ($psw == $cpsw) {
    mysqli_query($con, $insert);
    echo "<script>alert('Registration successful. You can now login.');</script>";
    echo "<script>window.location.href = 'Library_mgt.html';</script>"; // Redirect to login page
} else {
	echo "<script>alert('Registration Failed!!!.Sorry');</script>";
    echo "<script>window.location.href = 'Library_mgt.html';</script>"; // Redirect to login page
}
?>