<?php
    $con = mysqli_connect("localhost","root","","library_db");
    $sel = "SELECT * FROM books";
    $result = mysqli_query($con, $sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
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

        .boo {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            margin: 10px;
            float: right;
            cursor: pointer;
        }

        .boo:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<table border="1">
    <thead>
        <tr class="item">
            <th>Book ID</th>
            <th>Name</th>
            <th>Authors</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Daraz</th>
            <th>Edit</th>
            
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['Number']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Authors']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Category']; ?></td>
                <td><?php echo $row['Daraz']; ?></td>
                <td><a href="edit.php?book_id=<?php echo $row['Number']; ?>">Edit</a>/
                <a href="deletebooks.php?book_id=<?php echo $row['Number']; ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
            </td>
            </tr>
        <?php } ?> 
    </tbody>
</table>

<button class="boo" onclick="window.location.href='addbook.php';">Add Book</button>
<button class="boo" onclick="window.location.href='AdminDashboard.php';">Back</button>


</body>
</html>