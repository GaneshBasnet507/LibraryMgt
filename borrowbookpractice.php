<?php
/*$con=mysqli_connect("localhost","root","","library_db");
    if (isset($_POST['Borrow_book'])) {
       $book_id = $_POST['book_number'];
        $book_name= $_POST['bookName'];
        $user_id = $_SESSION['uname']; // Assuming the user is logged in and their ID is stored in the session
        $borrow_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime('+14 days')); // Assuming the book can be borrowed for 14 days
        
      $book_id=mysqli_real_escape_string($con,$_POST['book_number']);
       $book_name=mysqli_real_escape_string($con,$_POST['bookname']);
       $user_id=mysqli_real_escape_string($con,$_SESSION['uname']);
       $borrow_date=mysqli_real_escape_string($con,date('Y-m-d'));
       $return_date=mysqli_real_escape_string($con,date('Y-m-d',strtotime('+14 days')));
    
   $con=mysqli_connect("localhost","root","","library_db");
    $sql = "INSERT INTO borrowed_books (book_id, user_id, borrow_date, return_date, book_name)
                VALUES ('$book_id','$user_id', '$borrow_date', '$return_date','$book_name')";
       mysqli_query($con, $sql);
      $new_copies = $book['copies'] - 1;
   $sql = "UPDATE books SET copies=$_copies WHERE Number= '$book_id'";
     mysqli_query($con, $sql);
       if($rel){
        echo"sucess";
       }
        else{
            echo"unsucess";
        }
        // Redirect the user to their dashboard or display a success message
    
    $user_id = $_SESSION['uname']; // Assuming the user is logged in and their ID is stored in the session
    $sql = "SELECT books.Name, borrowed_books.borrow_date, borrowed_books.return_date 
        FROM borrowed_books 
        INNER JOIN books ON borrowed_books.book_id = books.Number
        WHERE borrowed_books.user_id = '$user_id'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["Name"] . " (Borrowed on " . $row["borrow_date"] . " and due on " . $row["return_date"] . ")<br>";
        // Display other book details as needed
    }
} else {
    echo "No books borrowed";
}
$stmt = $con->prepare("INSERT INTO borrowed_books (book_id, user_id, borrow_date, return_date, book_name) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $book_id, $user_id, $borrow_date, $return_date, $book_name);
$stmt->execute();
// Get the current number of copies
$sql = "SELECT copies FROM books WHERE Number='$book_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$curr_copies = $row['copies'];

// Update the number of copies
$new_copies = $curr_copies - 1;
$sql = "UPDATE books SET copies=$new_copies WHERE Number='$book_id'";
mysqli_query($con, $sql);
if(mysqli_affected_rows($con) > 0){
    echo "Success";
    // Redirect to dashboard or display success message
 }
 else{
    echo "Failed";
    // Display error message
 }
    ?>*/
    
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
       $Number=mysqli_real_escape_string($con,$_POST['booknumber']);
       $b_name=mysqli_real_escape_string($con,$_POST['bookname']);
       $user_id=mysqli_real_escape_string($con,$_POST['uname']);
       $b_date=mysqli_real_escape_string($con,date('Y-m-d'));
       $r_date=mysqli_real_escape_string($con,date('Y-m-d'));

    
       $tbl="INSERT INTO borrowed_books(book_id,user_id,borrow_date,return_date,book_name)
       VALUES('$Number','$user_id','$b_date','$r_date','$b_name')";
      $rel = mysqli_query($con,$tbl);
       if($rel){
        echo"insert sucessfully";
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
    <input type="text" name="text" placeholder="enter book number" >
    <input type="text" name="txttext" placeholder="enter book name">
    <input type="text" name="authortxt" placeholder="enter book's Author">
    <input type="text" name="pbstxt" placeholder="enter published date">
    <input type="submit"  name="submit" value="submit"><BR></BR>
</form>
</body>
</html>



    ?>