<?php
$con = mysqli_connect("localhost", "root", "", "library_db");
$sel = "SELECT * FROM books";
$result = mysqli_query($con, $sel);
session_start();

// Check if the user is logged in
if(isset($_SESSION['uname'])) {
    $userId = $_SESSION['uname'];
    
    // Retrieve the fine message for the user
    $fineQuery = "SELECT books.Number, borrowed_books.fine FROM books LEFT JOIN borrowed_books ON books.Number = borrowed_books.book_id WHERE borrowed_books.user_id = '$userId'";
    $fineResult = mysqli_query($con, $fineQuery);

    // Store the fine messages in an associative array
    $fineMessages = array();
    while ($fineRow = mysqli_fetch_assoc($fineResult)) {
        $fineMessages[$fineRow['Number']] = $fineRow['fine'];
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Users data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        tr.item td {
            background-color: #ffcccc;
            font-weight: bold;
        }

        tr.item:hover td {
            background-color: #ff9999;
            color: white;
        }
    </style>
    <script>
        // JavaScript function to display the alert message
        function displayAlert(bookId, fineMessage) {
            alert("Book ID: " + bookId + "\nFine Amount: " + fineMessage);
        }
    </script>
</head>
<body>
    <table style="text-align:center;" border="3">
        <tr class="item">
            <td>BookId</td>
            <td>Name</td>
            <td>Authors</td>
            <td>Quantity</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['Number']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Authors']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
            </tr>
            <?php
        }
        ?>  
    </table>

    <?php
    // Display fine messages if the user is logged in
    if(isset($_SESSION['uname'])) {
        foreach ($fineMessages as $bookId => $fineAmount) {
            echo "<script>displayAlert(" . $bookId . ", '" . $fineAmount . "');</script>";
        }
    }
    ?>

</body>
</html>