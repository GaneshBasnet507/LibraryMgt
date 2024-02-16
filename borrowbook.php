<?php
$con = mysqli_connect("localhost", "root", "", "library_db") or die("Db connection failed");

$book_id = $_POST['bookNumber'];
$book_name = $_POST['bookName'];
$user_id = $_POST['uname'];
$borrow_date = $_POST['borrow_date'];
$return_date = $_POST['return_date'];


$checkBookQuery = "SELECT * FROM books WHERE Number = '$book_id' AND Name = '$book_name'";
$checkBookResult = mysqli_query($con, $checkBookQuery);
if (strtotime($return_date) <= strtotime($borrow_date)) {
    echo "<script>alert('Return date invalid please try again!!.'); window.location.href = '/librarymgt/userborrow.php';</script>";
    exit();
}


if (mysqli_num_rows($checkBookResult) == 0) {
    echo "<script>alert('Book id and name doesnot match try again!!.'); window.location.href = '/librarymgt/userborrow.php';</script>";
    exit();
}
// Check if the quantity of the book is greater than 0
$checkQuantityQuery = "SELECT Quantity FROM books WHERE Number = '$book_id'";
$quantityResult = mysqli_query($con, $checkQuantityQuery);
$row = mysqli_fetch_assoc($quantityResult);
$quantity = $row['Quantity'];

if ($quantity == 0) {
    echo "<script>alert('Sorry, this book is out of stock.'); window.location.href = '/librarymgt/userborrow.php';</script>";
    exit();
}


$condition = "SELECT * FROM borrowed_books WHERE book_id='$book_id' AND user_id='$user_id'";
$rel_condition = mysqli_query($con, $condition);

if (mysqli_num_rows($rel_condition) > 0) {
    echo "<script>alert('You already borrowed this book .'); window.location.href = '/librarymgt/userborrow.php';</script>";
    exit();
}


$sql_reduce = "UPDATE books SET Quantity = Quantity - 1 WHERE Number = '$book_id'";
$result_reduce = mysqli_query($con, $sql_reduce);

if ($result_reduce) {
    
    $sql_borrow = "INSERT INTO borrowed_books (book_id, user_id, borrow_date, return_date, book_name)
                   VALUES ('$book_id', '$user_id', '$borrow_date', '$return_date', '$book_name')";
    $result_borrow = mysqli_query($con, $sql_borrow);

    if ($result_borrow) {
        header("Location: /librarymgt/userdashboard.html");
        echo "The book was borrowed successfully.";
    } else {
        echo "Error borrowing the book.";
    }
} else {
    echo "Error reducing the quantity of the book.";
}

mysqli_close($con);
?>