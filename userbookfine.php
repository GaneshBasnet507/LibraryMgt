<?php

$con = mysqli_connect("localhost", "root", "", "library_db");
$sel = "SELECT * FROM borrowed_books";
$result = mysqli_query($con, $sel);
?>

<!doctype html>
<html>

<head>
    <title>IssueBook</title>
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

th,
td {
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

button {
    margin: 20px 0 0 300px;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 11px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background-color: #45a049;
}
    </style>
</head>

<body>
    <table style="text-align:center;" border="3">
        <tr class="item">
            <td>BookId</td>
            <td>UserID</td>
            <td>BorrowDate</td>
            <td>ReturnDate</td>
            <td>Book</td>
          
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
                
            if (strtotime($row['return_date']) < strtotime(date("Y-m-d"))) {
                $fineAmount = calculateFine($row['return_date']);
                $fineMessage = "Book is overdue! Fine amount: RS." . $fineAmount;
              
                 $_SESSION['fine_message'] = $fineMessage;
            } else {
                $fineMessage = "Book is not overdue.";
                // Generate the URL with query parameters for booksforuser.php
                $url = "booksforuser.php?book_name=" . urlencode($row['book_name']) . "&fine_message=" . urlencode($fineMessage);
               
            }
   
            ?>
            <tr>    
                <td><?php echo $row['book_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['borrow_date']; ?></td>
                <td><?php echo $row['return_date']; ?></td>
                <td><?php echo $row['book_name']; ?></td>
                
            </tr>
        <?php
        }
        mysqli_close($con);
        ?>
    </table>
    
    
</body>

</html>

<?php
function calculateFine($return_date)
{
    // Get the current date
    $currentDate = date("Y-m-d");


    $daysOverdue = (strtotime($currentDate) - strtotime($return_date)) / (60 * 60 * 24);
    $fineAmount = $daysOverdue * 20;

    // Return the fine amount
    return $fineAmount;
}
?>