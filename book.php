<?php
    $con = mysqli_connect("localhost","root","","library_db");
    $sel="select * from books";
    $result=mysqli_query($con,$sel);
    ?>
    <!doctype html>
        <body>
            <title>Users data</title>
            <table style="text-align:center;" border="3">
            <tr class="item">
                <td>Number</td>
                <td>Name</td>
                <td>Authors</td>
                
                <td>Edit</td>
                <td>Delete</td>
                </tr>
            <tr>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                ?>
                <td><?php echo $row['Number'];?></td>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Authors'];?></td>
                               <td><a href="" class="edit"><button style="color:blue">Edit</button></a></td>
                <td><a href="" class="edit"><button style="color:blue">Delete</button></a></td>
            </tr>
            <?php
                }
                ?>
        </table>
        <button type="button"   name="submit" class="boo" onclick="window.location.href='bookform.html';">Add Book</button>
        </body>
        <style>
        table{
                margin-left:300px;
            }
                 .item{
                    background-color:red;
                    font-weight:bold;
                 } 
                 .boo{
                    margin-left:670px;
                    background:blue;
                    
                    
                 } 
                 
            
        </style>