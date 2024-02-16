<?php
if(isset($_POST['submit'])){
	$uname=$_POST['uname'];
	$psw=$_POST['psw'];
	$con = mysqli_connect("localhost","root","","library_db")or die("db connection error");
	$select = "select * from admin where username='$uname' and password='$psw'";
	$result = mysqli_query($con,$select) or die("retrieval error");
	$n = mysqli_num_rows($result);//counts numbers of rows from the table
	if($n>0)
	{
		require'../admin/AdminDashboard.php';
	}
	else{
		echo "<script>alert('You are not Librarian.')</script>";
		
	}
    }
	
	?>