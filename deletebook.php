

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
       $delete=mysqli_real_escape_string($con,$_POST['deletetxt']);
       
    
       $tbl="DELETE FROM books WHERE Name='$delete'";
      $rel = mysqli_query($con,$tbl);
       if($rel){
        echo"Delete sucessfully";
        header("Location:Books.php");
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
   <label for="bookname">Book name</label>
   <input type="text"  name="deletetxt" placeholder="enter drop book name"><BR></BR>
   <label for="bookname">Book Id</label>
   <input type="text"  name="idtxt" placeholder="enter book id"><BR></BR>
    <input type="submit"  name="submit" value="submit">
    <input type="submit"  name="submit" value="back"></button><BR></BR>
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
