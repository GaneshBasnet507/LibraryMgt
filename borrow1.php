

<?php
   $con= mysqli_connect("localhost","root","","library_db") or die ("Db connection failed");
   if(isset($_POST['submit'])){
      $book_name=$_POST['booktxt'];
      $user_id=$_POST['idtxt'];
   
   $user_name=$_POST['nametxt'];
   // Check if the book is available in the database
   $query = "SELECT * FROM books WHERE Name='$book_name'";
   $result = mysqli_query($con, $query);
 
   if (mysqli_num_rows($result) > 0) {
     // Update the book status to borrowed
     $sql_reduce="UPDATE books SET Quantity = Quantity-1 WHERE Name='$book_name'";
     $result_reduce = mysqli_query($con,$sql_reduce);
     if($result_reduce){
         $b_date=date("Y-m-d");
         $r_date=date("Y-m-d",strtotime("+1 week"));
         $sql_borrow= "INSERT INTO borrowed_books( user_id, borrow_date, return_date, book_name)
         VALUES('$user_name','$b_date','$r_date','$book_name')";
         $result_borrow=mysqli_query($con,$sql_borrow);
         if($result_borrow){
             echo"borrowed book sucessfully";{
              header("Location:Library_mgt.html");}
             }
       
         
         else{
             echo"Error borrowing book";
         }
  
     }
   }
}

 ?>



<body>
   <title>Adding Book</title>
   <form action="" method="POST">
<label for="bookname">Book name</label>

<input type="text"  name="booktxt" placeholder="enter drop book name"><BR></BR>
<label for="bookname">User Id</label>
<input type="text"  name="idtxt" placeholder="enter user id"><BR></BR>
<label for="bookname">User Name</label>
<input type="text"  name="nametxt" placeholder="enter user name"><BR></BR>
<input type="submit"  name="submit" value="submit">
<input type="submit"  name="submit" value="back" onclick="window.location.href='Library_mgt.html';"></button><BR></BR>
</form>
</body>
</html>
<style>
body {
background-color: #f7f7f7;
}

/* Set font and color for headings */
h1, h2 {
font-family: Arial, sans-serif;
color: #333;
}

/* Style form labels */
label {
display: block;
margin-bottom: 5px;
font-size: 18px;
font-weight: bold;
color: #333;
}

/* Style form inputs */
input[type=text] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
border: none;
border-bottom: 2px solid #4CAF50;
}

input[type=submit] {
background-color: #4CAF50;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
margin-top: 10px;
margin-left:80px;
}

input[type=submit]:hover {
background-color: #3e8e41;
}

/* Style the form */
form {
width: 50%;
margin: 0 auto;
padding: 20px;
background-color: #fff;
border-radius: 10px;
box-shadow: 0  0 10px rgba(0, 0, 0, 0.1);
}
</style>
