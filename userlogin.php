<?php
session_start();
if(isset($_POST['submit'])){
	$uname=$_POST['uname'];
	$psw=$_POST['psw'];
	$con = mysqli_connect("localhost","root","","library_db")or die("db connection error");
	$select = "select * from users where username='$uname' and password ='$psw' AND verified = 1";
	$result = mysqli_query($con,$select) or die("retrieval error");
	$n = mysqli_num_rows($result);//counts numbers of rows from the table
	if($n>0)
	{
        $_SESSION['uname']=$uname;
        $_SESSION['psw']=$psw;
        echo"welcome $_SESSION[uname]";
        header("location:userdashboard.html");
		
	}
	else{
		echo "<script>alert('Register first to access this content.');</script>";
		
	}
    }
	
	?>