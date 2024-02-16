<h1 style="margin-left:380px"> Books Available</h1>
<?php
   session_start();
   $con = mysqli_connect("localhost","root","","library_db");
   $sel="select * from books";
   $result=mysqli_query($con,$sel);
   ?>
   <!doctype html>
       <body>
           <title>Users data</title>
           <table style="text-align:center;" border="3">
           <tr class="item">
               <td>BookId</td>
               <td>Name</td>
               <td>Authors</td>  
            <td>Quantity</td></tr>
           <tr>
               <?php
               while($row=mysqli_fetch_assoc($result))
               {
               ?>
               <td><?php echo $row['Number'];?></td>
               <td><?php echo $row['Name'];?></td>
               <td><?php echo $row['Authors'];?></td>
               <td><?php echo $row['Quantity'];?></td>
             </tr>
           <?php
               }
               ?>
       </table>
      
       <style>
       table {
    margin-left: 300px;
    border-collapse: collapse;
}

.item {
    background-color: red;
    font-weight: bold;
}

form {
    margin-left: 300px;
    padding: 30px;
}

.book {
    background: blue;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    float: left;
    margin: 10px;
    align: left;
    cursor: pointer;
    border-radius: 5px;
}

input {
    margin-left: 30px;
}

h1 {
    color: green;
}

body {
    background: pink;
}
           
       </style>

 
<form action="borrowbook.php" method="POST">
    <form action="borrowbook.php" method="POST">
    <h1>Book ID:</h1><input type="text" name="bookNumber"><br>
    <h1>Book Name:</h1><input type="text" name="bookName"><br>
    <h1>User ID:</h1><input type="text" name="uname" value="<?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ''; ?>" required><br>
    <h1>Borrow Date (Y-m-d):</h1><input type="text" name="borrow_date" placeholder="YYYY-MM-DD" required><br>
    <h1>Return Date (Y-m-d):</h1><input type="text" name="return_date" placeholder="YYYY-MM-DD" required><br>
    <input type="submit" class="book" value="Borrow Book">
    <input type="submit" class="book" value="Back" onclick="window.location.href='userdashboard.html'";>
</form>
        
       
<style>
    form{
        margin-left:300px;
        padding:30px;
    
    }
    .book{
        background:blue;
        background-color: #4CAF50;
                border: none;
                color: white;
                padding: 8px;
                text-align: center;
                text-decoration: none;
                display:inline-block;
                font-size: 16px;
                float:left;
                margin: 10px;
                align:left;
                
        
                cursor: pointer;
                border-radius: 5px;
    }
    input{
        margin-left:30px;
        
        
    }
    h1{
        color:green;
    }
    body{
        background:pink;
    }
    </style>
