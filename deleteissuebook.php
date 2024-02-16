

<?php
     $con = mysqli_connect("localhost","root","","library_db") or die("db fail");
    if(isset($_POST['submit'])){
    
       $delete=mysqli_real_escape_string($con,$_POST['deletetxt']);
       $userid=mysqli_real_escape_string($con,$_POST['usertxt']);
       
    
       $tbl="DELETE FROM borrowed_books WHERE book_name='$delete',user_id='$userid'";
      $rel = mysqli_query($con,$tbl);
       if($rel){
        echo"Delete sucessfully";
        header("Location:issueBook.php");
       }
       else{
        echo"wrong entry";
        return false;
       }
    }


?>




    <body>
        <title>Deleting Book</title>
        <form action="" method="POST">
   <label for="bookname">Book name</label>
   <input type="text"  name="deletetxt" placeholder="enter drop book name"><BR></BR>
   <label for="bookname">User Id</label>
   <input type="text"  name="usertxt" placeholder="enter user id"><BR></BR>
    <input type="submit"  name="submit" value="submit"><BR></BR>
</form>
</body>
</html>
