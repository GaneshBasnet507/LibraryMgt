
<?php
$con = mysqli_connect("localhost","root","","library_db");
$sel="select * from borrowed_books";
$result=mysqli_query($con,$sel);
?>
<!doctype html>
    <body>
        <title>IssueBook</title>
        <table style="text-align:center;" border="3">
        <tr class="item">
            <td>BookId</td>
            <td>UserID</td>
            <td>BorrowDate</td>
            <td>ReturnDate</td>
            <td>Book</td>

            </tr>
        <tr>
            <?php
            while($row=mysqli_fetch_assoc($result))
            {
            ?>
            <td><?php echo $row['book_id'];?></td>
            <td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['borrow_date'];?></td>
            <td><?php echo $row['return_date'];?></td>
            <td><?php echo $row['book_name'];?></td>
          
    
        </tr>
        <?php
            }
            ?>
    </table>
    <button onclick="window.location.href:'deleteissuebook.php';">Delete</button>
   
    <style>
    table{
            margin-left:300px;
        }
             .item{
                background-color:red;
                font-weight:bold;
             } 
             .boo{
                margin-left:600px;
                background:blue;
                
                
             } 
             button{
                margin-left:590px;
                background:red;
             }
             
        
    </style>



