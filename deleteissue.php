

<?php
$con = mysqli_connect("localhost","root","","library_db") or die("db fail");
if(isset($_POST['submit'])){
/*   $number=$_POST['text'];
   $bookname=$_POST['txttext'];
   $author=$_POST['authortxt'];
   $student=$_POST['stdtxt'];
   $published_date=$_POST['pbstxt'];
   $took=$_POST['tooktxt'];
     $insert="INSERT INTO books  VALUES ('$number','$bookname','$author','$student','$published_date','$took')";
  if(mysqli_query($con,$insert)){
   echo"<script>alert('new record inserted')</script>";
  }*/
  $delete=mysqli_real_escape_string($con,$_POST['bookidtxt']);
  $deleteId=mysqli_real_escape_string($con,$_POST['useridtxt']);
  

  $tbl="DELETE FROM borrowed_books WHERE book_id='$delete' and user_id='$deleteId'";
 $rel = mysqli_query($con,$tbl);
  if($rel){
   echo"Delete sucessfully";
  header("Location:/librarymgt/issueBook.php");
  }
  else{
   echo"wrong entry";
   return false;
  }
}


?>



<body>
   <title>Adding Book</title>
   <form action="" method="POST">
<label for="booid">Book Id</label>
<input type="text"  name="bookidtxt" placeholder="enter drop book name"><BR></BR>

<label for="userid">User Id</label>
<input type="text"  name="useridtxt" placeholder="enter user id "><BR></Br>
<input type="submit"  name="submit" value="submit"><BR></BR>
</form>
</body>
</html>
<style>
      form {
  max-width: 500px;
  margin: 0 auto;
  
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: none;
  border-radius: 5px;
  background-color: #fff;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

input[type="submit"] {
  display: block;
  margin: 0 auto;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: #fff;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}
body{

}

   </style>
